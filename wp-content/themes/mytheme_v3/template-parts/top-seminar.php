<?php $listSeminar = new WP_Query(array(
    'post_type' => 'seminar',
    'posts_per_page' => '5'
));
 ?> 
<div class="areaSeminar">
    <h2 class="infoTitle">セミナー情報</h2>
    <ul class="listSemina">
        <?php while ($listSeminar->have_posts()):
            $listSeminar->the_post(); ?>
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
                    <?php if (get_field('time')): ?>
                        <p class="time"><?php the_field('time') ?></p>
                    <?php endif; ?>
                    <?php if (get_field('location')): ?>
                        <p class="address"><?php the_field('location') ?></p>
                    <?php endif; ?>
                    <?php if (get_field('fee') && get_field('fee') !== 0): ?>
                        <p class="price"><?php echo get_field('fee') ?></p>
                    <?php else: ?>
                        <p class="price"><?php echo '無料' ?></p>
                    <?php endif; ?>
                    <?php if (get_field('host_by')): ?>
                        <p class="presided"><span>主宰：</span><?php the_field('host_by') ?></p>
                    <?php endif; ?>
                </div>
            </li>
        <?php endwhile; ?>
        <p class="btnMore"><a href="<?php echo home_url('/seminar/') ?>"><span>セミナー情報へ</span></a></p>
</div>