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


      	echo '</ul>';
      	echo '</div>';
    }
}
// AJAX PAGINATION
function theme_pagination_ajax($post_query = null ) {
    global $wp_query;
    if (isset($_POST['paged'])) {
        $paged = intval($_POST['paged']);
    } elseif (empty($paged)) {
        $paged = 1;
    }
    // var_dump($paged);
    $translate['next'] = '>>';
    $translate['prev'] = '<<'; 

    if (empty($paged)) $paged = 1;
    $prev = $paged - 1;             
    $next = $paged + 1;

    $end_size = 1;
    $mid_size = 2;
    $show_all = false;
    $dots = false;

    $pagi_query = $wp_query;
    if (isset($post_query) && $post_query) {
        $pagi_query = $post_query;
    }

    if (!$total = $pagi_query->max_num_pages) $total = 1;

    if ($total > 1) {
        echo '<div class="pagingNav">';
        echo '<ul class="navList">';


        for ($i = 1; $i <= $total; $i++) {
            if ($i == $paged) {
                echo '<li class="active"><a>' . $i . '</a></li>';
            } else {
                echo '<li><a class="ajax-page" href="" data-page="' . $i . '">' . $i . '</a></li>';
            }
        }
       

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



add_action('wp_ajax_get_prefectures_by_area', 'get_prefectures_by_area');
add_action('wp_ajax_nopriv_get_prefectures_by_area', 'get_prefectures_by_area');
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
            foreach ($child as $item) :?>
                <option value="<?php echo $item->slug ?>"><?php echo $item->name ?></option>
            <?php endforeach;
        else: ?>
            <option value="">該当する都道府県はありません</option>
        <?php endif;
    }
    wp_die();
}

add_action('wp_ajax_ajax_pagination', 'ajax_pagination');
add_action('wp_ajax_nopriv_ajax_pagination', 'ajax_pagination');
function ajax_pagination() {
    $paged = isset($_POST['paged']) ? $_POST['paged'] : 1;

    $query_args = array(
        'post_status' => 'publish',
        'post_type' => 'post',
        'posts_per_page' => 5,
        'paged' => $paged,
    );

    $ajax_query = new WP_Query($query_args);
    ob_start();
    if ($ajax_query->have_posts()) : ?>
        <ul class="boxList">
            <?php while ($ajax_query->have_posts()) : $ajax_query->the_post();?>
                <li>
                    <p class="datePost"><a href="#"><?php the_time('Y年m月d日') ?></a></p>
                    <div class="linkPost"><a href="<?php the_permalink() ?>"><?php the_excerpt() ?></a></div>
                </li>
            <?php endwhile; wp_reset_postdata();?>
        </ul>
    <?php endif; 
    $posts_html = ob_get_clean();

    ob_start();
    theme_pagination_ajax($ajax_query);
    $pagination_html = ob_get_clean();

    wp_send_json_success(array(
        'posts_html' => $posts_html,
        'pagination_html' => $pagination_html,
    ));
    
    wp_die();
}


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


// AJAX SEARCH AREA
add_action( 'wp_footer', 'ajax_javascript' );
function ajax_javascript() { ?>
    <script type="text/javascript" >
        (function($){
        $(document).ready(function(){
            $('#region').change(function(){
                var region_slug = $(this).val();
                if( region_slug ) {
                    $.ajax({
                        type : "post",
                        dataType : "json",
                        url : '<?php echo admin_url('admin-ajax.php');?>',
                        data : {
                            action : "get_prefecture_by_region",
                            region_slug : region_slug,
                        },
                        context: this,
                        beforeSend: function(){
                            $('#prefecture').prop('disabled', true);
                        },
                        success: function(response) {
                            if(response.success) {
                                var options = '<option value="">都道府県で選択</option>';
                                $.each(response.data, function(index, prefecture) {
                                    options += '<option value="' + prefecture.slug + '">' + prefecture.name + '</option>';
                                });
                                $('#prefecture').html(options).prop('disabled', false);
                            } else {
                                $('#prefecture').html('<option value="">利用可能なデータがありません</option>').prop('disabled', true);
                            }
                        }, 
                        error: function( jqXHR, textStatus, errorThrown ) {
                            console.log( 'The following error occured: ' + textStatus, errorThrown );
                        }
                    });
                }
            });
        });
        })(jQuery);
        
    </script>
    <script type="text/javascript">
        (function($){
        $(document).on('click', '.ajax-page', function(e){
            e.preventDefault();
            var page = $(this).data('page');
            $.ajax({
                type: 'post',
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                data: {
                    action: 'ajax_pagination',
                    paged: page
                },
                beforeSend: function(){
                    $('.boxList').fadeOut('slow');
                },
                success: function(response){
                    $('.boxList').html(response.data.posts_html).fadeIn('slow');
                    $('.pagingNav').html(response.data.pagination_html);
                    // $('html, body').animate({scrollTop: $('#content').offset().top}, 'slow');
                },
                error: function( jqXHR, textStatus, errorThrown ) {
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
            });
        });
        })(jQuery);
    </script>
    <?php
}


// AJAX PHP SERVER
add_action( 'wp_ajax_get_prefecture_by_region', 'get_prefecture_by_region' );
add_action( 'wp_ajax_nopriv_get_prefecture_by_region', 'get_prefecture_by_region' );

function get_prefecture_by_region() {
    $region_slug = isset($_POST['region_slug']) ? $_POST['region_slug'] : 0;

    if($region_slug) {
        $prefectures =get_prefectures_by_region($region_slug);

        if($prefectures) {
            $result = array();
            foreach($prefectures as $prefecture) {
                $result[] = array('slug' => $prefecture->slug, 'name' => $prefecture->name);
            }
            wp_send_json_success($result);
        } else {
            wp_send_json_error('都道府県が見つかりませんでした');
        }
    } else {
        wp_send_json_error('都道府県が見つかりませんでした');
    }
    die();
}

function get_prefectures_by_region($term_slug) {
    $parent_term = get_term_by('slug', $term_slug, 'area'); 

    if ($parent_term) {
        $child_terms = get_terms(array(
            'taxonomy' => 'area', 
            'child_of' => $parent_term->term_id,
            'hide_empty' => false,
        ));

        if (!empty($child_terms)) {
            return $child_terms;
        }
    }

    return false;
}


// EXCERPT LENGTH
add_filter( 'excerpt_length', 'chizai_excerpt_length', 100 );
function chizai_excerpt_length( $length ) {
	global $post;
	if($post->post_type === 'joseikin'){
		return 5;
	} elseif ($post->post_type === 'venture-capital'){
		return 30;
	} elseif ($post->post_type === 'news'){
		return 30;
	} elseif ($post->post_type === 'kigyou'){
		return 30;
	}
	return $length;
}
