<?php
/**
 * The sidebar containing the secondary widget area of TOP PAGE
 */

$listChizai = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'chizai',
	'posts_per_page' => 3,
	'meta_query'=> array(
		array(
			'key' => 'pickup',
            'value' => true,
		)
	),
));
$listVentureCapital = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'venture-capital',
	'posts_per_page' => 3,
	'meta_query'=> array(
		array(
			'key' => 'pickup',
            'value' => true,
		)
	),
));
$listKigyou = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'kigyou',
	'posts_per_page' => 3,
	'meta_query'=> array(
		array(
			'key' => 'pickup',
            'value' => true,
		)
	),
));
$listTopViewJoseikin = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'joseikin',
	'posts_per_page' => 5,
	'meta_key' => 'view', 
    'orderby' => 'meta_value_num', 
    'order' => 'DESC',	
));
$listRankingCustom = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'joseikin',
	'posts_per_page' => 5,
	'meta_key' => 'view', 
    'orderby' => 'meta_value_num', 
    'order' => 'DESC',	
))
?>
<div class="sideBar">
	<div class="areaPatent">
		<h2 class="patentTitle">弁理士</h2>
		<ul class="listPatent">
			<li>
				<div class="infoName">
					<p class="avatar"><img src="<?php themeUrl() ?>/assets/images/index/avatar1.png" alt=""></p>
					<h3 class="name">弁理士 <span class="big">坂本 智弘</span><span class="small">全体・特許担当</span>
					</h3>
				</div>
				<p class="linkInfo"><a href="javascript:void(0);">詳細</a></p>
			</li>

			<li>
				<div class="infoName">
					<p class="avatar"><img src="<?php themeUrl() ?>/assets/images/index/avatar2.png" alt=""></p>
					<h3 class="name">弁理士 <span class="big">青木 博文</span><span class="small">商標担当</span></h3>
				</div>
				<p class="linkInfo"><a href="javascript:void(0);">詳細</a></p>
			</li>
		</ul>
		<p class="patentBanner"><img src="<?php themeUrl() ?>/assets/images/index/sider-banner.svg" alt=""></p>
	</div>
	<!-- areaPatent -->

	<?php if( $listChizai->have_posts() ): ?>
	<div class="areaIntell">
		<h2 class="intellTitle">知財の活用事例</h2>
		<ul class="listIntell">
			<?php while( $listChizai->have_posts() ): $listChizai->the_post(); ?>
			<li>
				<p class="date"><?php the_time('Y年m月d日') ?></p>
				<?php  $categories = get_the_terms(get_the_ID(), 'chizai_cat'); ?>
				<p class="cate">
					<a href="#"> 
					<?php if ($categories) : ?>
						<?php echo $categories[0]->name ?>
					<?php endif; ?>
					</a>
				</p>
				<p class="text"><a href="<?php the_permalink() ?>" class="hover"><?php the_title() ?>/</a></p>
			</li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		<p class="btnMore"><a href="<?php echo home_url('/chizai/') ?>"><span>知財活用事例へ</span></a></p>
	</div>
	<!-- areaChizai -->
	<?php endif; ?>

	<?php if( $listVentureCapital->have_posts() ): ?>
	<div class="areaVentures">
		<h2 class="ventureTitle">ベンチャー・キャピタル</h2>
		<ul class="ventureList">
			<?php while( $listVentureCapital->have_posts() ): $listVentureCapital->the_post(); ?>
			<li><a href="<?php the_permalink()?>" class="hover"><?php the_title() ?></a></li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		<p class="btnMore"><a href="<?php echo home_url('/venture-capital/') ?>"><span>ベンチャー・キャピタルへ</span></a></p>
	</div>
	<!-- areaVenture -->
	<?php endif; ?>

	<?php if( $listKigyou->have_posts() ): ?>
	<div class="areaExamples">
		<h2 class="examplesTitle">企業の活用事例</h2>
		<ul class="examplesList">
			<?php while( $listKigyou->have_posts() ): $listKigyou->the_post(); ?>
			<li>
				<a href="#" class="hover">
					<p class="co"><?php the_title() ?></p>
					<p class="exLink"><?php the_excerpt() ?></p>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
		<p class="btnMore"><a href="<?php echo home_url('/kigyou/') ?>"><span>企業の活用事例</span></a></p>
	</div>
	<!-- areaKigyou -->
	<?php endif; ?>

	<?php 
	if( $listTopViewJoseikin->have_posts() ): 
	$rank = 1;
	$rankName=['numone', 'numtwo', 'numthree','',''];
	?> 
	<div class="areaRanking">
		<h2 class="rankingTitle">アクセスランキング</h2>
		<ul class="listRank">
			<?php while( $listTopViewJoseikin->have_posts() ): $listTopViewJoseikin->the_post(); ?>
			<li>
				<p class="numRank"><span class="num <?php echo $rankName[$rank-1] ?>"><?php echo $rank; $rank++ ?></span>位</p>
				<p class="rankDetail"><a href="<?php the_permalink() ?>" class="hover"><?php the_title() ?></a></p>
			</li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
	<!-- areaTop5Joseikin -->
	<?php endif; ?>




	<?php 
	if( $listTopViewJoseikin->have_posts() ): 
	$rank = 1;
	$rankName=['numone', 'numtwo', 'numthree','',''];
	?> 
	<div class="areaRanking">
		<h2 class="rankingTitle">Custom ranking</h2>
		<ul class="listRank">
			<?php while( $listTopViewJoseikin->have_posts() ): $listTopViewJoseikin->the_post(); ?>
			<li>
				<p class="numRank"><span class="num <?php echo $rankName[$rank-1] ?>"><?php echo $rank; $rank++ ?></span>位</p>
				<p class="rankDetail"><a href="<?php the_permalink() ?>" class="hover"><?php the_title() ?></a></p>
			</li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
	<!-- areaTop5Joseikin -->
	<?php endif; ?>
</div>
<!-- sideBar -->