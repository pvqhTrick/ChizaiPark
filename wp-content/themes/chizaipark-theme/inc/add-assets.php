<?php
/**
 *  SETUP ASSETS
 */


// ADD ASSETS HEAD
add_action('wp_head', 'add_theme_assets_for_head', 50);
function add_theme_assets_for_head() {
?>
	<!-- THEME STYLES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500;700&family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <?php 
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
    ?>
    
    <!-- THEME SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php
}



// ADD ASSETS FOOTER
add_action( 'wp_footer', 'add_theme_assets_for_footer', 50 );
function add_theme_assets_for_footer() {
?>
	<!-- THEME SCRIPTS -->
	<script type="text/javascript" src="<?php themeUrl(); ?>/assets/js/script.js"></script>
    <?php if( is_page('contact') ): ?>
        <script type="text/javascript" src="<?php themeUrl(); ?>/assets/js/contact.js"></script>
    <?php endif; ?>
    <?php if( is_singular('talent') ): ?>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
        <script type="text/javascript">
            Fancybox.bind('[data-fancybox="talentvoice"]', {
            });
        </script>
    <?php endif; ?>
<?php
}