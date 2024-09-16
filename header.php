<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ecommerce Template
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('title'); ?></title>

    <?php wp_head();?>

</head>
<body <?php body_class(); ?>data-bs-spy="scroll" data-bs-target=".navbar">

  <!-- Navigation Section -->
  <section id="header">
      <nav id="navbar" class="navbar navbar-expand-lg bg-white fixed-top ">
          <div class="container">
          
              <div class="brand col-12 col-md-3 col-lg-2 text-center text-md-start">
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/'));?>">
                <?php if( has_custom_logo()): ?>
              <img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?>" class="img-fluid" alt="<?php bloginfo( 'name' ); ?>">
              <?php else: ?>
                <p class="site-title"><?php bloginfo( 'title' ); ?></p>
                <span><?php bloginfo( 'description' ); ?></span>
              <?php endif;?>
            </a>
              </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="ti-align-justify navbar-toggler-icon"></span>
              <!-- <span class="navbar-toggler-icon"></span> -->
            </button>
                <div class="col-md-7 col-lg-7">
            <?php
            wp_nav_menu( array(
                'theme-location'    => 'Ecommerce_Main_menu',
                'depth'             => 3,
                'container'         => 'div',
                'container_class'   =>'collapse navbar-collapse justify-content-end',
                'container_id'      => 'navbarNav',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ));
            ?>
            </div>
            
          <div class="cart col-md-2 col-lg-2 text-end">
          <div class="navbar-expand">
										<ul class="navbar-nav float-start">
											<?php if( is_user_logged_in() ) : ?>
											<li>
												<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ?>" class="nav-link"><?php esc_html_e( 'My Account', 'think-ecommerce' ); ?></a>
											</li>
											<li>
												<a href="<?php echo esc_url( wp_logout_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ) ?>" class="nav-link"><?php esc_html_e( 'Logout', 'think-ecommerce' ); ?></a>
											</li>
											<?php else: ?>
											<li>
												<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ?>" class="nav-link"><?php esc_html_e( 'Login / Register', 'think-ecommerce' ); ?></a>
											</li>
											<?php endif; ?>
										</ul>
									</div>
          <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><span class="cart-icon"></span></a>
          <span class="items"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
          </div>
          </div>
        </nav>
  </section>