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
define('DB_NAME', 'wp_test1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '<|z(]4[7?b7=e|lMZI#WS8:M!B#8tto*JnF8dwi04vV*1Y5YmBrav[6 IW$4O`.a');
define('SECURE_AUTH_KEY',  'wPLYZ7lIQ|A,lSW hw}&o=&[~T]BD0ggWPe/77(tXuUWAfwfJ[K<YiFmI;;J{;YB');
define('LOGGED_IN_KEY',    'z6Vf}Cl~R4Y=,J;9|wR:(5WXPx9}buf`4 k8!,WssqF;+PKMI`~sBSx]A -~K0^%');
define('NONCE_KEY',        'yIi%=c}q-@jw>R7]VA)/jbZ{e!od:#0hs*7^[0VAI27zv3 I)LeXO;wKj;brSb0D');
define('AUTH_SALT',        '1i#[)Al!&fX@ec#~Y7BG+)hCkv1yEgtLee*@J0%`G/:^}[?P`)DECO<5<a(S`3%7');
define('SECURE_AUTH_SALT', '0R#XwOk{BKQF.F4TWS }]h,GNAB:d{o1(Bl<7a3/>OJoHRJ:mEJV53d:SdFV_]TS');
define('LOGGED_IN_SALT',   'xluR)$Xp6(}av3)}Eci;=SS]M?HE(0F3Sk$#.(@2RR*}Hwl}>I^Dt_7lcUs$ni]R');
define('NONCE_SALT',       '[oU!kgZwIn[B`g59IR;hy*NP~`kEzaGY~:-@n&y)$U4)K0z5t@V%D&Q!`{!]Njo-');

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
