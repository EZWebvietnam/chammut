<?php
/*
Plugin Name: Author Widget Plugin
Plugin URI: http://www.wpexplorer.com/
Description: A simple plugin that adds a simple widget
Version: 1.0
Author: Giang Beo
Author URI: http://www.wpexplorer.com/
License: GPL2
*/
class author_widget_plugin extends WP_Widget {

    // constructor

    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'author_media_upload',
            'description' => 'Widget that uses the built in Media library.'
        );

        parent::__construct( 'author_media_upload', 'Author Widget', $widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
        add_action('admin_enqueue_styles', array($this, 'upload_styles'));
    }
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');

    }
    public function upload_styles()
    {
        wp_enqueue_style('thickbox');
    }
    // widget form creation
    function form($instance) {
        if($instance)
        {
            $content = esc_attr($instance['content']);
            $author = esc_attr($instance['author']);
            $image = $instance['image'];
        }
        else{
            $content = '';
            $author = '';
            $image = '';
        }
       ?>

        <script>
            jQuery(document).ready(function($) {
                $(document).on("click", ".upload_image_button", function() {

                    jQuery.data(document.body, 'prevElement', $(this).prev());

                    window.send_to_editor = function(html) {
                        var imgurl = jQuery('img',html).attr('src');
                        var inputText = jQuery.data(document.body, 'prevElement');

                        if(inputText != undefined && inputText != '')
                        {
                            inputText.val(imgurl);
                        }

                        tb_remove();
                    };

                    tb_show('', 'media-upload.php?type=image&TB_iframe=true');
                    return false;
                });
            });
        </script>
        <p>
            <label for="<?php echo $this->get_field_id('author'); ?>"><?php _e('Author:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>" type="text" value="<?php echo $author; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content:', 'wp_widget_plugin'); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button button button-primary" type="button" value="Upload Image" />
        </p>
        <?php
    }

    // widget update
    function update($new_instance, $old_instance) {
        $updated_instance = $new_instance;
        return $updated_instance;

    }

    // widget display
    // display widget
    function widget($args, $instance) {
        extract( $args );
        // these are the widget options
        $title = apply_filters('widget_title', $instance['title']);
        $author = $instance['author'];
        $content = $instance['content'];
        $image = $instance['image'];
        echo $before_widget;
        // Display the widget
        echo '
        <img src="'.get_template_directory_uri().'/style/uploads/2014/01/3119223827_aa5f24d24b_b.jpg">
        <div class="widget-body">
                <div class="akmanda_author_img"><img src="'.$image.'"/></div>
                <div class="akmanda_author_bio">
                    <h3>'.$author.'</h3>
                    <p class="muted">'.$content.'</p>
                </div>
            </div>
        ';
        echo $after_widget;
    }
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("author_widget_plugin");'));