<?php
require_once('wp_bootstrap_navwalker.php');
require_once( 'wptuts-options/wptuts-options.php' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
) );
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
function loaibohtmltrongvanban($html, $exceptions = null)
{
        if (is_array($exceptions) && !empty($exceptions)) {
            foreach ($exceptions as $exception) {
                $openTagPattern = '/<(' . $exception . ')(\s.*?)?>/msi';
                $closeTagPattern = '/<\/(' . $exception . ')>/msi';
                $html = preg_replace(array($openTagPattern, $closeTagPattern), array('||l|\1\2|r||',
                        '||l|/\1|r||'), $html);
            }
        }
        $html = preg_replace('/<.*?>/msi', '', $html);
        if (is_array($exceptions)) {
            $html = str_replace('||l|', '<', $html);
            $html = str_replace('|r||', '>', $html);
        }
        return $html; // Code in Vn4rum.net - Thế giới học tập
}
function strip_shortcode($code, $content)
{
    global $shortcode_tags;

    $stack = $shortcode_tags;
    $shortcode_tags = array($code => 1);

    $content = strip_shortcodes($content);

    $shortcode_tags = $stack;
	$content_with_out_pre = str_replace(array('<pre>', '</pre>'),array('', ''), $content);
	$content_with_out_code = str_replace(array('<code>', '</code>'),array('', ''), $content_with_out_pre);
    return $content_with_out_code;
}
function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ",$excerpt).'...';
  } else {
      $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}
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
/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function theme_name_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'theme_name_wp_title', 10, 2 );
