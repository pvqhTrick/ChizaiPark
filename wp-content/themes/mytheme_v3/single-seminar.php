<?php
/**
 * The template for displaying Seminar detail
 */
get_header();

?>

<div id="content">
    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li>助成金情報TOP</li>
            </ul>
        </div>
    </div>
    <!-- #breadcrumbs -->
    <div class="areaSaminarDetail">
        <div class="bigInner">
            <div class="wrapContent">
                <?php while( have_posts() ): the_post(); ?>
                <h2 class="infoTitle">オンラインセミナー：契約の基礎と知的財産権リスクに関わる取決めに<br>ついて </h2>
                <ul class="social">
                    <li><a href="javascript:void(0);" class="hover"><img src="<?php themeUrl() ?>/assets/images/seminar/icon-fb.svg" alt=""></a></li>
                    <li><a href="javascript:void(0);" class="hover"><img src="<?php themeUrl() ?>/assets/images/seminar/icon-tw.svg" alt=""></a></li>
                    <li><a href="javascript:void(0);" class="hover"><img src="<?php themeUrl() ?>/assets/images/seminar/icon-line.svg" alt=""></a></li>
                </ul>
                <div class="contentSamiraDetail">
                    <?php if( get_field('purpose') ):?>
                        <h4>目的</h4>
                        <div><?php the_field('purpose') ?></di>
                    <?php endif; ?>
                    
                    <?php if( get_field('target_audience') ):?>
                        <h4>対象者の詳細</h4>
                        <div><?php the_field('target_audience'); ?></div>
                    <?php endif; ?>
                    
                    <?php if( get_field('registration_starts') && get_field('seminar')):?>
                        <h4>開催日時</h4>
                        <div>受付開始：<?php the_field('registration_starts')?><br>
                        セミナー：<?php the_field('seminar') ?></div>
                    <?php endif; ?>
                    
                    <?php if( get_field('place') ):?>
                        <h4>場所</h4>
                        <div><?php the_field('place') ?></div>
                    <?php endif; ?>
                    
                    <?php if( get_field('lecturer') ):?>
                        <h4>講師</h4>
                        <div><?php the_field('lecturer') ?></div>
                    <?php endif; ?>
                    
                    <?php if( get_field('application_period') ):?>
                        <h4>募集期間</h4>
                        <div><?php the_field('application_period') ?></div>
                    <?php endif; ?>
                    
                    <?php if( get_field('contact_us') ):?>
                        <h4>問い合わせ先</h4>
                        <div><?php the_field('contact_us') ?></div>
                    <?php endif; ?>
                </div>
                <p class="buttonSeminarDetail"><a href="<?php echo home_url('/seminar/') ?>">応募ページへ移動</a></p>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<!-- #content -->
<?php get_footer() ?>