<?php 
/**
 * The template for displaying TOP page
 */
get_header(); 


$listJoseikin = new WP_Query(array(
    'post_type' => 'joseikin',
    'posts_per_page' => '5'
));

$listKigyou = new WP_Query(array(
    'post_type' => 'kigyou',
    'posts_per_page' => '4'
));

$listSeminar = new WP_Query(array(
    'post_type' => 'seminar',
    'posts_per_page' => '3'
));


?>

<?php display_mainTitle(); ?>

<div id="content">
    <div class="bigInner">
        <div class="wrapContent">
            <div class="contentLetf">
                <?php if( $listJoseikin->have_posts() ): ?>
                <div class="areaGrant">
                    <h2 class="grantTitle">新着助成金制度</h2>
                    <ul class="listPost">
                        <?php while( $listJoseikin->have_posts() ): $listJoseikin->the_post(); ?>
                        <li>
                            <p class="date">2020年07月13日</p>
                            <p class="cate"><a href="#" class="hover">大阪府</a></p>
                            <p class="text"><a href="<?php the_permalink() ?>" class="hover"><?php the_title(); ?></a></p>
                        </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </ul>
                    <p class="btnMore"><a href="#"><span>助成金情報へ</span></a></p>
                </div>
                <!-- areaGrant -->
                <?php endif; ?>
                
                <?php get_template_part('template-parts/search-map'); ?>
                <?php if( $listKigyou->have_posts() ): ?>
                <div class="areaVenture">
                    <h3 class="boxTitle">知財ニュース</h3>
                    <ul class="boxList">
                        <?php while( $listKigyou->have_posts() ): $listKigyou->the_post(); ?>
                        <li>
                            <p class="date">2020年07月13日</p>
                            <p class="linkPost"><a href="javascript:void(0);"
                                    class="hover">コロナ薬普及へ特許共有を　日本提唱でG7援助案、実現に壁コロナ薬普及へ特許共有を　日本提唱でG7援助案、実現に壁コロナ薬普及へ特許共有を　日本提唱でG7援助案、実現に壁</a>
                            </p>
                        </li>
                        <?php endwhile; wp_reset_postdata();?> 
                    </ul>
                    <p class="btnMore"><a href="<?php home_url('/kigyou/') ?>"><span>知財ニュース</span></a></p>
                </div>
                <?php endif; ?>
                <!-- areaVenture -->

                <?php if( $listSeminar->have_posts() ): ?>
                <div class="areaSeminar">
                    <h2 class="infoTitle">セミナー情報</h2>
                    <ul class="listSemina">
                        <?php while( $listSeminar->have_posts() ): $listSeminar->the_post(); ?>
                        <li>
                            <p class="date">2020年07月13日<span class="th">（木）</span></p>
                            <p class="cate"><a href="#" class="hover">東京都</a></p>
                            <p class="text"><a href="#"
                                    class="hover">「商標初級・中級セミナー～大切なブランド名/社名を守るには？～」／「共同研究開発のリーガルリスクマネジメント」</a></p>
                            <div class="rowInfo">
                                <p class="time">14:00〜16:00</p>
                                <p class="address">東京都港区</p>
                                <p class="price">無料</p>
                                <p class="presided"><span>主宰：</span>企業法務知財協会</p>
                            </div>
                        </li>
                        <?php endwhile; wp_reset_postdata();?>
                    </ul>
                    <p class="btnMore"><a href="<?php home_url('/seminar/') ?>"><span>セミナー情報へ</span></a></p>
                </div>
                <?php endif; ?>
            </div>
            <!-- contentLetf -->

            <?php get_sidebar() ?>
        </div>
    </div>
</div>
<!-- #content -->

<?php get_footer(); ?>