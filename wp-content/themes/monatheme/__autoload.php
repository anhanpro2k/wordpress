<?php 
define( 'APP_PATH', '/app' );
define( 'CONTROLLER_PATH', APP_PATH . '/controllers' );
define( 'AJAX_PATH', APP_PATH . '/ajax' );
define( 'MODULE_PATH', APP_PATH . '/modules' );

define( 'CORE_PATH', '/core' );

require_once( get_template_directory() . CORE_PATH . '/classes/class-mona-setup.php' );
require_once( get_template_directory() . CORE_PATH . '/classes/class-mona-core.php' );
$Core = new MonaCore();
$Core->load_core();