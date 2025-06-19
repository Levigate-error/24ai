<?php
/**
 * orm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package orm
 */

include_once(WP_PLUGIN_DIR.'/advanced-custom-fields/acf.php');

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '12.4.26' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function orm_setup() {
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on orm, use a find and replace
        * to change 'orm' to the name of your theme in all the template files.
        */
    load_theme_textdomain( 'orm', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support( 'title-tag' );

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'orm' ),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'orm_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action( 'after_setup_theme', 'orm_setup' );

function add_og_image_meta_tag() {

    if (carbon_get_theme_option('og_image_url'))
    {
        echo '<meta property="og:image" content="' . esc_url(carbon_get_theme_option('og_image_url')) . '" />';
    }




}
add_action('wp_head', 'add_og_image_meta_tag');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function orm_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'orm_content_width', 640 );
}
add_action( 'after_setup_theme', 'orm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function orm_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'orm' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'orm' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'orm_widgets_init' );

/* обрезка заголовка */
function get_short_title($maxchar = 30){
    $title = get_the_title();
    if( iconv_strlen($title, 'utf-8') < $maxchar )
        return $title;
    //    $title = iconv_substr( $title, 0, $maxchar, 'utf-8' );
    $title = substr($title, 0, $maxchar);
    $title = preg_replace('@(.*)\s[^\s]*$@s', '\\1...', $title);

    return $title;
}

/* обрезка описания */
function get_short_desk($maxchar = 50){
    $desk = get_the_excerpt();
    if( iconv_strlen($desk, 'utf-8') < $maxchar )
        return $desk;
    //    $desk = iconv_substr( $desk, 0, $maxchar, 'utf-8' );
    $desk = substr($desk, 0, $maxchar);
    $desk = preg_replace('@(.*)\s[^\s]*$@s', '\\1...', $desk);

    return $desk;
}

function eng_date( $tdate = '' ) {
    if ( substr_count($tdate , '---') > 0 ) return str_replace('---', '', $tdate);

    $treplace = array (
        "января" => "January",
        "февраля" => "February",
        "марта" => "March",
        "апреля" => "April",
        "мая" => "May",
        "июня" => "June",
        "июля" => "July",
        "августа" => "August",
        "сентября" => "September",
        "октября" => "October",
        "ноября" => "November",
        "декабря" => "December",
    );
    return strtr($tdate, $treplace);
}

add_filter('get_the_date', 'eng_date');
add_filter( 'excerpt_length', function(){
    return 17;
});
add_filter( 'excerpt_more', fn() => '...' );

add_filter('comment_form_default_fields', function($fields) {
    unset($fields['author'], $fields['email'], $fields['url']);
    return $fields;
});

add_filter('pre_comment_approved', function($approved, $commentdata) {
    return 1; // 1 = опубликован
}, 10, 2);

add_filter('home_url', function($url, $path, $orig_scheme, $blog_id) {
    return 'https://24ai.tech/ru/' . $path;
}, 10, 4);

remove_action('comment_form', 'comment_form_cookie_consent');

function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
    require_once('carbon-fields/theme-options.php');
    require_once('carbon-fields/post-fields.php');
}
add_action( 'after_setup_theme', 'crb_load' );

function posts_filters(){
    $catName = $_POST['category'];
    $args = array(
        'post_type'      => 'post',
        'category_name'  => $catName,
        'posts_per_page' => 8,
    );
    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
        while( $query->have_posts() ): $query->the_post();
            get_template_part( "template-parts/article-card" );
        endwhile;
        wp_reset_postdata();
        //	else :
        //		$errorFilter = 'No records found';
        //		echo '<p class="page__blog--item__title error_filter">'.$errorFilter.'</p>';
    endif;

    die();
}
add_action('wp_ajax_filter_posts', 'posts_filters');
add_action('wp_ajax_nopriv_filter_posts', 'posts_filters');

