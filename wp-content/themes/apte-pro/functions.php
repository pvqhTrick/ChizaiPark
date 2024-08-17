<?php
if ( ! isset( $content_width ) )
	$content_width = 604;

define( 'THEME_URL', get_stylesheet_directory_uri() );
define( 'HOME_URL', get_home_url() );

/**
 * My Theme only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

function mytheme_setup() {
	load_theme_textdomain( 'mytheme', get_template_directory() . '/languages' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'gallery', 'image', 'link', 'status'
	) );
	//'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(array(
		'headerMenu' => __( 'Header Menu'),
	));

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function mytheme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'mytheme' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'mytheme_wp_title', 10, 2 );

// ADD IMAGE SIZE
add_action('after_setup_theme', 'aptepro_image_sizes');
function aptepro_image_sizes() {
    add_image_size('canvas', 319, 319, true);
    add_image_size('talent', 219, 340, true);
    add_image_size('talent-full', 280, 450, true);
}

// FUNCTION REDIRECT THANK PAGE
function cf7_thank_you_page_redirect() {
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(document).on('wpcf7mailsent', function(event) {
			window.location.href = '<?php echo home_url('/contact/thanks/')?>';
		});
	});
	</script>
	<?php
}
// add_action( 'wp_footer', 'cf7_thank_you_page_redirect' );

/// FUNCTION
// THE FIRST IMAGE
function the_first_thumbnail(){
	echo '<li><a href="'.the_permalink().'"><p class="canvasPhoto first"><img src="'.get_theme_file_uri('/assets/images/index/canvas-photo-01.jpg').'"></p></a></li>';
}

function show_thumbnail_talent($size = 'post-thumbnail'){
	if(has_post_thumbnail()){
		the_post_thumbnail($size);
	}else{
		echo '<img src="'.get_theme_file_uri('/assets/images/index/canvas-photo-01.jpg').'">';
	}
}

// POST NAVIGATION
if (!function_exists('mytheme_post_nav')):
	function mytheme_post_nav()	
	{
		global $post;

		$previous = get_adjacent_post(false, '', false);
		$next = get_adjacent_post(false, '', true);

		if (!$next && !$previous)
			return;
		?>
		<div class="pagingNav">
			<ul class="pagi_nav_list">
			<?php previous_post_link('<li class="p-control prev">%link</li>', 'Prev'); ?>
			<li class="backNews"><a href="<?php echo home_url('/news/') ?>">一覧に戻る</a></li>
			<?php next_post_link('<li class="p-control next">%link</li>', 'Next'); ?>
			</ul>
		</div>
		<?php
	}
endif;

// THEME PAGINATION FUNCTION
function theme_pagination($post_query = null)	
{
	global $paged, $wp_query;

	$translate['next'] = 'Next';
	$translate['prev'] = 'Prev';

	if (empty($paged))
		$paged = 1;
	$prev = $paged - 1;
	$next = $paged + 1;

	$end_size = 1;
	$mid_size = 2;
	$show_all = false;
	$dots = false;

	$pagi_query = $wp_query;
	if (isset($post_query) && $post_query) {
		$pagi_query = $post_query;
	}

	if (!$total = $pagi_query->max_num_pages)
		$total = 1;

	if ($total > 1) {
		echo '<div class="pagingNav">';
		echo '<ul class = "pagi_nav_list">';
		if ($paged >= 1) {
			echo '<li class="p-control prev"><a href="' . previous_posts(false) . '">' . $translate['prev'] . '</a></li>';
		}else{
			echo '<li class="p-control prev disable"><a href="' . previous_posts(false) . '">' . $translate['prev'] . '</a></li>';
		}
		
		for ($i = 1; $i <= $total; $i++) {
			if ($i == $paged) {
				echo '<li class="active"><a>' . $i . '</a></li>';
				$dots = true;
			} else {
				if ($show_all || ($i <= $end_size || ($paged && $i >= $paged - $mid_size && $i <= $paged + $mid_size) || $i > $total - $end_size)) {
					echo '<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
					$dots = true;
				} elseif ($dots && !$show_all) {
					echo '<li class="forth"><a>...</a></li>';
					$dots = false;
				}
			}
		}
		if ($paged < $total) {
			echo '<li class="p-control next"><a href="' . next_posts(0, false) . '">' . $translate['next'] . '</a></li>';
		}
		echo '</ul>';
		echo '</div>';
	}
}

// CUSTOM BREADCRUMBS
function custom_breadcrumbs() {
    $separator          = '>';
    $home_title         = 'single';
    
    // Get the query & post information
    global $post,$wp_query;
    
    if ( !is_front_page() && !is_home()) {
		echo '<div id="breadCrumb">';
       	echo '<div class="inner">';
        echo '<ul class="listBread">';

        echo '<li><a href="' . HOME_URL . '">TOP</a></li>';
        
		if ( is_post_type_archive('doctor')) {
            echo '<li><a href='.home_url('/doctor/').'>医師一覧</a></li>';
        }
		if ( is_page('faq') ) {
			echo '<li><span> よくある質問 </span></li>';
        } 
		if ( is_page('privacy') ) {
			echo '<li><a href=#> よくある質問 </a></li>';
        } 
		if ( is_page('contact') ) {
			echo '<li><a href=#> 医師への相談・面談予約・その他お問合せはこちら </a></li>';
        } 
		if ( is_single() ) {
			echo '<li><a href ='.home_url('/doctor/').'>医師一覧</a></li>';
			// echo '<li><a href ="#">'.get_the_title().'</a></li>';
			echo the_title( '<li><a>', '</a></li>' );;
        } 
        echo '</ul>';
		echo '</div>';
		echo '</div>';
    }
}


/// ACTION
// LOADING CSS AND JS 
add_action('wp_enqueue_scripts', 'load_assets');
function load_assets()
{
	wp_enqueue_style('main-common-css', get_theme_file_uri() . '/assets/css/common.css');
	wp_enqueue_script('jquery-ajax', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js', array(), '1.12.1', true);
	wp_enqueue_script('mainjs', get_theme_file_uri() . "/assets/js/script.js", array('jqueryjs'), '1.0', array('in_footer' => false));

	if ( is_home() || is_front_page() ) {
		wp_enqueue_style('index-style', get_template_directory_uri() . '/assets/css/index.css',array('main-common-css'));
	} elseif( is_single() ) {
		if(is_singular('talent')){
			wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/talents-detail.css');
		}
		else{
			wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/news-detail.css');
		}
	} elseif( is_post_type_archive('talent') ) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/talents.css');
	} elseif( is_page('company') ) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/company.css');
	} elseif( is_page('contact') || is_page('thanks') || is_page('contact-confirm') ) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/contact.css');
	} elseif( is_page('news') ) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/news.css');
	} elseif( is_page('school') ) {
		wp_enqueue_style('school', get_template_directory_uri() . '/assets/css/school.css');
		wp_enqueue_style('school-common', get_template_directory_uri() . '/assets/css/school-common.css');
	} elseif( is_page('faq') ) {
		wp_enqueue_style('faq', get_template_directory_uri() . '/assets/css/school-faq.css');
		wp_enqueue_style('school-common', get_template_directory_uri() . '/assets/css/school-common.css');
	} elseif( is_page('recruit') ) {
		wp_enqueue_style('faq', get_template_directory_uri() . '/assets/css/school-recruit.css');
		wp_enqueue_style('school-common', get_template_directory_uri() . '/assets/css/school-common.css');
	} elseif( is_page('teacher') ) {
		wp_enqueue_style('faq', get_template_directory_uri() . '/assets/css/school-teacher.css');
		wp_enqueue_style('school-common', get_template_directory_uri() . '/assets/css/school-common.css');
	}
}

/// FILTER


/// SHORTCODE
function display_option_requess(){
	ob_start();  
	get_template_part('template-part/inputCheckBoxDoctor', null, array('query'=> 1));
	return ob_get_clean();
}
add_shortcode('display_option', 'do_shortcode_in_cf7');