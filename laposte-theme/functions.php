<?php
/**
 * La Poste Sénégal — functions.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once LAPOSTE_DIR . '/inc/class-nav-walker.php';

define( 'LAPOSTE_VERSION', '1.0.0' );
define( 'LAPOSTE_DIR', get_template_directory() );
define( 'LAPOSTE_URI', get_template_directory_uri() );

/* ─── Theme Support ────────────────────────────────────────────────── */
function laposte_setup() {
    load_theme_textdomain( 'laposte', LAPOSTE_DIR . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', [ 'search-form','comment-form','comment-list','gallery','caption','style','script' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 160,
        'flex-height' => true,
        'flex-width'  => true,
    ] );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'wp-block-styles' );

    // Image sizes
    add_image_size( 'laposte-news',    600, 380, true );
    add_image_size( 'laposte-hero',    1200, 700, true );
    add_image_size( 'laposte-service', 800, 500, true );

    // Navigation menus
    register_nav_menus( [
        'primary' => __( 'Menu Principal', 'laposte' ),
        'footer'  => __( 'Menu Pied de Page', 'laposte' ),
    ] );
}
add_action( 'after_setup_theme', 'laposte_setup' );

/* ─── Content Width ──────────────────────────────────────────────── */
function laposte_content_width() {
    $GLOBALS['content_width'] = 1340;
}
add_action( 'after_setup_theme', 'laposte_content_width', 0 );

/* ─── Enqueue Scripts & Styles ──────────────────────────────────────────── */
function laposte_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'laposte-fonts',
        'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap',
        [],
        null
    );

    // Global stylesheet (style.css)
    wp_enqueue_style(
        'laposte-style',
        get_stylesheet_uri(),
        [ 'laposte-fonts' ],
        LAPOSTE_VERSION
    );

    // Homepage specific CSS
    if ( is_front_page() ) {
        wp_enqueue_style(
            'laposte-home',
            LAPOSTE_URI . '/assets/css/home.css',
            [ 'laposte-style' ],
            LAPOSTE_VERSION
        );
        wp_enqueue_script(
            'laposte-home',
            LAPOSTE_URI . '/assets/js/home.js',
            [],
            LAPOSTE_VERSION,
            true
        );
        // Pass data to JS
        wp_localize_script( 'laposte-home', 'laposteData', [
            'ajaxUrl'     => admin_url( 'admin-ajax.php' ),
            'trackingUrl' => home_url( '/suivi-colis/' ),
            'nonce'       => wp_create_nonce( 'laposte_nonce' ),
        ] );
    }

    // Global CSS
    wp_enqueue_style(
        'laposte-global',
        LAPOSTE_URI . '/assets/css/global.css',
        [ 'laposte-style' ],
        LAPOSTE_VERSION
    );

    // Global JS (nav, accessibility)
    wp_enqueue_script(
        'laposte-global',
        LAPOSTE_URI . '/assets/js/global.js',
        [],
        LAPOSTE_VERSION,
        true
    );

    // Comment reply
    if ( is_singular() && comments_open() ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'laposte_enqueue_assets' );

/* ─── Widget Areas ────────────────────────────────────────────────── */
function laposte_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Sidebar', 'laposte' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ] );
    register_sidebar( [
        'name'          => __( 'Footer Colonne 1', 'laposte' ),
        'id'            => 'footer-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget__title">',
        'after_title'   => '</h4>',
    ] );
    register_sidebar( [
        'name'          => __( 'Footer Colonne 2', 'laposte' ),
        'id'            => 'footer-2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget__title">',
        'after_title'   => '</h4>',
    ] );
    register_sidebar( [
        'name'          => __( 'Footer Colonne 3', 'laposte' ),
        'id'            => 'footer-3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget__title">',
        'after_title'   => '</h4>',
    ] );
}
add_action( 'widgets_init', 'laposte_widgets_init' );

