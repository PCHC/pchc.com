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
define('AUTH_KEY',         '-jXRjr{t.c1U$UmznP4MVOQr(qu9<w)$#v&:^X@Eo?I+zWl<;J+/08KX+*>{sw))');
define('SECURE_AUTH_KEY',  '*%YUdx3+|F4VU%:{eeoue48!}HP0lC|RA4^#e/r:[XaqI~=+_d[e!1CXQ=2qcAq>');
define('LOGGED_IN_KEY',    'H5rYaHG{/.U!m+*6K2`AcVQFD`EiU|;788@HA``oP7XP~Qz@M#S+/gm ieo==3^W');
define('NONCE_KEY',        'm-Lxm#|PlX!ci)wOI>cC&%X@/(.zZ3D7|Qbo}l|UfwM7d#u+5(83ou&Nl|u?zW&$');
define('AUTH_SALT',        '9#HqpZ+k~SN_;,u8I9-&]z3?^=>,6X*^u;6pV!gBxPi,S@.-W44U-+>c3U*JK_wi');
define('SECURE_AUTH_SALT', 'JKa05Xjf+H+p|P9]9-!ccSZ[hlW8/y_kle[IfW%_1|r(Le9ATKJkj5BW,]Gx281P');
define('LOGGED_IN_SALT',   'CPT6>sx#EM_I@Lq4tVDr>PXk:<PkGet-8SvF.(o&PXZ>X/eM`_[fIU&U:3RN4g/A');
define('NONCE_SALT',       '$,{bf}|XF[Fih8B^RO8l&CJ=,x5H9JJTi:8h{&;*S7t:/(VZ<4%I1.#g+|#}LN(-');

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
