<?php if( have_rows('patent_application_history') ): ?>
<div class="boxFieldContent">
    <?php while ( have_rows('patent_application_history') ) : the_row(); ?>
        <?php if( get_row_layout() == 'item_field' ): ?>
            <div class="itemField">
                <h4 class="fieldTitle">特許申請の経緯</h4>
                <p class="fieldText"><?php the_sub_field('patent_application_history'); ?></p>
                <p class="fieldPhoto"><img src="<?php the_sub_field('patent_application_history_img'); ?>" alt=""></p>
            </div>
        <?php elseif( get_row_layout() == 'item_field_no_image'): ?>
            <div class="itemField itemField2">
                <h4 class="fieldTitle">特許申請の経緯</h4>
                <p class="fieldText"><?php the_sub_field('patent_application_history'); ?></p>
                <p class="fieldPhoto"><img src="<?php the_sub_field('patent_application_history_img'); ?>" alt=""></p>
            </div>
        <?php elseif( get_row_layout() == 'item_field_right'): ?>
            <div class="itemField rPhoto">
                <h4 class="fieldTitle">特許申請の経緯</h4>
                <div class="fieldWrap">
                    <p class="fieldText fieldText2"><?php the_sub_field('patent_application_history'); ?></p>
                    <p class="fieldPhoto"><img src="<?php the_sub_field('patent_application_history_img'); ?>" alt=""></p>
                </div>
            </div>
        <?php elseif( get_row_layout() == 'item_field_left'): ?>
            <div class="itemField lPhoto">
                <h4 class="fieldTitle">特許申請の経緯</h4>
                <div class="fieldWrap">
                    <p class="fieldText fieldText2"><?php the_sub_field('patent_application_history'); ?></p>
                    <p class="fieldPhoto"><img src="<?php the_sub_field('patent_application_history_img'); ?>" alt=""></p>
                </div>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
</div>
<!-- BOXFIELDCONTENT -->
<?php endif; ?>
