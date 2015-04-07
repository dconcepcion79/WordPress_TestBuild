<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'jntHqeH%6N<.?fRy+@;.~qg|[tLySh*|Mj9Q}Eg:PmL+F_P??3)Nw)|fMkQalz:P');
define('SECURE_AUTH_KEY',  'kX:>R$[yI<;9gbdL[*%h{ci~R]8^A?ECy[^P$-LA~9C!^Z4*>,t{{>l!S]-t|gax');
define('LOGGED_IN_KEY',    '`Yw(u$I{^8Pa3hZA2B43:}_J r6;~QEMrqqrA(ucYW$jVQKpSBF<R`Q&z*=!:hcM');
define('NONCE_KEY',        'FOT5c<WZGYH&].sKGZ;(J3 s_hp=l!$<Bk&ho&&]m^v <rFcu5G2^ }Uiy}&lXTv');
define('AUTH_SALT',        'z[ o:LiknR|=H+@7Ew8^V^es;2x~}t{lKMOh+6b)r(uimV0iuWA8U`onuj.?[:%[');
define('SECURE_AUTH_SALT', '`9/fuC1#-@B9&*j?BcwmuSxhS?fgAlC.5*3K8|X^vf3+A^HZg>F,{?|Rkn0_|t9*');
define('LOGGED_IN_SALT',   'd>IzPw/-B)]z/.Sh{J@*5QIWv-]?993+1k,Hk R12tII-2KmT]<0ea04flO&Woqe');
define('NONCE_SALT',       'mx5BO$9tB,H.j|hQyrL2J@`r| Ku;+b.NgKf.`Vq*wxOUf*h=TY]ahM&BzI Hemk');

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
