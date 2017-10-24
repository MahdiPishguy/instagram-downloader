<?php

/**
 * Initialization File
 * Required for a workaround
 *
 * @author @akshitsethi
 * -------------------------------------
 */

define( 'APP_PATH', dirname( __FILE__ ) );

// Configuration File
require_once APP_PATH . '/app/include/config.php';

// Required Class
require_once APP_PATH . '/app/include/classes/class.downloader.php';