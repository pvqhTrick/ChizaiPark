<li>
    <a href="<?php the_permalink() ?>" class="hover">
        <p class="talentsPhoto"><?php show_thumbnail_talent('talent') ?></p>
        <h3 class="talentsName"><?php the_title() ?></h3>
        <?php if(!empty(get_field('spelling'))) ?>
            <div class="spelling"><?php the_field('spelling') ?></div>
    </a>
</li>