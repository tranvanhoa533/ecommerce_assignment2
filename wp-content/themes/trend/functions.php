<?php
/**
 * Trend functions and definitions
 *
 * @package Trend
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'trend_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function trend_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Trend, use a find and replace
     * to change 'trend' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'trend', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );


    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_attr__( 'Primary Menu', 'trend' ),
        'footer'  => esc_attr__( 'Footer Menu', 'trend' ),
    ) );

    global $trend_redux;


    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

    /*
     * Enable support for Post Formats.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'trend_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif; // trend_setup
add_action( 'after_setup_theme', 'trend_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function trend_widgets_init() {

    global $trend_redux;

    register_sidebar( array(
        'name'          => esc_attr__( 'Sidebar', 'trend' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_attr__( 'Woocommerce sidebar', 'trend' ),
        'id'            => 'woocommerce',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_attr__( 'Before footer #1', 'trend' ),
        'id'            => 'before_footer_1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_attr__( 'Before footer #2', 'trend' ),
        'id'            => 'before_footer_2',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_attr__( 'Before footer #3', 'trend' ),
        'id'            => 'before_footer_3',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_attr__( 'Before footer #4', 'trend' ),
        'id'            => 'before_footer_4',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );

    if (isset($trend_redux['dynamic_sidebars'])){
        foreach ($trend_redux['dynamic_sidebars'] as &$value) {
            $id           = str_replace(' ', '', $value);
            $id_lowercase = strtolower($id);
            if ($id_lowercase) {
                register_sidebar( array(
                    'name'          => $value,
                    'id'            => $id_lowercase,
                    'description'   => '',
                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }

    for ($i=1; $i <= intval( $trend_redux['trend_number_of_footer_columns'] ) ; $i++) { 
        register_sidebar( array(
            'name'          => 'Footer '.$i,
            'id'            => 'footer_column_'.$i,
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ) );
    }
}
add_action( 'widgets_init', 'trend_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function trend_scripts() {
    global $trend_redux;

    $skin_color = 'default';
    if(isset($trend_redux['trend_skin_color'])){
        $skin_color = $trend_redux['trend_skin_color'];
        
    }

    add_filter( 'body_class','trend_skin_body_class' );
    function trend_skin_body_class( $classes ) {
        global $trend_redux;
        $skin_color = $trend_redux['trend_skin_color'];

            $skin_hexa  = 'skin_00ADEF';
            if ($skin_color == 'default') {
                $skin_hexa  = 'skin_00ADEF';
            }elseif ($skin_color == 'green') {
                $skin_hexa  = 'skin_2DCC70';
            }elseif ($skin_color == 'turquoise') {
                $skin_hexa  = 'skin_1BBC9B';
            }elseif ($skin_color == 'grey') {
                $skin_hexa  = 'skin_95A5A5';
            }elseif ($skin_color == 'orange') {
                $skin_hexa  = 'skin_E77E23';
            }elseif ($skin_color == 'red') {
                $skin_hexa  = 'skin_E84C3D';
            }elseif ($skin_color == 'yellow') {
                $skin_hexa  = 'skin_F1C40F';
            }

            $classes[] = $skin_hexa; 
        return $classes;
    }

    //STYLESHEETS
    wp_enqueue_style( "trend-font-awesome", get_template_directory_uri().'/css/font-awesome.min.css' );
    wp_enqueue_style( "trend-responsive", get_template_directory_uri().'/css/responsive.css' );
    wp_enqueue_style( "trend-media-screens", get_template_directory_uri().'/css/media-screens.css' );
    wp_enqueue_style( "trend-owl-carousel", get_template_directory_uri().'/css/owl.carousel.css' );
    wp_enqueue_style( "trend-owl-theme", get_template_directory_uri().'/css/owl.theme.css' );
    wp_enqueue_style( "trend-animate", get_template_directory_uri().'/css/animate.css' );
    wp_enqueue_style( "travelogue-style", get_template_directory_uri().'/css/style.css' );
    wp_enqueue_style( "trend-skin-color", get_template_directory_uri().'/css/skin-colors/skin-'.$skin_color.'.css' );
    wp_enqueue_style( 'trend-style', get_stylesheet_uri() );

    //SCRIPTS
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'trend-modernizr-custom-js', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '2.6.2', true );
    wp_enqueue_script( 'trend-classie-js', get_template_directory_uri() . '/js/classie.js', array(), '1.0', true );
    wp_enqueue_script( 'trend-jquery-form-js', get_template_directory_uri() . '/js/jquery.form.js', array(), '3.51', true );
    wp_enqueue_script( 'trend-jquery-ketchup-js', get_template_directory_uri() . '/js/jquery.ketchup.all.min.js', array(), '0.3.1', true );
    wp_enqueue_script( 'trend-jquery-validate-js', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), '1.13.1', true );
    wp_enqueue_script( 'trend-sticky-js', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '1.0.0', true );
    wp_enqueue_script( 'trend-uisearch-js', get_template_directory_uri() . '/js/uisearch.js', array(), '1.0.0', true );
    wp_enqueue_script( 'trend-flatshadow-js', get_template_directory_uri() . '/js/jquery.flatshadow.js', array(), '1.0.0', true );
    wp_enqueue_script( 'trend-parallax-js', get_template_directory_uri() . '/js/jquery.parallax.js', array(), '1.1.3', true );
    wp_enqueue_script( 'trend-appear-js', get_template_directory_uri() . '/js/count/jquery.appear.js', array(), '1.0.0', true );
    wp_enqueue_script( 'trend-countTo-js', get_template_directory_uri() . '/js/count/jquery.countTo.js', array(), '1.0.0', true );
    wp_enqueue_script( 'trend-owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'trend-modernizr-viewport-js', get_template_directory_uri() . '/js/modernizr.viewport.js', array(), '2.6.2', true );
    wp_enqueue_script( 'trend-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.1', true );
    wp_enqueue_script( 'trend-animate-js', get_template_directory_uri() . '/js/animate.js', array(), '1.0.0', true );
    wp_enqueue_script( 'trend-googleapis-js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAl-EDTJ5_uU3zBIX7-wNTu-qSZr1DO5Dw', array(), '1.0.0', true );
    wp_enqueue_script( 'trend-google-maps-v3-js', get_template_directory_uri() . '/js/google-maps-v3.js', array(), '1.0.0', true );
    wp_enqueue_script( 'trend-custom-js', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true );

    wp_enqueue_script( 'trend-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
    wp_enqueue_script( 'trend-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'trend_scripts' );


function enqueue_admin_scripts( $hook ) {
    if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
        wp_enqueue_style( "admin-style-css", get_template_directory_uri().'/css/admin-style.css' );
        wp_enqueue_style( "av-colorpicker-css", get_template_directory_uri().'/css/colorpicker.css' );
        wp_enqueue_script( "av-colorpicker-js", get_template_directory_uri().'/js/colorpicker.js' , array( 'jquery' ) );
    }
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// DEMO IMPORTER
// require get_template_directory() . '/inc/demo-importer/init.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Cumstom metaboxes file.
 */
