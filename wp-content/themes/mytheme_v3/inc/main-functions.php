<?php
/**
 * MAIN FUNCTIONS
 */




// THE TAXS IN A POST
function theTaxsPost( $tax_slug = 'category' ) {
    global $post;
    if( !$post ) return false;
    $tax_slug = ($tax_slug) ? $tax_slug : 'category';
    // GET RESULT
    $taxs_html = '';
    $taxonomies = wp_get_post_terms( $post->ID, $tax_slug );
    foreach($taxonomies as $taxonomy) {
        if($taxonomy->term_id != 1) {
            $taxs_html .= '<li><a href="'. get_term_link($taxonomy) .'">'.$taxonomy->name.'</a></li>';
        }
    }
    echo $taxs_html;
}


// THE LIST TAX
function theTaxs( $tax_slug = 'category' ) {
    $tax_slug = ($tax_slug) ? $tax_slug : 'category';
    // GET RESULT
    $taxs_html = '';
    $taxonomies = get_terms( array(
        'taxonomy'   => $tax_slug,
        'hide_empty' => false,
    ) );
    foreach($taxonomies as $taxonomy) {
        if($taxonomy->term_id != 1) {
            $taxs_html .= '<li><a href="'. get_term_link($taxonomy) .'">'.$taxonomy->name.'</a></li>';
        }
    }
    echo $taxs_html;
}


// THEME PAGINATION FUNCTION
function theme_pagination( $post_query = null ) {
    global $paged, $wp_query;
    
    $translate['next'] = '>>';
    $translate['prev'] = '<<'; 
    $translate['last'] = '>>>';
    $translate['first'] = '<<<'; 
    
    if( empty( $paged ) ) $paged = 1;
    $prev = $paged - 1;             
    $next = $paged + 1;
    
    $end_size = 1;
    $mid_size = 2;
    $show_all = false;
    $dots = false;

    $pagi_query = $wp_query;
    if( isset($post_query) && $post_query ) {
        $pagi_query = $post_query;
    }

    if( ! $total = $pagi_query->max_num_pages ) $total = 1;
    
    if( $total > 1 )
    {
        echo '<div class="pagingNav">';
        echo '<ul class="navList">';
        
        // echo '<li class="prev"><a class="hover" href="'. previous_posts(false) .'">'. $translate['first'] .'</a></li>';


        if( $paged > 1 ){
            echo '<li class="prev"><a class="hover" href="'. previous_posts(false) .'">'. $translate['prev'] .'</a></li>';
        }

        for( $i = 1; $i <= $total; $i++ ){
            if ( $i == $paged ){
                echo '<li class="active"><a>'. $i .'</a></li>';
                $dots = true;
            } else {
                if ( $show_all || ( $i <= $end_size || ( $paged && $i >= $paged - $mid_size && $i <= $paged + $mid_size ) || $i > $total - $end_size ) ){
                    echo '<li><a href="'. get_pagenum_link($i) .'">'. $i .'</a></li>';
                    $dots = true;
                } elseif ( $dots && ! $show_all ) {
                    echo '<li class="dots"><a>...</a></li>';
                    $dots = false;
                }
            }
        }
      
        if( $paged < $total ){
            echo '<li class="p-control next"><a href="'. next_posts(0,false) .'">'. $translate['next'] .'</a></li>';
        }

        // echo '<li class="p-control next"><a href="'. next_posts(0,false) .'">'. $translate['last'] .'</a></li>';


      	echo '</ul>';
      	echo '</div>';
    }
}


// GET QUERY PAGED NUMBER
function get_query_paged() {

	return get_query_var('paged') ? get_query_var('paged') : 1;
}


// THE SINGLE PAGINATION
function the_single_pagination() {
    $prev_post = get_previous_post();
    $next_post = get_next_post();
?>
    <ul class="pagination">
        <?php if( $prev_post ): ?>
            <li><a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="prev">ウィンターセール開催 !</a></li>
        <?php endif; ?>
        <?php if( $next_post ): ?>
            <li><a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next">マリアナ　イベント開催 !</a></li>
        <?php endif; ?>
    </ul>
<?php
}

// INCREASE VIEW AS POST TYPE JOSEIKIN
function increase_post_view($post_id) {
    // Kiểm tra nếu đây là một bài viết (post)
    if( is_single() ) {
        $views = get_post_meta($post_id, 'view', true);
        $views++;
        update_post_meta($post_id, 'view', $views);
    }
}
add_action('wp_head', function() {
    if (is_single()) {
        increase_post_view(get_the_ID());
    }
});




// DISPLAY MAIN TITLE
function display_mainTitle(){
    $title = '';
    $data_page = [
        'joseikin' => '助成金情報',
        'seminar' => 'セミナー情報',
        'kigyou' => '企業の知財紹介',
        'venture-capital' => 'ベンチャー・キャピタル',
        'news' => '知財ニュース',
        'chizai' => '知財の活用事例',
        'contact' => 'お問い合わせ',
    ];
    foreach($data_page as $item => $titleJP){
        if( is_post_type_archive($item) || is_singular($item) ||is_page($item) ){
            $title = $titleJP;
        }
    };
?>

    <div id="main" class="df">
        <h2 class="mainTitle"><?php echo $title ?></h2>
    </div>
<?php };

function box_count_post($query = 'null'){ 
    $found_posts = $query->found_posts;
    $paged = isset($query->query_vars['paged']) ? $query->query_vars['paged'] : 1;
    // var_dump($query);
    // var_dump($found_posts, $paged);
    $number_paged = 5;
?>
    <p class="boxCount">
        <span class="quantity"><?php echo $found_posts ?></span>件中<span class="fPost"><?php echo ($paged - 1) * $number_paged + 1 ?></span>〜<span class="lPost"><?php echo min($found_posts, $paged * $number_paged) ?></span>件
    </p>
<?php }



// AJAX HANDLER
function get_prefectures_by_area() {
    if (isset($_GET['area'])) {
        $area = $_GET['area'];
        $child = get_terms(array(
            'taxonomy' => 'area',
            'hide_empty' => false,
            'parent' => get_term_by('slug', $area, 'area')->term_id,
        ));

        if (!empty($child)):
            foreach ($child as $child) :?>
                <option value="<?php echo $child->slug ?>"><?php echo $child->name ?></option>
            <?php endforeach;
        else: ?>
            <option value="">該当する都道府県はありません</option>
        <?php endif;
    }
    wp_die();
}
add_action('wp_ajax_get_prefectures_by_area', 'get_prefectures_by_area');
add_action('wp_ajax_nopriv_get_prefectures_by_area', 'get_prefectures_by_area');


function modify_search_query($query) {
    if ($query->is_search && !is_admin()) {
        $meta_query = array('relation' => 'AND');

        if (!empty($_GET['area'])) {
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'area',
                    'field' => 'slug',
                    'terms' => $_GET['area'],
                ),
            ));
        }

        if (!empty($_GET['child'])) {
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'prefecture',
                    'field' => 'slug',
                    'terms' => $_GET['child'],
                ),
            ));
        }
    }
}
add_action('pre_get_posts', 'modify_search_query');

function  get_first_area($cat = 'area'){
    $areas = get_the_terms(get_the_ID(), $cat);
    if ($areas && !is_wp_error($areas)) {
        foreach ($areas as $area) {
            if ($area->parent !== 0) { 
                return $area;
            }
        }
    }
    return '';
}
                           