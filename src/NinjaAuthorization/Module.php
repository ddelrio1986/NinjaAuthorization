<?php
/**
 * Module
 *
 * This is the module class for the NinjaAuthorization module.
 *
 * @author Daniel Del Rio <jesusfreakdelrio@gmail.com>
 * @package NinjaAuthorization
 * @filesource
 */

namespace NinjaAuthorization;

/**
 * Module
 *
 * This is the module class for the NinjaAuthorization module.
 *
 * @author Daniel Del Rio <jesusfreakdelrio@gmail.com>
 * @package NinjaAuthorization
 */
class Module
{

    /**
     * Get Autoloader Config
     *
     * Get the autoloader configuration for this module.
     *
     * @author Daniel Del Rio <jesusfreakdelrio@gmail.com>
     * @return array The autoloader configuration for this module.
     */
    public function getAutoloaderConfig()
    {
        return array(
            AutoloaderFactory::STANDARD_AUTOLOADER => array(
                StandardAutoloader::LOAD_NS => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    /**
     * Get Config
     *
     * Get the configuration for this module.
     *
     * @author Daniel Del Rio <jesusfreakdelrio@gmail.com>
     * @return array The configuration for this module.
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }
}