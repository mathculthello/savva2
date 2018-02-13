erect: env
	composer install
	touch database/database.sqlite
	php artisan migrate:fresh --seed

env: 
	test -f .env || cp .env.example .env
