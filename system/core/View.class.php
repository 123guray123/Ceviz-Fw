<?php

/**
 * Description of View
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

class View
{
    private $instance;
    private $tpl;
    private $data = array();
    private $template_dir;
    
    public function  __construct($template_name = null)
    {
        if (!is_null($template_name))
        {
            $this->tpl = $template_name;
        }

        $this->template_dir = APP_PATH.DS.'view';
    }
    
    public static function factory($template_name = null)
    {
        return new View($template_name);
    }
    
    public function __set($key,$value)
    {
        $this->data[$key] = $value;
    }
    
    public function set($key,$value)
    {
        $this->data[$key] = $value;
    }
    
    public function run()
    {
        try
        {
            if (file_exists($this->template_dir.DS.$this->tpl.EXT) === false)
            {
                throw new CevizException($this->tpl.' Bulunamadı');
            }
            else
            {
                if (count($this->data) > 0)
                {
                    foreach ($this->data AS $key => $value)
                    {
                        $$key = $value;
                    }
                }

                require_once($this->template_dir.DS.$this->tpl.EXT);
            }
        }
        Catch(CevizException $e)
        {
            die($e);
        }
    }
}