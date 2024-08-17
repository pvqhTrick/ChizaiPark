<?php 
$twitch = !empty(get_field('twitch')) ? get_field('twitch') : '';
$facebook = !empty(get_field('facebook')) ? get_field('facebook') : '';
$instagram = !empty(get_field('instagram')) ? get_field('instagram') : '';
$blog = !empty(get_field('blog')) ? get_field('blog') : '';
?>
<ul class="listNetwork">
    <?php if($twitch): ?>
    <li>
        <a href="<?php echo get_field('twitch') ?>" class="hover" target="_blank">
            <img src="<?php echo get_theme_file_uri('/assets/images/talents/icon-network-01.png') ?>" alt="twitch">
        </a>
    </li>
    <?php endif; ?>
    <?php if($facebook): ?>
    <li>
        <a href="<?php echo get_field('facebook') ?>" class="hover" target="_blank">
           <img src="<?php echo get_theme_file_uri('/assets/images/talents/icon-network-02.png') ?>" alt="facebook">
        </a>
    </li>
    <?php endif; ?>
    <?php if($instagram): ?>
    <li>
        <a href="<?php echo get_field('instagram') ?>" class="hover" target="_blank">
            <img src="<?php echo get_theme_file_uri('/assets/images/talents/icon-network-03.png') ?>" alt="instagram">
        </a>
    </li>
    <?php endif; ?>
    <?php if($blog): ?>
    <li>
        <a href="<?php echo get_field('blog') ?>" class="hover" target="_blank">
            <img src="<?php echo get_theme_file_uri('/assets/images/talents/icon-network-04.png') ?>" alt="blog">
        </a>
    </li>
    <?php endif; ?>
</ul>