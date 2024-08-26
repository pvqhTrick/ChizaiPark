<?php
$areas = get_terms(array(
    'taxonomy'   => 'area',
    'hide_empty' => false,
    'parent'     => 0, 
));

if($areas): ?>
<div class="sideBar">
    <div class="boxRegion">
        <h2 class="regionTitle">地域別</h2>
        <?php foreach($areas as $area): ?>
        <div class="regionBox">
            <h3 class="listregionTitle first"><a href="<?php echo get_term_link( $area ) ?>"><?php echo $area->name ?></a></h3>
            <?php 
            $child_area = get_terms( array(
                'taxonomy'   => 'area',
                'hide_empty' => false,
                'parent'     => $area->term_id, 
            )); 
            ?>
            <?php if(!empty( $child_area )): ?>
            <ul class="listregion">
                <?php foreach ( $child_area as $child ): ?> 
                    <li><a href="<?php echo home_url('joseikin?area=').$child->slug ?>"><span><?php echo $child->name ?></span></a></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>