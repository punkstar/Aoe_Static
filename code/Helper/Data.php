<?php

/**
 * Data helper
 *
 * @category    Aoe
 * @package     Aoe_Static
 * @author      Toni Grigoriu <toni@tonigrigoriu.com>
 */
class Aoe_Static_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Check if a fullActionName is configured as cacheable
     *
     * @param string $fullActionName
     * @return int 0 if not cacheable, otherwise lifetime in seconds
     */
    public function isCacheableAction($fullActionName)
    {
        preg_match("/$fullActionName;(?P<lifetime>\d+)/", 
                   Mage::getStoreConfig('system/aoe_static/cache_actions'), 
                   $match);
        
        if (array_key_exists('lifetime', $match) && $match['lifetime'] > 0) {
            return intval($match['lifetime']);
        } else {
            return false;
        }
	}
}