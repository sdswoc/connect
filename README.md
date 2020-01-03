# connect
### Connecting IIT-R junta having similar goals and hobbies through social networking.

The aim of this project is to connect the IIT-R Junta who share similar goals OR
interests. In a nutshell, this project, after successful deployment would CONNECT
the LIKE-MINDED people. My project focuses on connecting the IIT-R junta, it would
use precise profile matching algorithms for suggesting the *connection*.

For installing it on Linux Environment, follow the following steps:

**Some pre-requisites:**

- LAMP Stack installed(if not installed, then refer https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04 ) and make sure to enable php-mysqli extension.

- phpmyadmin installed(if not installed, then refer https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-on-ubuntu-18-04 )


If your system is equipped with the pre-requisites now, then proceed with the following steps!


- Open your terminal navigate to `var/www/html/` and execute `git clone https://github.com/sdswoc/connect.git`

- Open up a browser and navigate to `localhost/phpmyadmin`(if it shows a error on logging:
```Failed to set session cookie``` 
then open the browser in incognito mode)

- After logging into your account, create a database (`rconnect`), then click on `Import` , select the `schema.sql` file located in `var/www/html/connect/` directory.

- Now, open up a terminal in the directory `var/www/html/connect/` and type `sudo chown www-data userImages/` for modifying the permissions of userImages folder where user profile images are stored.

- Open a new window of terminal in the same directory and type `php bin/chat-server.php` , it should show Server Started! if the WebSocket server is succesfully started!

- Now, we need to create a `dbconfig.php` file(refer https://stackoverflow.com/questions/29763358/best-way-to-create-configuration-fileconfig-php-php ) (PS: please refer `server.php file in /connect directory` for the login details and keep `$conn` as name of the return link of successful connection)

- We're now completely ready for using the website. Open a browser window and goto `http://localhost/connect/` for opening the website.


If you want to test the chat-engine featurem then open a normal browser window and an Incognito window and cascade them side by side for chatting.

## This project was made under Winter of Code(2019), organized by SDSLabs mentored under Mohit Sharma, Leshna Balara, and Ashutosh Bharambe.

