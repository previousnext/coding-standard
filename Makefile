check: test lint

test:
	bin/phpunit

lint: codestyle static-analysis

fix:
	bin/phpcbf

codestyle:
	bin/phpcs

static-analysis:
	bin/phpstan
