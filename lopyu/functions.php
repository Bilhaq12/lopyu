<?php
function lopyu_nolep_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'lopyu-nolep'),
        'footer-menu' => __('Footer Menu', 'lopyu-nolep'),
    ));
}
add_action('after_setup_theme', 'lopyu_nolep_setup');

function lopyu_nolep_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    wp_enqueue_style('main-style', get_stylesheet_uri());

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), null, true);
    wp_enqueue_script('sakura', get_template_directory_uri() . '/assets/js/sakura.js', array(), null, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('mode', get_template_directory_uri() . '/assets/js/mode.js', array('jquery'), null, true);
    wp_enqueue_script('sakuratoggle', get_template_directory_uri() . '/assets/js/sakuratoggle.js', array('jquery'), null, true);
    wp_enqueue_script('auth', get_template_directory_uri() . '/assets/js/auth.js', array('jquery'), null, true);
    wp_enqueue_script('profile-upload', get_template_directory_uri() . '/assets/js/profile-upload.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'lopyu_nolep_scripts');

// Custom Walker class for Bootstrap 5 menu
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    // ... (implementasi walker menu Bootstrap 5)
}

function lopyu_nolep_madara_core_support() {
    // Tambahkan dukungan untuk fitur-fitur Madara Core
    add_theme_support('madara-core');
    
    // Jika Madara Core menggunakan custom post types, daftarkan dukungan untuk itu
    add_post_type_support('wp-manga', 'thumbnail');
    add_post_type_support('wp-manga', 'comments');
    
    // Daftarkan sidebar khusus jika diperlukan oleh Madara Core
    register_sidebar(array(
        'name'          => __('Manga Sidebar', 'lopyu-nolep'),
        'id'            => 'manga-sidebar',
        'description'   => __('Add widgets here to appear in manga pages.', 'lopyu-nolep'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('after_setup_theme', 'lopyu_nolep_madara_core_support');