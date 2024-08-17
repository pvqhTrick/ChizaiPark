<?php
$args = array(
    'post_type' => 'faq',
);
$query = new WP_Query($args);
?>

    <?php get_template_part('template-part/school-info'); ?>
    <?php if($query->have_posts()): $query->the_post();?>
    <div class="areaFaq">
        <div class="inner">
            <ul class="faqList">
            <?php if( have_rows('faq_table') ): ?>
                <?php while( have_rows('faq_table') ): the_row(); ?>
                <li>
                    <p class="faqQuestion"><?php echo get_sub_field('question') ?></p>
                    <p class="faqAnswer"><?php echo get_sub_field('answer') ?></p>
                </li>
                <?php endwhile;  wp_reset_postdata();
            endif; ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>
