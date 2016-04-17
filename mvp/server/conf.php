<?php
/**
 * Created by tania.
 * Date: 30.03.16
 * Time: 1:13
 * @corporation Maksi
 */

define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT'));
define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));
define('DSN',"mysql:host=" . DB_HOST . ";port=" . DB_PORT .";dbname=" . DB_NAME .";charset=UTF8");