<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Uygulama konfigurasyon dosyalarini yükler.
 * 
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

class Config
{
    public static $config_cache = array();

    public static function load($config)
    {
        if (empty($config))
        {
            throw new CevizException('Config Belirtilmedi.');
        }

        if (array_key_exists($config,Config::$config_cache))
        {
            return Config::$config_cache[$config];
        }
        else
        {
            $config_file = APP_PATH.'config'.DS.strtolower($config).'.php';

            if (file_exists($config_file) === false)
            {
                throw new CevizException('Confi Dosyası Bulunamadı.');
            }

            # Include Config File
            $config_array = require_once($config_file);

            # Cache
            Config::$config_cache[$config] = $config_array;

            return $config_array;
        }
    }
}

// End of file Config
