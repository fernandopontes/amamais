<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'startupi_db');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'startupi_user');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'Si*db16');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Dt;nF^[C5B.L`ammnTPw=~eV2!4)Cdou.<a80s4:=TS6{62`3(RFixrMBR[?Wcmy');
define('SECURE_AUTH_KEY',  '$QEibP2]$@b0-rECM#n0g>yWBq&$.o`hq?G5n@%p?8rBy7EMz?{<DfctR4kCy|n=');
define('LOGGED_IN_KEY',    'q%gT)v^92q`<>,%,t2#m13JFB^9JBW8Sb%+]KYc^)aS3vI#HoKV9[sMg]A%~!{Mw');
define('NONCE_KEY',        'i;d{d^b<</hYDp?+~hiGw^+NPgXFAu;BR5|H$1<IQIaXzl}{ulq0bV%[7.Q`>B)Y');
define('AUTH_SALT',        'J&D)Ih/(iGe22(=[s{3/W46EU:hnsU~WwImX-ckT<Q9J+=iA==I*+=P<R?j.9Og3');
define('SECURE_AUTH_SALT', 'LGYls+jpmg^G3`c*rgE|8Jg1xjFc^0SBZb0)b[&@;nwc4+z?g5b$u=Ioyfib2:V}');
define('LOGGED_IN_SALT',   '5_S/r0o.Vd-{2=-C-!M^6^.H>a;P]vj$yMF.vX`O-2geP/S+pz:h$]M-zZjZCO5)');
define('NONCE_SALT',       'hvlMJ$$<a|2YT3KLx`%-7a5YJ)=F$DI+0X78T|;yl(^A7c}J8V/T^Rv7#+_h0bY-');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