require get_template_directory() . '/inc/post-types/custom-metaboxes.php';


/**
 * Include the TGM_Plugin_Activation class.
 */
require get_template_directory().'/inc/tgm/include_plugins.php';
/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'trend_vcSetAsTheme' );
function trend_vcSetAsTheme() {
    vc_set_as_theme( true );
}


add_action( 'vc_base_register_front_css', 'trend_enqueue_front_css_foreever' );

function trend_enqueue_front_css_foreever() {
    wp_enqueue_style( 'js_composer_front' );
}

/* ========= LOAD - REDUX - FRAMEWORK ===================================== */
require_once(dirname(__FILE__).'/redux-framework/trend-config.php');


/* ========= SHORTCODES ===================================== */
require get_template_directory() . '/inc/shortcodes/shortcodes.php';

/* ========= WIDGETS ===================================== */
require get_template_directory() . '/inc/widgets/widgets.php';

/* ========= CUSTOM COMMENTS ===================================== */
require get_template_directory() . '/inc/custom-comments.php';

/* ========= RESIZE IMAGES ===================================== */
add_image_size( 'member_pic350x350',        350, 350, true );
add_image_size( 'testimonials_pic110x110',  110, 110, true );
add_image_size( 'portfolio_pic400x400',     400, 400, true );
add_image_size( 'featured_post_pic500x230', 500, 230, true );
add_image_size( 'related_post_pic500x300',  500, 300, true );
add_image_size( 'post_pic700x450',          700, 450, true );
add_image_size( 'portfolio_pic500x350',     500, 350, true );
add_image_size( 'portfolio_pic700x450',     700, 450, true );
add_image_size( 'single_post_pic900x300',   900, 300, true );
add_image_size( 'portfolio_pic900x500',     900, 500, true );
add_image_size( 'post_widget_pic70x70',     70, 70, true );
add_image_size( 'pic100x75',                100, 75, true );

