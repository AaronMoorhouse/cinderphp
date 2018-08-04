<?php
define( 'AUTH_HOST', 'localhost' );
define( 'AUTH_USER', 'root' );
define( 'AUTH_PASS', '2@LG5G9c5Ut7yjkWiVSZ&' );
define( 'AUTH_DATABASE', 'test' );

define('PRETTY_URL', true);

//Leave as empty string if not using table name prefixes
define( 'PREFIX', '' );

//Root directory of site
define('ROOT', 'localhost/cinderphp');

//True if application is in testing
define('TESTING', true);

if(TESTING) {
    error_reporting(E_ALL);
}
?>