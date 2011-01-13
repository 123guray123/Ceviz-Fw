<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Bootstrap
 *
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

# Error Reporting
# -------------------
error_reporting('E_ALL ~ E_NOTICE');

# Set Timezone
# -------------------
date_default_timezone_set('Europe/Istanbul');

# Set Locale
# -------------------
setlocale(LC_ALL, 'tr_TR.UTF-8');

# Autoload Modules
# -------------------
$model = array();

# Autoload Library
# -------------------
$library = array();

# Autoload Helper
# -------------------
$helper = array();

# Include Init
# ------------------
require_once(APP_PATH.'init.php');

// End of file bootstrap.php