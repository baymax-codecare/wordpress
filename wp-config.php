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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hfcjoyez_DB1' );

/** MySQL database username */
define( 'DB_USER', 'hfcjoyez_USER1' );

/** MySQL database password */
define( 'DB_PASSWORD', 'zSSbV2nQ%~qV' );

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
define( 'AUTH_KEY',         'HtX08f>xp-TJy3Q}O2z*0.Ub1>$P2;~:{&6mQ.F2rnuT%n4fsy:[8[0w99t!5`X}' );
define( 'SECURE_AUTH_KEY',  'EPJzUd*MV /mRAeDnaT?LIT%+H=/{T=(6f|s-2IG$hlK>RX]6i.( GWhg=VOCQb7' );
define( 'LOGGED_IN_KEY',    'HD]DP~Eb&rcFYrU`&YZ)Ys0eu)tkV|ar8{HJBY!Xs(1pj&/~|`=lSb`lq?iQ@ug3' );
define( 'NONCE_KEY',        '_w;t8%p031&0!, zx,9U@EG)fE/T.xt.PETi<)@IVT!B`eCS}0@IbQS0@g].Aq?c' );
define( 'AUTH_SALT',        '+MPY`[;%Q7@Ocd}hh1H>+#.mQb>fQ[HAh_ys4$:|]hHPzPHwRvln=cdyV{8}F#7R' );
define( 'SECURE_AUTH_SALT', 'szjdK(@uj-)3fU.J6Qa-cH-W=WHlx(|RI,5~47U@rc lVs*LwE08#[~Iv2564z3~' );
define( 'LOGGED_IN_SALT',   ':F${^0-nb,_?+R)7h.Q=$zY~|t8yFl)_M+kWxM7zb(W&1[F4|7j;R>eCK,`U:T+^' );
define( 'NONCE_SALT',       'pqw9sT5/^%b4BT>m)<Tu M&ohR4MMh[fgJs^qe|/qaH)TK]MmO)/R`q/;{ k~]-v' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
