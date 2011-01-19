<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Ana Kontroller.
 * 
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

abstract class Base_Controller
{
    abstract function index();

    //TODO: İlerde before koyulabilir
    //TODO: İlerde after koyulabilir.
}

// End of file BaseController
