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
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
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
define( 'AUTH_KEY',         'I%PbKWdnfWk$VBO=o^_g&txG^`qw:$H89x9N.eynTBL&P/Mx<0WvWUM2.%$tBC5|' );
define( 'SECURE_AUTH_KEY',  '4<fb$U?IC`b84UFqN!lkB)l1Pkt4:y+PmQ95 @`?uF gjnZ$)G`[#ky7]Gg@Z.Xv' );
define( 'LOGGED_IN_KEY',    'F>m*mg);X.irP)}tMqo#L9&x}lp;w!,;)JukR$qz {:].nYh/WI;e+FPEr3@.yKx' );
define( 'NONCE_KEY',        'OQ^gUNGL)@tIfOR{%IAoCyUg7AYuT(&#7#y?! D6(/UIUWODL#z>l~1Ki[zCl06c' );
define( 'AUTH_SALT',        '>T=>fs:7./AJvf)7(yq,b.K:_8b;B&d>{c/R/;+/mFW>Ww#GbQIAPyY{2ro`D7-x' );
define( 'SECURE_AUTH_SALT', 'vl @V9I{Xwl+?l2Kn{y!MeUKBBPCZ/$IwhJX]R0:z+ONLlh`G{%M^vR3nX$4qhd@' );
define( 'LOGGED_IN_SALT',   '#(RgQV%xxTio#r.4[30M`MOi9Q>0{[ug<say2t(9p+jDQNyEjp2Qa?UDk J~kKSg' );
define( 'NONCE_SALT',       '+m,G4j1CDiN&t9=SA((!,.4?LfcPR,|]o3NA`(e!SEpFEoO3=^/ytu+k[)S4e9,@' );

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
