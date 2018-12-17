<?php
/**
 * ThemesGenerator functions and definitions
 */

/**
 * ThemesGenerator only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function themesgenerator_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/themesgenerator
	 * If you're building a theme based on ThemesGenerator, use a find and replace
	 * to change 'themesgenerator' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'themesgenerator' );

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

	add_image_size( 'themesgenerator-featured-image', 2000, 1200, true );

	add_image_size( 'themesgenerator-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'themesgenerator' ),
		'social' => __( 'Social Links Menu', 'themesgenerator' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', themesgenerator_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'themesgenerator' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'themesgenerator' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'themesgenerator' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'themesgenerator' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'themesgenerator' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters ThemesGenerator array of starter content.
	 *
	 * @since ThemesGenerator 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'themesgenerator_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'themesgenerator_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function themesgenerator_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( themesgenerator_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter ThemesGenerator content width of the theme.
	 *
	 * @since ThemesGenerator 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'themesgenerator_content_width', $content_width );
}
add_action( 'template_redirect', 'themesgenerator_content_width', 0 );

/**
 * Register custom fonts.
 */
function themesgenerator_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'themesgenerator' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since ThemesGenerator 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function themesgenerator_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'themesgenerator-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'themesgenerator_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function themesgenerator_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'themesgenerator' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'themesgenerator' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'themesgenerator' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'themesgenerator' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'themesgenerator' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'themesgenerator' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'themesgenerator_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since ThemesGenerator 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function themesgenerator_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'themesgenerator' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'themesgenerator_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since ThemesGenerator 1.0
 */
function themesgenerator_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'themesgenerator_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function themesgenerator_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'themesgenerator_pingback_header' );

/**
 * Display custom color CSS.
 */
