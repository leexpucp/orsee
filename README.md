# ORSEE
### Install ORSEE
To install orsee just follow this guide: http://www.orsee.org/web/install_notes.php

### Pre requisitos
- a webserver (Apache preferred)
```
sudo apt-get install apache2
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
- webalizer for web traffic analysis, of required.
