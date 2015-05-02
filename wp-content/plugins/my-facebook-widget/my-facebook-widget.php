<?php
/*
Plugin Name: My Facebook Widget
Plugin URI: http://www.wpexplorer.com/
Description: A simple plugin that adds a simple widget
Version: 1.0
Author: Giang Beo
Author URI: http://www.wpexplorer.com/
License: GPL2
*/

class my_facebook_widget extends WP_Widget {

    // constructor

    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'my_facebook_widget',
            'description' => 'Widget that uses the built in Media library.'
        );

        parent::__construct( 'my_facebook_widget', 'My Facebook Widget', $widget_ops );

    }
    // widget form creation
    function form($instance) {
        if($instance)
        {
            $content = esc_attr($instance['facebook-script']);

        }
        else{
            $content = '';
           ;
        }
        ?>




        <p>
            <label for="<?php echo $this->get_field_id('facebook-script'); ?>"><?php _e('Facebook Script:', 'wp_widget_plugin'); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('facebook-script'); ?>" name="<?php echo $this->get_field_name('facebook-script'); ?>"><?php echo $content; ?></textarea>
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
        $title = apply_filters('widget_title', $instance['facebook-script']);

        $script = $instance['facebook-script'];
        echo $before_widget;
        // Display the widget
        echo $script;
        echo $after_widget;
    }
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("my_facebook_widget");'));