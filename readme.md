## SIMPLE SHOPPING CART - Coding challenge test


## SETUP INSTRUCTIONS 


These following instructions are for setting up the project in a LAMP environment.

1. Clone the project to your server's web directory localy

2. Create new virtual host or modify the default one (usually in /etc/apache2/sites-available)

	- Modify the DocumentRoot and the Directory: 	

		"ServerAdmin webmaster@localhost <br />
         DocumentRoot /PATH_TO_YOUR_WEB_DIR/codingchallenge/public

         <Directory /PATH_TO_YOUR_WEB_DIR/codingchallenge/public> <br />
                AllowOverride all <br />
         </Directory>"

    - If you've modified the default conf just restart the apache server:

    	"sudo service apache2 restart"

      If you've created a new configuration first enable it and then restart apache:

      	"sudo a2ensite NAME_OF_YOUR_CONF_FILE.conf" <br />
      	"sudo service apache2 restart" 

3. Install composer on you machine and after the installation, in your project's root directory (/codingchallenge) run this command to install the dependencies:
	
	"composer install"

4. Set permissions to be writable on the following folders recursively: 
	
	"/PATH_TO_YOUR_WEB_DIR/codingchallenge/storage"
	
	 and 
	
	"PATH_TO_YOUR_WEB_DIR/codingchallenge/bootstrap/cache"

5. Set an application key (/codingchallenge):
	
	- First rename the ".env.example" file (which is in your root project directory) into ".env":

		"mv .env.example .env"
	
	- Run this command in your project's root directory (/codingchallenge) to set the application key 

		"php artisan key:generate"

6. Create database for the project and set the databse name and your database connection details in the ".ENV" file

6. Run migrations
	
	"php artisan migrate"

7. Run database seeders

	"php artisan db:seed"

7. Go to http://localhost/products 

Useful links: <br />
https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-14-04-lts <br /> 
https://getcomposer.org/doc/00-intro.md <br />
https://laravel.com/docs/5.4#installing-laravel <br />



## PROJECT DESCRIPTION 


- Laravel 5.4

- Routes: <br />
	Products page (http://localhost/products) <br />
	Shopping cart (http://localhost/cart)

- Run unit tests (in the project's root dir): <br />
	vendor/bin/phpunit
