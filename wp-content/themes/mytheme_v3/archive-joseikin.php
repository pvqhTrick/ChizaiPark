<?php
/**
 * The template for displaying Archive joseikin
 */
get_header();

$areas = get_terms( array(
    'taxonomy'   => 'area',
    'hide_empty' => false,
    'parent'     => 0,
));

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$listJoseikin = new WP_Query(array(
    'post_type' => 'joseikin',
    'posts_per_page' => '5',
    'paged' => $paged,
));

?>

<div id="fixH"></div>
<div id="main" class="df">
    <h2 class="mainTitle">助成金情報</h2>
</div>
<!-- #main -->

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
    <div class="bigInner">
        <div class="wrapContent">
            <div class="contentLetf areaInfomation">
                <h2 class="infoTitle">新着助成金制度</h2>
                <div class="boxNarrow">
                    <h3 class="narrowTitle">絞り込み</h3>
                    <form action="" id="searchArea">
                        <div class="narrowSearch">
                            <div class="rowSearch">
                                <select id="region">
                                <?php
                                foreach ( $areas as $area ): ?>
                                    <option value="<?php echo $area->term_id ?>"><?php echo  $area->name ?></option>;
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- AJAX -->
                            <div class="rowSearch">
                                <select id="prefecture" name="prefecture" disabled>
                                    <option value="">都道府県で選択</option>
                                </select>
                            </div>
                        </div>
                        <div class="boxaction">
                            <div class="clear"><input type="reset" name="reset" value="クリア" class="noto"></div>
                            <div class="find"><input type="submit" name="find" value="検索する" class="noto"></div>
                        </div>
                    </form>
                </div>
                <!-- boxNarrow -->
                 
                <?php if( $listJoseikin ):  ?>
                <ul class="listInfo">
                    <?php while( $listJoseikin->have_posts() ): $listJoseikin->the_post(); ?>
                    <li>
                        <div class="cateInfo">
                            <p class="region"><a href="#" class="hover"><?php the_field('region') ?></a></p>
                            <p class="date">公募期間：<?php the_field('application_period') ?> </p>
                        </div>
                        <h3 class="infoTitleNews"><?php the_title() ?></h3>
                        <p class="infoIntro">
                            <?php the_excerpt() ?>
                        </p>
                        <div class="boxDetail">
                            <p class="maxPrice"><span class="max">上限金額・助成額</span><span class="price"><?php the_field('max_price') ?></span></p>
                            <p class="btnDetail"><a href="<?php the_permalink() ?>"><span>詳細はこちら</span></a></p>
                        </div>
                    </li>
                    <?php endwhile; wp_reset_postdata();?>
                </ul>
                <?php endif; ?>
                <!-- listInfo -->

                <?php echo theme_pagination( $listJoseikin ) ?>
                <!-- pagingNav -->

                <?php get_template_part('template-parts/search-map'); ?>
            </div>
            <?php get_sidebar('joseikin'); ?>
        </div>
    </div>
</div>
<!-- #content -->
<script>
    $('#searchArea').on('submit', function(e) {
    e.preventDefault();

    let form_data = $(this).serialize();

    $.ajax({
        url: ajaxurl,
        type: 'GET',
        data: form_data,
        success: function(response) {
            $('#search-results').html(response);
        },
        error: function() {
            $('#search-results').html(response);;
        }
    });
});
</script>
<?php get_footer() ?>