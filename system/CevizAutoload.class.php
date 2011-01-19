<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Description of CevizAutoload
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

class CevizAutoload
{
    private static $file = array();

    public static function is_sys_file($file)
    {
        $file = SYS_PATH.'core'.DS.$file.'.class'.EXT;

        if (file_exists($file))
        {
            return $file;
        }

        return false;
    }

    public static function is_app_model_file($file)
    {
        $file = APP_PATH.'model'.DS.$file.EXT;

        if (file_exists($file))
        {
            return $file;
        }

        return false;
    }

    public static function is_app_lib_file($file)
    {
        $file = APP_PATH.'library'.DS.$file.EXT;

        if (file_exists($file))
        {
            return $file;
        }

        return false;
    }

    public static function is_app_helper_file($file)
    {
        $file = APP_PATH.'helper'.DS.$file.EXT;

        if (file_exists($file))
        {
            return $file;
        }

        return false;
    }

    public static function library($class_name)
    {
        $class_file = CevizAutoload::is_app_lib_file($class_name);

        if (!$class_file)
        {
            return false;
        }

        require_once($class_file);
    }

    public static function model($class_name)
    {
        $class_file = CevizAutoload::is_app_model_file($class_name);

        if (!$class_file)
        {
            return false;
        }

        require_once($class_file);
    }

    public static function helper($class_name)
    {
        $class_file = CevizAutoload::is_app_helper_file($class_name);

        if (!$class_file)
        {
            return false;
        }

        require_once($class_file);
    }

    public static function core($class_name)
    {
        try
        {
            $class_file = CevizAutoload::is_sys_file($class_name);

            if (!$class_file)
            {
                throw new CevizException($class_name. ' Sys Bulunamadı');
            }

            require_once($class_file);
        }
        Catch (CevizException $e)
        {
            die($e);
        }
    }
}