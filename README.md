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
