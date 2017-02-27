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
define('DB_NAME', 'jlwg');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'Q01IH^{uZ!-4fk_OQvLC9Km3DZ>;*FIqN<s4@IE{(%[DKAu7wl!:qUf~+nB4B(0@');
define('SECURE_AUTH_KEY',  ';{,zd?SkTMJMdl{-DPISS+7 ~?jsXc(%@;f4%)9MBx([cmj5job[VCTO!cl/Ad(n');
define('LOGGED_IN_KEY',    'XN5)hl/a:PzSXhjXd2l6OGwqwnI(;g,Tkq;!jd0(xELF?}(;2Vaa^+qiwoSL9!y`');
define('NONCE_KEY',        'mtUi3@$j;kJZ7WO?aNDhvI >?Mj/TMhTZ-p0#+9^2F#S6QsDNV3+&S^%zWMN@C_t');
define('AUTH_SALT',        '[!l0{#9<{1?F>!vrEQla8Py&gD@=.O2Au}`P;^!#DbST&{PV]4_>9WQi]&z-P6rL');
define('SECURE_AUTH_SALT', '91%fw++:COi,0ie<Iv}@z.?l+r wjq_R5WbG=A`H)}7;<2zVX4`)rgN+@d [&f4}');
define('LOGGED_IN_SALT',   '_]jf2j9WBtlC:aK D m;SD6_6/&. SM4MK,^yuP:<`b?52/t[!I?|^f8l+]GJkbY');
define('NONCE_SALT',       'WQinIbdOsH:^r*=R9JfG%tLy~rZK<k$,BnZtMoJH%O(V(7*,kAEqDen?qSm~=<^Y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
