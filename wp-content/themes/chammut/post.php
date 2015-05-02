<div class="post-content clearfix">
                <a href="<?php echo get_permalink(get_the_ID());?>" title="<?php echo the_title();?>" >
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
                            <a href="<?php echo get_permalink(get_the_ID());?>" title="<?php echo the_title();?>"><?php echo get_the_title(); ?></a>
                        </h2>
                    </div>
                    <!-- post-title -->
                    <div class="post-meta text-center">
                        <ul>

                            <li><?php echo get_the_date('', get_the_ID()); ?></li>
                        </ul>
                    </div>
                    <div class="bord"></div>
                    <div class="inner-content">
                        <?php echo the_content(); ?>
                    </div>
                    <div class="bord"></div>
                    <div class="meta">
                        <div class="category-wrapper"><span>Category :</span> <?php $categories = get_the_category(get_the_ID()); foreach($categories as $c) {?> <a href="<?php echo get_category_link($c->term_id)?>" rel="category tag"><?php echo $c->cat_name?></a> <?php } ?></div>
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