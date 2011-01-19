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

# Base Controller
require_once(SYS_PATH.'controller'.DS.'BaseController'.EXT);

# Base Model
require_once(SYS_PATH.'model'.DS.'BaseModel'.EXT);

# Hata Yakalayıcı
require_once(SYS_PATH.'core'.DS.'CevizException.class'.EXT);

# Yönlendirici Sınıf
require_once(SYS_PATH.'core'.DS.'Router.class'.EXT);

# Sınıf Yükleyici.
require_once(SYS_PATH.'CevizAutoload.class'.EXT);