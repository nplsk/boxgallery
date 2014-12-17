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
define('DB_NAME', 'boxgallery');

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
define('AUTH_KEY',         'AyaU>UQU3LU.-l4/fo}h~I7:-C& bNXvz}#tLBg|r|Hf01L#b>.T$DOHszV/yhA.');
define('SECURE_AUTH_KEY',  ')_-+(vi,G5x.T22}jt:tWgEhqoaWh%~3k|,%_z(%)U-JH<-2RwVlpDS]=YP/$lex');
define('LOGGED_IN_KEY',    'whc6Pavr4#2ID(_U(nl+ywF^a4H6^4w}W3b?g(|hUs-CmyGJ!&#7]:Y;QrgJ.x1J');
define('NONCE_KEY',        '2ts)J P~X*>HNU>Qd]46-]izzi5w*r~z3(wiCB-:wxJeWF|!in*z|2?lW*mF1^YA');
define('AUTH_SALT',        '0aqcS:20w/tj?Y-HG-/9-#P,4o]-jJ_p<tFn`GaQ|.;xcKgXB11J^{9WyT@K7@l2');
define('SECURE_AUTH_SALT', ',VL3{C0hVevE1OTYC{|0OjHZRWe:h>j0rpSmp[cxt]Lxbd=ILam%+)b8xQ=p,-d!');
define('LOGGED_IN_SALT',   'BuQ~^zm>Knq(MDnG#q3o 0W|zs}+4}Uxcm2U)KLL|P}Y=QUcHN_rj7 2YUP+8cMp');
define('NONCE_SALT',       '+/{Y{jc26lTUJH5rV[#8)hbv|M7+uVbN!{i|b$bKWJ.K86A<Z=L@%pz-#C5u2^ul');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_box';

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
