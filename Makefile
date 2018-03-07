erect: env
	touch database/database.sqlite
	composer install
	php artisan migrate:fresh --seed

env: 
	test -f .env || cp .env.example .env
