<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'b22_16880241_shopec');


/** MySQL database username */
define('DB_USER', 'b22_16880241');


/** MySQL database password */
define('DB_PASSWORD', 'vanhoa123');


/** MySQL hostname */
define('DB_HOST', 'sql300.byethost22.com');


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');


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
define('AUTH_KEY',         '/N+Zb6wP/0dgBkE(p[:>u7ZA5wV=Jl^~WYF/OV`Cu_Z{Hm(CO44;h-^0|zA8I[f;');

define('SECURE_AUTH_KEY',  'o*=>9%;.(A|Ya>4yoz|{dd9 <9lZV#C<quvK]vt%mM5<D;m(nAnlmCyj|nD*@)S4');

define('LOGGED_IN_KEY',    'R|J7;(X)`JCZHAvtw5r$xO%Da7`8o+1Wg+x-+?}+hbhC~JF4#s|7`Rd}5KPBqe [');

define('NONCE_KEY',        'q]~&exc a>(c7Abl3kV4&d=^):qkp|c/y*Bf9sG9,@Ds`Q*n},auQV5m]-.FCU$P');

define('AUTH_SALT',        'WPW@O&)Jgb:bR#Xh GNI-GHqvW?;~97aTu:z(/n-OH0az$s13ALMC:E[-7 +x9{+');

define('SECURE_AUTH_SALT', 'Kv|5LV7&Fq-W^|$|/m]w=&vA?Wlg~o+70n~=dnwrIOqyLVCdE-S5|9t,Q%QW+rR6');

define('LOGGED_IN_SALT',   '-[Q3eqz-%[CAI7_JkP%SPs*lGlnCr7tM.3cFE,-:TVWt7ToSm_%Z>hOIL]!uockW');

define('NONCE_SALT',       'K$;qyXp-.Vh:CjW1+VffZ@1(_MChA@y%`[`~aE+)8/}/9Z=}Z^7^I}Rv+Hff+7hL');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
