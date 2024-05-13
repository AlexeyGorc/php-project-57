start:
	php artisan serve --host 0.0.0.0 --port=$(PORT)

setup:
	composer install
	cp -n .env.example .env
	php artisan key:generate --show
	npm ci
	npm run build

migrate:
	php artisan migrate:fresh --force --seed

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 app routes tests

lint-fix:
	composer exec phpcbf -- --standard=PSR12 app routes tests

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml