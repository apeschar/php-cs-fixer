all :
.PHONY : all

format : vendor/autoload.php tools/php-cs-fixer/vendor/autoload.php
	tools/php-cs-fixer/vendor/bin/php-cs-fixer fix

vendor/autoload.php : composer.json
	composer install

%/vendor/autoload.php : %/composer.lock
	composer --working-dir=$* install
