<?php

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

	global $wp_version;
	if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

add_action( 'admin_head', 'fix_svg' );
function fix_svg() {
	echo '<style type="text/css">
    .attachment-266x266, .thumbnail img {
      width: 100% !important;
      height: auto !important;
  }
  </style>';
}


//  ACF options page
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

}


// Case Study Custom Post Type
function projects() {
    $labels = array(
      'name'               => _x( 'Projects', 'post type general name' ),
      'singular_name'      => _x( 'Project', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'Project' ),
      'add_new_item'       => __( 'Add New Project' ),
      'edit_item'          => __( 'Edit Project' ),
      'new_item'           => __( 'New Project' ),
      'all_items'          => __( 'All Projects' ),
      'view_item'          => __( 'View Project' ),
      'search_items'       => __( 'Search Projects' ),
      'not_found'          => __( 'No Projects found' ),
      'not_found_in_trash' => __( 'No Projects found in the Trash' ), 
      'parent_item_colon'  => '',
      'menu_name'          => 'Projects'
  );
  
    $args = array(
      'labels'        => $labels,
      'description'   => 'Projects',
      'public'        => true,
      'show_in_rest'  => true,
      'show_ui'       => true,
      'query_var'     => true,
      'show_in_admin_bar' => true,
      'capability_type'  => 'post',
      'menu_icon'     => 'dashicons-welcome-widgets-menus',
      'menu_position' => 22,
      'supports'      => array( 'title' , 'thumbnail', 'editor'),
      'hierarchical' => false,
      'has_archive'   => true,
      'taxonomies' => array('category'),
  );   
  
    register_post_type( 'projects', $args );   
  }
  add_action( 'init', 'projects' );

  
  add_post_type_support( 'projects', 'thumbnail' );

function top_level_class($classes, $item) {
  if( $item->menu_item_parent == 0 ) {
    $classes[] = "top-level";
}
return $classes;
}

add_filter('nav_menu_css_class', 'top_level_class', 10, 2 );


function change_ul_item_classes_in_nav( $classes, $args, $depth ) {
    if ( 0 == $depth ) {
        $classes[] = 'first-level';
    }
    if ( 1 == $depth ) {
        $classes[] = 'second-level';
    }
    return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'change_ul_item_classes_in_nav', 10, 3 );


function left_nav() {
    $menuParameters = array(
        'theme_location'  => 'left',
        'container'       => false,
        'echo'            => true,
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker' => new ExtendWalker()
    );
    echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
}

function right_nav() {
    $menuParameters = array(
        'theme_location'  => 'right',
        'container'       => false,
        'echo'            => true,
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker' => new ExtendWalker()
    );
    echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
}

function mobile_nav() {
    $menuParameters = array(
        'theme_location'  => 'mobile',
        'container'       => false,
        'echo'            => true,
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
    );
    echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
}

// grab top level menu title
function add_menu_title( $item_output, $item, $depth, $args ) {
    global $menuTitle;
    $menuTitle = $item->title;
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'add_menu_title', 10, 4);


