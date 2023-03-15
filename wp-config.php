<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', '_hotel' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '{xnF3S<|ol`@0psMe~eGX5~*8DD>0PfU} L$]v{ts=%: 9Qi9KAWX(EC@9AW3X<.' );
define( 'SECURE_AUTH_KEY',  ':q*vr0Vhxv5>BY4XZZ$d=?_roLjT>Hi,;6cG:WOF1Ah--,BbOp0sk)`x]TZgxXH ' );
define( 'LOGGED_IN_KEY',    'ttL/5Gr2*Yp=D/ZW>XLl{vXAqcxwH](2SnAjsMjV8nx?/d3WY(hYa9Jlw6=v)v!;' );
define( 'NONCE_KEY',        'h1V+jY&S)lbI^qGZz=xCCP5:@#0VoiQTp3oY&Uf0,,SD%Zs23.aXK_{|eSRYkeSP' );
define( 'AUTH_SALT',        'C;djlk`qqW9m$Nwz{QDQs4ee_S=!487BPoO~L>?2s.R&[kw}ols2?36GH](y-e8[' );
define( 'SECURE_AUTH_SALT', '4-i`Fpa$kqOA^D-owH@7f+iEQ[jPOb SYjd5<g;K}`%HKb_?86fQZ0+(iEnwH]`9' );
define( 'LOGGED_IN_SALT',   '=A?W!SXZZ&mP2kq*x2k+YsIG&AnV-{+R*s/1*tHkgF00&D[;ST^fb6SC.q;R(a,s' );
define( 'NONCE_SALT',       'WI(6Q`Efb;&LhCa#j{Rb.3z$Ws%@[go8eF0*Ia}o>6Z&#W;/{(%$FlVcYM)[-D0v' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpp_';

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

/* Add any custom values between this line and the "stop editing" line. */


define('WP_ALLOW_MULTISITE', true);

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/_hotel/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
