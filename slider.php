<?php

/**
 * Ecommerce Template Slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ecommerce Template
 */
?>
 <section id="home" class="home pt-5 overflow-hidden">
 <div id="carouselExampleIndicators" class="carousel slide">
   <div class="carousel-indicators">
     <?php while( have_rows('slider_option') ): the_row(); ?>
       <?php $counter = get_row_index(); ?>
     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $counter-1; ?>" class="<?php if( get_row_index() == 1): echo 'active'; ?><?php endif; ?>" aria-current="true" aria-label="Slide 1"></button>
     <?php endwhile; ?>
   </div>
   <div class="carousel-inner">
     <?php while( have_rows('slider_option') ): the_row(); ?>
     <div class="carousel-item <?php if( get_row_index() == 1 ): echo 'active';  ?><?php endif; ?>">
       <div class="home-banner home-banner-1">
         <?php
         $image = get_sub_field('slider_image');
         $slider_url = $image['sizes']['woocommerce_single'];
         $slider_alt = $image['caption'];
         ?>
          <img src="<?php echo $slider_url; ?>" alt="<?php echo $slider_alt; ?>" class="img-fluid">
          <div class="home-banner-text">
            <h1><?php the_sub_field('slider'); ?></h1>
            <h2><?php the_sub_field('slider_subtitle'); ?></h2>
            <?php
            $link = get_sub_field('slider_button_text');
            $link_url = $link['url'];
            $link_title = $link['title'];
            ?>
            <a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-danger text-uppercase mt-4">
            <?php echo esc_html( $link_title ); ?>
            </a>
          </div>
       </div>
     </div>
     
     <?php endwhile; ?>
   </div>
   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true">
       <span class="ti-angle-left slider-icon"></span>
     </span>
     <span class="visually-hidden">Previous</span>
   </button>
   <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true">
       <span class="ti-angle-right slider-icon"></span>
     </span>
     <span class="visually-hidden">Next</span>
   </button>
 </div>
</section>