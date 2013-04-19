<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'pchc_com');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'OUZ[$rwTah)F4OgX~CZ0Gq+FHr! %KN^H#A&~02D!!!FOS.+]n)145=N<urf-mOX');
define('SECURE_AUTH_KEY',  'iv]4#wth3LAv/2Rr#9v&K.k@I tFl9l~?nn#=ZS^-%RR,:b&AFvgePQ/4LV]a82+');
define('LOGGED_IN_KEY',    'oi5|Qjm2o51DG-6Ks[`-7Fku+L.ty3<+I%b#G/Ua2z_3[B,|OX`N{.ozGs._5%;/');
define('NONCE_KEY',        'W*%yuzThfPN~2 rehy^ |J,gLRB-cNM5SR|iGOz6HQvaJf~%aXOC>K+om1X21v;t');
define('AUTH_SALT',        '-vHT(3elt!yKr?$Rmz#I7F,7cU]EurCJ+9c7aW#bt%SgB,^?s?ZpcB9dnv8r}{Q&');
define('SECURE_AUTH_SALT', '{zpkcCf=vHf0K2oiwf8@pr--@?QRs5/fxAIbnWnjHhP+V^;Xj6<] 46o,BVsu]&6');
define('LOGGED_IN_SALT',   '&v%0^hE|aPjs:|2|cb|N_l8_LD|fJ35et@Q|ONeu){4ggj|36%}ul*ln*P)o]ftL');
define('NONCE_SALT',       'uR-J^ZayE4/o|^52&mQFedcdHf?.+k`LR/,{F$(>XO,gi+EbqlJ]wbwTqJUG<5Ns');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pchc_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