// extend menu walker
class ExtendWalker extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        global $menuTitle;

        if ($depth == 0) {
            // wrapper class that just selfwraps around the sub menu level items.. dont know how it works
            $output .= "\n$indent<section class='sub-menu-wrapper flex items-start'>\n";
        }

        // sub-menu-inner wrapper start
        $output .="<div class=\"sub-menu-inner p-6 w-1/2 flex flex-col items-start\">";
        $output .="<h3 class=\"uppercase text-3xl border-b-4 glacial-bold  border-red pb-6 mb-6\">$menuTitle</h3>";

        // sub-menu markup
        $output .= "<ul class=\"sub-menu\">\n";
    }

    // setup function for appending the posts to the nav end of current html level 
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        // sub-menu end
        $output .= "\n$indent</ul>\n";
        // sub-menu-inner end
        $output .="</div>";

        // loop for posts starts here
        if ($depth == 0) {

            $output .= "<aside class=\"case-studies w-1/2\">\n";

            $args = array(
                "post_type" => "projects",
                "order" => "DESC",
                "posts_per_page" => "3"
            );
            $casestudy = new WP_query($args);
            // start of swiper
            $output .="<div class=\"swiper navSlider\">";
            $output .="<div class=\"swiper-wrapper\">";

            while($casestudy->have_posts()): $casestudy->the_post();
                $postTitle = get_the_title();
                $backgroundImage = get_field('featured_image');
                $duration = get_field('time_completed_in');
                $cost = get_field('cost');
                $location = get_field('location');
                $permalink = get_the_permalink();
                $templateURL  = get_template_directory_uri();

                if (!empty($backgroundImage)) {
                    $imageURL = $backgroundImage['url'];
                } else {
                    $imageURL = '';
                }

                $output .= "<div class=\"swiper-slide\">";
                    $output .= "<div class=\"slide-inner\" style=background-image:url(\"$imageURL\")>";
                        $output .= "<div class=\"background__overlay p-6\">";
                            $output .= "<div class=\"text-center flex flex-col items-center\">";
                                $output .= "<h4 class=\"pb-4 text-xl\">";
                                $output .= $postTitle;
                                $output .= "</h4>";
                                $output .= "<div class=\"border-b-2 border-t-2 border-white py-6\">";
                                    $output .= "<h5 class=\"text-sm mb-2\">Project Duration: $duration</h5>";
                                    $output .= "<h5 class=\"text-sm mb-2\">Contract Value: $cost</h5>";
                                    $output .= "<h5 class=\"text-sm\">Location: $location</h5>";
                                $output .= "</div>";

                                $output .="<a href=\"$permalink\" class=\"uppercase mt-4 border-2 px-6 py-2 inline-block border-white\">View Project</a>";

                            $output .= "</div>";
                        $output .= "</div>";

                    $output .= "</div>";
                $output .= "</div>";

            endwhile;
            wp_reset_query();

            $output .= "</div>";
            $output .= "<div class=\"flex space-x-4 items-center nav-slider-navigation\">
                            <div class=\"nav-button-prev\">
                                <img src=\"$templateURL/src/svg/arrow-prev.svg\">
                            </div>
                            <div class=\"nav-button-next\">
                                <img src=\"$templateURL/src/svg/arrow-next.svg\">
                            </div>";
            $output .= "</div>";
            // end of swiper markup
            $output .= "</aside>\n";

            // end of loop markup
        }
    }
}


function footer_nav() {
    $menuParameters = array(
        'theme_location'  => 'footer',
        'container'       => false,
        'echo'            => true,
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
    );
    echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
}

function layout_loader($path, $array) {
    foreach($array as $layout) {
        get_template_part($path . $layout);
    }
}

function svg($file_name) {
    return get_template_directory_uri() . '/src/svg/' . $file_name . '.svg';
}


// populate project slider categories
add_filter( 'acf/load_field/name=project_slider_type', function( $field ) {
  
    // Get all taxonomy terms
    $args = array(
       'taxonomy' => 'category',
       'orderby' => 'name',
       'order'   => 'ASC'
    );

   $cats = get_categories($args);
  
  // Add each term to the choices array.
  // Example: $field['choices']['review'] = Review
  foreach($cats as $cat) {
    $field['choices'][$cat->slug] = $cat->name;
  }

  return $field;
} );




// Ajax for load more pagination button 

add_action( 'wp_head', 'add_ajax_url_to_script' );

add_action( 'wp_ajax_load_more_posts_callback', 'load_more_posts_callback' );
add_action( 'wp_ajax_nopriv_load_more_posts_callback', 'load_more_posts_callback' );

function load_more_posts_callback() {
    $loadArgs = json_decode( stripslashes( $_POST['query_vars'] ), true );
    $loadArgs['paged'] = $_POST['paged'];
    $loadArgs['post_status'] = 'publish';
    $loadArgs['post_type'] = 'projects';

    $query = new WP_Query( $loadArgs );

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
          get_template_part('template-parts/project-archive-card');
        endwhile;
    endif;

    die;
}

function add_ajax_url_to_script() {
    ?>
    <script>
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
}

