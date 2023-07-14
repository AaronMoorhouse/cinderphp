<?php
define( 'AUTH_HOST', '' );
define( 'AUTH_USER', '' );
define( 'AUTH_PASS', '' );
define( 'AUTH_DATABASE', '' );

define('PRETTY_URL', true);

//Leave as empty string if not using table name prefixes
define( 'PREFIX', '' );

//Root directory of site
define('ROOT', 'http://localhost/cinderphp/');

//True if application is in testing
define('TESTING', true);

if(TESTING) {
    error_reporting(E_ALL);
}
?>