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
define('DB_NAME', 'larasoft_main');

/** MySQL database username */
define('DB_USER', 'larasoft_user');

/** MySQL database password */
define('DB_PASSWORD', '<Mahmud123698>');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Dxcu!<HOS,DZwsIF$O*hK84R34Tq0jB.{ D-,dZQ8=A5+/W./qZ.omLG<qW5[9qi');
define('SECURE_AUTH_KEY',  '55!b55l5)5w&mcOy/DFiK=oXIG9P;Aa[7KNFrLIv}EmYhRZIDD1a$r9<%cyhJZc ');
define('LOGGED_IN_KEY',    'nnhq24Ex$C;Y%>xTTWN^C^rp6e|Y.N|R6zLr:=/DDLl1WI_+P.e%NG=c$C(pEZ2u');
define('NONCE_KEY',        'J?venkisioRk` Z9me6f7hZ;Ih1aopLG2,s [0h#pr`{^r?oWf+Zx^..6VMB%$(L');
define('AUTH_SALT',        '+JW8JXN<(q`n?I>Lkk#@eYYe`bT3IR@I8Z?jF-?t+-as=zHsAbLc#v5Zs+J?&QK(');
define('SECURE_AUTH_SALT', '&YsoG<!iM}[jYWU;.7#hIaxbN_ldP-h4%m9?3>ZHG,/hVbf[s=jD2v8ZKN#/.zD~');
define('LOGGED_IN_SALT',   ' Y `t<@`lNH]%wmW(IF9|ax&jY)!;dHs3s?zc?}xmjU^bL$I^_IVtRn@R&l1=:|`');
define('NONCE_SALT',       '!+F*#>lp($U(r|:ikSpZY(AE2tQVv|H9H n+#cT -pNVQsjx)eXn]]a,l(K}IZ[k');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ls_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
