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
define('AUTH_KEY',         ',(R-@?,XjjyCx |MxyW@iJ!g%l>BS&pMnhoVN*M(;i99JU%Os,sP5MbgFo$|#<In');
define('SECURE_AUTH_KEY',  '*xz=qzJT`|nCo4r$/@gD:UCOg3KAxgm2R0? vhVZ-Ipc~}QK-.fKEHq?g#~B*-g]');
define('LOGGED_IN_KEY',    'a[mOqUI,P[1^|R&rx[XnG?M,y_Pz[A=o~bxL+r-f0!d?T06_tJ]1gi8..K{}uf&W');
define('NONCE_KEY',        'uP@;Ys=iF[~MXDtkjX-esz^<}GSYFMDpM-?XA^7K>,RH?Dte%1AG1UIr yCE4?-9');
define('AUTH_SALT',        'KU{<l}QAXZ8m;;Nq=U+B4?m5|WZ>?T?GCW#m^sEd~-(t3sFg{T5F]j.852wU^EZ2');
define('SECURE_AUTH_SALT', 'E@w13~zluijO7EM#EnU%]L+LC<9E.oBr*fw4h 3lX0qWv}&iUzl@AuxC~6O,=54t');
define('LOGGED_IN_SALT',   '~+^W{HA3GVJX5]/.5Pz+5zNzh^_(y8LAv6pa)_Dcjb|q8_UE_+r}y-j3|4}1V++]');
define('NONCE_SALT',       '5V.=:!+BD^`bZvn7!Fo4$1+uEeAp~7r$T1gI}z)[oX6<d=%|h2BZM6v9)jJhsxf1');

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
