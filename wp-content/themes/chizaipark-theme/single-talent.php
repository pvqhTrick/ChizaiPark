<?php get_header() ?>

<div id="content">
<?php while(have_posts()): the_post(); ?>
    <div class="areaTalent">
        <div class="inner">
            <div class="areaTitle">
                <h2 class="titleMain maven"><span>T</span>alent</h2>
                <p class="titleSub">所属タレント</p>
            </div>
            <div class="talentWrap">
                <div class="talentLeft">
                    <p class="talentPhoto"><a href="" class="hover"><?php show_thumbnail_talent('talent-full') ?></a></p>
                    <?php get_template_part('template-part/talent-network'); ?>
                </div>
                <div class="talentRight">
                    <h3 class="talentName"><?php the_title() ?><span><?php echo get_field('spelling') ?></span></h3>
                    <ul class="listInfo">
                        <li>
                            <span class="infoName">誕生日</span>
                            <span class="infoTxt"><?php echo get_field('DOB') ?></span>
                        </li>
                        <li>
                            <span class="infoName">出身地</span>
                            <span class="infoTxt"><?php echo get_field('birthplace') ?></span>
                        </li>
                        <li>
                            <span class="infoName">特技・趣味</span>
                            <span class="infoTxt"><?php echo get_field('special') ?></span>
                        </li>
                    </ul>
                    <div class="talentSample">
                        <h3 class="sampleTitle">Sample voice</h3>
                        <ul class="listSample">
                            <?php get_template_part('template-part/talent-sample', null, array('name'=>'セリフ', 'voice'=>'sample_new')); ?>
                            <?php get_template_part('template-part/talent-sample', null, array('name'=>'ナレーション', 'voice'=>'sample_narration')); ?>
                            <?php get_template_part('template-part/talent-sample', null, array('name'=>'その他', 'voice'=>'sample_others')); ?>
                        </ul>
                    </div>
                </div>
                <p class="print pc"><a href="javascript:void(0)" class="hover"><span>印刷する</span></a></p>
            </div>
        </div>
    </div>
    <!-- areaTalent -->
    <div class="areaAppearance">
        <div class="talentsTitle">
            <div class="inner">
                <h3 class="talentsCustody">主な出演作品</h3>
            </div>
        </div>
        <div class="inner">
            <div class="appearanceWrap">
                <?php get_template_part('template-part/talent-main-field', null, array('field' => 'animated_feature_film')); ?>
                <?php get_template_part('template-part/talent-main-field', null, array('field' => 'dubbing')); ?>
                <?php get_template_part('template-part/talent-main-field', null, array('field' => 'drama_cd')); ?>
                <?php get_template_part('template-part/talent-main-field', null, array('field' => 'game')); ?>
                <?php get_template_part('template-part/talent-main-field', null, array('field' => 'animation')); ?>
                <?php get_template_part('template-part/talent-main-field', null, array('field' => 'narration')); ?>
                <?php get_template_part('template-part/talent-main-field', null, array('field' => 'voiceover')); ?>
                <?php get_template_part('template-part/talent-main-field', null, array('field' => 'radio')); ?>
                <?php get_template_part('template-part/talent-main-field', null, array('field' => 'others')); ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</div>
<?php get_footer() ?>