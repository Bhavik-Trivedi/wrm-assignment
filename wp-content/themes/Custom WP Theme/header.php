<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <?php wp_head(); ?>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        </head>
        <body <?php body_class(); ?>>
                <header class="myheader">
                        <nav class="navbar navbar-expand-xl w-100 p-0">
                                <div class="top_header">
                                        <div class="my_container">
                                                <div class="top_header_inner">
                                                        <a class="navbar-brand" href="<?php echo get_bloginfo('url') ?>">
                                                           <img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/logo.png" class="img-fluid">
                                                        </a>
                                                        <div class="top_header_sidebox">
                                                                <?php aws_get_search_form( true ); ?>
                                                        </div>
                                                        <div class="cart_box">
                                                                <a href="<?php echo wc_get_cart_url(); ?>">
                                                                        <img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/cart_icon.png" class="img-fluid">
                                                                        <span><?php global $woocommerce; ?><?php echo $woocommerce->cart->get_cart_total(); ?></span>
                                                                </a>
                                                        </div>
                                                        <button class="menubtn navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
                                                                        <svg width="40" height="40" viewBox="0 0 100 100">
                                                                           <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                                                                           <path class="line line2" d="M 20,50 H 80" />
                                                                           <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                                                                        </svg>
                                                        </button>
                                                </div>
                                        </div>
                                </div>
                                <div class="main_header w-100">
                                        <div class="my_container">
                                                <!-- Navbar links -->
                                                <div class="collapse navbar-collapse justify-content-between w-100" id="collapsibleNavbar">
                                                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
                                                </div>
                                        </div>  
                                </div>
                        </nav>  
                </header>