<?php
/**
 * 1st Choice Child functions and definitions
 *
 */
function firstchoice__enqueue_styles() {
	$theme = wp_get_theme();

	wp_enqueue_style(
		'parent-style',
		get_template_directory_uri() . '/style.css', 
		array(),
		$theme->parent()->get('Version')
	); 

	wp_enqueue_style(
		'google-fonts',
		'https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;0,700;1,400;1,700&display=swap',
		false,
		null
	);

	wp_enqueue_style( 'firstchoice-child-style', get_stylesheet_uri(),
		array('firstchoice'),
		$theme->get('Version') // this only works if you have Version in the style header
	);

} 
add_action( 'wp_enqueue_scripts', 'firstchoice__enqueue_styles' );


function firstchoice__theme_setup() {

	/* COLORS */
	$black        = '#000000';
	$red          = '#c2181a';
	$gold         = '#e5c249';
	$grey         = '#676767';
	$grey_light   = '#d9d9d9';
	$grey_vlight  = '#efefef';
	$grey_dark    = '#414141';
	$grey_vdark   = '#2f2f2f';
	$white        = '#ffffff';

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Black' ),
				'slug'  => 'black',
				'color' => $black,
			),
			array(
				'name'  => esc_html__( 'Red' ),
				'slug'  => 'red',
				'color' => $red,
			),
			array(
				'name'  => esc_html__( 'Gold' ),
				'slug'  => 'gold',
				'color' => $gold,
			),
			array(
				'name'  => esc_html__( 'Grey Very Dark' ),
				'slug'  => 'grey-vdark',
				'color' => $grey_vdark,
			),
			array(
				'name'  => esc_html__( 'Grey Dark' ),
				'slug'  => 'grey-dark',
				'color' => $grey_dark,
			),
			array(
				'name'  => esc_html__( 'Grey' ),
				'slug'  => 'grey',
				'color' => $grey,
			),
			array(
				'name'  => esc_html__( 'Grey Light' ),
				'slug'  => 'grey-light',
				'color' => $grey_light,
			),
			array(
				'name'  => esc_html__( 'Grey Very Light' ),
				'slug'  => 'grey-vlight',
				'color' => $grey_vlight,
			),
			array(
				'name'  => esc_html__( 'White' ),
				'slug'  => 'white',
				'color' => $white,
			),
		)
	);

	add_theme_support( 'editor-styles' );

	add_editor_style( 'editor-style.css' );

	// custom image crop
	add_image_size( '16x9', 1080, 608, array( 'center', 'center' ) );

}
add_action( 'after_setup_theme', 'firstchoice__theme_setup', 30 );


function firstchoice_editor_css() {
	wp_enqueue_style( 'editor-css', get_stylesheet_directory_uri() .'/editor-style.css', false, '1.0', 'all' );
}
add_action('enqueue_block_editor_assets', 'firstchoice_editor_css');


function childtheme_nav() {
	// disable parent theme navigation JS, replace with child theme one.
	wp_dequeue_script( 'baselayer-navigation' );
	wp_enqueue_script( 'childtheme-navigation', get_stylesheet_directory_uri() . '/inc/js/navigation-childtheme.js', array(), _S_VERSION, true );
}
add_action( 'wp_print_scripts', 'childtheme_nav' );


function firstchoice_add_body_class($classes) {
	// add sidebar class depending on subnav crawler
	$sidebar = 'no-sidebar';
	$subnav = baselayer_child_get_sidebar_nav();

	if ( '' != $subnav || $subnav === true ) {
		$sidebar = 'w-sidebar';
		$classes[] = $sidebar;

		// remove 'no-sidebar' if it exists
		if ( in_array('no-sidebar', $classes ) ) {
			unset( $classes[array_search( 'no-sidebar', $classes )] );
		}
	}

	return $classes;
}
add_filter('body_class', 'firstchoice_add_body_class');

// Register widget area.
function firstchoice_more_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Subfooter 1', 'firstchoice' ),
			'id'            => 'subfooter-1',
			'description'   => esc_html__( 'Add widgets here.', 'firstchoice' ),
			'before_widget' => '<aside id="%1$s" class="footer1-widgets widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	/*
	register_sidebar(
		array(
			'name'          => esc_html__( 'Subfooter 2', 'firstchoice' ),
			'id'            => 'subfooter-2',
			'description'   => esc_html__( 'Add widgets here.', 'firstchoice' ),
			'before_widget' => '<aside id="%1$s" class="footer2-widgets widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Subfooter 3', 'firstchoice' ),
			'id'            => 'subfooter-3',
			'description'   => esc_html__( 'Add widgets here.', 'firstchoice' ),
			'before_widget' => '<aside id="%1$s" class="footer3-widgets widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	*/
}
add_action( 'widgets_init', 'firstchoice_more_widgets_init' );

/** Custom template tags for this theme. */
require get_stylesheet_directory() . '/inc/template-tags.php';

function its_my_own_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);
	echo '<p class="posted-on">';
	printf(
		esc_html__( '%s', 'firstchoice' ),
		$time_string // phpcs:ignore WordPress.Security.EscapeOutput
	);
	echo '</p>';
}

function its_my_own_entry_meta_footer() {
	if ( 'post' !== get_post_type() ) {
		return;
	}

	if ( ! is_single() ) { // Hide meta information on pages.
		if ( is_sticky() ) {
			echo '<p>' . esc_html_x( 'Featured post', 'Label for sticky posts', 'firstchoice' ) . '</p>';
		}

		if ( has_category() || has_tag() ) {
			echo '<div class="post-taxonomies">';
			$tags_list = get_the_tag_list( '', '' );
			if ( $tags_list ) {
				printf(
					'<span class="tags-links">' . esc_html__( 'Tags: %s', 'firstchoice' ) . '</span>',
					$tags_list
				);
			}
			echo '</div>';
		}
	} else {
		if ( has_category() || has_tag() ) {

			echo '<div class="post-taxonomies">';

			$tags_list = get_the_tag_list( '', '' );
			if ( $tags_list ) {
				printf(
					'<span class="tags-links">' . esc_html__( 'Tags: %s', 'firstchoice' ) . '</span>',
					$tags_list
				);
			}
			echo '</div>';
		}
	}
}

function firstchoice_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 25; // 25 words
}
add_filter( 'excerpt_length', 'firstchoice_excerpt_length', 999 );

function firstchoice_excerpt_link_text( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	// Change text, remove the link, and return change
	return '&hellip;';
}
add_filter( 'excerpt_more', 'firstchoice_excerpt_link_text', 999 );

/** Secondary navigation traversal feature. */
require get_template_directory() . '/inc/subnav-walker-class.php';

/** Custom block patterns for this theme. */
require get_stylesheet_directory() . '/inc/block-patterns.php';

/** Location / service area page patterns. */
require get_stylesheet_directory() . '/inc/location-patterns.php';

/**
 * Flag location pages so the theme's red title band can be hidden — the H1
 * lives inside the page's own hero section instead. Detected from the pattern
 * markup, so no page-naming convention is required.
 */
function firstchoice_location_body_class( $classes ) {
	if ( is_page() ) {
		$post = get_post();

		if ( $post && false !== strpos( $post->post_content, 'location-hero' ) ) {
			$classes[] = 'location-page';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'firstchoice_location_body_class' );


/*
function yo_firstchoice_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) {
		?>

		<div class="post-thumbnail">
			<?php the_post_thumbnail('16x9'); ?>
		</div><!-- .post-thumbnail -->

	<?php } else { ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
				the_post_thumbnail(
					'16x9',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
			?>
		</a>

		<?php
	} //endif is_singular().
}
*/

?>