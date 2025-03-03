# Definir variables de entorno
DB_CONTAINER_NAME=mysql_db
PHP_CONTAINER_NAME=php_app

# Construir la imagen y levantar los contenedores
up: build
	docker-compose up -d

# Construir la imagen de los contenedores
build:
	docker-compose build

# Detener y eliminar contenedores
down:
	docker-compose down

# Ejecutar migraciones de Doctrine (actualizar esquema en la DB)
migrate:
	docker exec -it $(PHP_CONTAINER_NAME) php vendor/bin/doctrine orm:schema-tool:update --force

# Ver logs del contenedor PHP
logs:
	docker logs -f $(PHP_CONTAINER_NAME)

# Ejecutar Composer dentro del contenedor PHP
composer:
	docker exec -it $(PHP_CONTAINER_NAME) composer install

# Ejecutar PHPUnit dentro del contenedor PHP
# test:
# 	docker exec -it $(PHP_CONTAINER_NAME) ./vendor/bin/phpunit
