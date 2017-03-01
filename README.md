## Setup
* Clone repo.
* Make sure that you have the latest PHP version
* Install and update composer

## Commands
Run command line in project root directory.
To start the test for the whole project use this command
```
vendor/bin/phpunit.bat --bootstrap bootstrap.php CarTest/
```

To see testing debug info use this command
```
vendor/bin/phpunit.bat --colors --debug --verbose --bootstrap bootstrap.php CarTest/
```