function load_posts() {
    $args = json_decode( $_POST["query"] , true );
    $args["paged"] = $_POST["page"] + 1;
    $args["category_name"] = $_POST['category'];
    $args["posts_per_page"] = 8;

    $posts = new WP_Query( $args );

    $html  = '';

    if($posts->have_posts()) {
        while ($posts->have_posts()) : $posts->the_post();
            $html .= get_template_part( "template-parts/article-card" );
        endwhile;
    }

    wp_reset_postdata();
    die( $html );
}
add_action( "wp_ajax_load_more", "load_posts" );
add_action( "wp_ajax_nopriv_load_more", "load_posts" );

/**
 * Enqueue scripts and styles.
 */
function orm_scripts() {
    //	wp_enqueue_style( 'orm-style', get_stylesheet_uri(), array(), _S_VERSION );
    //	wp_style_add_data( 'orm-style', 'rtl', 'replace' );

    //Image Compare 1
//	wp_enqueue_style('image-compare-css', 'https://unpkg.com/image-compare-viewer@1.5.0/dist/image-compare-viewer.min.css', array(), _S_VERSION);
//	wp_enqueue_script( 'image-compare-js', 'https://unpkg.com/image-compare-viewer@1.5.0/dist/image-compare-viewer.min.js', array(), _S_VERSION, true );

    wp_enqueue_style('image-compare-css',get_template_directory_uri() . '/css/image-compare-viewer.min.css', array(), _S_VERSION);
    wp_enqueue_script( 'image-compare-js', 'https://unpkg.com/image-compare-viewer@1.6.2/dist/image-compare-viewer.min.js', array(), _S_VERSION, true );




    wp_enqueue_style('swiper', get_template_directory_uri() . '/css/swiper-bundle.min.css', array(), _S_VERSION);
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.min.css', array(), _S_VERSION);
    wp_enqueue_style('intlTelInput', get_template_directory_uri() . '/css/intlTelInput.min.css', array(), _S_VERSION);
    wp_enqueue_style('style', get_template_directory_uri() . '/css/home_page.min.css', array(), _S_VERSION);
    wp_enqueue_style('media-css', get_template_directory_uri() . '/css/media_page.min.css', array(), _S_VERSION . '1');

    //	wp_enqueue_style('media_all-css', get_template_directory_uri() . '/css/all_media.css', array(), _S_VERSION);

    //components
    wp_enqueue_style('content-tabs-css', get_template_directory_uri() . '/css/components/content-tabs/content-tabs.css', array(), _S_VERSION);
    wp_enqueue_style('footer-css', get_template_directory_uri() . '/css/components/new-components/footer.css', array(), _S_VERSION);
    wp_enqueue_style('irtc-css', get_template_directory_uri() . '/css/components/irtc/irtc.css', array(), _S_VERSION);
    wp_enqueue_style('hero-upload-css', get_template_directory_uri() . '/css/components/hero-upload/hero-upload.css', array(), _S_VERSION);
    wp_enqueue_style('old_components-css', get_template_directory_uri() . '/css/components/new-components/old_components.css', array(), _S_VERSION);
    wp_enqueue_style('new_testimonials-css', get_template_directory_uri() . '/css/components/new-components/new_testimonials.css', array(), _S_VERSION);
//    wp_enqueue_style('new-footer-css', get_template_directory_uri() . '/css/components/new-components/new-footer.css', array(), _S_VERSION);
    wp_enqueue_style('tools-page-css', get_template_directory_uri() . '/css/components/new-components/tools-page.css', array(), _S_VERSION);
    wp_enqueue_style('grid-mobile1-css', get_template_directory_uri() . '/css/components/new-components/grid-mobile1.css', array(), _S_VERSION);
    wp_enqueue_style('card-1-row-5-column-css', get_template_directory_uri() . '/css/components/new-components/card-1-row-5-column.css', array(), _S_VERSION);
    wp_enqueue_style('row3-step-slider-css', get_template_directory_uri() . '/css/components/new-components/row3-step-slider.css', array(), _S_VERSION);
    wp_enqueue_style('breadcrumbs', get_template_directory_uri() . '/css/components/new-components/breadcrumbs.css', array(), _S_VERSION);
    wp_enqueue_style('questions', get_template_directory_uri() . '/css/components/new-components/questions.css', array(), _S_VERSION);
    wp_enqueue_style('before-after', get_template_directory_uri() . '/css/components/new-components/before-after.css', array(), _S_VERSION);
    wp_enqueue_style('tabbed-chess-css', get_template_directory_uri() . '/css/components/new-components/tabbed-chess.css', array(), _S_VERSION);
    wp_enqueue_style('tabbed-thumbs-gallery-css', get_template_directory_uri() . '/css/components/new-components/tabbed-thumbs-gallery.css', array(), _S_VERSION);
    wp_enqueue_style('post-page-options-css', get_template_directory_uri() . '/css/components/new-components/post-page-options.css', array(), _S_VERSION);
    wp_enqueue_style('agregator-css', get_template_directory_uri() . '/css/components/new-components/agregator.css', array(), _S_VERSION);
    wp_enqueue_style('custom-author', get_template_directory_uri() . '/css/custom-author.css', array(), _S_VERSION);

    if(is_rtl()){
        wp_enqueue_style('rtl-fix-css', get_template_directory_uri() . '/css/rtl-fix.css', array(), _S_VERSION);
    }

    wp_enqueue_script( 'orm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'jq',  'https://code.jquery.com/jquery-3.6.1.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'intlTelInput-js', get_template_directory_uri() . '/js/intlTelInput.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'jqueryinputmask-js', get_template_directory_uri() . '/js/jquery.inputmask.bundle.min.js', array(), _S_VERSION, true );
//	wp_enqueue_script( 'scroll-js', get_template_directory_uri() . '/js/scroll.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'scroll-js', get_template_directory_uri() . '/js/scroll.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'loading-attribute-polyfill', get_template_directory_uri() . '/js/loading-attribute-polyfill.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'grouploop-js', get_template_directory_uri() . '/js/grouploop-1.0.3.min.js', array(), _S_VERSION, true );
//	wp_enqueue_script( 'loading-attribute-polyfill', get_template_directory_uri() . '/js/loading-attribute-polyfill.min.js', array(), _S_VERSION, true );

    wp_enqueue_script( 'media-js', get_template_directory_uri() . '/js/media.min.js', array(), _S_VERSION, true );

    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/app.min.js', array(), _S_VERSION, true );

    if (is_page('24blog')){
        wp_enqueue_script( 'loadmore-js', get_template_directory_uri() . '/js/loadmore.js', array(), _S_VERSION, true );
    }

//	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/all_media.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'langswitcher-js', get_template_directory_uri() . '/js/langswitcher.js', array(), _S_VERSION, true );

    //	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    //		wp_enqueue_script( 'comment-reply' );
    //	}
}
add_action( 'wp_enqueue_scripts', 'orm_scripts' );

function mihdan_add_defer_attribute( $tag, $handle ) {

    $handles = array(
        'orm-navigation',
        'swiper-js',
        'jq',
        'intlTelInput-js',
        'jqueryinputmask-js',
        'scroll-js',
        'loading-attribute-polyfill',
        'grouploop-js',
        'loading-attribute-polyfill',
        'media-js',
        'loadmore-js',
        'main-js',
        'scripts',
    );

    foreach( $handles as $defer_script) {
        if ( $defer_script === $handle ) {
            return str_replace( ' src', ' defer="defer" src', $tag );
        }
    }

    return $tag;
}

add_filter( 'script_loader_tag', 'mihdan_add_defer_attribute', 10, 2 );
add_filter('preprocess_comment', function ($commentdata) {
    if (empty($commentdata['comment_author'])) {
        $commentdata['comment_author'] = 'Anonymous';
    }
    if (empty($commentdata['comment_author_email'])) {
        $commentdata['comment_author_email'] = 'anon@example.com';
    }
    return $commentdata;
});
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Shortcodes for this theme.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}


