erect:
	composer install
	test -f .env || cp .env.example .env
	touch database/database.sqlite
	php artisan migrate:fresh --seed
