<?php 
function steelcase_scripts() {

    // Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
    if ( is_customize_preview() ) {
        wp_enqueue_style( 'steelcase-ie9', get_theme_file_uri( '/css/ie9.css' ), array( 'steelcase-style' ), '1.0' );
        wp_style_add_data( 'steelcase-ie9', 'conditional', 'IE 9' );
    }

    // Load the Internet Explorer 8 specific stylesheet.
    wp_enqueue_style( 'steelcase-ie8', get_theme_file_uri( '/css/ie8.css' ), array( 'steelcase-style' ), '1.0' );
    wp_style_add_data( 'steelcase-ie8', 'conditional', 'lt IE 9' );

    // Load the html5 shiv.
    wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.3' );
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    wp_register_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '1', 'all');
  
    // Enqueue custom Styles:


    wp_enqueue_style('flexslider', get_stylesheet_uri(), array(), '1', 'all' );
    

    wp_enqueue_style( 'steelcase-style', get_stylesheet_uri() );	

    // Enqueue custom scripts:

   // wp_enqueue_script('jquerymin', get_template_directory_uri() . '/scripts/jquery-1.12.4.min.js', array(), '1.12.4', false );

    wp_enqueue_script('jquery');
    wp_enqueue_script('flexsliderjs', get_template_directory_uri() . '/scripts/jquery.flexslider.js', array('jquery'), '2.1', true );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'steelcase_scripts' );

//content short 

        function read_more ($limit){
            $post_content = explode(' ', get_the_content());
            $less_content = array_slice($post_content, 0, $limit);
            echo implode(' ', $less_content);
        }
        
        /* Delegates post type */

        register_post_type('delegate', array(
            'labels' => array(
                'name' => __('Delegate Post Items', 'steelcase'),
                'add_new_item' => 'Add New Delegate Items'
            ),
            'public' => true,
            'supports' => array('title', 'editor'),
            'menu_icon' => 'dashicons-image-filter'
        ));

//pagination
if ( ! function_exists( 'pagination' ) ) :
    function pagination( $paged = '', $max_page = '' )
    {
        $big = 999999999; // need an unlikely integer
        if( ! $paged )
            $paged = get_query_var('paged');
        if( ! $max_page )
            $max_page = $wp_query->max_num_pages;

        $pages = paginate_links( array(
            'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link( $big ))),
            'format'     => '?paged=%#%',
            'current'    => max( 1, $paged ),
            'total'      => $max_page,
            'mid_size'   => 1,
            'prev_text'  => __(false),
            'next_text'  => __(false),
            'type'       => 'array'
        ) );
           if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<nav aria-label="Page navigation"><ul class="pagination">';
        foreach ( $pages as $page ) {
                echo "<li class='page-item'>$page</li>";
        }
       echo '</ul></nav>';
        }
    }
endif;

//pagination display
pagination( $paged, $posts->max_num_pages); wp_reset_postdata();