/* ========= THEME SUPPORT - THUMBNAILS ===================================== */
add_theme_support('post-thumbnails');

/* ========= LIMIT POST CONTENT ===================================== */
function trend_excerpt_limit($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}

/* ========= BREADCRUMBS ===================================== */
function trend_breadcrumb() {
    global $trend_redux;

    if ( !$trend_redux['trend-enable-breadcrumbs'] ) {
        return false;
    }

    #$delimiter = '' . $trend_redux['breadcrumbs-delimitator'] . ' ';
    $delimiter = '';
    //text for the 'Home' link
    $name = esc_attr__("Home", "trend");
    $currentBefore = '<li class="active">';
    $currentAfter = '</li>';
        if (!is_home() && !is_front_page() || is_paged()) {
            global $post;
            $home = home_url();
            echo '<li><a href="' . $home . '">' . $name . '</a></li> ' . $delimiter . '';
        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, true, '' . $delimiter . ''));
            echo  $currentBefore . single_cat_title('', false) . $currentAfter;
        } elseif (is_day()) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . '';
            echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
            echo  $currentBefore . get_the_time('d') . $currentAfter;
        } elseif (is_month()) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . '';
            echo  $currentBefore . get_the_time('F') . $currentAfter;
        } elseif (is_year()) {
            echo  $currentBefore . get_the_time('Y') . $currentAfter;
        } elseif (is_attachment()) {
            echo  $currentBefore;
            the_title();
            $currentAfter;
        } elseif (class_exists( 'WooCommerce' ) && is_shop()) {
            echo  $currentBefore;
            echo esc_attr__('Shop','trend');
            $currentAfter;
        } elseif ( get_post_type() == 'Post Type Name' ) {
                echo  $delimiter;
                echo get_the_term_list($post->ID, 'Custom Taxonomy Name', ' ', ', ', ' ' . $delimiter . ' ');
                the_title();      
        } elseif (is_single()) {
            if (get_the_category()) {
                $cat = get_the_category();
                $cat = $cat[0];
                echo '<li>' . get_category_parents($cat, true, ' ' . $delimiter . '') . '</li>';
            }
            echo  $currentBefore;
            the_title();
            echo  $currentAfter;
        } elseif (is_page() && !$post->post_parent) {
            echo  $currentBefore;
            the_title();
            echo  $currentAfter;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb)
                echo  $crumb . ' ' . $delimiter . ' ';
            echo  $currentBefore;
            the_title();
            echo  $currentAfter;
        } elseif (is_search()) {
            echo  $currentBefore . get_search_query() . $currentAfter;
        } elseif (is_tag()) {
            echo  $currentBefore . single_tag_title( '', false ) . $currentAfter;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo  $currentBefore . $userdata->display_name . $currentAfter;
        } elseif (is_404()) {
            echo  $currentBefore . esc_attr__('404 Not Found','trend') . $currentAfter;
        }
        if (get_query_var('paged')) {
            if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo  $currentBefore;
            echo esc_attr__('Page','trend') . ' ' . get_query_var('paged');
            if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo  $currentAfter;
        }
    }
}

/* ========= WOOCOMMERCE SUPPORT ===================================== */
add_theme_support( 'woocommerce' );

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
function trend_woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
?>
<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','trend' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
<?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
} 
add_filter( 'woocommerce_add_to_cart_fragments', 'trend_woocommerce_header_add_to_cart_fragment' );


// SINGLE PRODUCT
// Unhook functions
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

// Hook functions
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

