<?php

class Home_Bootstrap extends Zend_Application_Module_Bootstrap
{
    /**
     * Initialises per module config
     * Skip if invalid
     */
    protected function _initModuleConfig()
    {
        $configFile = realpath(__DIR__) . '/configs/module.ini';
        try {
            $config = new Zend_Config_Ini($configFile, $this->getEnvironment());
            $this->setOptions($config->toArray());
        } catch (Zend_Config_Exception $e) {
            // Skip section. File was invalid.
        }
    }
}