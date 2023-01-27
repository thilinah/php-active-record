<?php
if (file_exists('/usr/lib/php5/mysql.auth.php')) {
    include '/usr/lib/php5/mysql.auth.php';
}
include(dirname(__FILE__).'/test.config.php');

$dropDBCommand = 'echo "DROP DATABASE IF EXISTS ' . MYSQL_DB . '"| mysql -u' . MYSQL_ROOT_USER . ' -p' . MYSQL_ROOT_PASS;
$createDBCommand = 'echo "CREATE DATABASE '.MYSQL_DB.'"| mysql -u'.MYSQL_ROOT_USER.' -p'.MYSQL_ROOT_PASS;

exec($dropDBCommand);
exec($createDBCommand);

//Run create table script
$scripts = array(
    dirname(__FILE__)."/scripts/db.sql",
);

foreach ($scripts as $insql) {
    $command = "cat ".$insql."| mysql -u".MYSQL_ROOT_USER." -p".MYSQL_ROOT_PASS." '".MYSQL_DB."'";
    exec($command);
}
include(dirname(__FILE__).'/test.includes.php');
