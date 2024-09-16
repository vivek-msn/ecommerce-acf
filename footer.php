<?php
/**
 * The Footer for our theme
 *
 * This is the template that displays all of the footer section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Think Ecommerce
 */
?>

<!-- Footer Section -->
<footer>
  <div class="p-3 copyright">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-6 p-1 p-lg-3 text-center text-lg-start">
          <p class="my-0"><?php the_field('copyright', 'option');?></p>
        </div>
        <div class="col-12 col-lg-6 p-1 p-lg-3 text-center text-lg-end">
          <p><?php the_field('design_by','option');?></p>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>