<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'thevolga_pixel');

/** MySQL database username */
define('DB_USER', 'thevolga_admin');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

/** MySQL hostname */
define('DB_HOST', '192.254.148.111');

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
define('AUTH_KEY',         '>jl@KR1>@K.[_7h|v9yz4a=+Wxf<lh}%Nl7d1u`wh2!6ha:mqsHXBb+]!wq%X@:y');
define('SECURE_AUTH_KEY',  'a{0y{Oa?x~8|zvwYB=jiiMhN}6+)#7nnldS&8=fr1$l<P&7*LJ-^Va540J=aVW`+');
define('LOGGED_IN_KEY',    'c-Z (-Ah{(%eatm{pZ!r?6Zhc,RKDDE-ANrw=(ptI@ E4!j]0<xAi6l|CI**@+t`');
define('NONCE_KEY',        'b+||B|_aH{B%X=gzW{]oH^v`#Xg)+`W9M}|Lg#)Stms-LTdy M4e6#ktR:3}%/.E');
define('AUTH_SALT',        'Z>9:2-.0;mdPiu^A|n+o.m1/Q@bLEyC6eki#Z?pYf3Sr(l+9-VO#~X%|9pdkt$tO');
define('SECURE_AUTH_SALT', 'BB5L#&L.J97eVMrjd/<:N|a@EmRpT_-XjGb0D}0[=%5^bL[vq3dmjVtrcy!sauOo');
define('LOGGED_IN_SALT',   '&d](6E)Br`&4~8Cyfhj*cl2omCT0YcVccu`j_C*jq?ca#c$+g3y-#T4gt/]oUuYo');
define('NONCE_SALT',       'IS_1)&&.N+m6]?y-|@x`{.]&ZoQ%QMk`h{A1=N5XjLxBN=?-m9u2bFOQR$-z3xh[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pixel_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
