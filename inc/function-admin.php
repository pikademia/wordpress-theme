<?php

function pikademia_load_admin_scripts($hook){
    // nazwa strony to zazwyczaj toplevel_page_ + id strony
    // nazwę można zobaczyć w sekcji body wyświetlając zmienną $hook
    //echo $hook;
    if('toplevel_page_pikademia_motyw' != $hook){
        return;
    }
    wp_register_style('pikademia_admin_style', get_template_directory_uri().'/inc/pikademia-admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('pikademia_admin_style');
    
    wp_enqueue_media(); // add options for media uploader
    wp_register_script('pikademia_admin_script',get_template_directory_uri().'/inc/pikademia-admin.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('pikademia_admin_script');
}
add_action('admin_enqueue_scripts', 'pikademia_load_admin_scripts');

function pikademia_add_admin_page(){
    add_menu_page(
        'Pikademia opcje',  // tytuł strony
        'Pikademia',        // tytuł menu widoczny w admin!!!
        'manage_options',   // capability
        'pikademia_motyw',  // page id !!!
        'pikademia_create_page',    //callback func. do utworzenia !!!!
        'dashicons-palmtree',       //ikona
        110                 //położenie w menu
    );
}
add_action('admin_menu','pikademia_add_admin_page');

function pikademia_create_page(){
    //require get_template_directory(). '/inc/pikademia-admin.php';
    $picture = esc_attr(get_option('profile_pic'));
    echo '<h1>Ustawienia motywu Pikademia</h1>';
    settings_errors();
    echo '<form method="post" action="options.php">';
    settings_fields('pikademia-settings-group');
    do_settings_sections('pikademia_motyw');
    echo "<img src='$picture' class='profile-picture' id='profile-picture-preview'/>";
    submit_button();
    echo '</form>';
    echo 'Odwiedź nas na <a href="https://www.pikademia.pl/">www.pikademia.pl</a>';
}

function pikademia_custom_settings(){

    register_setting(
        'pikademia-settings-group', // nazwa grupy opcji, do której się donosimy w funkcji settings_fields()
        'profile_pic'                // id opcji !!!!
    );
    add_settings_section(
        'pikademia-myoptions',  // id slug do identyfikacji sekcji w metodzie add_settings_field() !!!!
        'Opcje sekcji 1',       // wyświetlany tytuł, może być pusty
        'pikademia_options',    // callback function do utworzenia !!!
        'pikademia_motyw'       // id strony na której dodajemy sekcję(pobieramy z funkcji pikademia_add_admin_page)!!!
    );

    add_settings_field(
        'profile-pic-nazwa',   // id
        'Zdjęcie',              // wyświetlany tytuł pola !!
        'pikademia_settings_picture_field', //function callback do utworzenia !!!
        'pikademia_motyw', //id strony !!!
        'pikademia-myoptions' //section id z metody add_settings_section !!!
    );

}
add_action('admin_init', 'pikademia_custom_settings');

function pikademia_options(){
    // echo "Sekcja z ustawieniami";
}

function pikademia_settings_picture_field(){
    $picture = esc_attr(get_option('profile_pic'));
    echo '<input type="button" class="button button-secondary" value="Upload Prifle Picture" id="upload-button"/>';
    echo '<input type="hidden" id="profile-picture" name="profile_pic" value="'.$picture.'"/>';
}
