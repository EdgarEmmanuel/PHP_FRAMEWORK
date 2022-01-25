# THE PHP FRAMEWORK 

![image](https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png)
___

### GESTION DES REQUETES ET REPONSE
[PSR7 - Guzzle HTTP](https://packagist.org/packages/twig/twig)


### GESTION D'ENVOIE DES REPONSES
[Response Sender](https://packagist.org/packages/http-interop/response-sender)

### GESTION DES ROUTES ET DU ROUTING
[ZendExpressiveFastRoute](https://packagist.org/packages/zendframework/zend-expressive-fastroute)

### GESTION DES VUES/TEMPLATES
[Twig](https://packagist.org/packages/twig/twig)

### INJECTION DE DEPENDANCE
[PSR11- PHP DI](https://github.com/PHP-DI/PHP-DI)

### BASE DE DONNEES ET MIGRATIONS ET SEED
[PHINX](https://phinx.org/)

### LIGNE DE COMMANDE
[SYMFONY/CONSOLE](https://github.com/symfony/console)

___

### Commands

1. Make migration => php builder builder:migration <MigrationName>
N.B: CamelCase for the name

2. Run All Migrations => php builder builder:migrate

3. Make a Seeder => php builder builder:seed <SeedName>
N.B: CamelCase for the name 

4. Run All Seeder => php builder builder:run:seed

5. Run server => php builder run