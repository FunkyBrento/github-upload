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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mahalearn' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k}aB)C[%IS(F#dS7%wdRfE+g/ssh mPZXgoK.SfcwH~,[r;8xVqIM tdDHq:^?cH' );
define( 'SECURE_AUTH_KEY',  '3Jqa8,-T.t!arDY{6b;E;i]A,jjf-jvNS(4rt L;HG`s_8]-kA>rpt.UMH]b0E;0' );
define( 'LOGGED_IN_KEY',    'BWCXa3FM5+mv-tZVF>-5pgiM&5N32VomAF0s#o`- mYLzox3JB2M[D:i()/c|=._' );
define( 'NONCE_KEY',        'Cc(k59gY$1$*-Q|x>,;v?Z#k fhOrM%FGLO9op69HU[MQs}o;qgEQ]|u>K~eqD&k' );
define( 'AUTH_SALT',        'Y^>EMLAn5_5ya8.]%3nY$ccSa4{)bqzOAJixSBM]Di0es]$jy<6U=,7m`B}0RJgV' );
define( 'SECURE_AUTH_SALT', '7zRM7>oo$v4C$cR?rzHEf0D_&n>>SV}ZJUD85*PTj2Z(8rcVxW/.b@D;xO>G-E[3' );
define( 'LOGGED_IN_SALT',   '|aXEu6Q/@5g/.d9e}.pxUGRW!.+aa:5i$kl-t 4-ox|tDpf&d+yPv EaS2@{#i$X' );
define( 'NONCE_SALT',       'z@))?^x(K}EOe,y5H7;Iv2M<JDdLlhW`cyezzy[l(Q}7:_N9Z]PbF($*L9V`G DJ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
