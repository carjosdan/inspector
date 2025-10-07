```bash
composer create-project symfony/skeleton:"7.3.x" .
composer require webapp
git init
git remote add origin git@github.com:carjosdan/inspector.git
git remote -v [OK]
composer require easycorp/easyadmin-bundle
php bin/console make:user
php bin/console make:security:form-login
php bin/console make:migration
php bin/console doctrine:migrations:migrate [OK]
php bin/console make:command app:create-user
php bin/console app:create-user [OK]
php bin/console make:entity Warnings
php bin/console make:admin:dashboard
php bin/console make:admin:crud Warnings
php bin/console cache:clear
php bin/console cache:warmup
php bin/console make:migration
php bin/console doctrine:migrations:migrate [OK]

```