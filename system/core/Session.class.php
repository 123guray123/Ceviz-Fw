<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Description of Session
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

class Session
{
    public static $instance;
    private $session_data;

    public function  __construct ()
    {
        session_start();
        $this->session_data =& $_SESSION;
    }

    private function __clone()
    {
        die('Kopyalanamaz.');
    }

    public static function getInstance()
    {
        if (!(self::$instance instanceof Session))
        {            
            self::$instance = new Session;
        }

        return self::$instance;
    }

    public function set($key, $value)
    {
        $this->session_data[$key] = $value;
    }

    public function delete($key)
    {
        unset($this->session_data[$key]);
    }

    public function __set($key,$value)
    {
        $this->session_data[$key] = $value;
    }

    public function __get($key)
    {
        return $this->session_data[$key];
    }

    public function destroy()
    {
        unset($this->session_data);
        session_destroy();
    }

    public function id()
    {
            return session_id();
    }

    public function regenerate()
    {
            session_regenerate_id();

            return session_id();
    }
}

// End of file Session
