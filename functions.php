<?php

    //All the Default Theme Support
    function music_default_func (){
        
        add_theme_support ( 'title-tag' );
        add_theme_support ( 'post-thumbnails' );
        add_theme_support ( 'custom-background' );


        //register nav main menu
        if(function_exists ( 'register_nav_menu' )){

            register_nav_menu ( 'main-menu', 'Main Menu' );
        }
       
        //custom excerpt for blog post content
        function music_read_more (){

            $post_content = explode (' ', get_the_content());

            $less_content = array_slice($post_content, 0, 10);

            echo implode(' ', $less_content);

        }

        //register custom post for slider
        register_post_type( 'music_slider', array(
            'labels' => array(
                'name' => 'Sliders',
                'add_new_item' => 'Add New Slider',
            ),
            
            'public' => true,
            'supports' => array( 'title', 'thumbnail' ),

        ) );

        //register post type for blurb

        register_post_type( 'blurb', array(
            'labels' => array(
                'name' => 'Blurbs',
                'add_new_item' => 'Add New Blurb',
            ),
            
            'public' => true,
            'supports' => array( 'title', 'editor' ),

        ) );

    }
    
    add_action ( 'after_setup_theme', 'music_default_func' );

    
    //enque css & js
    function music_css_js(){

        wp_register_style('zerogrid', get_template_directory_uri() . '/css/zerogrid.css');
        wp_register_style('style', get_template_directory_uri() . '/css/style.css');
        wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css');
        wp_register_style('responsiveslides', get_template_directory_uri() . '/css/responsiveslides.css');

        //register script for slider
        wp_register_script('responsiveslidesjs', get_template_directory_uri() . '/js/responsiveslides.js', array('jquery'));


        wp_enqueue_style('zerogrid');
        wp_enqueue_style('style');
        wp_enqueue_style('responsive');
        wp_enqueue_style('responsiveslides');

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'responsiveslidesjs' );

    }

    add_action('wp_enqueue_scripts', 'music_css_js');

    //register all sidebar

    function music_default_sidebar(){
        //register page sidebar
        register_sidebar( array(

            'name'           => 'Right Sidebar',
            'Description'    => 'Add Your Right Sidebar',
            'id'             => 'right-sidebar',
            'before_widget'  => '<div class="box">',
            'after_widget'   => '</div></div>',
            'before_title'   => '<div class="heading">',
            'after_title'    => '</h2></div><div class="content">',
            
        ) );

        //register contact page sidebar
        register_sidebar( array(

            'name'           => 'Contact Sidebar',
            'Description'    => 'Add Your ContactPage Sidebar',
            'id'             => 'contact-sidebar',
            'before_widget'  => '<div class="box">',
            'after_widget'   => '</div></div>',
            'before_title'   => '<div class="heading">',
            'after_title'    => '</h2></div><div class="content">',
            
        ) );

        //register footer widget
        register_sidebar(array(

            'name'           => 'Footer Widget',
            'Description'    => 'Add Your Footer Widget',
            'id'             => 'footer-widget',
            'before_widget'  => '<div class="col-1-4"><div class="wrap-col"><div class="box">',
            'after_widget'   => '</div></div></div></div>',
            'before_title'   => '<div class="heading">',
            'after_title'    => '</h2></div><div class="content">',
        ));
    }

    add_action('widgets_init','music_default_sidebar');