/* ─── Custom Post Types ─────────────────────────────────────────────── */
function laposte_register_post_types() {
    // Agences
    register_post_type( 'laposte_agence', [
        'labels'      => [
            'name'          => __( 'Agences', 'laposte' ),
            'singular_name' => __( 'Agence', 'laposte' ),
        ],
        'public'      => true,
        'has_archive' => true,
        'supports'    => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'menu_icon'   => 'dashicons-location',
        'rewrite'     => [ 'slug' => 'agences' ],
        'show_in_rest' => true,
    ] );

    // Services
    register_post_type( 'laposte_service', [
        'labels'      => [
            'name'          => __( 'Services', 'laposte' ),
            'singular_name' => __( 'Service', 'laposte' ),
        ],
        'public'      => true,
        'has_archive' => true,
        'supports'    => [ 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ],
        'menu_icon'   => 'dashicons-admin-generic',
        'rewrite'     => [ 'slug' => 'nos-services' ],
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'laposte_register_post_types' );

/* ─── Custom Taxonomies ─────────────────────────────────────────────── */
function laposte_register_taxonomies() {
    register_taxonomy( 'laposte_region', 'laposte_agence', [
        'labels'       => [
            'name'          => __( 'Régions', 'laposte' ),
            'singular_name' => __( 'Région', 'laposte' ),
        ],
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'region' ],
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'laposte_register_taxonomies' );

/* ─── Options Page (ACF ou custom) ─────────────────────────────────────────── */
function laposte_register_options() {
    register_setting( 'laposte_options', 'laposte_livraisons_jour',   [ 'default' => '2 847' ] );
    register_setting( 'laposte_options', 'laposte_nb_agences',        [ 'default' => '647' ] );
    register_setting( 'laposte_options', 'laposte_nb_clients',        [ 'default' => '3,2M' ] );
    register_setting( 'laposte_options', 'laposte_hero_title',        [ 'default' => 'Votre courrier, partout au Sénégal et dans le monde.' ] );
    register_setting( 'laposte_options', 'laposte_hero_desc',         [ 'default' => 'Services postaux, transferts d\'argent et solutions numériques pour 17 millions de Sénégalais.' ] );
}
add_action( 'admin_init', 'laposte_register_options' );

function laposte_add_options_page() {
    add_menu_page(
        __( 'La Poste — Options', 'laposte' ),
        __( 'La Poste', 'laposte' ),
        'manage_options',
        'laposte-options',
        'laposte_render_options_page',
        'dashicons-email-alt',
        3
    );
}
add_action( 'admin_menu', 'laposte_add_options_page' );

function laposte_render_options_page() { ?>
<div class="wrap">
    <h1><?php _e( 'La Poste Sénégal — Paramètres', 'laposte' ); ?></h1>
    <form method="post" action="options.php">
        <?php settings_fields( 'laposte_options' ); ?>
        <table class="form-table">
            <tr><th><?php _e('Colis livrés aujourd\'hui', 'laposte'); ?></th>
                <td><input type="text" name="laposte_livraisons_jour" value="<?php echo esc_attr(get_option('laposte_livraisons_jour','2 847')); ?>" class="regular-text"/></td></tr>
            <tr><th><?php _e('Nombre d\'agences', 'laposte'); ?></th>
                <td><input type="text" name="laposte_nb_agences" value="<?php echo esc_attr(get_option('laposte_nb_agences','647')); ?>" class="regular-text"/></td></tr>
            <tr><th><?php _e('Nombre de clients', 'laposte'); ?></th>
                <td><input type="text" name="laposte_nb_clients" value="<?php echo esc_attr(get_option('laposte_nb_clients','3,2M')); ?>" class="regular-text"/></td></tr>
            <tr><th><?php _e('Titre Hero', 'laposte'); ?></th>
                <td><textarea name="laposte_hero_title" rows="3" class="large-text"><?php echo esc_textarea(get_option('laposte_hero_title')); ?></textarea></td></tr>
            <tr><th><?php _e('Description Hero', 'laposte'); ?></th>
                <td><textarea name="laposte_hero_desc" rows="3" class="large-text"><?php echo esc_textarea(get_option('laposte_hero_desc')); ?></textarea></td></tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php }

/* ─── Template helpers ────────────────────────────────────────────────── */
function laposte_get_opt( $key, $default = '' ) {
    return esc_html( get_option( $key, $default ) );
}

/* ─── AJAX: tracking colis ─────────────────────────────────────────────── */
function laposte_ajax_tracking() {
    check_ajax_referer( 'laposte_nonce', 'nonce' );
    $numero = sanitize_text_field( $_POST['numero'] ?? '' );
    if ( empty( $numero ) ) {
        wp_send_json_error( [ 'message' => __( 'Numéro de suivi manquant.', 'laposte' ) ] );
    }
    wp_send_json_success( [ 'redirect' => home_url( '/suivi-colis/?numero=' . urlencode( $numero ) ) ] );
}
add_action( 'wp_ajax_laposte_tracking',        'laposte_ajax_tracking' );
add_action( 'wp_ajax_nopriv_laposte_tracking', 'laposte_ajax_tracking' );

/* ─── SEO: meta description auto ─────────────────────────────────────────── */
function laposte_meta_description() {
    if ( is_front_page() ) {
        echo '<meta name="description" content="' . esc_attr__( 'Services postaux, financiers et numériques pour tous les Sénégalais. Suivi de colis, transferts d\'argent, courrier express.', 'laposte' ) . '">' . "\n";
    } elseif ( is_singular() ) {
        $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 25 );
        echo '<meta name="description" content="' . esc_attr( $excerpt ) . '">' . "\n";
    }
}
add_action( 'wp_head', 'laposte_meta_description' );

/* ─── Remove WordPress emoji bloat ─────────────────────────────────────────── */
remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles',     'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles',  'print_emoji_styles' );
