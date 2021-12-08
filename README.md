# Shared config for PHP-CS-Fixer

This is to keep my rules for PHP-CS-Fixer in one place, so that changing them
affects all projects.

It also uses `git ls-files '*.php'` to list target files instead of Symfony's
finder. This is much faster and automatically avoids files that are not
versioned.

## Installation

Install the package in your project:

    composer require --dev apeschar/php-cs-fixer

Copy the `.php-cs-fixer.dist.php` configuration file:

    cp vendor/apeschar/php-cs-fixer/.php-cs-fixer.dist.php .

Run `php-cs-fixer`:

    php-cs-fixer fix
