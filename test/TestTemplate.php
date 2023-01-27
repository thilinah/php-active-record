<?php

use PHPUnit\Framework\TestCase;

class TestTemplate extends TestCase
{

    protected $usersArray = array();
    private $db = null;

    public function p($msg)
    {
        fwrite(STDOUT, $msg."\n");
    }

    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    protected function initializeObjects()
    {

    }

    protected function resetDatabase()
    {
        $dropDBCommand = 'echo "DROP DATABASE IF EXISTS ' . MYSQL_DB . '"| mysql -u' . MYSQL_ROOT_USER . ' -p' . MYSQL_ROOT_PASS;
        $createDBCommand = 'echo "CREATE DATABASE '.MYSQL_DB.'"| mysql -u'.MYSQL_ROOT_USER.' -p'.MYSQL_ROOT_PASS;

        exec($dropDBCommand);
        exec($createDBCommand);

        $scripts = array(
            TEST_BASE_PATH."scripts/db.sql",
        );

        foreach ($scripts as $insql) {
            $command = "cat ".$insql."| mysql -u".MYSQL_ROOT_USER." -p".MYSQL_ROOT_PASS." '".MYSQL_DB."'";
            exec($command);
        }
    }
}
