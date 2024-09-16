<?php
/**
 * The template for the sidebar containing the shop widget area
 *
 * @package Ecommerce Template
 */
?>

<?php if( is_active_sidebar( 'ecommerce-sidebar-1' ) ) : ?>
                <?php dynamic_sidebar( 'ecommerce-sidebar-1' ); ?>
<?php endif; ?>