add_action( 'wp_ajax_loadmore', 'true_loadmore' );
add_action( 'wp_ajax_nopriv_loadmore', 'true_loadmore' );

function true_loadmore() {
    // Ensure valid AJAX request
    if (!isset($_POST["page"])) {
        wp_send_json_error(["message" => "Page number missing"]);
    }

    // Prepare query arguments
    $args = [
        "post_type"      => "post",
        "paged"          => intval($_POST["page"]),
        "posts_per_page"   => 8,
        "category_name" => $_POST["category"],
    ];

    // Run the query
    $posts = new WP_Query($args);

    if ($posts->have_posts()) {
        $html = '';

        while ($posts->have_posts()) {
            $posts->the_post();
            ob_start();
            get_template_part("template-parts/article-card");
            $html .= ob_get_clean();
        }

        wp_reset_postdata();

        wp_send_json_success(["html" => $html]); // Send JSON response
    } else {
        wp_send_json_error(["message" => "No more posts"]);
    }

    wp_die();
}


function get_params_string(){
    $get = $_GET;
    if(!empty($get)){
        $utm = '?';
        $index = 0;
        foreach($get as $key => $value){
            $index++;
            if($index != count($get)){
                $utm .= $key . '=' . $value . '&';
            }
            else{
                $utm .= $key . '=' . $value;
            }
        }
    }else{
        $utm = '';
    }
    return $utm;
}

