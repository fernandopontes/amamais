<?php
/**
 * Created by PhpStorm.
 * User: fernandopontes
 * Date: 01/04/15
 * Time: 09:38
 */

/////////////////////////////////////////
/////////   CONFIGURAÇÕES   /////////////
/////////////////////////////////////////

define('DISALLOW_FILE_EDIT', true);

add_theme_support('post-thumbnails');

add_filter('excerpt_length', 'excerpt_length');

// Limita o número de caracteres da descrição
function excerpt_length($length)
{
    return 60;
}

// Inicializa os módulos de menus
function register_menus()
{
    register_nav_menu('menu-primario', 'Menu Principal (Topo)');
    register_nav_menu('menu-secundario', 'Menu Secundário (Rodapé)');
}

/////////////////////////////////////////
/////////   LOGOMARCA   /////////////////
/////////////////////////////////////////

// ALTERA A LOGO DA PÁGINA DE LOGIN DA ADMINISTRAÇÃO
function custom_login_logo()
{
    print('<style type="text/css">body.login div#login h1 a {background-image: url("' . get_bloginfo('template_directory') . '/images/logo_admin.png"); -webkit-background-size: auto; background-size: auto; margin: 0 0 25px; width: 320px !important; height: 150px !important}</style>');
}

add_action('login_head', 'custom_login_logo');

// ALTERA A URL DA LOGO NA PÁGINA DE LOGIN DA ADMINISTRAÇÃO
add_filter('login_headerurl', create_function('', 'return "http://www.amamais.com.br";'));

// ALTERA A TITULO DA LOGO NA PÁGINA DE LOGIN DA ADMINISTRAÇÃO
add_filter('login_headertitle', create_function('', 'return "' . get_bloginfo('name') . '";'));

// ALTERA A LOGO DA PÁGINA DE ADMINISTRAÇÃO
function custom_admin_logo()
{
    print('<style type="text/css">#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon::before {content: url("' . get_bloginfo('template_directory') . '/images/icone_admin.png");top: 2px;}</style>');
}

add_action('admin_head', 'custom_admin_logo');

/////////////////////////////////////////
/////////   RODAPÉ ADMIN   //////////////
/////////////////////////////////////////

function custom_footer_css()
{
    print('<style type="text/css">#footer-upgrade {visibility: hidden !important;}#footer-left{float: right !important;}</style>');
}

add_action('admin_head', 'custom_footer_css');

function custom_footer_admin()
{
    printf('&copy; %s / <strong>%s</strong> / Todos os direitos reservados', date('Y'), get_bloginfo('name'));
}

add_filter('admin_footer_text', 'custom_footer_admin');

/////////////////////////////////////////
///////////  CSS / JS  //////////////////
/////////////////////////////////////////

