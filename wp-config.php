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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

define( 'FS_METHOD', 'direct' );

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
define( 'AUTH_KEY', '2iDmn<g*PJ!IZHlMU7W8|f  #I)^|wp&7PEx!(9j9}X_%tslakr_3I=U_ 9tNDG#' );
define( 'SECURE_AUTH_KEY', '!uNU>iSCTZ{Q-[wYv!$Y7~UDwJAaIL 5sG_%a2evwoKcz4o1]itW|i*^L&7If= /' );
define( 'LOGGED_IN_KEY', '.~J*+;Qq|}S#I!e~r1+I:+agXJ-EC{0[=AO.[b<2xT;B2C#$CpvU&<6yr#KKk8zf' );
define( 'NONCE_KEY', '!]T)Y6_x)(E7leJ5J)F4vM>WKDH?K*to[$:kUnC|[k#Lm3c,c/T!`4N$DGR*<rmh' );
define( 'AUTH_SALT', 'H:!48w@Db0q1Q~dI9.wP~orAc!WR[Yr)$D7 K!6,|u*[Jr}1k-msjli75>&^Hn 5' );
define( 'SECURE_AUTH_SALT', '6|y~rQAz*N|Qpd{]DoIdfEJ|dYoBKbi>tx0v5rP[d|_z:;0(YyoIH/lWK6SFmW]8' );
define( 'LOGGED_IN_SALT', 'gR7Ws+vBat HM2)rE~&p6VD9/Y,P*E,VnYKPSarT}Sd}yQo.Hl,gFJ;yo#E<(W}^' );
define( 'NONCE_SALT', '_pj?fsw$-<hyt,6GA?f1N4H0,_m68h{!UTMn?v]PJo3p7o0D6_?o5R^CMiVN:2I[' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mona_prex_';

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


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