function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}


function getLanguage(string $country): string {
    $subtags = \ResourceBundle::create('likelySubtags', 'ICUDATA', false);
    $country = \Locale::canonicalize($country);
    $locale = $subtags->get($country) ?: $subtags->get('und');
    return \Locale::getPrimaryLanguage($locale);
}


/*=============================================
                BREADCRUMBS
=============================================*/


function the_breadcrumb()
{
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&raquo;'; // delimiter between crumbs
    $home = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
<path d="M12.3334 5.6662C12.3334 5.48939 12.2632 5.31982 12.1381 5.19479C12.0131 5.06977 11.8435 4.99953 11.6667 4.99953C11.4899 4.99953 11.3203 5.06977 11.1953 5.19479C11.0703 5.31982 11.0001 5.48939 11.0001 5.6662H12.3334ZM3.00005 5.6662C3.00005 5.48939 2.92982 5.31982 2.80479 5.19479C2.67977 5.06977 2.5102 4.99953 2.33339 4.99953C2.15658 4.99953 1.98701 5.06977 1.86198 5.19479C1.73696 5.31982 1.66672 5.48939 1.66672 5.6662H3.00005ZM12.5287 7.47087C12.6545 7.5923 12.8229 7.6595 12.9977 7.65798C13.1725 7.65646 13.3397 7.58635 13.4633 7.46274C13.5869 7.33914 13.657 7.17193 13.6585 6.99713C13.66 6.82233 13.5928 6.65393 13.4714 6.5282L12.5287 7.47087ZM7.00005 0.999532L7.47139 0.528199C7.34637 0.403218 7.17683 0.333008 7.00005 0.333008C6.82328 0.333008 6.65374 0.403218 6.52872 0.528199L7.00005 0.999532ZM0.528721 6.5282C0.465047 6.5897 0.414259 6.66326 0.37932 6.7446C0.344381 6.82593 0.32599 6.91341 0.32522 7.00193C0.324451 7.09045 0.341319 7.17824 0.37484 7.26017C0.40836 7.3421 0.457862 7.41653 0.520457 7.47913C0.583053 7.54172 0.657487 7.59123 0.739418 7.62475C0.821349 7.65827 0.909135 7.67514 0.997655 7.67437C1.08617 7.6736 1.17365 7.65521 1.25499 7.62027C1.33633 7.58533 1.40989 7.53454 1.47139 7.47087L0.528721 6.5282ZM3.66672 13.6662H10.3334V12.3329H3.66672V13.6662ZM12.3334 11.6662V5.6662H11.0001V11.6662H12.3334ZM3.00005 11.6662V5.6662H1.66672V11.6662H3.00005ZM13.4714 6.5282L7.47139 0.528199L6.52872 1.47087L12.5287 7.47087L13.4714 6.5282ZM6.52872 0.528199L0.528721 6.5282L1.47139 7.47087L7.47139 1.47087L6.52872 0.528199ZM10.3334 13.6662C10.8638 13.6662 11.3725 13.4555 11.7476 13.0804C12.1227 12.7053 12.3334 12.1966 12.3334 11.6662H11.0001C11.0001 11.843 10.9298 12.0126 10.8048 12.1376C10.6798 12.2626 10.5102 12.3329 10.3334 12.3329V13.6662ZM3.66672 12.3329C3.48991 12.3329 3.32034 12.2626 3.19532 12.1376C3.07029 12.0126 3.00005 11.843 3.00005 11.6662H1.66672C1.66672 12.1966 1.87743 12.7053 2.25251 13.0804C2.62758 13.4555 3.13629 13.6662 3.66672 13.6662V12.3329Z" fill="white"/>
</svg>'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
        }
    } else {
        echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                $current_title = substr(get_the_title(), 12); // Remove the first 13 characters (including the additional character)
                echo ' ' . $delimiter . ' ' . $before . $current_title . $after;
            }
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</div>';
    }
} // end the_breadcrumb()