function amamaiswp_enqueue_scripts()
{
    wp_enqueue_style('bootstrapcss', get_stylesheet_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('stylecss', get_stylesheet_directory_uri() . '/style.css');
    wp_enqueue_style('responsivecss', get_stylesheet_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('maincss', get_stylesheet_directory_uri() . '/main.css');

    wp_enqueue_script('jqueryjs', get_template_directory_uri() . '/js/jquery.js', array(), false, true);
    wp_enqueue_script('pluginsjs', get_template_directory_uri() . '/js/plugins.js', array(), false, true);
    wp_enqueue_script('functionsjs', get_template_directory_uri() . '/js/functions.js', array(), false, true);
}

add_action('wp_enqueue_scripts', 'amamaiswp_enqueue_scripts');

/////////////////////////////////////////
//////////   CUSTOM POST   //////////////
/////////////////////////////////////////

function amamaiswp_register_post_types()
{
    register_post_type('banners',
        array(
            'labels'         =>  array(
                'name'           =>  'Banners',
                'singular_name'  =>  'Banner',
                'add_new'        =>  'Adiconar banner',
                'editi_item'     =>  'Editar banner',
                'search_item'    =>  'Pesquisar banner',
                'not_found'      =>  'Nenhum item encontrado',
                'all_items'      =>  'Todos os banners'
            ),
            'description'    =>  'Gerencia os banners',
            'public'         =>  true,
            'has_archive'    =>  true,
            'supports'       =>  array('title')
        ));

    register_post_type('enderecos',
        array(
            'labels'         =>  array(
                'name'           =>  'Endereços',
                'singular_name'  =>  'Endereço',
                'add_new'        =>  'Adiconar endereço',
                'editi_item'     =>  'Editar endereço',
                'search_item'    =>  'Pesquisar endereço',
                'not_found'      =>  'Nenhum item encontrado',
                'all_items'      =>  'Todos os endereços'
            ),
            'description'    =>  'Gerencia os endereços',
            'public'         =>  true,
            'has_archive'    =>  true,
            'supports'       =>  array('title', 'editor', 'thumbnail')
        ));

   
    register_post_type('galerias',
        array(
            'labels'         =>  array(
                'name'           =>  'Galeria de fotos',
                'singular_name'  =>  'Galeria',
                'add_new'        =>  'Adiconar galeria',
                'editi_item'     =>  'Editar galeria',
                'search_item'    =>  'Pesquisar galeria',
                'not_found'      =>  'Nenhum item encontrado',
                'all_items'      =>  'Todos as galerias'
            ),
            'description'    =>  'Gerencia as galerias de fotos',
            'public'         =>  true,
            'has_archive'    =>  true,
            'supports'       =>  array('title', 'editor', 'thumbnail')
        ));

    register_post_type('noticias',
        array(
            'labels'         =>  array(
                'name'           =>  'Notícias',
                'singular_name'  =>  'Notícia',
                'add_new'        =>  'Adiconar notícia',
                'editi_item'     =>  'Editar notícia',
                'search_item'    =>  'Pesquisar notícia',
                'not_found'      =>  'Nenhum item encontrado',
                'all_items'      =>  'Todos as notícia'
            ),
            'description'    =>  'Gerencia as notícia',
            'public'         =>  true,
            'has_archive'    =>  true,
            'supports'       =>  array('title', 'editor', 'thumbnail')
        ));
}

function amamaiswp_register_taxonomy()
{
    register_taxonomy('galerias-categorias', 'galerias',
        array(
            'labels'          =>  array(
                'name'        =>  'Categorias para galerias de fotos',
                'menu_name'   =>  'Categorias'
            ),
            'public'          =>  true,
            'hierarchical'    =>  true
        )
    );

    register_taxonomy('galerias-destaques', 'galerias',
        array(
            'labels'          =>  array(
                'name'        =>  'Área de destaque para galerias',
                'menu_name'   =>  'Áreas'
            ),
            'public'          =>  true,
            'hierarchical'    =>  true
        )
    );

    register_taxonomy('noticias-categorias', 'noticias',
        array(
            'labels'          =>  array(
                'name'        =>  'Categorias para notícias',
                'menu_name'   =>  'Categorias'
            ),
            'public'          =>  true,
            'hierarchical'    =>  true
        )
    );

    register_taxonomy('noticias-destaques', 'noticias',
        array(
            'labels'          =>  array(
                'name'        =>  'Área de destaque para notícias',
                'menu_name'   =>  'Áreas'
            ),
            'public'          =>  true,
            'hierarchical'    =>  true
        )
    );

    register_taxonomy('banners-categorias', 'banners',
        array(
            'labels'          =>  array(
                'name'        =>  'Categorias para banners',
                'menu_name'   =>  'Categorias'
            ),
            'public'          =>  true,
            'hierarchical'    =>  true
        )
    );

    register_taxonomy('startups-categorias', 'startups',
        array(
            'labels'          =>  array(
                'name'        =>  'Categorias para startups',
                'menu_name'   =>  'Categorias'
            ),
            'public'          =>  true,
            'hierarchical'    =>  true
        )
    );
}

function amamaiswp_init()
{
    amamaiswp_register_post_types();
    amamaiswp_register_taxonomy();
    register_menus();
}

add_action('init', 'amamaiswp_init');

/////////////////////////////////////////
///////////   THUMBNAILS  ///////////////
/////////////////////////////////////////

add_image_size('post-page', 300, 200, true);
add_image_size('post-archive', 300, 250, true);
add_image_size('post-noticias-home', 412, 232, true);
add_image_size('post-noticias-thumb-home', 48, 48, true);
add_image_size('post-galerias-home', 100, 100, true);

/////////////////////////////////////////
/////////   LIB EXTERNAS  ///////////////
/////////////////////////////////////////

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

if ( ! function_exists('mes_extenso'))
{
    function mes_extenso($mes)
    {
        switch ($mes)
        {
            case 1 : $mes = 'Jan'; break;
            case 2 : $mes = 'Fev'; break;
            case 3 : $mes = 'Mar'; break;
            case 4 : $mes = 'Abr'; break;
            case 5 : $mes = 'Mai'; break;
            case 6 : $mes = 'Jun'; break;
            case 7 : $mes = 'Jul'; break;
            case 8 : $mes = 'Ago'; break;
            case 9 : $mes = 'Set'; break;
            case 10 : $mes = 'Out'; break;
            case 11 : $mes = 'Nov'; break;
            case 12 : $mes = 'Dez'; break;
        }

        return $mes;
    }
}