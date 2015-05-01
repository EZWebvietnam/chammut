<?php
        wp_nav_menu( array(
                'menu'              => 'menu-header',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'nav',
                'container_class'   => 'menu pull-left',
                'container_id'      => 'mainmenu',
                'menu_class'        => 'sm sm-clean',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
        );
        ?>