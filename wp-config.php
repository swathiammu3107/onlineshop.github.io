<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wsite' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'r8pN@(on#d)TAEO<lp5_Ci2=T|xSX4J[u,seY:4$8FNGmuEm:$}GK!_+S$q %r{v' );
define( 'SECURE_AUTH_KEY',  'y]FeGZ,+}9+9`4};-`{U8|kgg%_iZSI8LKg%fW)HagfP4D5DTXrHUEWm?=F+>H:T' );
define( 'LOGGED_IN_KEY',    'lk,>tkS65r 3%7D05e44vA,4<OM|!qbQi)(0kn-Ew5,vgNGLS}KU*:Ym0#uVN#l3' );
define( 'NONCE_KEY',        'NA<6&[]A)nCg3)P>N5$!*3kL{5kFloYEkB8~*)frAB|5!$Oa#k0<2Ab9:7I>&B, ' );
define( 'AUTH_SALT',        'jUe%ZxmHt_i+^ Y{tyn0VmWh&44f5ym2)J1Dw2z(${NZ*zZm+}vT8#6rY ?(.G3a' );
define( 'SECURE_AUTH_SALT', 'qUlW<Q>plAa(bE[::YNjUxRU_|$.)9RRhpGrQHHx<3x$|<**Fa]nCe/8/AHe&s4;' );
define( 'LOGGED_IN_SALT',   'b=1=H7@|>R|(jJcRw}=7eBq><vUEgs)hu`{xEsX?RX)3*%urr49dd*PvQMuj+j&1' );
define( 'NONCE_SALT',       '7^+L7ZjZz$[qP~|s%A|.;[9:Agoe_o7E:Xo3<oA)YR^xNb&H5@TVZGW<f],0Y)8x' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
