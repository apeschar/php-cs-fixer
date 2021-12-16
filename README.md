# Shared config for PHP-CS-Fixer

This is to keep my rules for PHP-CS-Fixer in one place, so that changing them
affects all projects.

It also uses `git ls-files '*.php'` to list target files instead of Symfony's
finder. This is much faster and automatically avoids files that are not
versioned.

## Installation

Install PHP-CS-Fixer and this package in a subdirectory of your project:

    mkdir -p tools/php-cs-fixer
    composer --working-dir=tools/php-cs-fixer \
        require friendsofphp/php-cs-fixer apeschar/php-cs-fixer

Initialize the `.php-cs-fixer.dist.php`:

    cat > .php-cs-fixer.dist.php <<EOF
    <?php
    use Kibo\PhpCsFixer\Factory;
    return (new Factory(__DIR__))->config();
    EOF

Run `php-cs-fixer`:

    tools/php-cs-fixer/vendor/bin/php-cs-fixer fix
