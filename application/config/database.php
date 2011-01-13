<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Database ayarlari
 * 
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

return array(
    'master' => array (
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '123456',
        'db'   => 'ceviz',
        'active' => 1
    ),
    'slave' => array (
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '123456',
        'db'   => 'ceviz',
        'active' => 0
    )
);