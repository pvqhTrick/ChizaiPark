<?php if( get_field('company_info') && get_field('company_img') ):?>

<div class="boxCompany">
    <h4 class="companyTitle">会社情報</h4>
    <div class="companyWrap">
        <p class="companyPhoto"><img src="<?php the_field('company_img') ?>" alt="会社情報"></p>
        <div class="companyContent">
            <p class="companyText"><?php the_field('company_info') ?></p>
            <p class="companyLink"><a href="javascript:void(0);">コーポレートサイトへ</a></p>
        </div>
    </div>
</div>
<!-- BOXCOMPANY -->
<?php endif; ?>