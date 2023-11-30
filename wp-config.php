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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'furatali_db' );

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
define( 'AUTH_KEY',         'afXLwd?Y*{FLkWvOAoGpHPkdlmc@_%5lLUWe(umh:NhL9hVq`C^ :P+h+;x{oQN8' );
define( 'SECURE_AUTH_KEY',  'zR/l!?:H`i0/?N}Bd?fA3L[y~a| j4&?6i/Nov5k{KfX?_|aC@au1}B<Ic-!j.Tc' );
define( 'LOGGED_IN_KEY',    '>(3+LA(w9[j=8ir^#@p1vl[,,uG-9uc/_/%0[GXRI=HIxBPY3`H-&j_|pU+[Gz3#' );
define( 'NONCE_KEY',        '$+k )|TZew{Y%LyHdy@A)auAiE8p5v(1ytkrKtQ4~qqtzLOC(9iIM3BD&E=g?V}}' );
define( 'AUTH_SALT',        'Sle0-Pro2Zv$:3!<**$,*k*MmcriKB|qBchj]#g4upu8`Iw*Z|XW&tQXni2N88^?' );
define( 'SECURE_AUTH_SALT', 'KI)(CPM_PJEn+z967[SM{!{_#KgZ{%^rf0a<NDP3#GXl-Zt{(`9ult&TgRfyMsaH' );
define( 'LOGGED_IN_SALT',   'w=$M`iG6]b5*8jy5=?lP3ic_~M}7#+e]s%CQ8E7+(1cQQm(%N?sun)Y~hNXdLJ{s' );
define( 'NONCE_SALT',       '%T{x,tz72g} )eIxmRl/T;I&DZ3h=(ySVC^MFpi<i-0I51eC1sv}y^H>q3q^_*Ev' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
