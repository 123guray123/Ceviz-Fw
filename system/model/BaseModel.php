<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Ana Model.
 *
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

class BaseModel
{
    protected $MasterDatabase;
    protected $SlaveDatabase;
    
    public function __construct()
    {
        $config = Config::load('database');

        if ($config['master']['active'])
        {
            $this->MasterDatabase = MasterDatabase::instance($config['master']);
        }

        if ($config['slave']['active'])
        {
            $this->SlaveDatabase = SlaveDatabase::instance($config['slave']);
        }
    }
}

// End of file BaseModel
