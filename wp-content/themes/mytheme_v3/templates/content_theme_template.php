<?php
/* 
*	Template Name: Content Theme Template
*/
?>

<?php get_header(); ?>


	<div id="content">
        <div class="inner clearfix">

            <div id="mainContent">
                
				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<h2 class="pageTitle"><span class="ttitle"><?php the_title(); ?></span></h2>

					<div class="pageContentWrap">
						<?php
							global $post;
							// CHECK PASSWORD
							if( post_password_required() ) {
								the_content();
							} else {
								$pageName = $post->post_name;
								$post_parent = ($post->post_parent > 0) ? get_post($post->post_parent) : null;
				                if( $post_parent ){
				                    $pageName = $post_parent->post_name . '-' . $pageName;
				                }
								get_template_part( 'pages/'.$pageName );
							}
						?>
					</div>

				<?php endwhile; ?>

            </div>
            <!-- #mainContent -->
            
			<?php get_sidebar(); ?>
            <!-- #sideBar -->

        </div>
    </div>
    <!-- #content -->

	
<?php get_footer(); ?>