/* ========= PAGINATION ===================================== */
if ( ! function_exists( 'trend_pagination' ) ) {
    function trend_pagination($query = null) {

        if (!$query) {
            global $wp_query;
            $query = $wp_query;
        }
        
        $big = 999999999; // need an unlikely integer
        $current = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : '1');
        echo paginate_links( 
            array(
                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'        => '?paged=%#%',
                'current'       => max( 1, $current ),
                'total'         => $query->max_num_pages,
                'prev_text'     => esc_attr__('&#171;','urbanpoint'),
                'next_text'     => esc_attr__('&#187;','urbanpoint'),
            ) 
        );
    }
}

/* ========= SEARCH FOR POSTS ONLY ===================================== */
function trend_search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','trend_search_filter');

/* ========= DYNAMIC FEATURED IMAGE ON PORTFOLIO CUSTOM POSTS ONLY ===================================== */
function trend_filter_post_types() {
    return array('portfolio'); 
}
add_filter('dfi_post_types', 'trend_filter_post_types');


/* ========= REGISTER FONT-AWESOME TO REDUX ===================================== */
function trend_register_fontawesome_to_redux() {
    wp_register_style( 'redux-font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), time(), 'all' );  
    wp_enqueue_style( 'redux-font-awesome' );
}
// This example assumes the opt_name is set to redux_demo.  Please replace it with your opt_name value.
add_action( 'redux/page/redux_demo/enqueue', 'trend_register_fontawesome_to_redux' );


/* Custom functions for woocommerce */

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

function woocommerce_show_top_custom_block() {
    $args = array();
    echo '<div class="thumbnail-and-details">';    
              
        wc_get_template( 'loop/sale-flash.php' );
        
        echo '<div class="hover-container">';
            echo '<div class="thumbnail-overlay"></div>';
            echo '<div class="hover-components">';

                echo '<div class="component add-to-cart">';
                    wc_get_template( 'loop/add-to-cart.php' , $args );
                echo '</div>';
                echo '<div class="component wishlist">';
                    echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
                echo '</div>';
                echo '<div class="component compare">';
                    echo do_shortcode( '[yith_compare_button]' );
                echo '</div>';

            echo '</div>';
        echo '</div>';
        echo woocommerce_get_product_thumbnail();

        echo '<div class="details-review-container details-item">';
            wc_get_template( 'loop/rating.php' );
        echo '</div>';
    echo '</div>';

}
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_top_custom_block' );


function woocommerce_show_price_and_review() {
    echo '<div class="details-container">';
        echo '<div class="details-price-container details-item">';
            wc_get_template( 'loop/price.php' );
        echo '</div>';
    echo '</div>';
}
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_price_and_review' );


function trend_woocommerce_get_sidebar() {
    global $trend_redux;

    if ( is_shop() ) {
        $sidebar = $trend_redux['trend_shop_layout_sidebar'];
    }elseif ( is_product() ) {
        $sidebar = $trend_redux['trend_single_shop_sidebar'];
    }else{
        $sidebar = 'woocommerce';
    }

    dynamic_sidebar( $sidebar );

}
add_action ( 'woocommerce_sidebar', 'trend_woocommerce_get_sidebar' );

add_filter( 'loop_shop_columns', 'trend_wc_loop_shop_columns', 1, 10 );

/*
 * Return a new number of maximum columns for shop archives
 * @param int Original value
 * @return int New number of columns
 */
function trend_wc_loop_shop_columns( $number_columns ) {
    global $trend_redux;

    if ( $trend_redux['trend-shop-columns'] ) {
        return $trend_redux['trend-shop-columns'];
    }else{
        return 3;
    }
}

global $trend_redux;
if ( isset($trend_redux['trend-enable-related-products']) && !$trend_redux['trend-enable-related-products'] ) {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
}

add_filter( 'woocommerce_output_related_products_args', 'trend_related_products_args' );
  function trend_related_products_args( $args ) {
    global $trend_redux;

    $args['posts_per_page'] = $trend_redux['trend-related-products-number'];
    $args['columns'] = 3;
    return $args;
}

function show_whislist_button_on_single() {
    echo '<div class="wishlist-container">';
        echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
    echo '</div>';
}
add_action( 'woocommerce_single_product_summary', 'show_whislist_button_on_single', 36 );



//To change wp_register() text:
add_filter('register','trend_register_text_change');
function trend_register_text_change($text) {
    $register_text_before   = esc_attr__('Site Admin', 'trend');
    $register_text_after    = esc_attr__('Edit Your Profile', 'trend');

    $text = str_replace($register_text_before, $register_text_after ,$text);

    return $text;
}
//To change wp_loginout() text:
add_filter('loginout','trend_loginout_text_change');
function trend_loginout_text_change($text) {
    $login_text_before  = esc_attr__('Log in', 'trend');
    $login_text_after   = esc_attr__('Login', 'trend');

    $logout_text_before = esc_attr__('Log', 'trend');
    $logout_text_after  = esc_attr__('Log', 'trend');

    $text = str_replace($login_text_before, $login_text_after ,$text);
    $text = str_replace($logout_text_before, $logout_text_after ,$text);
    return $text;
}

function trend_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'trend_add_editor_styles' );




