<?php

/**
 * Index Dosyası ve site dizin ayarları
 *
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

# Site Dizini
# ------------
define('SITE_PATH', realpath(dirname(__FILE__)));

# Dizin Ayracı
# -----------------------
define('DS',DIRECTORY_SEPARATOR);

# Sistem Dizini
# ---------------
define('SYS_PATH',SITE_PATH.DS.'system'.DS);

# Uygulama Dizini
# -------------
define('APP_PATH',SITE_PATH.DS.'application'.DS);

# Dosya Uzantı.
define('EXT','.php');

# Uygualama Ayarları
# -----------------------
require_once(APP_PATH.'bootstrap'.EXT);

// end of file index.php