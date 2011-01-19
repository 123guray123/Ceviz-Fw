<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Description of CevizException
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

class CevizException extends Exception
{
    public function  __toString ()
    {
        header('404 Not Found');
        header('Content-type: text/html; charset=utf-8');

        echo 'Hata: '.$this->getMessage()
                .' <br> File: '.$this->getFile()
                .' <br> Line: '.$this->getLine();

        echo '<pre>',  var_export($this->getTrace(),true),'</pre>';

        return get_class($this);
        exit;
    }
}

// End of file CevizException
