<?php
require_once('wp_bootstrap_navwalker.php');
require_once( 'wptuts-options/wptuts-options.php' );
add_theme_support( 'post-thumbnails' );
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'chammut' ),
) );
add_filter('main-nav', function($atts, $item, $args) {
    if ( $args->has_children )
    {
        $atts['data-toggle'] = 'dropdown';
        $atts['class'] = 'dropdown-toggle';
    }

    return $atts;
}, 10, 3);
function short_content($content,$num_word)
{
    $content = strip_tags($content);
    $content = preg_replace("/<\/?img(.|\s)*?>/i", '', $content);
    $content = wp_trim_words($content, $num_word, null);

    echo apply_filters('the_content', $content);
}
register_sidebar(array(
    'id' => 'sidebarauthor',
    'name' => 'Author Sidebar',
    'description' => 'Used on every page BUT the homepage page template.',
    'before_widget' => '<div id="akmanda_author-2" class="widget akmanda_author">',
    'after_widget' => '</div>'
));
register_sidebar(array(
    'id' => 'facebooksiderbar',
    'name' => 'Facebook Sidebar',
    'description' => 'Used on every page BUT the homepage page template.',
    'before_widget' => '<div id="facebook-likebox-2" class="widget widget_facebook_likebox visible-xs">',
    'after_widget' => '</div>'
));
register_sidebar(array(
    'id' => 'searchsidebar',
    'name' => 'Search Sidebar',
    'description' => 'Used on every page BUT the homepage page template.',
    'before_widget' => '<div id="search-2" class="widget widget_search">',
    'after_widget' => '</div>'
));
register_sidebar(array(
    'id' => 'menubar',
    'name' => 'Menu Bar',
    'description' => 'Used on every page BUT the homepage page template.',
    'before_widget' => '<div id="%1$s sidebar-wrapper" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
));
register_sidebar(array(
    'id' => 'categories-bar',
    'name' => 'Categories Bar',
    'description' => 'Used on every page BUT the homepage page template.',
    'before_widget' => '<div id="%1$s sidebar-wrapper" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
));
if ( function_exists('register_sidebar') )
    register_sidebar();