function themesgenerator_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo themesgenerator_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'themesgenerator_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function themesgenerator_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'themesgenerator-fonts', themesgenerator_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'themesgenerator-style', get_stylesheet_uri() );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'themesgenerator-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'themesgenerator-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'themesgenerator-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'themesgenerator-style' ), '1.0' );
		wp_style_add_data( 'themesgenerator-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'themesgenerator-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'themesgenerator-style' ), '1.0' );
	wp_style_add_data( 'themesgenerator-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'themesgenerator-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$themesgenerator_l10n = array(
//		'quote'          => themesgenerator_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'themesgenerator-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$themesgenerator_l10n['expand']         = __( 'Expand child menu', 'themesgenerator' );
		$themesgenerator_l10n['collapse']       = __( 'Collapse child menu', 'themesgenerator' );
//		$themesgenerator_l10n['icon']           = themesgenerator_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'themesgenerator-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'themesgenerator-skip-link-focus-fix', 'themesgeneratorScreenReaderText', $themesgenerator_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'themesgenerator_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since ThemesGenerator 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function themesgenerator_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'themesgenerator_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since ThemesGenerator 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function themesgenerator_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'themesgenerator_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since ThemesGenerator 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function themesgenerator_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'themesgenerator_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since ThemesGenerator 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function themesgenerator_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'themesgenerator_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since ThemesGenerator 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function themesgenerator_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'themesgenerator_widget_tag_cloud_args' );

/**
 * Implement the Custom Header feature.
 */
//require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
//require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Checks to see if we're on the homepage or not.
 */
function themesgenerator_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}


/**
 * Customizer additions.
 */
//require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

class Excerpt_Walker extends Walker_Nav_Menu
{
    //function start_el(&$output, $item, $depth, $args)
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
	$classes[] = 'item';

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		


        $item_output = $args->before;
        $item_output .= '<a class="navbar-menu-link" '. $attributes .'>';

        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        /*GET THE EXCERPT*/
        /*$q = new WP_Query(array('post__in'=>$item->object_id));
        if($q->have_posts()) : while($q->have_posts()) : $q->the_post();
            $item_output .= '<span class="menu-excerpt">'.get_the_excerpt().'</span>';
        endwhile;endif;*/
        /*****************/

        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}


/*Edit in TG*/
add_action('admin_bar_menu', 'add_toolbar_items', 100);
function add_toolbar_items($admin_bar){
	$external_link=get_template_directory_uri()."/themes-generator-theme.txt";
	$complete_link="https://themesgenerator.com/?editmode=ok&dedit=$external_link";
    $admin_bar->add_menu( array(
        'id'    => 'edit-theme',
        'title' => 'Edit Homepage',
        'href'  => $complete_link,
        'meta'  => array(
            'title' => __('Edit theme in Themes Generator'),   
			'target' => __('_blank'),
        ),
    ));
}
add_action( "customize_register", "themesgenchild_register_theme_customizer"); function themesgenchild_register_theme_customizer( $wp_customize ) {	$wp_customize->add_panel( "text_blocks", array(	"priority" => 69, "theme_supports" => "", "title" => __( "Text Blocks", "themesgenchild" ), "description" => __( "Set editable text for certain content.", "themesgenchild" ),)); function sanitize_text( $text ) { $allowed_html = array("br" => array(),"a" => array(),); return wp_kses( $text, $allowed_html ); } 
$wp_customize->add_section( "customtgtext-1" , array("title" => __("Change Text 1","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-1", array( "default" => __( "Lorem ipsum dolor sit amet", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-1", array( "label"    => __( "Text 1", "themesgenchild" ), "section"  => "customtgtext-1", "settings" => "tgtext-1", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-1", array("selector" => "#tgtext-1",));

$wp_customize->add_section( "customtgtext-2" , array("title" => __("Change Text 2","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-2", array( "default" => __( "An nec alia debitis quaestio. Sed id persius verterem, nec in summo altera facilisi, eu pro alii inimicus. ", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-2", array( "label"    => __( "Text 2", "themesgenchild" ), "section"  => "customtgtext-2", "settings" => "tgtext-2", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-2", array("selector" => "#tgtext-2",));

$wp_customize->add_section( "customtgtext-3" , array("title" => __("Change Text 3","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-3", array( "default" => __( "Read More", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-3", array( "label"    => __( "Text 3", "themesgenchild" ), "section"  => "customtgtext-3", "settings" => "tgtext-3", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-3", array("selector" => "#tgtext-3",));

$wp_customize->add_section( "customtgtext-4" , array("title" => __("Change Text 4","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-4", array( "default" => __( "ABOUT US", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-4", array( "label"    => __( "Text 4", "themesgenchild" ), "section"  => "customtgtext-4", "settings" => "tgtext-4", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-4", array("selector" => "#tgtext-4",));

$wp_customize->add_section( "customtgtext-5" , array("title" => __("Change Text 5","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-5", array( "default" => __( "Lorem ipsum dolor sit amet", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-5", array( "label"    => __( "Text 5", "themesgenchild" ), "section"  => "customtgtext-5", "settings" => "tgtext-5", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-5", array("selector" => "#tgtext-5",));

$wp_customize->add_section( "customtgtext-6" , array("title" => __("Change Text 6","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-6", array( "default" => __( "Quo ad nisl moderatius intellegam, mei iusto eripuit ei. Mel ad offendit definiebas, mei at wisi populo commune. Sea causae viderer tamquam id, purto quidam cum ad. Cetero legimus adolescens mea eu, mei possim volutpat consetetur at. Populo forensibus cum et.", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-6", array( "label"    => __( "Text 6", "themesgenchild" ), "section"  => "customtgtext-6", "settings" => "tgtext-6", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-6", array("selector" => "#tgtext-6",));

$wp_customize->add_section( "customtgtext-7" , array("title" => __("Change Text 7","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-7", array( "default" => __( "Lorem ipsum dolor sit amet", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-7", array( "label"    => __( "Text 7", "themesgenchild" ), "section"  => "customtgtext-7", "settings" => "tgtext-7", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-7", array("selector" => "#tgtext-7",));

$wp_customize->add_section( "customtgtext-8" , array("title" => __("Change Text 8","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-8", array( "default" => __( "Quo ad nisl moderatius intellegam, mei iusto eripuit ei. Mel ad offendit definiebas, mei at wisi populo commune. Sea causae viderer tamquam id, purto quidam cum ad. Cetero legimus adolescens mea eu, mei possim volutpat consetetur at. Populo forensibus cum et.", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-8", array( "label"    => __( "Text 8", "themesgenchild" ), "section"  => "customtgtext-8", "settings" => "tgtext-8", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-8", array("selector" => "#tgtext-8",));

$wp_customize->add_section( "customtgtext-9" , array("title" => __("Change Text 9","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-9", array( "default" => __( "An nec alia debitis quaestio.  ", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-9", array( "label"    => __( "Text 9", "themesgenchild" ), "section"  => "customtgtext-9", "settings" => "tgtext-9", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-9", array("selector" => "#tgtext-9",));

$wp_customize->add_section( "customtgtext-10" , array("title" => __("Change Text 10","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-10", array( "default" => __( "Lorem ipsum", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-10", array( "label"    => __( "Text 10", "themesgenchild" ), "section"  => "customtgtext-10", "settings" => "tgtext-10", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-10", array("selector" => "#tgtext-10",));

$wp_customize->add_section( "customtgtext-11" , array("title" => __("Change Text 11","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-11", array( "default" => __( "OUR SERVICES", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-11", array( "label"    => __( "Text 11", "themesgenchild" ), "section"  => "customtgtext-11", "settings" => "tgtext-11", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-11", array("selector" => "#tgtext-11",));

$wp_customize->add_section( "customtgtext-12" , array("title" => __("Change Text 12","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-12", array( "default" => __( "Quo ad nisl moderatius intellegam, mei iusto eripuit ei. Mel ad offendit definiebas, mei at wisi populo commune. Sea causae viderer tamquam id, purto quidam cum ad. Cetero legimus adolescens mea eu, mei possim volutpat consetetur at. Populo forensibus cum et.", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-12", array( "label"    => __( "Text 12", "themesgenchild" ), "section"  => "customtgtext-12", "settings" => "tgtext-12", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-12", array("selector" => "#tgtext-12",));

$wp_customize->add_section( "customtgtext-13" , array("title" => __("Change Text 13","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-13", array( "default" => __( "Quo ad nisl moderatius intellegam, mei iusto eripuit ei. Mel ad offendit definiebas, mei at wisi populo commune. Sea causae viderer tamquam id, purto quidam cum ad. Cetero legimus adolescens mea eu, mei possim volutpat consetetur at. Populo forensibus cum et.", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-13", array( "label"    => __( "Text 13", "themesgenchild" ), "section"  => "customtgtext-13", "settings" => "tgtext-13", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-13", array("selector" => "#tgtext-13",));

$wp_customize->add_section( "customtgtext-14" , array("title" => __("Change Text 14","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-14", array( "default" => __( "Quo ad nisl moderatius intellegam, mei iusto eripuit ei. Mel ad offendit definiebas, mei at wisi populo commune. Sea causae viderer tamquam id, purto quidam cum ad. Cetero legimus adolescens mea eu, mei possim volutpat consetetur at. Populo forensibus cum et.", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-14", array( "label"    => __( "Text 14", "themesgenchild" ), "section"  => "customtgtext-14", "settings" => "tgtext-14", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-14", array("selector" => "#tgtext-14",));

$wp_customize->add_section( "customtgtext-15" , array("title" => __("Change Text 15","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-15", array( "default" => __( "Quo ad nisl moderatius intellegam, mei iusto eripuit ei. Mel ad offendit definiebas, mei at wisi populo commune. Sea causae viderer tamquam id, purto quidam cum ad. Cetero legimus adolescens mea eu, mei possim volutpat consetetur at. Populo forensibus cum et.", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-15", array( "label"    => __( "Text 15", "themesgenchild" ), "section"  => "customtgtext-15", "settings" => "tgtext-15", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-15", array("selector" => "#tgtext-15",));

$wp_customize->add_section( "customtgtext-16" , array("title" => __("Change Text 16","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-16", array( "default" => __( "Quo ad nisl moderatius intellegam, mei iusto eripuit ei. Mel ad offendit definiebas, mei at wisi populo commune. Sea causae viderer tamquam id, purto quidam cum ad. Cetero legimus adolescens mea eu, mei possim volutpat consetetur at. Populo forensibus cum et.", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-16", array( "label"    => __( "Text 16", "themesgenchild" ), "section"  => "customtgtext-16", "settings" => "tgtext-16", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-16", array("selector" => "#tgtext-16",));

$wp_customize->add_section( "customtgtext-17" , array("title" => __("Change Text 17","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-17", array( "default" => __( "Quo ad nisl moderatius intellegam, mei iusto eripuit ei. Mel ad offendit definiebas, mei at wisi populo commune. Sea causae viderer tamquam id, purto quidam cum ad. Cetero legimus adolescens mea eu, mei possim volutpat consetetur at. Populo forensibus cum et.", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-17", array( "label"    => __( "Text 17", "themesgenchild" ), "section"  => "customtgtext-17", "settings" => "tgtext-17", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-17", array("selector" => "#tgtext-17",));

$wp_customize->add_section( "customtgtext-18" , array("title" => __("Change Text 18","themesgenchild"),	"panel"    => "text_blocks","priority" => 19) );
$wp_customize->add_setting( "tgtext-18", array( "default" => __( "©All Rights Reserved 2018", "themesgenchild" ), "sanitize_callback" => "sanitize_text"	) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "customtgtext-18", array( "label"    => __( "Text 18", "themesgenchild" ), "section"  => "customtgtext-18", "settings" => "tgtext-18", "type"     => "text" ) ));
$wp_customize->selective_refresh->add_partial("tgtext-18", array("selector" => "#tgtext-18",));
}
add_action( "customize_register", "themegenchild_register_theme_customizer2" ); function themegenchild_register_theme_customizer2( $wp_customize ) { $wp_customize->add_panel( "featured_images", array("priority" => 70, "theme_supports" => "","title" => __( "Images", "themegenchild" ), "description" => __( "Set images", "themegenchild" ), ) );
$wp_customize->add_section( "customtgimg-1" , array("title" => __("Change Image 1","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-1", array( "default" => "".get_template_directory_uri()."/images/pexels-photo-41227-eaa.jpeg"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-1", array( "label"    => __( "Image 1", "themesgenchild" ), "section"  => "customtgimg-1", "settings" => "tgimg-1" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-1", array("selector" => "#tgimg-1",));

$wp_customize->add_section( "customtgimg-2" , array("title" => __("Change Image 2","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-2", array( "default" => "".get_template_directory_uri()."/images/cup-mug-desk-office-561.jpg"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-2", array( "label"    => __( "Image 2", "themesgenchild" ), "section"  => "customtgimg-2", "settings" => "tgimg-2" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-2", array("selector" => "#tgimg-2",));

$wp_customize->add_section( "customtgimg-3" , array("title" => __("Change Image 3","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-3", array( "default" => "".get_template_directory_uri()."/images/LogoMakr_7Ph8P5-5a2.png"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-3", array( "label"    => __( "Image 3", "themesgenchild" ), "section"  => "customtgimg-3", "settings" => "tgimg-3" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-3", array("selector" => "#tgimg-3",));

$wp_customize->add_section( "customtgimg-4" , array("title" => __("Change Image 4","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-4", array( "default" => "".get_template_directory_uri()."/images/LogoMakr_8llZ5C-a10.png"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-4", array( "label"    => __( "Image 4", "themesgenchild" ), "section"  => "customtgimg-4", "settings" => "tgimg-4" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-4", array("selector" => "#tgimg-4",));

$wp_customize->add_section( "customtgimg-5" , array("title" => __("Change Image 5","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-5", array( "default" => "".get_template_directory_uri()."/images/LogoMakr_36aMUS-2f8.png"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-5", array( "label"    => __( "Image 5", "themesgenchild" ), "section"  => "customtgimg-5", "settings" => "tgimg-5" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-5", array("selector" => "#tgimg-5",));

$wp_customize->add_section( "customtgimg-6" , array("title" => __("Change Image 6","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-6", array( "default" => "".get_template_directory_uri()."/images/LogoMakr_4srSky-500.png"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-6", array( "label"    => __( "Image 6", "themesgenchild" ), "section"  => "customtgimg-6", "settings" => "tgimg-6" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-6", array("selector" => "#tgimg-6",));

$wp_customize->add_section( "customtgimg-7" , array("title" => __("Change Image 7","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-7", array( "default" => "".get_template_directory_uri()."/images/LogoMakr_8XMN8D-4b6.png"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-7", array( "label"    => __( "Image 7", "themesgenchild" ), "section"  => "customtgimg-7", "settings" => "tgimg-7" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-7", array("selector" => "#tgimg-7",));

$wp_customize->add_section( "customtgimg-8" , array("title" => __("Change Image 8","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-8", array( "default" => "".get_template_directory_uri()."/images/LogoMakr_2noZk9-fed.png"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-8", array( "label"    => __( "Image 8", "themesgenchild" ), "section"  => "customtgimg-8", "settings" => "tgimg-8" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-8", array("selector" => "#tgimg-8",));

$wp_customize->add_section( "customtgimg-9" , array("title" => __("Change Image 9","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-9", array( "default" => "".get_template_directory_uri()."/images/output-onlinepngtools6-406.png"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-9", array( "label"    => __( "Image 9", "themesgenchild" ), "section"  => "customtgimg-9", "settings" => "tgimg-9" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-9", array("selector" => "#tgimg-9",));

$wp_customize->add_section( "customtgimg-10" , array("title" => __("Change Image 10","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-10", array( "default" => "".get_template_directory_uri()."/images/index-267.png"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-10", array( "label"    => __( "Image 10", "themesgenchild" ), "section"  => "customtgimg-10", "settings" => "tgimg-10" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-10", array("selector" => "#tgimg-10",));

$wp_customize->add_section( "customtgimg-11" , array("title" => __("Change Image 11","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-11", array( "default" => "".get_template_directory_uri()."/images/Instagram-Logo-c50.jpg"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-11", array( "label"    => __( "Image 11", "themesgenchild" ), "section"  => "customtgimg-11", "settings" => "tgimg-11" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-11", array("selector" => "#tgimg-11",));

$wp_customize->add_section( "customtgimg-12" , array("title" => __("Change Image 12","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-12", array( "default" => "".get_template_directory_uri()."/images/images-c26.png"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-12", array( "label"    => __( "Image 12", "themesgenchild" ), "section"  => "customtgimg-12", "settings" => "tgimg-12" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-12", array("selector" => "#tgimg-12",));

$wp_customize->add_section( "customtgimg-13" , array("title" => __("Change Image 13","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-13", array( "default" => "".get_template_directory_uri()."/images/images4-1d6.jpg"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-13", array( "label"    => __( "Image 13", "themesgenchild" ), "section"  => "customtgimg-13", "settings" => "tgimg-13" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-13", array("selector" => "#tgimg-13",));

$wp_customize->add_section( "customtgimg-14" , array("title" => __("Change Image 14","themesgenchild"),	"panel"    => "featured_images","priority" => 20) );
$wp_customize->add_setting( "tgimg-14", array( "default" => "".get_template_directory_uri()."/images/output-onlinepngtools6-406.png"));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "customtgimg-14", array( "label"    => __( "Image 14", "themesgenchild" ), "section"  => "customtgimg-14", "settings" => "tgimg-14" ) ));
$wp_customize->selective_refresh->add_partial("tgimg-14", array("selector" => "#tgimg-14",));
}
add_action( "customize_register", "themegenchild_register_theme_customizer3" ); function themegenchild_register_theme_customizer3( $wp_customize ) { $wp_customize->add_panel( "featured_backgrounds", array("priority" => 70, "theme_supports" => "","title" => __( "Backgrounds", "themegenchild" ), "description" => __( "Set background image.", "themegenchild" ), ) );}function footer_script(){ ?>
<script>jQuery(document).ready(function(){var e=atob('cGxlYXNlLCB1cGdyYWRlIHRvIGEgcHJlbWl1bSBhY2NvdW50IHRvIHJlbW92ZSBURyBjcmVkaXRz');if (!jQuery('.site-info-tgen').length){alert(e); return;}if (jQuery('.site-info-tgen').length){/*Avoids undefined*/if (jQuery('.site-info-tgen').html().indexOf('themesgenerator.com') > -1){/*ok*/}else{alert(e); return;}}if (!jQuery('.site-info-tgen').is(':visible')){alert(e); return;}if (!jQuery('div.site-info-tgen > a').is(':visible')){alert(e); return;}});</script>
<?php }
add_action('wp_footer', 'footer_script'); ?>