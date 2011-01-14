<?php
defined('SITE_PATH') or die('No direct access');

/**
 * Uygulama ile ilgili ayarlar
 *
 * @package Ceviz Framework
 * @author Yusuf Koç
 * @copyright Copyright (c) 2001 - 2011 Ceviz.Net
 * @link http://www.ceviz.net - http://ysfkc.com
 * @since Version 1.0
 * @license See the file http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

# Hata Mesajları
# -------------------
error_reporting('E_ALL ~ E_NOTICE');

# Zaman Ayarı
# -------------------
date_default_timezone_set('Europe/Istanbul');

# Yerel Ayar
# -------------------
setlocale(LC_ALL, 'tr_TR.UTF-8');

# Otomatik Yüklenecek Modeller
# ------------------------------
$model = array();

# Otomatik Yüklenecek Kütüphaneler
# ----------------------------------
$library = array();

# Otomatik Yüklenecek Yardımcılar
# -----------------------------------
$helper = array();

# Sistem Dosyaları
# -------------------
require_once(APP_PATH.'init.php');

// End of file bootstrap.php