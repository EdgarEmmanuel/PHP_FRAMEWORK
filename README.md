# THE PHP FRAMEWORK 

![image](https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png)
___

### HANDLING REQUESTS AND RESPONSES
[PSR7 - Guzzle HTTP](https://packagist.org/packages/twig/twig)


### HANDLING SENDING RESPONSES
[Response Sender](https://packagist.org/packages/http-interop/response-sender)

### HANDLING ROUTING
[ZendExpressiveFastRoute](https://packagist.org/packages/zendframework/zend-expressive-fastroute)

### HANDLING VIEWS/TEMPLATES
[Twig](https://packagist.org/packages/twig/twig)

### DEPENDENCY INJECTION
[PSR11- PHP DI](https://github.com/PHP-DI/PHP-DI)

### DATABASES AND  MIGRATIONS AND SEEDS
[PHINX](https://phinx.org/)

### COMMAND LINE
[SYMFONY/CONSOLE](https://github.com/symfony/console)

### GENERATE FAKE DATA
[FAKER](https://github.com/FakerPHP/Faker)

___

### Commands

1. Make migration => php builder builder:migration <MigrationName>
N.B: CamelCase for the name

2. Run All Migrations => php builder builder:migrate

3. Make a Seeder => php builder builder:seed <SeedName>
N.B: CamelCase for the name 

4. Run All Seeder => php builder builder:run:seed

5. Run server => php builder run