<?php
// Define path to entire project
defined('BASE_PATH')
    || define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(BASE_PATH . '/application'));

// Define application environment
//defined('APPLICATION_ENV')
//    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
define('APPLICATION_ENV', 'development'); //force development for tests

// Ensure library folder is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(BASE_PATH . '/library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

try {
    // Create application, bootstrap, and run
    $application = new Zend_Application(
        APPLICATION_ENV,
        APPLICATION_PATH . '/configs/application.ini'
    );
    $application->bootstrap()->run();
} catch (Exception $e) {
    // Catch possible application exceptions, save to general.log file
    include_once 'Zend/Log.php';
    include_once 'Zend/Log/Writer/Stream.php';
    try {
        $writer = new Zend_Log_Writer_Stream(BASE_PATH . '/data/logs/general.log');
        $logger = new Zend_Log();     
        $logger->addWriter($writer);
        $message = sprintf('Application error: %s, file: %s, line %s',
            $e->getMessage(), $e->getFile(), $e->getLine()
        );
        $logger->err($message);
    } catch (Exception $internalEx) {
        $message = $internalEx->getMessage();
    }
    if ('development' == APPLICATION_ENV) {
        echo $message, "\n";
    }
    die('Critical application error!');
}
