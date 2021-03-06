<li id="post-<?php the_ID(); ?>" class="post-<?php echo the_ID();?> post type-post status-publish format-standard has-post-thumbnail hentry category-standard-post tag-description tag-image tag-people tag-text col-md-6 animate">
                    <?php 
						$type = get_post_format(get_the_ID());
						
						switch($type)
						{
							default:
							{
					?>
					
					<div class="post-content">
                        <div class="intro-post">
                            <i class="icon post-type icon-elusive-icons-1"></i>
							
                            <a href="<?php echo get_permalink(get_the_ID());?>" title="<?php echo the_title();?>" >
                                <div class="post-thumb">
                                    <?php
                                    $default_attr = array(
                                        'width'=>1000,
                                        'height'=>732,
                                        
                                    );
                                    echo get_the_post_thumbnail( get_the_ID(), array( 350, 256), $default_attr ); ?>

                                </div>
                                <!-- post thumb -->
                            </a>
                        </div>
                        <div class="post-entry">
                            <div class="post-title">
                                <h2>
                                    <a href="<?php echo get_permalink(get_the_ID());?>" title="<?php echo the_title();?>"><?php echo the_title();?></a>
                                </h2>
                            </div>
                            <!-- post-title -->
                            <div class="akmanda-excerpt">
                                <p><?php echo short_content(get_the_content(),40);?></p>
                                <div class="more-button">
                                    <a href="<?php echo get_permalink(get_the_ID());?>" title="Standard Post With Image" class="more">Continue</a>
                                </div>
                            </div>
                        </div>
                    </div>
							<?php break;}
							case 'audio':
							{
								?>
								<div class="post-content">
								<div class="intro-post">
									<i class="icon post-type icon-elusive-icons-1"></i>
									<div class="entry-audio">
                                       <?php
										$pattern = get_shortcode_regex();
										
										preg_match('/'.$pattern.'/s', get_the_content(), $matches);
										
										if (is_array($matches) && $matches[2] == 'soundcloud') {
										   $shortcode = $matches[0];
										   echo do_shortcode($shortcode);
										}
										
										?>
                                    </div>	
					
								</div>
								<div class="post-entry">
									<div class="post-title">
										<h2>
											<a href="<?php echo get_permalink(get_the_ID());?>" title="<?php echo the_title();?>"><?php echo the_title();?></a>
										</h2>
									</div>
									<!-- post-title -->
									<div class="akmanda-excerpt">
									<?php 
									$content = get_the_content();
									$content_strip = strip_shortcode('soundcloud',$content)
									?>
										<p><?php echo short_content($content_strip,40);?></p>
										<div class="more-button">
											<a href="<?php echo get_permalink(get_the_ID());?>" title="Standard Post With Image" class="more">Continue</a>
										</div>
									</div>
								</div>
							</div>
								<?php
								break;
							}
							case 'video':
							{
								
								?> 
								<div class="post-content">
								<div class="intro-post">
									<i class="icon post-type icon-elusive-icons-1"></i>
									<div class="entry-video">
                                       <?php
										$pattern = get_shortcode_regex();
										
										preg_match('/'.$pattern.'/s', get_the_content(), $matches);
										
										if (is_array($matches) && $matches[2] == 'embedyt') {
										   $shortcode = $matches[0];
										   echo do_shortcode($shortcode);
										}
										
										?>
                                    </div>	
					
								</div>
								<div class="post-entry">
									<div class="post-title">
										<h2>
											<a href="<?php echo get_permalink(get_the_ID());?>" title="<?php echo the_title();?>"><?php echo the_title();?></a>
										</h2>
									</div>
									<!-- post-title -->
									<div class="akmanda-excerpt">
									<?php 
									$content = get_the_content();
									$content_strip = strip_shortcode('embedyt',$content)
									?>
										<p><?php echo short_content($content_strip,40);?></p>
										<div class="more-button">
											<a href="<?php echo get_permalink(get_the_ID());?>" title="Standard Post With Image" class="more">Continue</a>
										</div>
									</div>
								</div>
							</div>
								<?php
								break;
							}
							} ?>
					
					
                    <!-- post-content -->
                </li>

                

