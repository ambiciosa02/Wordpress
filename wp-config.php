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
define( 'DB_NAME', 'online_store' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '$D6&X@TaEFZ X^F!hb25.o+`;+cpHmuhy)-|*W _q.t[k>L]8t9-0e,06cHEU]Xt' );
define( 'SECURE_AUTH_KEY',  'B|S/*HFghB3+@?[OTK(>8e-MwNHMD*VbdA=YrYg+$/Ciks&7gvHe#W![k,W<w;ed' );
define( 'LOGGED_IN_KEY',    '?ox}rZ+Y6/=Tz{S7FcV5vJa(>:g$T1i%+3l]F[1Lsv0{[}$:4xQ{cQ;<5`s8g?p$' );
define( 'NONCE_KEY',        'IE%J V2bH]DCQ TK(_bvi@b?rs;R:E1oeAz^^!K!qx(E-!D%CLHtn-gq}n}Y~TfH' );
define( 'AUTH_SALT',        '8#Rf!GhsJ%kv=V$nC!F3c:$?S}x_m`<Cv*FGj3`3y<9HVE77J?z5-hb:Yi$?-#}c' );
define( 'SECURE_AUTH_SALT', 'ubp^E,-IXMsGbs#G+b_y8U#@z#^62r;oJCY?TLcWy,`NLO1xg#72  N}Sg%#bsRh' );
define( 'LOGGED_IN_SALT',   '?0}g5:2*b7Zxz2%OQU,|<$V#Tm+-|2!B77J@QS7|,nTWTe+B:`1/eF[v{:jWWUwV' );
define( 'NONCE_SALT',       'bT?9QI{Cw{IpG5doH10h.}]pYJ|@]mEwF((S=^V~$=|<U(xkU8 FDvhs15Xk)H],' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
