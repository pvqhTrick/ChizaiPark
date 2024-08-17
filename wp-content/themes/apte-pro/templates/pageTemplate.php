<?php
/*
Template Name: Direction page
*/
get_header();
?>

<div id="content">
    <?php  while ( have_posts() ) : the_post(); 
    global $post; 
    $pageName = $post->post_name;
    // var_dump($post);
    $post_parent = ($post->post_parent > 0) ? get_post($post->post_parent) : null;
    if( $post_parent ){
        $pageName = $post_parent->post_name . '-' . $pageName;
    }
    get_template_part( 'pages/'.$pageName );
    ?>
    <?php endwhile; ?>
</div>
      
<!-- #content -->
<?php get_footer() ?>
