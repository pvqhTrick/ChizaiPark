<?php
/**
 * The template for displaying Seminar detail
 */
get_header();

?>
<?php display_mainTitle('セミナー情報') ?>
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
    <div class="areaSaminarDetail">
        <div class="bigInner">
            <div class="wrapContent">
                <?php while( have_posts() ): the_post(); ?>
                <h2 class="infoTitle">オンラインセミナー：契約の基礎と知的財産権リスクに関わる取決めに<br>ついて </h2>
                <ul class="social">
                    <li><a href="javascript:void(0);" class="hover"><img src="assets/images/seminar/icon-fb.svg"
                                alt=""></a></li>
                    <li><a href="javascript:void(0);" class="hover"><img src="assets/images/seminar/icon-tw.svg"
                                alt=""></a></li>
                    <li><a href="javascript:void(0);" class="hover"><img src="assets/images/seminar/icon-line.svg"
                                alt=""></a></li>
                </ul>
                <div class="contentSamiraDetail">
                    <h4>目的</h4>
                    <p>本県でのサテライトオフィスの開設により、首都圏等から本県への企業及び人の移転・移住を促進するため、県外企業が本県においてサテライトオフィスを開設する際に要する経費の一部を補助します。</p>
                    <h4>対象者の詳細</h4>
                    <p>　下記（１）～（５）をすべて満たす者とする。<br>　（１）福島県内に本社、支社、事業所等の拠点を有していない法人であること。<br>　（２）当該補助金の交付を受け開設した施設をサテライトオフィスとして5年以上運用すると誓約できること。<br>　（３）サテライトオフィスの開設により、当該サテライトオフィスでの勤務者として移住者や二地域居住者が生じること。<br>　（４）サテライトオフィスの設置が、都市計画法や建築基準法等のその他の関係法令に違反していないこと。<br>　（５）会社更生法（平成14年法律第154号）第17条の規定による更正手続開始の申立てがなされていないこと。
                    </p>
                    <h4>開催日時</h4>
                    <p>受付開始：2020年10月02日 13:30〜<br>セミナー：2020年10月02日 14:00〜16:00まで</p>
                    <h4>場所</h4>
                    <p>東京都港区新橋1-1-1 ◯◯◯◯ビル　4F</p>
                    <h4>講師</h4>
                    <p>山田 太郎（株式会社◯◯◯◯
                        代表）<br>【経歴】<br>1999年：◯◯◯大学　理学部卒業<br>2000年：株式会社◯◯◯入社<br>◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯<br>◯◯◯◯◯◯◯◯◯◯◯◯◯◯
                    </p>
                    <h4>募集期間</h4>
                    <p>2020.07.01〜2020.10.01まで</p>
                    <h4>問い合わせ先</h4>
                    <p>03-0000-1111（セミナー事務局）</p>
                </div>
                <p class="buttonSeminarDetail"><a href="<?php echo home_url('/seminar/') ?>">応募ページへ移動</a></p>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<!-- #content -->
<?php get_footer() ?>