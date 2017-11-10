m:
	docker exec  php-common bash -c 'php artisan migrate:fresh'
up:
	docker-compose up -d