<?php

class Bootstrap
    extends Zend_Application_Bootstrap_Bootstrap
{

    /**
     * Override the default Zend_View with Ztal support and configure defaults.
     */
    protected function _initZtal()
    {
        $plugin = new \Ztal\Controller\Plugin\Ztal($this->getOption('ztal'));
        Zend_Controller_Front::getInstance()->registerPlugin($plugin);
    }

    /**
     * Sets up the caching options
     */
    protected function _initCache()
    {
        if ($this->hasPluginResource('cachemanager')) {
            $cache = $this->getPluginResource('cachemanager')->getCacheManager()->getCache('app');
            Zend_Registry::set('cache', $cache);
        }
    }

    /**
     * Stores all the config data from application.ini in the Zend_Registry object
     */
    protected function _initConfig()
    {
        $config = new Zend_Config($this->getOptions(), true);
        Zend_Registry::set('config', $config);
        return $config;
    }

    /**
     * Initialises the logger and saves it to the Zend_Registry
     */
    protected function _initLog()
    {
        // use Zend_Registry::get("log")->info('Hello World!'); in code to log messages
        if ($this->hasPluginResource('Log')) {
            $log = $this->getPluginResource('Log')->getLog();
            Zend_Registry::set('log', $log);
        }
    }

    /**
     * Initialises ZFDebug plugin
     */
    protected function _initZFDebug()
    {
        if ('development' == $this->getEnvironment()) {
            $this->bootstrap('FrontController');
            $front = $this->getResource('FrontController');

            // Only enable zfdebug if options have been specified for it
            if ($this->hasOption('zfdebug')) {
                if (isset($this->getOption('zfdebug')['plugins']['Database']) &&
                    $this->hasPluginResource('db')) {
                    $this->bootstrap('db');
                }
                $zfdebug = new ZFDebug_Controller_Plugin_Debug($this->getOption('zfdebug'));
                $front->registerPlugin($zfdebug);
            }
        }
    }

}

