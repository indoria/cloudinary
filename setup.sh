#!/bin/bash

sudo add-apt-repository ppa:ondrej/php
sudo apt update
#php8.2-common => php8.2-pdo + php8.2-tokenizer + php8.2-ctype + php8.2-fileinfo
#php8.2-json has no installation candidation => It is inbuilt in php8.0 [libphp8.0-embed] (also in cli, cgi, fpm, phpdbg, libapache2-mod-php)
sudo apt install php8.2 apache2 libapache2-mod-php8.2 php8.2-{cli,common,bcmath,mbstring,zip,xml,tokenizer,mysql} -y

sudo cp cloudinary.conf /etc/apache2/sites-available/
sudo cp apache2.conf /etc/apache2/
sudo a2ensite cloudinary
sudo a2dissite 000-default 

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
composer install
composer update

sudo service apache2 start
