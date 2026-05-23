variable "app_port" {
  type    = number
  default = 8000
}

variable "db_port" {
  type    = number
  default = 3306
}

variable "db_name" {
  type    = string
  default = "laravel"
}

variable "db_user" {
  type    = string
  default = "laravel"
}

variable "db_password" {
  type    = string
  default = "secret"
}
