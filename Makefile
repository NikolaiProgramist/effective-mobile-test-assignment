start:
	php artisan serve --host=0.0.0.0 --port=8000

setup:
	composer install
	cp -n .env.example .env
	touch database/database.sqlite
	php artisan key:generate
	php artisan migrate
	npm ci
	npm run build

test:
	composer exec --verbose phpunit tests

test-coverage:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml

lint:
	./vendor/bin/phpcs --standard=PSR12 app routes database tests

lint-fix:
	./vendor/bin/phpcbf --standard=PSR12 app routes database tests
