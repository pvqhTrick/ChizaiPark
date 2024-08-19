<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="icon" type="image/png" href="myicon.png" />
    <meta name="description" content=" content " />
    <meta name="keywords" content=" content " />
    <meta name="author" content=" content " />
    <meta name="robots" content=" all " />
    <meta name="googlebot" content=" all ">
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
    <div id="header">
        <div class="bannerTop">
            <div class="bigInner df">
                <h3 class="slo1">知財の情報が盛りだくさん！助成金・補助金を使って知財を守ろう</h3>
                <h3 class="slo2 tnr">
                    <span class="slo21">SAKAMOTO & PARTNERS</span>
                    <span class="slo22">SAKAMOTO INTERNATIONAL PATENT OFFICE</span>
                </h3>
            </div>
        </div>
        <div class="headerBar">
            <div class="bigInner df">
                <div class="logo"><a class="hover" href="<?php homeUrl() ?>"><img src="<?php themeUrl() ?>/assets/images/common/logo.svg" alt=""></a></div>
                <div class="headerInfo df pc">
                    <div class="formSearch">
                        <form action="">
                            <input type="text" class="inputSearch" placeholder="フリーワードで検索">
                        </form>
                    </div>
                    <ul class="listBtn df">
                        <li><a href="#">知財パークとは</a></li>
                        <li><a href="#">無料会員登録</a></li>
                        <li class="cta hover"><a href="#">ログイン</a></li>
                    </ul>
                </div>
                <div class="hamburger close sp">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="mainMenu">
            <div class="menuNav">
                <div class="bigInner">
                   
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'container' =>'', 'menu_class' => 'menu df')); ?>
                    
                    <div class="headerInfo df sp">
                        <div class="formSearch">
                            <form action="">
                                <input type="text" class="inputSearch" placeholder="フリーワードで検索">
                            </form>
                        </div>
                        <ul class="listBtn df">
                            <li><a href="#">知財パークとは</a></li>
                            <li><a href="#">無料会員登録</a></li>
                            <li class="cta hover"><a href="#">ログイン</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #header -->
