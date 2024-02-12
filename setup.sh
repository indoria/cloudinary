#!/bin/bash

sudo apt update
sudo apt install php apache2 libapache2-mod-php php-{cli,common,bcmath,mbstring,zip,json,xml,pdo,tokenizer,mysql,ctype,fileinfo} -y

sudo cp cloudinary.conf /etc/apache2/sites-available/
sudo mv apache2.conf /etc/apache2/
sudo a2ensite cloudinary
sudo a2dissite 000-default 

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
composer install
sudo service apache2 start
