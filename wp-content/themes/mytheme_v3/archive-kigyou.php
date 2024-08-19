<?php
/**
 * The template for displaying Archive kigyou
 */
get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$listKigyou = new WP_Query(array(
    'post_type' => 'kigyou',
    'posts_per_page' => '5',
    'paged' => $paged,
));

?>

<div id="fixH"></div>
<div id="main" class="df">
    <h2 class="mainTitle">企業の知財紹介</h2>
</div>
<!-- #main -->

<div id="content">
    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li>企業の知財紹介TOP</li>
            </ul>
        </div>
    </div>
    <!-- #breadcrumbs -->

    <div class="areaVenture">
        <div class="inner">
            <div class="boxPost">
                <div class="boxName">
                    <h3 class="boxTitle">新着知財ニュース</h3>
                    <p class="boxCount"><span class="quantity">200</span>件中<span class="fPost">1</span>〜<span
                            class="lPost">10</span>件</p>
                </div>

                <ul class="boxList">
                    <li>
                        <p class="nameCompany"><a href="javascript:void(0);">株式会社ABCDE</a></p>
                        <p class="linkPost"><a
                                href="javascript:void(0);">ノーベル賞・本庶氏が小野薬品提訴を表明　オプジーボ特許使用料226億円求めノーベル賞・本庶氏が小野薬品提訴を表明　オプジーボ特許使用料226億円求め</a>
                        </p>
                    </li>
                    <li>
                        <p class="nameCompany"><a href="javascript:void(0);">◯◯◯◯株式会社</a></p>
                        <p class="linkPost"><a
                                href="javascript:void(0);">ノーベル賞・本庶氏が小野薬品提訴を表明　オプジーボ特許使用料226億円求めノーベル賞・本庶氏が小野薬品提訴を表明　オプジーボ特許使用料226億円求め</a>
                        </p>
                    </li>
                    <li>
                        <p class="nameCompany"><a href="javascript:void(0);">株式会社ABCDE</a></p>
                        <p class="linkPost"><a href="javascript:void(0);">Nintendo
                                Switch『ファイナルソード』のBGM無断使用は、意図的ではなかったと販売元が声明。Nintendo
                                Switch『ファイナルソード』のBGM無断使用は、意図的ではなかったと販売元が声明。</a></p>
                    </li>
                    <li>
                        <p class="nameCompany"><a href="javascript:void(0);">◯◯◯◯株式会社</a></p>
                        <p class="linkPost"><a
                                href="javascript:void(0);">電通、「アマビエ」商標登録を出願していた…権利独占か、コロナ禍をも“儲けの道具”に電通、「アマビエ」商標登録を出願していた…権利独占か、コロナ禍をも“儲けの道具”に電通、「アマビエ」商標登録を出願していた…</a>
                        </p>
                    </li>
                    <li>
                        <p class="nameCompany"><a href="javascript:void(0);">株式会社ABCDE</a></p>
                        <p class="linkPost"><a
                                href="javascript:void(0);">コロナ薬普及へ特許共有を　日本提唱でG7援助案、実現に壁コロナ薬普及へ特許共有を　日本提唱でG7援助案、実現に壁コロナ薬普及へ特許共有を　日本提唱でG7援助案、実現に壁</a>
                        </p>
                    </li>
                    <li>
                        <p class="nameCompany"><a href="javascript:void(0);">◯◯◯◯株式会社</a></p>
                        <p class="linkPost"><a
                                href="javascript:void(0);">ノーベル賞・本庶氏が小野薬品提訴を表明　オプジーボ特許使用料226億円求めノーベル賞・本庶氏が小野薬品提訴を表明　オプジーボ特許使用料226億円求め</a>
                        </p>
                    </li>
                    <li>
                        <p class="nameCompany"><a href="javascript:void(0);">株式会社ABCDE</a></p>
                        <p class="linkPost"><a href="javascript:void(0);">Nintendo
                                Switch『ファイナルソード』のBGM無断使用は、意図的ではなかったと販売元が声明。Nintendo
                                Switch『ファイナルソード』のBGM無断使用は、意図的ではなかったと販売元が声明。</a></p>
                    </li>
                    <li>
                        <p class="nameCompany"><a href="javascript:void(0);">◯◯◯◯株式会社</a></p>
                        <p class="linkPost"><a
                                href="javascript:void(0);">電通、「アマビエ」商標登録を出願していた…権利独占か、コロナ禍をも“儲けの道具”に電通、「アマビエ」商標登録を出願していた…権利独占か、コロナ禍をも“儲けの道具”に電通、「アマビエ」商標登録を出願していた…</a>
                        </p>
                    </li>
                    <li>
                        <p class="nameCompany"><a href="javascript:void(0);">株式会社ABCDE</a></p>
                        <p class="linkPost"><a href="javascript:void(0);">Nintendo
                                Switch『ファイナルソード』のBGM無断使用は、意図的ではなかったと販売元が声明。Nintendo
                                Switch『ファイナルソード』のBGM無断使用は、意図的ではなかったと販売元が声明。</a></p>
                    </li>
                    <li>
                        <p class="nameCompany"><a href="javascript:void(0);">◯◯◯◯株式会社</a></p>
                        <p class="linkPost"><a
                                href="javascript:void(0);">電通、「アマビエ」商標登録を出願していた…権利独占か、コロナ禍をも“儲けの道具”に電通、「アマビエ」商標登録を出願していた…権利独占か、コロナ禍をも“儲けの道具”に電通、「アマビエ」商標登録を出願していた…</a>
                        </p>
                    </li>
                </ul>

                <?php theme_pagination() ?>
        </div>
    </div>
</div>
<!-- #content -->

<?php get_footer() ?>