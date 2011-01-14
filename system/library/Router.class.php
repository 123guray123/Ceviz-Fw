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
        # Route dosyasını yükle
        $route_file = APP_PATH.'config/route'.EXT;
        
        if (file_exists($route_file))
        {
            require_once($route_file);
        }
        else
        {
            throw new CevizException("Route dosyası bulunamadı.");
        }

        # İstek Yapılan Url
        $uri = Router::get_uri();

        $controller = null;
        $controller_file = null;
        $action = null;
        $parameters = null;

        if (empty($uri))
        {
            $uri = $route['base_controller'];
        }
        else
        {
            if (array_key_exists($uri,$route))
            {
                $uri = $route[$uri];
            }
            else
            {
                try
                {
                    foreach ($route AS $key => $value)
                    {
<<<<<<< HEAD
                        # Eğer route dizisinde tanımlanan bir değere uyuyor ise.
                        if (preg_match('#^'.$key.'$#',$uri))
=======
                        $uri = $value;

                        # Uyan keyin içinde $1 var ise bunu değiştirelim.
                        if (strstr($value,'$') && strstr($key,'('))
>>>>>>> f86824de6031c978ad7ad69ac06ad6df24c88997
                        {
                            # Uyan keyin içinde $1 var ise bunu değiştirelim.
                            if (strstr($value,'$') && strstr($key,'('))
                            {
                                $value = preg_replace('#^'.$key.'$#',$value,$uri);
                            }

                            $uri = $value;

                            # Döngümüzü durduruyoruz.
                            break;
                        }
                        else
                        {
                            throw new CevizException ('Yönlendirme kurallarınızda bir sorun var.');
                        }
                    }
                }
                Catch (CevizException $e)
                {
                    die($e);
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
        $controller = ucfirst($uri_part[0]);
        $controller_file = APP_PATH.'controller'.DS.$controller;

        # Eğer ilk eleman dizin ise.
        if (is_dir(APP_PATH.'controller'.DS.$controller))
        {
            # Kontrol dosyamız.
            $sub_controller = ucfirst($uri_part[1]);
            $controller_file = APP_PATH.'controller'.DS.$controller.DS.$sub_controller.EXT;

            if (file_exists($controller_file))
            {
                # Alt Kontrol dosyasını ana kontrol olarak tanımlayalım.
                $controller = $sub_controller;
                
                # Çağırılacak metodumuz.
                if (isset($uri_part[2]))
                {
                    $action = $uri_part[2];
                }
                else
                {
                    $action = 'index';
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
            $controller_file = APP_PATH.'controller'.DS.$controller.EXT;
            if (file_exists($controller_file))
            {
                # Çağrılacak metodumuz.
                if (isset($uri_part[1]))
                {
                    $action = $uri_part[1];
                }
                else
                {
                    $action = 'index';
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
        
        # Sınıfı Başlat.
        $class = new $controller;

        # Çağrılmak istenen action sınıfta tanımlımı kontrol ediyoruz.
        if (is_callable(array($class, $action)) === false)
        {
            $action = 'index';
        }

        # Kontrol sınıfımızı çağıralım.
        if (!is_null($parameters))
        {
            call_user_func_array(array($class, $action), $parameters);
        }
        else
        {
           $class->$action();
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
