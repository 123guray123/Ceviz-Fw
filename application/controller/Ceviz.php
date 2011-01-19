<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Description of Ceviz
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

class Ceviz extends Base_Controller
{
    public function index()
    {
        $tpl = View::factory('ceviz');
        $tpl->message = 'Ceviz Framework Version 1.0';
        $tpl->run();
    }
}
// End of file Ceviz
