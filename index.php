<?php

/**
 * Description of bootstrap
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

# Site Path
# ------------
define('SITE_PATH', realpath(dirname(__FILE__)));

# DIRECTORY_SEPARATOR
# -----------------------
define('DS',DIRECTORY_SEPARATOR);

# System Path
# ---------------
define('SYS_PATH',  SITE_PATH.DS.'system');

# App Path
# -------------
define('APP_PATH',SITE_PATH.DS.'application');

# Bootstrap
# --------------
require_once(APP_PATH.'bootstrap.php');

// end of file index.php