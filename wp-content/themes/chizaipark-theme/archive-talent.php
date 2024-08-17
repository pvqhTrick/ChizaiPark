<?php get_header() ?>

<div id="content">
    
<?php get_template_part('template-part/talent-list', null, array('slug' => 'affiliated_talent')); ?>
<?php get_template_part('template-part/talent-list', null, array('slug' => 'storage')); ?>
    
</div>
<!-- #content -->

<?php get_footer() ?>