function register_author_post_type() {
    register_post_type('custom_author', [
        'labels' => [
            'name' => 'Авторы',
            'singular_name' => 'Автор',
            'add_new' => 'Добавить автора',
            'add_new_item' => 'Добавить нового автора',
            'edit_item' => 'Редактировать автора',
            'new_item' => 'Новый автор',
            'view_item' => 'Просмотреть автора',
            'search_items' => 'Искать автора',
            'not_found' => 'Авторы не найдены',
            'menu_name' => 'Авторы',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'author', 'with_front' => false],
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-users',
    ]);

    flush_rewrite_rules();
}
add_action('init', 'register_author_post_type');

function custom_author_template($template) {
    if (is_singular('author')) {
        $new_template = locate_template(array('single-custom_author.php'));
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'custom_author_template');

// redirection
function custom_page_redirect() {
    if (is_page() && in_the_loop()) {
        global $post;
        // Get the parent page
        $parent_page = get_page_by_path('tools');

        // Check if the current page has "tools" as its parent
        if ($parent_page && $post->post_parent == $parent_page->ID) {
            $new_url = home_url('/tools/' . $post->post_name);
            wp_redirect($new_url, 301);
            exit;
        }
    }
}

function add_post_view_count() {
    if (is_single() && get_post_type() === 'post') {
        $post_id = get_the_ID();
        $views = get_post_meta($post_id, 'views', true);
        $views = $views ? $views + 1 : 1;
        update_post_meta($post_id, 'views', $views);
    }
}
add_action('wp_head', 'add_post_view_count');

add_action('wp_head', function() {
    if (is_singular("custom_author")) {
        $author = get_queried_object();
        $name = esc_html(get_the_title($author->ID));
        ?>

        <title>Статьи от <?= $name ?> – Эксперт в нейросетях, AI-инструментах и улучшении изображений</title>
        <meta name="description" content="<?= $name ?> делится опытом работы с нейросетями, улучшением качества изображений и современными технологиями. Читайте статьи автора на 24AI, чтобы узнать больше о веб-дизайне, искусственном интеллекте и многом другом.">
        <?php
    }
}, 1);

add_action('template_redirect', 'custom_page_redirect');

//end redirection
add_action('template_redirect', 'redirect_percent_20_to_404');

function redirect_percent_20_to_404() {
    if (strpos($_SERVER['REQUEST_URI'], '%20') !== false) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        nocache_headers();
        include(get_query_template('404'));
        exit;
    }
}
