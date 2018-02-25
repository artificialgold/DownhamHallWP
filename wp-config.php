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

define('WP_HOME','https://downhamhallwp.herokuapp.com');
define('WP_SITEURL','https://downhamhallwp.herokuapp.com');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jrpco0h5709ij18g');

/** MySQL database username */
define('DB_USER', 'nvohd9xcf88yhx1f');

/** MySQL database password */
define('DB_PASSWORD', 'lglcxaedqb9t6m82');

/** MySQL hostname */
define('DB_HOST', 'ivgz2rnl5rh7sphb.chr7pe7iynqr.eu-west-1.rds.amazonaws.com');

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
define('AUTH_KEY',         'o?^Yc|4`2gO{YEq7gz)u8c<9O.^(QUhosj-){C{@R}$J,pY.*Ae,6_XzU7:981dr');
define('SECURE_AUTH_KEY',  'jTF%`j!ZcidHgt*3j[laz4RN]Rk,PMFI$e)wp1bwTwQSEP-S)a,)*ur77 qu4?.Y');
define('LOGGED_IN_KEY',    'No90tJpD]l,&zF$Zw:q<)=NUS2Ke^/6.oV[~7H^?^XAQP;}GK&T>g.a]9#fyZ[(&');
define('NONCE_KEY',        '$*f<RS@~i]14lO{vAgvI99hwH/Luq~I*Xn;FUb~AE-s8`joBT;$-! %3zL|B^7 T');
define('AUTH_SALT',        '!Jliex]aB~wGiXY%3cl5xD UC0{LRC.$H=xhP;qvuaN|x6Eu63.wL~8lcSzAQLTn');
define('SECURE_AUTH_SALT', 'aglbqLMuw-}5j&e(&Ez{.,R^L-]g58g }K o!8[V~T;T!wZ$y!|?TbO$(L4^=i5B');
define('LOGGED_IN_SALT',   '~TghE+~hIfdjQZ]dT=`A]H`s2T1<sAM b~fO9))riPbO&ag6{?DtgVRNMzw:M>u+');
define('NONCE_SALT',       '!*1w{IR=rx9l[^|0ojC4l&A%|,DA@Z5a2MSifmzlxRu]7[mk/w1E7:;V(Np|6rZg');

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
