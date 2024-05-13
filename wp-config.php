<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hill' );

/** Database username */
define( 'DB_USER', 'Admin_hill' );

/** Database password */
define( 'DB_PASSWORD', 'Ahaan@12345' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '}K0jY}Itrd[i>^VKxu73_3j~[BNYy#?Y.Cyl78XC,eb?eqRduI|!%:OXgIhAlWgS' );
define( 'SECURE_AUTH_KEY',  'NTGZD8c3x:PKi^;,#THvJ~4#]5&*AmKtV<8e8ZPI#zx&.S`n=sATtjFSO:#A+$l&' );
define( 'LOGGED_IN_KEY',    '_0{UAj8yqjbuKInVG5#8CqeGo^Vs8{z[)[3Ob-e&gqhVKAE-QY*+GU%LOg7~Al5{' );
define( 'NONCE_KEY',        '?-L{0P#rNWQbel:%/IFY1 al-i#LX@LS{;b$H3i<Xj^x<!x]^t[egKN|<r7:!F<6' );
define( 'AUTH_SALT',        'H%0<U`QaG0iW%}*/58W}s57;#OYE6)gieLHbMgx?=VcFvI,G24n!9QC_<-hNoFd9' );
define( 'SECURE_AUTH_SALT', '-v$c@FtDO2+wuf.,%! :eleW0rOrzir[|4rWn7Xm&DL-*HLN(R8yRS3m};?CuP]$' );
define( 'LOGGED_IN_SALT',   'v!Ws# <K~R2,Lu.z9FhS<Eqmdqvf@-N.*p%lYkfJ~$Awzi.O`RtJqD:]oeyr%r>^' );
define( 'NONCE_SALT',       'E/2/l+*g R rq7Kr87]S9K~$f}28diR>`e||`DU)HAHs8s0rnc9x(i*$8%va:.`a' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
