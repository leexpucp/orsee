<?php
// part of orsee. see orsee.org
error_reporting(E_ALL & ~E_NOTICE);

// SERVER SETTINGS
// Web server document root, e.g. /srv/www/htdocs
// no trailing slash!
$settings__root_to_server="/srv/www/htdocs";

// Experiment system root relative to server root, e.g. /orsee
// begins always with "/" if in a subdirectory
// no trailing slash!
// $settings__root_directory="/orsee";
$settings__root_directory="/orsee";


// url to web server document root (IP or domain name)
// without trailing slash and the http://!
//$settings__server_url="www.orsee.org";
// $settings__server_url="13.59.129.5";
$settings__server_url="www.pucp.edu.pe/leex-registro";


// servr protocol (either "http://" or "https://"
$settings__server_protocol="http://";

// Double-check your entries above! The URL to your ORSEE installation will be:
// settings__server_protocol + settings__server_url + settings__root_directory


// DATABASE CONFIGURATION
// Don't forget to create the database
$site__database_host="localhost";
//$site__database_port="3306"; // set only if not default 3306
$site__database_database="orsee_db";
$site__database_admin_username="orsee_user";
$site__database_admin_password="orsee_pw";
$site__database_type="mysql";
$site__database_table_prefix="or_";

// TIMEZOME SETTING
// PHP >= 5.1.0 requires the timezone to be explicitely set.
// If you have not set it in php.ini, then set it here. (Otherwise, you can uncomment.)
// List of timezones: http://php.net/manual/en/timezones.php
date_default_timezone_set("America/Lima");

// EMAIL MODULE
// These settings are only needed when you plan to enable the email module
// to retrieve emails from an external email account and process them in ORSEE
$settings__email_server_type="imap"; // either pop3 or imap
$settings__email_server_name="imap.gmail.com";
$settings__email_server_port=""; // if empty or not set, port is automatically determined by type
$settings__email_username="leex@pucp.edu.pe";
$settings__email_password="Econo-lab-17";
$settings__email_ssl=TRUE; // whether to use SSL to connect to IMAP/POP3 server (for gmail, use TRUE!)
// E.g. for gmail, use TRUE for ssl setting. You may have to allow
// "Access for less secure apps" in your google account settings.


// STOP SITE, TRACKING, DEBUGGING
// If below is set to "y", the admin part of ORSEE won't be reachable for anybody
// This is useful for example when running some procedures directly in the database
$settings__stop_admin_site="n";

// To stop tracking set to "y"
$settings__disable_orsee_tracking="n";

// Enable/disable debugging information output at the bottom fo each page.
// Do NOT ENABLE on a live ORSEE system - reveals a lot of information.
$settings__time_debugging_enabled="n";
$settings__query_debugging_enabled="n";

// Include path for tagsets. Leave as is, only change when you know what you are doing.
ini_set("include_path",ini_get("include_path").":./tagsets:./../tagsets:./../../tagsets");

?>
