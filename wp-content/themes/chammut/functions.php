<?php
add_theme_support( 'post-thumbnails' );
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

if ( function_exists('register_sidebar') )
    register_sidebar();