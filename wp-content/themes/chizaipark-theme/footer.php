<div id="footer">
        <div class="scrollToTop"><a href="javascript:void(0);">このページの先頭へ</a></div>
        <div class="bigInner">
            <div class="footerInfo">
                <div class="ftMenu df">
                    <?php wp_nav_menu(array('theme_location' => 'footerMenu', 'container' =>'', 'menu_class' => 'menu')); ?>
                    <div class="logo"><img src="<?php themeUrl() ?>/assets/images/common/logo-footer.svg" alt=""></div>
                </div>
                <p id="copyright">All Copyrights Reserved (C) Phan Van Quoc Hung</p>
                <p class="sub">このWebサイト上の文章、映像、写真などの著作物の全部、<br class="sp">または一部を当社の了承なく複製、使用することを禁じます。</p>
            </div>
        </div>
    </div>
    <!-- #footer -->
</body>

</html>
<?php wp_footer(); ?>
