<li>
    <p class="date"><?php the_time('Y年m月d日'); ?><span class="th">（木）</span></p>
    <?php $cat = get_first_area();
    if ($cat): ?>
        <p class="cate">
            <a href="<?php echo get_term_link($cat); ?>" class="hover"><?php echo $cat->name ?></a>
        </p>
    <?php endif; ?>

    <p class="text"><a href="<?php the_permalink() ?>" class="hover"><?php the_title() ?></a></p>
    <div class="rowInfo">
        <?php 
        $time = get_field('time'); 
        $location = get_field('location'); 
        $fee = get_field('fee'); 
        $host_by = get_field('host_by'); 
        ?>
        <?php if ($time): ?>
            <p class="time"><?php echo $time ?></p>
        <?php endif; ?>
        <?php if ($location): ?>
            <p class="address"><?php echo $location ?></p>
        <?php endif; ?>
        <?php if ($fee): ?>
            <p class="price"><?php echo ($fee == 0) ? '無料' : $fee . '円' ?></p>
        <?php endif; ?>
        <?php if ($host_by): ?>
            <p class="presided"><span>主宰：</span><?php echo $host_by ?></p>
        <?php endif; ?>
    </div>
</li>