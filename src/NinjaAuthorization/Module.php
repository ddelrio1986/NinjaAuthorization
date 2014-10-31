<?php
/**
 * Module
 *
 * Module class for the NinjaAuthorization module.
 *
 * @package NinjaAuthorization
 * @filesource
 */

namespace NinjaAuthorization;

/**
 * Module
 *
 * Module class for the NinjaAuthorization module.
 *
 * @package NinjaAuthorization
 */
class Module
{

  /**
   * Get Autoloader Config
   *
   * Gets the autoloader configuration for this module.
   *
   * @return array The autoloader configuration for this module.
   */
  public function getAutoloaderConfig()
  {
    return array(
      "Zend\Loader\ClassMapAutoloader" => array(
        __DIR__ . "/../../autoload_classmap.php",
      ),
      "Zend\Loader\StandardAutoloader" => array(
        "namespaces" => array(
          __NAMESPACE__ => __DIR__,
        ),
      ),
    );
  }

  /**
   * Get Config
   *
   * Gets the configuration for this module.
   *
   * @return array The configuration for this module.
   */
  public function getConfig()
  {
    return include __DIR__ . "/../../config/module.config.php";
  }
}
