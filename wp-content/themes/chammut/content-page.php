<article  id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> post type-post status-publish format-image has-post-thumbnail hentry category-post-format tag-description tag-image tag-people tag-text clearfix">
    <div class="post-content clearfix">
        <a href="<?php echo get_permalink($post_data->ID);?>" title="Image Post With Text" >
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
                    <a href="<?php echo get_permalink(get_the_ID());?>" title="Image Post With Text"><?php echo get_the_title(); ?></a>
                </h2>
            </div>
            <!-- post-title -->

            <div class="bord"></div>
            <div class="inner-content">
                <?php
                echo the_content(); ?>
            </div>
            <div class="bord"></div>
            <div class="meta">

                <div class="tag-wrapper"><span>Tags :</span> <?php $tags = wp_get_post_tags(get_the_ID()); foreach($tags as $t) {?> <a href="<?php echo get_tag_link($t->term_id); ?>" rel="tag"><?php echo $t->name; if(count($tags) > 1) {?>,<?php }?></a><?php } ?></div>
            </div>
            <div class="bord"></div>
            <ul class="footer-social">
                <li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(get_the_ID());?>" class="product_share_facebook" onclick="javascript:window.open(this.href,
                                    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"><i class="icon icon-facebook-1"></i></a></li>
                <li class="twitter"><a href="https://twitter.com/share?url=<?php echo get_permalink(get_the_ID());?>/&text=<?php echo get_the_title();?>" onclick="javascript:window.open(this.href,
                                    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" class="product_share_twitter"><i class="icon icon-twitter-alt"></i></a></li>
                <li class="google"><a href="https://plus.google.com/share?url=<?php echo get_permalink(get_the_ID());?>" onclick="javascript:window.open(this.href,
                                    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="icon icon-google"></i></a></li>
                <li class="pinterest"><a href="//pinterest.com/pin/create/button/?url=<?php echo get_permalink(get_the_ID());?>&description=<?php echo get_the_title();?>" onclick="javascript:window.open(this.href,
                                    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=320,width=600');return false;" class="product_share_pinterest"><i class="icon icon-path"></i></a></li>
            </ul>
        </div>

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