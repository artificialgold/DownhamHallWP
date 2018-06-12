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

define('FORCE_SSL_ADMIN', true);
// in some setups HTTP_X_FORWARDED_PROTO might contain 
// a comma-separated list e.g. http,https
// so check for https existence
if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
	$_SERVER['HTTPS']='on';
}
define('WP_HOME','https://www.downhamhall.com/');
define('WP_SITEURL','https://www.downhamhall.com/');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'x5um019fj2jj6v0x');

/** MySQL database username */
define('DB_USER', 'm8a4plfay5bkf3nb');

/** MySQL database password */
define('DB_PASSWORD', 'ijpq2i1uhxzm2i0h');

/** MySQL hostname */
define('DB_HOST', 'r42ii9gualwp7i1y.chr7pe7iynqr.eu-west-1.rds.amazonaws.com');

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
define('AUTH_KEY',         '[gy*-VEvPBQLwUGE=Gw<9()|W:U]4ub`tPkD7VlxS|.u!jz;9f$k}3$;[J.wQ+!,');
define('SECURE_AUTH_KEY',  ' z*e{5850PvDx/QZ*. (1X?*/5@n=sJIDb`_`]4R Le)EzXw+I.Te2xW,~*FzqpE');
define('LOGGED_IN_KEY',    'mI3+*`)y_&dZax:Lqn(zMV9Pvl[0%mIS%ml%jT:7oU2`aJ_+,yr?W$kxPMTiQ$#k');
define('NONCE_KEY',        'iP<&;pauan ).3*~Z!fU?Me&Wvs,Q<[k+}_5-@|lNWQ;s>+$@V1xdYEE* &m2ir;');
define('AUTH_SALT',        'SStX[*C-{Qg RUvR^|H`-,Se/aW+mT*B(Y)X,4nqpiB.:%D%ixwP5j}3_Ip5wR[*');
define('SECURE_AUTH_SALT', '`1~,x5uv,C[{>SbEsk)h*N`# tO*BsE-woJ?c7nv)jzLIR?^92rnjJ#XJ`r2NN?J');
define('LOGGED_IN_SALT',   'R[_H^?C>6mIkA1H)b3h0=|#Gz(rYM.ooSo>bth*jG+@G[8QT N X`/Tx>}mgu:,B');
define('NONCE_SALT',       '%+h=tWd8We3oX/YEBxt(@BuLRDV%zLP2Wm#hOS?MGk=mx2Yh(Kb1,YBIQ9RoAjgI');

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
