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
<body class="home blog">
<header id="header" class="header clearfix">
    <div class="container">
        <div class="logo pull-left">
            <div class="logo-image">
                <a href="http://merapi.themesawesome.com"><img src="style/uploads/2014/05/white-logo.png" class="image-logo" alt="logo" /></a>
            </div>
        </div>
        <!-- logo -->
		<?php require('menu.php');?>
        <!--<nav id="mainmenu" class="menu pull-left">


            <ul id="menu-top-menu" class="sm sm-clean">
                <li id="menu-item-3093" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-3093"><a href="">Home</a></li>
                <li id="menu-item-3094" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3094">
                    <a href="#">Shortcode</a>
                    <ul class="sub-menu">

                        <li id="menu-item-3143" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3143"><a href="accordion/">Accordion</a></li>
                        <li id="menu-item-3144" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3144"><a href="column/">Column</a></li>
                        <li id="menu-item-3140" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3140"><a href="dropcap/">Dropcap</a></li>
                        <li id="menu-item-3139" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3139"><a href="google-maps-2/">Google Maps</a></li>
                        <li id="menu-item-3141" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3141"><a href="highlight-text/">Highlight text</a></li>
                        <li id="menu-item-3138" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3138"><a href="tabs/">Tabs</a></li>
                        <li id="menu-item-3142" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3142"><a href="toogle/">Toogle</a></li>
                    </ul>
                </li>
                <li id="menu-item-3137" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3137"><a href="contact/">Contact</a></li>
                <li id="menu-item-3145" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3145"><a href="typography/">Typography</a></li>
            </ul>
        </nav>-->
        <ul class="footer-social pull-right">
            <li class="twitter"><a href="http://twitter.com/#" class="icon icon-twitter-alt"></a></li>
            <li class="google"><a href="http://google.com/#" class="icon icon-google"></a></li>
            <li class="facebook"><a href="http://facebook.com/#" class="icon icon-facebook-1"></a></li>
            <li class="linkedin"><a href="http://linkedin.com/#" class="icon icon-linkedin"></a></li>
            <li class="pinterest"><a href="http://pinterest.com/#" class="icon icon-path"></a></li>
        </ul>
    </div>
</header>
<div id="main" class="site-main container clearfix">
    <div id="content-wrapper" class="wrapper col-md-8 clearfix">
        <div class="row">
            <ul class="grid effect-6" id="grid">

                <?php $args = array(
                    'numberposts' => 10,
                    'offset' => 0,
                    'category' => 0,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'include' => '',
                    'exclude' => '',
                    'meta_key' => '',
                    'meta_value' =>'',
                    'post_type' => 'post',
                    'post_status' => 'draft, publish, future, pending, private',
                    'suppress_filters' => true );

                $recent_posts = wp_get_recent_posts( $args, ARRAY_A );

                foreach( $recent_posts as $recent ){
                ?>
                <li  id="post-<?php echo $recent["ID"];?>" class="post-<?php echo $recent["ID"];?> post type-post status-publish format-standard has-post-thumbnail hentry category-standard-post tag-description tag-image tag-people tag-text col-md-6 animate">
                    <div class="post-content">
                        <div class="intro-post">
                            <i class="icon post-type icon-elusive-icons-1"></i>
                            <a href="<?php echo get_permalink($recent["ID"]);?>" title="<?php echo $recent["post_title"];?>" >
                                <div class="post-thumb">
                                    <?php
                                    $default_attr = array(
                                        'width'=>1000,
                                        'height'=>732,
                                        'class'	=> "attachment-post-thumbnail wp-post-image",
                                        'alt'	=> trim( strip_tags( $recent["post_title"] ) ),
                                        'title'	=> trim( strip_tags( $recent["post_title"] ) ),
                                    );
                                    echo get_the_post_thumbnail( $recent["ID"], array( 350, 256), $default_attr ); ?>

                                </div>
                                <!-- post thumb -->
                            </a>
                        </div>
                        <div class="post-entry">
                            <div class="post-title">
                                <h2>
                                    <a href="<?php echo get_permalink($recent["ID"]);?>" title="<?php echo $recent["post_title"];?>"><?php echo $recent["post_title"];?></a>
                                </h2>
                            </div>
                            <!-- post-title -->
                            <div class="akmanda-excerpt">
                                <p><?php echo short_content($recent['post_content'],40);?></p>
                                <div class="more-button">
                                    <a href="<?php echo get_permalink($recent["ID"]);?>" title="Standard Post With Image" class="more">Continue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- post-content -->
                </li>
                <?php } ?>
            </ul>

        </div>
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
                <li class="col-xs-6"><a href="http://www.themesawesome.com/"><img class="twinsbox" src="http://nomad.themesawesome.com/style/uploads/2014/01/ads125.png" alt="" /></a></li>
                <li class="col-xs-6"><a href="http://www.themesawesome.com/"><img class="twinsbox" src="http://nomad.themesawesome.com/style/uploads/2014/01/ads125.png" alt="" /></a></li>
                <li class="col-xs-6"><a href="http://www.themesawesome.com/"><img class="twinsbox" src="http://nomad.themesawesome.com/style/uploads/2014/01/ads125.png" alt="" /></a></li>
                <li class="col-xs-6"><a href="http://www.themesawesome.com/"><img class="twinsbox" src="http://nomad.themesawesome.com/style/uploads/2014/01/ads125.png" alt="" /></a></li>
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
<!-- #footer -->
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
</script><script type="text/javascript">
    (function() {

        function addSubmittedClass() {
            var className = 'mc4wp-form-submitted';
            (this.classList) ? this.classList.add(className) : this.className += ' ' + className;
        }

        var forms = document.querySelectorAll('.mc4wp-form');
        for (var i = 0; i < forms.length; i++) {
            (function(f) {

                // hide honeypot
                var honeypot = f.querySelector('input[name="_mc4wp_required_but_not_really"]');
                honeypot.style.display = 'none';
                honeypot.setAttribute('type','hidden');

                // add class on submit
                var b = f.querySelector('[type="submit"]');
                if(b.addEventListener) {
                    b.addEventListener( 'click', addSubmittedClass.bind(f));
                } else {
                    b.attachEvent( 'onclick', addSubmittedClass.bind(f));
                }

            })(forms[i]);
        }
    })();


</script><script type='text/javascript' src='<?php echo get_template_directory_uri()?>/style/plugins/contact-form-7/includes/js/jquery.form.min.js'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var _wpcf7 = {"loaderUrl":"http:\/\/merapi.themesawesome.com\/style\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ...","cached":"1"};
    /* ]]> */
</script>
<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/style/plugins/contact-form-7/includes/js/scripts.js'></script>
<script type='text/javascript' src='http://s0.wp.com/wp-content/js/devicepx-jetpack.js?ver=201234'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/style/themes/merapi/js/pluginsFoot.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/style/themes/merapi/js/loopJs.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/style/themes/merapi/js/main.js'></script>
<script src="http://stats.wp.com/e-201517.js" type="text/javascript"></script>
<script type="text/javascript">
    st_go({v:'ext',j:'1:3.1.2',blog:'68428356',post:'0',tz:'0'});
    var load_cmc = function(){linktracker_init(68428356,0,2);};
    if ( typeof addLoadEvent != 'undefined' ) addLoadEvent(load_cmc);
    else load_cmc();
</script>

</body>
</html>
