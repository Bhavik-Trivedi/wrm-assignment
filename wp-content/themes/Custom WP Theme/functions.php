<?php
	function WRM_theme_support(){
		//Adds dynamic title tag support
		add_theme_support('title-tag');
	}

	add_action('after_setup_theme','WRM_theme_support');

	function WRM_register_styles(){
		wp_enqueue_style('WRM_bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css", array(), '1.0', 'all');
		wp_enqueue_style('WRM_swiper', "https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css", array(), '1.0', 'all');
		wp_enqueue_style('WRM_header-footer', get_template_directory_uri() . "/assets/css/header-footer.css", array('WRM_bootstrap'), '1.0', 'all');
	}

	add_action('wp_enqueue_scripts', 'WRM_register_styles');


	function WRM_register_scripts(){
		wp_enqueue_script('WRM_js', "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js", array(), '1.0', true);
		wp_enqueue_script('WRM_popper', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js", array(), '1.0', true);
		wp_enqueue_script('WRM_bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js", array(), '1.0', true);
		wp_enqueue_script('WRM_jquery-ui', "https://code.jquery.com/ui/1.12.1/jquery-ui.js", array(), '1.0', true);
		wp_enqueue_script('WRM_Swiper', "https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js", array(), '1.0', true);
		wp_enqueue_script('WRM_common', get_template_directory_uri() . "/assets/js/common.js", array(), '1.0', true);
	}

	add_action('wp_enqueue_scripts', 'WRM_register_scripts');

	add_theme_support('woocommerce');

	function register_my_menus() {
	  register_nav_menus(
	    array(
	      'header-menu' => __( 'Header Menu' ),
	      'extra-menu' => __( 'Extra Menu' )
	     )
	   );
	 }
	 add_action( 'init', 'register_my_menus' );

	 // Replace add to cart button by a linked button to the product in Shop and archives pages
	 add_filter( 'woocommerce_loop_add_to_cart_link', 'replace_loop_add_to_cart_button', 10, 2 );
	 function replace_loop_add_to_cart_button( $button, $product  ) {
	     // Not needed for variable products
	     if( $product->is_type( 'variable' ) ) return $button;

	     // Button text here
	     $button_text = __( "View product", "woocommerce" );

	     return '<a class="button" href="' . $product->get_permalink() . '">' . $button_text . '</a>';
	 }
?>

