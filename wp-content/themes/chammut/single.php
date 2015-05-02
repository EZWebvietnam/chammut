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
	<?php 
	while ( have_posts() ) : the_post();
	?>
	
        <article  id="post-<?php echo $post_data->ID?>" class="post-<?php echo $post_data->ID?> post type-post status-publish format-image has-post-thumbnail hentry category-post-format tag-description tag-image tag-people tag-text clearfix">
            
			<?php 
			get_template_part( 'post', get_post_format() );
			?>
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
		<?php 
		endwhile;
		?>
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
