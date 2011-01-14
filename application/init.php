<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Description of init
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

# Yönlendirme Sınıfı
require_once(SYS_PATH.'library'.DS.'Router.class'.EXT);

# Hata Ayıklama
require_once(SYS_PATH.'library'.DS.'CevizException.class'.EXT);

# Base Controller
require_once(SYS_PATH.'controller'.DS.'BaseController'.EXT);

# Base Model
require_once(SYS_PATH.'model'.DS.'BaseModel'.EXT);