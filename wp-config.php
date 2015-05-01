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
define('DB_NAME', 'chammut_dev');

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


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fC#E&Fstz;mUr@p0$rJ^R)9RY]qt-AO+u[_P!r/V?9K#ym}HRM$)#nmI+uxRUFM;');
define('SECURE_AUTH_KEY',  'kM zvK]p9),UPh!IXD%!:3@us8+pFbsqLpH6+dQCjopwX,y&+|.b||,=n&FKbb:O');
define('LOGGED_IN_KEY',    '3EXr`^H@}Cr)~6U7P^AY1w*[aEp;5ek<;hi1qb2L1/wAgDZ>O7S)h4dgZ1K,pV*b');
define('NONCE_KEY',        'V;O_2X6WWG, /^tZ8v!&}+UNHBdX48%:B68THPE/)_Mb_fTsoah$V0{-0H(0,]2Q');
define('AUTH_SALT',        '|un=Y+WlW(sDUy.kJ<w(R&hh[k^b,+Ss A2Ov$RamonVK[ >%gryW[LQi`5Q|sXv');
define('SECURE_AUTH_SALT', 'CH-WOgFIb^tBi6V-o(x7l1p`e>B>yqZ0Lv &gVec[!Xx93|^WTe=OQCgeYc*P]Rj');
define('LOGGED_IN_SALT',   'a,.PDq>q.*KmT_866|)GR-N.<n|j6Z%CqMWIh)Z==5Z+r6[t$=4&#v8sXBVAct<j');
define('NONCE_SALT',       '8Ft=|B&U@el+EDOv_mMSeJ:@r<[0.w$2NyY#A[]sw.4|aed|<zkRMzmnY,nZR ]z');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
