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

define('DB_NAME', 'vietgroupdecor');

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

//** Turn off Revisson */
define('WP_POST_REVISIONS', false );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'c{`u?[DU]77cE!u6|9qo,bzn.nzGwLjGd)L-~0c!G;1>[a+~{v6d*Sul@|dIH6-b');
define('SECURE_AUTH_KEY',  ';Lnd$A%/&mt0TOtn;!J[Yb$xtA8r3?o)}ToyOQJa0irwt3%?5=U>Rhy_@l+-N0>`');
define('LOGGED_IN_KEY',    'L*j~.1Zp86++[T IC@>ql|x1H-[,+d(>3:NIZMjjtTo@GpokOu5jf&DMH~9W$9kK');
define('NONCE_KEY',        '+/Bpd|+kBeH1;dWx<}*7%%?u;j`*.[uN0sp(}?i]Hw+TU0$SNXpN1Rl]VsP{zg0,');
define('AUTH_SALT',        '7lt{9QOO=m@Q``6=Atzd&%Cng|V1i(i)>;>nU468C;0&C-RYs4q!mvU.8q}fC|h+');
define('SECURE_AUTH_SALT', '2]w!QmF~4W{QnrWS3U*(^3UBz6vJOGj?></u`~3f>S6h,d@tfKJ@%Yn=*l=KBxUw');
define('LOGGED_IN_SALT',   '`pvu*oa.eUH{>h3>irm{J8EH5X7:B601~0jFf-A/KOpMCn/lvlCUt2{GZ1Idm}OM');
define('NONCE_SALT',       '90W{nVQFQbhWJgnyOl2#M,g4!LkzP.f2_z_*{WG6 B+R-X#]|j7<-;NAPia}+5zN');

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
