<?php

require get_template_directory(). '/inc/function-admin.php';

function pikademia_scripts() {
	wp_enqueue_style( 'pikademia-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_script('pikademia-public-script', get_template_directory_uri() . '/public.js', array('jquery'), rand(), true);
}
add_action( 'wp_enqueue_scripts', 'pikademia_scripts' );

function pikademia_theme_support_setup(){
    add_theme_support('menus');
    register_nav_menu('primary', 'Main Header Menu');
    register_nav_menu('footer', 'Footer Menu');

    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 600, 400 );
    add_theme_support('custom-logo');
    add_theme_support('custom-background');
    add_theme_support('widgets');
    add_theme_support('custom-header');
}
add_action('after_setup_theme', 'pikademia_theme_support_setup');

function new_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'new_excerpt_length');

function pikademia_register_widgets() {

    $shared_args = array(
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
        'after_widget'  => '</div></div>',
    );
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => 'Widget #1',
                'id'          => 'sidebar-1',
                'description' => 'Desc'
            )
        )
    );
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => 'Widget #2',
                'id'          => 'sidebar-2',
                'description' => 'Desc2'
            )
        )
    );
}

add_action( 'widgets_init', 'pikademia_register_widgets' );

function pi_get_page($arg){
    global $wpdb;
    $posts = $wpdb->get_row("
    SELECT * 
    FROM `$wpdb->posts` p 
    WHERE p.post_title='$arg' AND p.post_type='page' AND p.post_status = 'publish'");
    
    if($posts != 0){
        return $posts->post_content;
    }
}

function get_category_icon($catList){
    $icons = "";
    foreach($catList as $c){
        if($c==5){
            $icons .= '<i class="bi bi-cpu-fill"></i>'."  ";
        }
        elseif($c==6){
            $icons .= '<i class="bi bi-bug-fill"></i>'."  ";
        }
        else{
            $icons .= '<i class="bi bi-book"></i>'."  ";
        }
    }
    return $icons;
}
