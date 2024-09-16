<?php

/**
 * Ecommerce Template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ecommerce Template
 */

    /*** Register Custom Navigation Walker */

    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

    // Woocommerce Template Customization

    require get_template_directory() . '/inc/wc-modifications.php';


    /*** Enqueue scripts and styles.*/

    function ecommerceScripts() {

        //Bootstrap javascript and CSS files
        wp_enqueue_style('bootstrap-css','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',array(),'5.0.2','all');
        wp_enqueue_script( 'bootstrap-js','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',array(),'5.0.2',true);

        // Themefy icons
        wp_enqueue_style( 'themify-icons',get_template_directory_uri().'/assets/themify-icons.css', array(),'1.0','all');

        // Theme's main stylesheet
        wp_enqueue_style( 'ecommerce-template-style', get_stylesheet_uri(), array(),'1.0','all');
        wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), null, true);

        // Theme's Responsive stylesheet
        wp_enqueue_style( 'ecommerce-responsive-style', get_template_directory_uri() . '/assets/responsive.css',array(),'1.0','all');

        }

        add_action( 'wp_enqueue_scripts', 'ecommerceScripts' );

        /*** Show cart contents / total Ajax */

            add_filter( 'woocommerce_add_to_cart_fragments', 'think_ecommerce_woocommerce_header_add_to_cart_fragment' );

            function think_ecommerce_woocommerce_header_add_to_cart_fragment( $fragments ) {
                global $woocommerce;

                ob_start();

                ?>
                <span class="items"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
                <?php
                $fragments['span.items'] = ob_get_clean();
                return $fragments;
            }

            add_filter( 'think_ecommerce_woocommerce_add_to_cart_fragments', 'think_ecommerce_woocommerce_header_add_to_cart_fragment' );

        // Add Theme supports here

            add_theme_support( 'woocommerce', array(
                'thumbnail_image_width' => 150,
                'single_image_width'    =>255,
                'product_grid'          => array(
                    'default_rows'      => 10,
                    'min_rows'          => 5,
                    'max_rows'          => 10,
                    'default_columns'   => 1,
                    'min_columns'       => 3,
                    'max_columns'       => 4,
                ) ) );
            add_theme_support('custom-logo');
            add_theme_support( 'wc-product-gallery-zoom' );
            add_theme_support( 'wc-product-gallery-lightbox' );
            add_theme_support( 'wc-product-gallery-slider' );


        // This theme uses wp_nav_menu()

        register_nav_menus( array(
            'ecommerce_main_menu' => esc_html__( 'Ecommerce Main menu','ecommerce-template'),
        ));


        // Add Widgets Supports tt
        
        function ecommerce_widegts_sidebars(){

            register_sidebar(
                array(
                'name'              => 'Ecommerce Main Sidebar',
                'id'                => 'ecommerce-sidebar-1',
                'description'       => 'Drag and Drop Your widgets here',
                'before_widgets'    => '<div id="%1$s" class="widget %2$s widget-wrapper">',
                'after_widgets'     => '</div>',
                'before_title'      => '<h4 class="widget-title">',
                'after_title'       => '</h4>',
                    )
                );
        }
        add_action('widgets_init','ecommerce_widegts_sidebars');

        // ACF Plugin Functionality Start here ---->

        if( function_exists('acf_add_options_page') ) {

            acf_add_options_page(array(
                'page_title'    => 'Theme General Settings',
                'menu_title'    => 'Theme Settings',
                'menu_slug'     => 'theme-general-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ));

            acf_add_options_sub_page(array(
                'page_title'    => 'Theme Header Settings',
                'menu_title'    => 'Header',
                'parent_slug'   => 'theme-general-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title'    => 'Theme Footer Settings',
                'menu_title'    => 'Footer',
                'parent_slug'   => 'theme-general-settings',
            ));

        }

        add_action('wp_ajax_contact_us','ajax_contact_us');
        function ajax_contact_us(){
            $arr=[];
            wp_parse_str( $_POST['contact_us'], $arr);
            global $wpdb;
            global $table_prefix;
             $table=$table_prefix.'contact_us';
             $result=$wpdb->insert(
                $table,[
                    "name"=>$arr['name'],
                    "email"=>$arr['email'],
                    "message"=>$arr['message']
                ]);
                if($result>0){
                    wp_send_json_success( "Data inserted" );
                }else{
                    wp_send_json_error( "Please try again" );
                }
        }

        
    

