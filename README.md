# ORSEE
### Install ORSEE
To install orsee just follow this guide: http://www.orsee.org/web/install_notes.php

### Pre requisites
- a webserver (Apache preferred)
```
sudo apt-get -y install apache2
```

- PHP >=5 both as apache module (apache2-mod_php5) and on commandline
(php5) with modules: php5-gd, php5-mysql, php5-mbstring.

```
sudo apt-get -y install php7.0 libapache2-mod-php7.0
sudo apt-get -y install php7.0-mysql php7.0-curl php7.0-gd php7.0-intl php-pear php-imagick php7.0-imap php7.0-mcrypt php-memcache  php7.0-pspell php7.0-recode php7.0-sqlite3 php7.0-tidy php7.0-xmlrpc php7.0-xsl php7.0-mbstring php-gettext
```

- MySQL >=5
```
sudo apt-get -y install mysql-server mysql-client
```

- cronjob access
Show if you have crontab:
```
crontab -l
```
- webalizer for web traffic analysis, of required.

(Optional)
- SSL
```
sudo a2enmod ssl
sudo a2ensite default-ssl
systemctl restart apache2
```
- phpMyAdmin
```
sudo apt-get -y install phpmyadmin

Web server to configure automatically: <-- Select the option: apache2
Configure database for phpmyadmin with dbconfig-common? <-- Yes
MySQL application password for phpmyadmin: root or any password you want.
```
Configure apache to use phpmyadmin:
```
Open apache2.conf:
sudo nano /etc/apache2/apache2.conf

Add the following to the bottom of the file:
# phpMyAdmin Configuration
Include /etc/phpmyadmin/apache.conf

Restart apache2 service:
service apache2 restart
```

### Step by Step
Donwload orsee from: https://github.com/orsee/orsee/releases

Unpack the orsee file in web server path:
/var/www/html/

Rename the directory to orsee:
```
sudo mv orsee-3.0.x orsee
```
Enter to 'install' directory
```
cd orsee/install
```
Enter mysql and create the mysql database. (You will need the privileges to add a database.)

```
mysql -u root -p
```
You will be ask by the password for mysql.
When you enter to mysql.
```
mysql> CREATE DATABASE orseedbname DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
mysql> GRANT ALL PRIVILEGES ON orseedbname.* TO orseedbusername@localhost IDENTIFIED BY orseeuserdbpassword';
mysql> FLUSH PRIVILEGES;
mysql> SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
mysql> quit
```
Import the default database structure.
```
mysql orseedbname -u orseedbusername -p orseeuserdbpassword < install.sql
```

Install the crontab named 'crontab-for-orsee'. 
Edit the settings in this file to match your needs.
```
crontab crontab-for-orsee
```
Copy settings-dist.php to 'config' directory and rename to 'settings.php'.
```
cp settings-dist.php ../config/settings.php
cd ../config/
```
If you need it, edit the few settings in 'settings.php'.

Make sure that the 'usage' directory is writable for the user under which the cronjob is running. The webalizer output will be saved there by the server.
```
cd ..
sudo chmod u+w usage
```
Browse to your ORSEE installation: http://yourorseewebpath/admin. for example: http://econlab.pucp.edu.pe/orsee/admin

Login with username 'orsee_install' and password 'install'.

Configure the email.
```
sudo apt-get install sendmail-bin
sudo apt-get install sendmail
```
To enable sendmail to use STARTTLS, you need to:
Add this line to /etc/mail/sendmail.mc and optionally to /etc/mail/submit.mc:
  include(`/etc/mail/tls/starttls.m4')dnl
```
sudo sendmailconfig
sudo /etc/init.d/sendmail restart
sudo nano /etc/mail/local-host-names
```
You need to see this lines, if not add it.
localhost.localdomain   RELAY
localhost               RELAY
127.0.0.1               RELAY