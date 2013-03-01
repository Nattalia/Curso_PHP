<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wordpress');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '(XDt>g&Yv!v}]`X-n6C,xeg7c;zH+$H<uvUb_8EY+qXG(Fp.Y~QhIit;[>%>!4dP'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'G8k83K(q9g4ztR&H(}Bh:!^dj*Vtk.T/WNG7L#+&C>_%M!tNYP0YTX4qf9IjZv~{'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', '>6Py$FuOsy@iGAey.EOho q=:m}$AQ74m+&sa@S~3Xf0xD/jcq,xflFg4r?Q#,*m'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', ';hY9qxoS6H9E_<W<TG*;Fq#lI%WV-98VvG*L;I^3WqM[Arywb%rw8z:;&EUAQi%Y'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', '.I;QSY:<2@h%I0a]bp__W>KVhztiG&m0EwL;Uh2>FZjfzAD})BDv/:o#-:#xd!,|'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'e?1T{()N.^sTr{0%pzps/Mv(G0q$y#T]#9 @kh(Xox$6AO,-})y`x=EH 0+:`9,>'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'iQW3<g#,2{~?`<NT~+eBu_#vSBiun!9mk0^b[*7o7jH q&oD;XOr*x|I[&0(Y8mQ'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '/;ArxEM^Jv&#%?EvAujrrY^pB_qt%IKR.BA)>#<;5M-AegSc1Z@u&G$w>$>-I%u]'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

