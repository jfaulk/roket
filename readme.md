# Roket

## Getting Started (Windows)
* Install [XAMPP] (https://www.apachefriends.org/index.html)
* Install [Composer] (https://getcomposer.org/Composer-Setup.exe)
* When Composer asks for the path to PHP, set it to the XAMPP PHP directory. By default this is "C:\xampp\php\php.exe".

* Clone the repo either from the command line or through IntelliJ/PhpStorms "Checkout from Version Control" option.
* Open a command prompt window in the projects root folder and run the command "composer install". This installs the
  project dependencies (roket\vendor) that are not part of the git repo.
  
* Create a database with XAMPP named "roket" with a username "roket" and password "roket".

* Open a command prompt window in the projects root folder and run the command "php artisan serve".
* You should be able to access the site at [localhost:8000] (localhost:8000).