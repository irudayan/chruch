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
define( 'DB_NAME', 'chruch' );

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
define( 'AUTH_KEY',         'WDwb%EB-0_iNG+o|<^+`%LmPe6v4T5au61fVydTTE!o1UcQ;n%Ld:hDG]+zyRMN^' );
define( 'SECURE_AUTH_KEY',  'kB*2o3. qvYyLV-kou4BCA.pRFTLM{:Q[q+p/H_Xwm]ac.#kZF#p!VlBv-5[Q2?P' );
define( 'LOGGED_IN_KEY',    'W@)`u%G5/$BpwWwp[UsUe`uh$Md,.6I1Z;rw>, bSDgbhd,X3V}-3:o/xFLs,=kR' );
define( 'NONCE_KEY',        'rKHruE2!Z h1,#,V]sS-!Czxpdm$:<O=}y+U&MCg!n_W4,QzV,v)3Lam7[F}Mpn5' );
define( 'AUTH_SALT',        'fn7W]qn._Ov .`>!O{E)#N,NYF}di{4Ci6D{txbbU6u;1g1g9tG]CgRV?(.[Qr8#' );
define( 'SECURE_AUTH_SALT', 'jTp)EI/)u6b1=<PWInW/maepx$~dp41fYXt&6au!jxdx`qFV#`,as:[u% c[,0$K' );
define( 'LOGGED_IN_SALT',   '1}KX0bC]c Pa.)f#9Yah+B!xm@P Ygb{]CWsY72h)eN.fN?X~$BSfOXyJhJN`Y(D' );
define( 'NONCE_SALT',       'en-LJM+z=-]hQwMZiXKbgiZ&]5QC;QKU0lGiXXX&45{(tk%5s&v]*&KJr>,Nxlt2' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cms_';

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
