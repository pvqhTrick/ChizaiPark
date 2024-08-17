<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'chizaipark' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

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
define( 'AUTH_KEY',         'w#JqH rHu9Gj7{/vru`:m]y{6BLroTH^3P)Qi[.h z._3#ON%W^v}]cw)fB5A9j$' );
define( 'SECURE_AUTH_KEY',  'd]u.K@HyB~LNTW+Gv@| /j%9#i}32J=<IFxUVg{J]oU>Cy<TxMZZXlLsjJ$8[V74' );
define( 'LOGGED_IN_KEY',    '&.mN[9p|%9eUBf>^kN,!tz[t9QN bGuE~CRtBDz w5~~ztkZ`Uk>a5{;C*=+(9qm' );
define( 'NONCE_KEY',        '3rt??dt#j49?@Rr#r_U[x6X~)wns  ?B+|^V=g9NKmsvE{7J]a[x|qy5tQcu%+ge' );
define( 'AUTH_SALT',        'G=Tz-*C m|4_qP&,yANQK88o)u{g!a ^e=6Iq8;BTXrAobt8Ur4I3 %n114bEArc' );
define( 'SECURE_AUTH_SALT', '}?l7o(GI#vU:LNG|X$,<D_J+/dv>9:hFZBBh(`&ki!<GT,K`icX.lNiU{!uw#h[R' );
define( 'LOGGED_IN_SALT',   '_Gd9{I0!h<eXxgPOO]0E}p~@7C={Z-~9@*rN~p+2s?q`Y;,rl7}X#P)r1iUuW?O{' );
define( 'NONCE_SALT',       '0w16;v=C-_R}(}<`T6qWX`3PFve)JaeD5e-2,:/-^{=1L.t};3v/.iW33,FyEJ>3' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
