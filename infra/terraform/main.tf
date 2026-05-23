terraform {
  required_version = ">= 1.5.0"

  required_providers {
    docker = {
      source  = "kreuzwerker/docker"
      version = "~> 3.0"
    }
  }
}

provider "docker" {}

locals {
  app_dir = abspath("${path.module}/../..")
}

resource "docker_network" "app" {
  name = "laravel_net"
}

resource "docker_volume" "dbdata" {
  name = "laravel_dbdata"
}

resource "docker_image" "app" {
  name = "laravel_app:local"

  build {
    context = local.app_dir
  }
}

resource "docker_container" "db" {
  name  = "laravel_db"
  image = "mysql:8.0"

  networks_advanced {
    name = docker_network.app.name
  }

  env = [
    "MYSQL_DATABASE=${var.db_name}",
    "MYSQL_USER=${var.db_user}",
    "MYSQL_PASSWORD=${var.db_password}",
    "MYSQL_ROOT_PASSWORD=root",
  ]

  ports {
    internal = 3306
    external = var.db_port
  }

  volumes {
    volume_name    = docker_volume.dbdata.name
    container_path = "/var/lib/mysql"
  }
}

resource "docker_container" "app" {
  name  = "laravel_app"
  image = docker_image.app.image_id

  networks_advanced {
    name = docker_network.app.name
  }

  env = [
    "APP_ENV=local",
    "APP_DEBUG=true",
    "APP_URL=http://localhost:${var.app_port}",
    "DB_CONNECTION=mysql",
    "DB_HOST=${docker_container.db.name}",
    "DB_PORT=3306",
    "DB_DATABASE=${var.db_name}",
    "DB_USERNAME=${var.db_user}",
    "DB_PASSWORD=${var.db_password}",
  ]

  ports {
    internal = 8000
    external = var.app_port
  }

  volumes {
    host_path      = local.app_dir
    container_path = "/var/www/html"
  }

  command = [
  "sh",
  "-c",
  "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000",
]

  depends_on = [docker_container.db]
}
