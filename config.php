<?php
// HTTP
define('HTTP_SERVER', 'http://preview.mahacode.com/openc/');

// HTTPS
define('HTTPS_SERVER', 'http://preview.mahacode.com/openc/');

// DIR
define('DIR_APPLICATION', '/home/previewmahac/public_html/openc/catalog/');
define('DIR_SYSTEM', '/home/previewmahac/public_html/openc/system/');
define('DIR_IMAGE', '/home/previewmahac/public_html/openc/image/');
define('DIR_STORAGE', '/home/previewmahac/storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/theme/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'previewm_msherif');
define('DB_PASSWORD', '654321');
define('DB_DATABASE', 'previewm_openc');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');