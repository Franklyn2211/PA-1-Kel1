pipeline {
  agent any

  environment {
    TF_IN_AUTOMATION = "true"
  }

  options {
    timestamps()
  }

  stages {
    stage("Checkout") {
      steps {
        checkout scm
      }
    }

    stage("Install") {
      steps {
        sh """
          composer install --no-interaction --prefer-dist
          if [ ! -f .env ]; then cp .env.example .env; fi
          php artisan key:generate --force
        """
      }
    }

    stage("Test") {
      environment {
        DB_CONNECTION = "sqlite"
        DB_DATABASE   = "/tmp/testing.sqlite"
      }
      steps {
        sh """
          touch /tmp/testing.sqlite
          php artisan config:clear
          php artisan migrate --no-interaction --force
          php artisan test
        """
      }
    }

    stage("Deploy (Terraform)") {
      steps {
        sh """
          terraform -chdir=infra/terraform init
          terraform -chdir=infra/terraform apply -auto-approve
        """
      }
    }
  }
}
