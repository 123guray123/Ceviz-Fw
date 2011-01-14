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
error_reporting(E_ALL);

# Zaman Ayarı
# -------------------
date_default_timezone_set('Europe/Istanbul');

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

# İstekleri Yönlendir.
Router::load();

// End of file bootstrap.php