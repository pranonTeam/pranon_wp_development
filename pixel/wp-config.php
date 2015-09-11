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
define('DB_NAME', 'pixel');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
//define('WPLANG', 'dk_DK');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Q9zS3@=p43~~zSz|o*m-Oyq:4Mfh8:Fq+V2f>tLBE8DNf20aWi/RIPIx+Dd>3|.2');
define('SECURE_AUTH_KEY',  ',PsOP*i_-d$U^$JJJR<tc!W-@N{}^{$Ou=X__w89:aQUSD#|9Rnfi-<SnL~l(%[|');
define('LOGGED_IN_KEY',    'D|DfL%(yX5W`l22%U.h,yH-]E+SNbYC8)a2|/#7U/oZn+jon_9=9=.AD{:!id}lr');
define('NONCE_KEY',        'h_:T}vSr85[7F5k>kn+&R>P43?LIj+PV4t,[~QNu|BaV/LBs8j.E^De-. :>:QDZ');
define('AUTH_SALT',        '-VQ<lH?T~cg4an8eZ2P<E~hAG6OH46*i`Y.RPe6^49(G-rt+6:z;I|SRMh8Z|<M^');
define('SECURE_AUTH_SALT', '#$2!&NA8Up,*EO63T:p.VVPz>7EH*k3[v;B`+lqdkj(9D`0ZT?VTfe,es+t!!yuU');
define('LOGGED_IN_SALT',   '9.L`]vs`oP&-+[~{3vy]C^kXiL|PJKtaj-[!+rQM[Yt=4u=#p<8*u0|Jv3,d3phP');
define('NONCE_SALT',       '4nq;fC8c?-<-SqtZob|eXM{0s-#o5LtqvLHE-=1JStShWw[8/M}}8?bV5ED|baA>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
