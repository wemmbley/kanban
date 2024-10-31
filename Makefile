install:
	composer install

env:
	cp .env.example .env

key:
	php artisan key:generate

migrate:
	php artisan migrate

seed:
	php artisan db:seed

serve:
	php artisan serve

setup: install env key migrate seed serve
