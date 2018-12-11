<?php
session_start();
require_once('config/Conf.php');

// When debug is enabled display error message and stacktrace
if (Conf::getDebug()) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

require_once('lib/File.php');
require_once(File::build_path(array('controller', 'routeur.php')));
