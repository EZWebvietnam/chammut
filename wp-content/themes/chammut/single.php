<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en-US">
<![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en-US" >
<!--<![endif]-->
<?php get_header();?>
<body class="single single-post postid-2605 single-format-image">
<header id="header" class="header clearfix">
    <div class="container">
        <div class="logo pull-left">
            <div class="logo-image">
                <?php $theme_option = get_option( 'theme_wptuts_options' );?>
                <a href="<?php echo get_bloginfo('url') ?>"><img src="<?php echo $theme_option['logo']?>" class="image-logo" alt="logo" /></a>
            </div>
        </div>
        <!-- logo -->
        <?php require('menu.php');?>
        <ul class="footer-social pull-right">
            <li class="twitter"><a href="http://twitter.com/#" class="icon icon-twitter-alt"></a></li>
            <li class="google"><a href="http://google.com/#" class="icon icon-google"></a></li>
            <li class="facebook"><a href="http://facebook.com/#" class="icon icon-facebook-1"></a></li>
            <li class="linkedin"><a href="http://linkedin.com/#" class="icon icon-linkedin"></a></li>
            <li class="pinterest"><a href="http://pinterest.com/#" class="icon icon-path"></a></li>
        </ul>
    </div>
</header>
<?php
$postid = get_the_ID();
$post_data = get_post($postid);
?>
<div id="main" class="site-main container clearfix">
    <div id="content-wrapper" class="wrapper col-md-8 clearfix">
        <article  id="post-<?php echo $post_data->ID?>" class="post-<?php echo $post_data->ID?> post type-post status-publish format-image has-post-thumbnail hentry category-post-format tag-description tag-image tag-people tag-text clearfix">
            <div class="post-content clearfix">
                <a href="<?php echo get_permalink($post_data->ID);?>" title="<?php echo the_title();?>" >
                    <div class="post-thumb">
                        <?php

                        if ( has_post_thumbnail() ) {
                            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id());

                            the_post_thumbnail( 'large',array('class'=>'attachment-post-thumbnail wp-post-image','width'=>1024,'height'=>576));
                        }
                        ?>

                    </div>
                    <!-- post thumb -->
                </a>
                <div class="post-entry">
                    <div class="post-title">
                        <h2>
                            <a href="<?php echo get_permalink($post_data->ID);?>" title="<?php echo the_title();?>"><?php echo get_the_title(); ?></a>
                        </h2>
                    </div>
                    <!-- post-title -->
                    <div class="post-meta text-center">
                        <ul>

                            <li><?php echo get_the_date('', $post_data->ID); ?></li>
                        </ul>
                    </div>
                    <div class="bord"></div>
                    <div class="inner-content">
                        <?php
                        echo $post_data->post_content; ?>
                    </div>
                    <div class="bord"></div>
                    <div class="meta">
                        <div class="category-wrapper"><span>Category :</span> <?php $categories = get_the_category($post_data->ID); foreach($categories as $c) {?> <a href="<?php echo get_category_link($c->term_id)?>" rel="category tag"><?php echo $c->cat_name?></a> <?php } ?></div>
                        <div class="tag-wrapper"><span>Tags :</span> <?php $tags = wp_get_post_tags($post_data->ID); foreach($tags as $t) {?> <a href="<?php echo get_tag_link($t->term_id); ?>" rel="tag"><?php echo $t->name; if(count($tags) > 1) {?>,<?php }?></a><?php } ?></div>
                    </div>
                    <div class="bord"></div>
                    <ul class="footer-social">
                        <li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink($post_data->ID);?>" class="product_share_facebook" onclick="javascript:window.open(this.href,
                                    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"><i class="icon icon-facebook-1"></i></a></li>
                        <li class="twitter"><a href="https://twitter.com/share?url=<?php echo get_permalink($post_data->ID);?>/&text=<?php echo get_the_title();?>" onclick="javascript:window.open(this.href,
                                    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" class="product_share_twitter"><i class="icon icon-twitter-alt"></i></a></li>
                        <li class="google"><a href="https://plus.google.com/share?url=<?php echo get_permalink($post_data->ID);?>" onclick="javascript:window.open(this.href,
                                    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="icon icon-google"></i></a></li>
                        <li class="pinterest"><a href="//pinterest.com/pin/create/button/?url=<?php echo get_permalink($post_data->ID);?>&description=<?php echo get_the_title();?>" onclick="javascript:window.open(this.href,
                                    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=320,width=600');return false;" class="product_share_pinterest"><i class="icon icon-path"></i></a></li>
                    </ul>
                </div>
                <nav role="navigation" id="nav-below" class="navigation-post clearfix">
                    <?php
                    $previous_post = get_previous_post();
                    if ( is_a( $previous_post , 'WP_Post' ) ) {
                    ?>
                        <div class="nav-previous pull-left"><a href="<?php echo get_permalink( $previous_post->ID ); ?>" rel="prev"><i class="icon icon-fontawesome-webfont-2"></i></span></a></div>
                    <?php } ?>

                    <?php
                    $next_post = get_next_post();
                    if ( is_a( $next_post , 'WP_Post' ) ) { ?>
                        <div class="nav-next pull-right"><a href="<?php echo get_permalink( $next_post->ID ); ?>" rel="next"><i class="icon icon-fontawesome-webfont-1"></i></span></a></div>

                    <?php } ?>

                </nav>
                <!-- #nav-below -->
            </div>
            <!-- post-content -->
            <?php
            if(comments_open())
            {
            ?>
            <div id="comments" class="comments-area" data-scroll-reveal="bottom">
                <div class="comments-title" data-scroll-reveal="bottom">
                    <i class="icon icon-discussion"></i>
                    One Comment
                    <div class="bord" data-scroll-reveal="bottom"></div>
                </div>
                <ol class="comment-list" data-scroll-reveal="bottom">
                    <?php

                    $comments = get_approved_comments($post_data->ID);


                    foreach($comments as $cm)
                    {
                    ?>
                    <li class="comment even thread-even depth-1" id="li-comment-9">
                        <article id="comment-<?php echo $cm->comment_ID?>" class="comment">
                            <header class="clearfix">
                                <div class="avatar pull-left">
                                    <?php echo get_avatar($cm,50);?>
                                </div>
                                <!-- avatar -->
                                <div class="meta-comment pull-left">
                                    <div class="comment-author vcard">
                                        <cite class="fn"><?php echo $cm->comment_author?></cite>
                                    </div>
                                    <!-- .comment-author .vcard -->
                                    <div class="comment-meta commentmetadata">
                                        <time datetime="<?php echo $cm->comment_date?>">
                                            <?php echo date('d M Y',strtotime($cm->comment_date))?>					</time>
                                    </div>
                                    <!-- .comment-meta .commentmetadata -->

                                    <!-- .comment-action -->
                                </div>
                                <!-- meta comment -->
                            </header>
                            <div class="comment-content">
                                <p><?php echo $cm->comment_content;?></p>
                            </div>
                        </article>
                        <!-- #comment-## -->
                    </li>
                    <?php } ?>
                    <!-- #comment-## -->
                </ol>
                <!-- .comment-list -->
                <div id="respond" class="comment-respond">
                    <style>
                        .form-allowed-tags
                        {
                            display: none;
                        }
                    </style>
                    <?php
                    comment_form(array(),$post_data->ID);
                    ?>

                </div>
                <!-- #respond -->
            </div>
            <!-- #comments -->
            <?php } ?>
        </article>
        <!-- #post-2605 -->
    </div>
    <!-- wrapper -->
    <aside id="primary-sidebar" class="widget-area col-md-4" role="complementary">
        <div id="search-2" class="widget widget_search">
            <form method="get" class="searchform" action="<?php echo home_url();?>" role="search">
                <input type="search" class="field" name="s" value="<?php echo esc_html($s, 1); ?>" id="s" placeholder="Search this site" />
                <input type="submit" class="submit search-button" value="" />
            </form>
        </div>
        <?php if ( is_active_sidebar( 'sidebarauthor' ) ) : ?>

            <?php dynamic_sidebar( 'sidebarauthor' ); ?>

        <?php endif; ?>

        <?php if ( is_active_sidebar( 'facebooksiderbar' ) ) : ?>

            <?php dynamic_sidebar( 'facebooksiderbar' ); ?>

        <?php endif; ?>
        <div class="widget ad300 clearfix">
            <h4 class="widget-title ads">Ads</h4>
            <ul class="ad125 clearfix">
                <li class="col-xs-6"><a href="http://www.themesawesome.com/"><img class="twinsbox" src="http://nomad.themesawesome.com/wp-content/uploads/2014/01/ads125.png" alt="" /></a></li>
                <li class="col-xs-6"><a href="http://www.themesawesome.com/"><img class="twinsbox" src="http://nomad.themesawesome.com/wp-content/uploads/2014/01/ads125.png" alt="" /></a></li>
                <li class="col-xs-6"><a href="http://www.themesawesome.com/"><img class="twinsbox" src="http://nomad.themesawesome.com/wp-content/uploads/2014/01/ads125.png" alt="" /></a></li>
                <li class="col-xs-6"><a href="http://www.themesawesome.com/"><img class="twinsbox" src="http://nomad.themesawesome.com/wp-content/uploads/2014/01/ads125.png" alt="" /></a></li>
            </ul>
        </div>
		<?php if ( is_active_sidebar( 'categories-bar' ) ) : ?>

                <?php dynamic_sidebar( 'categories-bar' ); ?>

        <?php endif; ?>
        
    </aside>
    <!-- #primary-sidebar -->
</div>
<!-- #main-->
<?php get_footer();?>
<script type="text/javascript">
    adroll_adv_id = "EWGSCXWYUBA5PGHBBNLLPZ";
    adroll_pix_id = "ZK2J6XBTSRHV3KUVQKW72Q";
    (function () {
        var oldonload = window.onload;
        window.onload = function(){
            __adroll_loaded=true;
            var scr = document.createElement("script");
            var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
            scr.setAttribute('async', 'true');
            scr.type = "text/javascript";
            scr.src = host + "/j/roundtrip.js";
            ((document.getElementsByTagName('head') || [null])[0] ||
            document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
            if(oldonload){oldonload()}};
    }());
</script><script type='text/javascript' src='<?php echo get_template_directory_uri()?>/style/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var _wpcf7 = {"loaderUrl":"http:\/\/merapi.themesawesome.com\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ...","cached":"1"};
    /* ]]> */
</script>
<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/style/plugins/contact-form-7/includes/js/scripts.js?ver=3.9.3'></script>
<script type='text/javascript' src='http://s0.wp.com/wp-content/js/devicepx-jetpack.js?ver=201513'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/js/js/comment-reply.min.js?ver=4.0.1'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/style/themes/merapi/js/pluginsFoot.js?ver=4.0.1'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/style/themes/merapi/js/main.js?ver=4.0.1'></script>
<script src="http://stats.wp.com/e-201513.js" type="text/javascript"></script>
<script type="text/javascript">
    st_go({v:'ext',j:'1:3.1.1',blog:'68428356',post:'2605',tz:'0'});
    var load_cmc = function(){linktracker_init(68428356,2605,2);};
    if ( typeof addLoadEvent != 'undefined' ) addLoadEvent(load_cmc);
    else load_cmc();
</script>
</body>
</html>
