<!-- WEBSITE HEADER STARTS HERE -->
    <?php get_header();?>
<!-- WEBSITE HEADER ENDS HERE -->

<!-- PAGE CONTENT STARTS HERE -->
    <section class="section1">
        <div class="my_container">
            <div class="section1_slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php 
                            $field = get_field_object('producttags');
                            $args = array(
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_tag',
                                        'field' => 'id',
                                        'terms' => $field['value']
                                    )
                                )
                            );
                            $the_inner_loop = new WP_Query( $args );
                            if($the_inner_loop->have_posts()) {
                                while($the_inner_loop->have_posts()) {
                                    $the_inner_loop->the_post();
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="swiper_slide_box">
                                                <div class="container-fluid">
                                                    <div class="row align-items-center">
                                                        <div class="col-sm-1 col-lg-3"></div>
                                                        <div class="col-sm-5 col-lg-3">
                                                            <div class="swiper_slide_box_img">
                                                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                                                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                                                  <img src="<?php echo $image[0]; ?>" class="img-fluid">
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5 col-lg-5">
                                                            <div class="slider_product_details">
                                                                <div class="slider_product_name">
                                                                    <?php the_title();?>
                                                                </div>
                                                                <div class="slider_product_description">
                                                                    <?php the_excerpt(); ?>
                                                                </div>
                                                                <div class="slider_product_a">
                                                                    <a href="<?php the_permalink();?>">Shop Now</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 col-lg-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                    } 
                                    wp_reset_postdata(); 
                                }  
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section2">
        <div class="container-fluid">
            <div class="section2_slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            $productcategory = get_field('productcategory');
                            if( $productcategory ): ?>
                            <?php foreach( $productcategory as $pc ): ?>
                            <?php 
                                $id = $pc;
                                if( $term = get_term_by( 'id', $id, 'product_cat' ) ){
                                    $term_slug    = $term->slug;
                                    $taxonomy     = 'product_cat';
                                    $term_id      = get_term_by( 'slug', $term_slug, $taxonomy )->term_id;
                                    $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
                                    $image        = wp_get_attachment_url( $thumbnail_id );
                                }
                            ?>
                            <div class="swiper-slide">
                                <div class="section2_slider_content">
                                    <div class="container-fluid">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <div class="section2_slider_img">
                                                    <a href="<?php echo get_category_link( $id );?>">
                                                        <img src="<?php echo wp_get_attachment_url( $thumbnail_id ); ?>" class="img-fluid">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="section2_slider_product_details">
                                                    <div class="section2_slider_product_name">
                                                        <a href="<?php echo get_category_link( $id );?>">
                                                            <?php echo $term->name?>
                                                        </a>
                                                    </div>
                                                    <div class="section2_slider_product_url">
                                                        <a href="<?php echo get_category_link( $id );?>">Shop</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>         
                    </div>
                </div>
                <div class="swiper-button-next"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/arrow_right.png" class="img-fluid"></div>
                <div class="swiper-button-prev"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/arrow_left.png" class="img-fluid"></div>
            </div>            
        </div>
    </section>
    <section class="section3">
        <div class="section3_title">
            <div class="my_container">
                <span>Featured Products</span>
            </div>
        </div>
        <div class="my_container">
            <?php echo do_shortcode( get_field('featured_products') ); ?>
        </div>
    </section>
<!-- PAGE CONTENT ENDS HERE -->
    
<!-- WEBSITE FOOTER STARTS HERE -->
    <?php get_footer();?>
<!-- WEBSITE FOOTER ENDS HERE