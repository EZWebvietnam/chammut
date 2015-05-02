<li id="post-<?php the_ID(); ?>" class="post-<?php echo the_ID();?> post type-post status-publish format-standard has-post-thumbnail hentry category-standard-post tag-description tag-image tag-people tag-text col-md-6 animate">
                    <div class="post-content">
                        <div class="intro-post">
                            <i class="icon post-type icon-elusive-icons-1"></i>
                            <a href="<?php echo get_permalink();?>" title="<?php echo the_title();?>" >
                                <div class="post-thumb">
                                    <?php
                                    $default_attr = array(
                                    );
                                    echo get_the_post_thumbnail(get_the_ID(), array( 350, 256), $default_attr ); ?>

                                </div>
                                <!-- post thumb -->
                            </a>
                        </div>
                        <div class="post-entry">
                            <div class="post-title">
                                <h2>
                                    <a href="<?php echo get_permalink();?>" title="<?php echo $recent["post_title"];?>"><?php echo the_title();?></a>
                                </h2>
                            </div>
                            <!-- post-title -->
                            <div class="akmanda-excerpt">
                               <p><?php echo excerpt(40);?></p>
                                <div class="more-button">
                                    <a href="<?php echo get_permalink();?>" title="Standard Post With Image" class="more">Continue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- post-content -->
                </li>

                

