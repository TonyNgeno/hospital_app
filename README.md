# Nyambene Hospital Management Web App
### Introduction 
	This is an Interactive hospital web app. A doctor can directly prescribe and chat with his or her patient at will.
	A Doctor can be registered by a super admin as the patients can register themselves and gain the priviledge.
	A Doctor can give prescriptions to the patients and the patient can print out the prescription on a receipt.

### Installations
#### Apache
	First we need to install Apache.
	Run:
	```$ sudo apt-get update``` 
	```$ sudo apt-get install apache2```
	THat should Do it. For more Information go to [Digital Ocean](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04).
#### MySQL
	Then install MySQL by running:
	```$ sudo apt-get install mysql-server```
	When the installation is complete, we want to run a simple security script that will remove some dangerous defaults and lock down access to our database system a little bit. Start the interactive script by running:
	`$ mysql_secure_installation`
#### PHP
	When you are all set, Run:
	```$ sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql```
	That should Do it. For more Information go to [Digital Ocean](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04).

## License
	[Apache Licence](license)
