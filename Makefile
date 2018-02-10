all: bootstrap

bootstrap:
	composer install
	cp .env.example .env
	touch database/database.sqlite
	php artisan migrate