// MEGA MAIN MENU
if ( class_exists( 'mega_main_init' ) ) {

    // echo "stringxxx";

    function trend_set_mmm_configuration ( $default_configuration ) {
        // Get configuration of the plugin that is stored in the DataBase.
        $saved_configuration = get_option( 'mega_main_menu_options' );
        if ( $saved_configuration === false ) { // If you do not have a saved configuration in the database - do your code.
            $theme_custom_configuration = $default_configuration;
            $menu_location_name = 'primary'; // name of menu location of your theme.
            // $menu_location_name = 'primary-menu'; // name of menu location of your theme.

            // FEW EXAMPLES
            // Format of the checkbox option
            $theme_custom_configuration[ 'mega_menu_locations' ] = array( $menu_location_name );
            // $theme_custom_configuration[ 'responsive_styles' ] = array( 'true' );
            // $theme_custom_configuration[ $menu_location_name . '_sticky_offset' ] = array( 1 );
            // $theme_custom_configuration[ $menu_location_name . '_first_level_item_height_sticky' ] = array( 80 );
            // $theme_custom_configuration[ $menu_location_name . '_mobile_label' ] = array( 'MENU' );
            // $theme_custom_configuration[ $menu_location_name . '_first_level_separator' ] = array( 'none' );

            // Format of the input_text, textarea, radio option
            $theme_custom_configuration[ 'custom_css' ] = '.theme_custom_class #mega_main_menu { margin: 10px; }';
            // $theme_custom_configuration[ 'logo_src' ] = 'http://trendwp.modeltheme.com/woo/wp-content/themes/trend/images/1logo-blue.png';
            

            #Skin Options of the Initial Container 
            #Background Gradient (Color) of the primary container 
            $theme_custom_configuration[ $menu_location_name . '_menu_bg_gradient' ] = array( 'color1' => 'rgba(66,139,202,0)', 'color2' => 'rgba(42,100,150,0)', 'start' => '0', 'end' => '100', 'orientation' => 'top' ); 
            


            #FIRST LEVEL ITEMS
            #Font of the First Level Item
            $theme_custom_configuration[ $menu_location_name . '_menu_first_level_link_font' ] = array( 'font_family' => 'Inherit', 'font_size' => '14', 'font_weight' => '700' ); 
            #Text color of the first level item
            $theme_custom_configuration[ $menu_location_name . '_menu_first_level_link_color' ] = '#393939'; 
            #Icons in the first level item
            $theme_custom_configuration[ $menu_location_name . '_menu_first_level_icon_font' ] = '15'; 
            #Background Gradient (Color) of the first level item
            $theme_custom_configuration[ $menu_location_name . '_menu_first_level_link_bg' ] = array( 'color1' => 'rgba(66,139,202,0)', 'color2' => 'rgba(42,100,150,0)', 'start' => '0', 'end' => '100', 'orientation' => 'top' );
            #Text color of the active first level item
            $theme_custom_configuration[ $menu_location_name . '_menu_first_level_link_color_hover' ] = 'rgba(57,57,57,1)';
            #Background Gradient (Color) of the active first level item
            $theme_custom_configuration[ $menu_location_name . '_menu_first_level_link_bg_hover' ] = array( 'color1' => 'rgba(52,152,219,0)', 'color2' => 'rgba(41,128,185,0)', 'start' => '2', 'end' => '0', 'orientation' => 'top' );
            #Background color of the Search Box
            $theme_custom_configuration[ $menu_location_name . '_menu_search_bg' ] = 'rgba(52,152,219,0)';
            #Text and icon color of the Search Box
            $theme_custom_configuration[ $menu_location_name . '_menu_search_color' ] = '#393939';




            #DROPDOWNS 
            #Background Gradient (Color) of the Dropdown Area
            $theme_custom_configuration[ $menu_location_name . '_menu_dropdown_wrapper_gradient' ] = array( 'color1' => '#2D3E50', 'color2' => '#2D3E50', 'start' => '0', 'end' => '100', 'orientation' => 'top' ); 
            #Font of the dropdown menu item
            $theme_custom_configuration[ $menu_location_name . '_menu_dropdown_link_font' ] = array( 'font_family' => 'Inherit', 'font_size' => '14', 'font_weight' => '300' );
            #Text color of the dropdown menu item
            $theme_custom_configuration[ $menu_location_name . '_menu_dropdown_link_color' ] = 'rgba(255,255,255,0.9)';
            #Icons of the dropdown menu item
            $theme_custom_configuration[ $menu_location_name . '_menu_dropdown_icon_font' ] = array( 'font_size' => '12');
            #Background Gradient (Color) of the dropdown menu item
            $theme_custom_configuration[ $menu_location_name . '_menu_dropdown_link_bg' ] = array( 'color1' => 'rgba(255,255,255,0)', 'color2' => 'rgba(255,255,255,0)', 'start' => '0', 'end' => '100', 'orientation' => 'top' ); 
            #Border color between dropdown menu items
            $theme_custom_configuration[ $menu_location_name . '_menu_dropdown_link_border_color' ] = '#f0f0f0';
            #Text color of the dropdown active menu item
            $theme_custom_configuration[ $menu_location_name . '_menu_dropdown_link_color_hover' ] = 'rgba(255,255,255,0.9)';
            #Background Gradient (Color) of the dropdown active menu item
            $theme_custom_configuration[ $menu_location_name . '_menu_dropdown_link_bg_hover' ] = array( 'color1' => 'rgba(52,152,219,0)', 'color2' => 'rgba(41,128,185,0)', 'start' => '0', 'end' => '100', 'orientation' => 'top' );
            #Plain Text Color of the Dropdown
            $theme_custom_configuration[ $menu_location_name . '_menu_dropdown_plain_text_color' ] = '#333333';

            $theme_custom_configuration[ $menu_location_name . '_included_components' ] = array( '' );
            $theme_custom_configuration[ $menu_location_name . '_sticky_status' ] = array( 'false' );
            $theme_custom_configuration[ $menu_location_name . '_dropdowns_animation' ] = array( 'anim_4' );
            $theme_custom_configuration[ 'submenu_type' ] = array( 'false' );
            $theme_custom_configuration[ 'submenu_columns' ] = array( 'false' );
            $theme_custom_configuration[ 'submenu_enable_full_width' ] = array( 'false' );
            $theme_custom_configuration[ 'item_icon' ] = array( 'false' );
            $theme_custom_configuration[ 'indefinite_location_mode' ] = array( 'false' );











            add_option( 'mega_main_menu_options', $theme_custom_configuration );
        } else { // If you have configuration stored in the DataBase - do nothing.
            return false;
        }
    }
    add_filter( 'mmm_set_configuration', 'trend_set_mmm_configuration' );
}




function trendRemoveDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'trendRemoveDemoModeLink');





// REMOVE VC Parallax Notices
if ( class_exists('GambitVCParallaxBackgrounds') ) {
    defined( 'GAMBIT_DISABLE_RATING_NOTICE' ) or define( 'GAMBIT_DISABLE_RATING_NOTICE', true );
}

add_filter( 'register_url', 'custom_register_url' );
function custom_register_url( $register_url )
{
    $register_url = site_url('/index.php/sign-up');//'http://localhost/wordpress/index.php/sign-up';
    return $register_url;
}
add_filter( 'login_url', 'custom_login_page', 10, 2 );
function custom_login_page ( $login_url, $redirect ) {
    $login_url = site_url('/index.php/sign-in');//'http://localhost/wordpress/index.php/login';
    return $login_url;
}
?>