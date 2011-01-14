<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Description of Router
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

class Router
{
    public static function load()
    {
        # İstek Yapılan Url
        $uri = Router::get_uri();

        $controller = null;
        $controller_file = null;
        $action = null;
        $parameters = null;

        if (empty($uri))
        {
            $uri = $default_config['base_controller'];
        }
        else
        {
            # Genel ayar dosyasını yükle
            $default_config = APP_PATH.'config/default'.EXT;
            if (file_exists($default_config))
            {
                require_once($default_config);
            }
            else
            {
                throw new CevizException("{$default_config} bulunamadi.");
            }
            
            if (array_key_exists($uri,$route))
            {
                $uri = $route[$uri];
            }
            else
            {
                foreach ($route AS $key => $value)
                {
                    # Eğer route dizisinde tanımlanan bir değere uyuyor ise.
                    if (preg_match('#^'.$key.'$#',$value))
                    {
                        # Uyan keyin içinde $1 var ise bunu değiştirelim.
                        if (strstr($value,'$') && strstr($key,'('))
                        {
                            $uri = preg_replace('#^'.$key.'$#',$value,$uri);
                        }

                        # Döngümüzü durduruyoruz.
                        break;
                    }
                }
            }
        }

        # Elde Ettiğimiz URI yi parçalayarak kontrollerini yapalım.
        $uri_part = explode('/',$uri);
        $uri_part_count = count($uri_part);

       /**
         * Kendime not.
         * $uri[0]  : controller
         * $uri[1]  : action
         * $uri[2+] : parametreler.
         */

        # Değişkenlerimizi oluşturalım
        $controller = $uri[0];
        $controller_file = APP_PATH.'controller'.DS.strtolower($controller);

        # Eğer ilk eleman dizin ise.
        if (is_dir(APP_PATH.'controller'.DS.strtolower($controller)))
        {
            # Kontrol dosyamız.
            $controller = $uri[1];
            $controller_file = APP_PATH.'controller'.DS.strtolower($uri[0]).DS.$controller.EXT;

            if (file_exists($controller_file))
            {
                # Çağırılacak metodumuz.
                if (isset($uri_part[2]))
                {
                    $action = $uri_part[2];
                }

                # Parametre alıyor mu kontrol edelim.
                if ($uri_part_count > 3)
                {
                    $parameters = array_slice($uri_part,3);
                }
            }
            else
            {
                $controller = $route['base_controller'];
                $action = 'index';
            }
        }
        # Eğer kontrol dosyamız dizin değil ise.
        else
        {
            $controller_file = APP_PATH.'controller'.DS.strtolower($controller).EXT;
            if (file_exists($controller_file))
            {
                # Çağrılacak metodumuz.
                if (isset($uri_part[1]))
                {
                    $action = $uri_part[1];
                }

                # Parametre alıyor mu kontrol edelim.
                if ($uri_part_count > 3)
                {
                    $parameters = array_slice($uri_part,3);
                }
            }
        }

        # Dosyamızı dahil edelim.
        require_once($controller_file);

        # Çağrılmak istenen action sınıfta tanımlımı kontrol ediyoruz.
        if (is_callable(array($controller, $action)) === false)
        {
            $action = 'index';
        }

        # İlk harfini büyütelim.
        $controller = ucfirst($controller);

        # Kontrol sınıfımızı çağıralım.
        if (!is_null($parameters))
        {
            call_user_func_array(array($controller, $action), $parameters);
        }
        else
        {
            $controller->{$action}();
        }
    }

    public static function get_uri()
    {
        $uri = $_SERVER['REQUEST_URI'];

        if (substr($uri,0,1) == '/')
        {
            $uri = substr($uri,1);
        }

        return $uri;
    }
}

// End of file Router
