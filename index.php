<?php
/*
Template Name: Home Page
*/
get_header();
?>

<!-- Home Section -->
 <?php
    if( have_rows('slider1') ):
      get_template_part('/template-parts/slider','slider');
    else:
      echo get_the_post_thumbnail( $post->ID, 'large');
    endif;
  ?>

<!-- Offer section -->
<div class="offers">
  <div class="container">
    <div class="row">

      <!-- Offer Box One  -->
       <?php
       $hero = get_field('sale_section_left');
       if( $hero ): ?>
      <div class="col-sm-6 col-lg-4 mb-lg-0 mb-4">
        <a href="">
          <div class="offer-box text-center position-relative">
            <div class="offer-inner">
              <div class="offer-image position-relative overflow-hidden">
                <img src="<?php echo esc_url( $hero['image_section']['url']); ?>" alt="<?php echo esc_html( $hero['image_section']['alt']); ?>" class="img-fluid">
                <div class="offer-overlay"></div>
              </div>
              <div class="offer-info">
                <div class="offer-info-inner">
                  <p class="heading-bigger text-capitalize"><?php echo esc_html( $hero['image_title']);?></p>
                  <p class="offer-title-1 text-uppercase font-weight-bold"><?php echo esc_html( $hero['image_subtitle']);?></p>
                  <a href="<?php echo esc_url($hero['image_button_link']['url']); ?>" class="btn btn-outline-danger text-uppercase mt-4"><?php echo esc_html( $hero['image_button_link']['title']); ?></a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <?php endif; ?>

      <!-- Offer Box Two  -->
       <?php
       $hero = get_field('sale_section_top_middle');
       if( $hero ): ?>
      <div class="col-sm-6 col-lg-4 mb-lg-0 mb-4 d-flex flex-column justify-content-between">
        <a href="">
          <div class="offer-box text-center position-relative mb-4 mb-sm-0 mb-lg-0">
            <div class="offer-inner">
              <div class="offer-image position-relative overflow-hidden">
                <img src="<?php echo esc_url( $hero['image_section']['url']); ?>" alt="<?php echo esc_html( $hero['image_section']['alt']); ?>" class="img-fluid">
                <div class="offer-overlay"></div>
              </div>
              <div class="offer-info">
                <div class="offer-info-inner">
                  <p class="heading-bigger text-capitalize"><?php echo esc_html( $hero['image_title']);?></p>
                  <p class="offer-title-1 text-uppercase font-weight-bold"><?php echo esc_html( $hero['image_subtitle']);?></p>
                  <a href="<?php echo esc_url($hero['image_button_link']['url']); ?>" class="btn btn-outline-danger text-uppercase mt-4"><?php echo esc_html( $hero['image_button_link']['title']); ?></a>
                </div>
              </div>
            </div>
          </div>
        </a>
        <?php endif; ?>
        <?php
        $hero = get_field('sale_section_bottom_middle');
        if( $hero ): ?>
        <a href="">
          <div class="offer-box text-center position-relative">
            <div class="offer-inner">
              <div class="offer-image position-relative overflow-hidden">
                <img src="<?php echo esc_url( $hero['image_section']['url']); ?>" alt="<?php echo esc_html( $hero['image_section']['alt']); ?>" class="img-fluid">
                <div class="offer-overlay"></div>
              </div>
              <div class="offer-info">
                <div class="offer-info-inner">
                  <p class="heading-bigger text-capitalize"><?php echo esc_html( $hero['image_title']);?></p>
                  <p class="offer-title-1 text-uppercase font-weight-bold"><?php echo esc_html( $hero['image_subtitle']);?></p>
                  <a href="<?php echo esc_url($hero['image_button_link']['url']); ?>" class="btn btn-outline-danger text-uppercase mt-4"><?php echo esc_html( $hero['image_button_link']['title']); ?></a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <?php endif; ?>

        <!-- Offer Box Three  -->
         <?php
         $hero = get_field('sale_section_right');
         if( $hero ): ?>
        <div class="col-sm-6 col-lg-4 mb-lg-0 mb-4">
        <a href="">
          <div class="offer-box text-center position-relative">
            <div class="offer-inner">
              <div class="offer-image position-relative overflow-hidden">
                <img src="<?php echo esc_url( $hero['image_section']['url']); ?>" alt="<?php echo esc_html( $hero['image_section']['alt']); ?>" class="img-fluid">
                <div class="offer-overlay"></div>
              </div>
              <div class="offer-info">
                <div class="offer-info-inner">
                  <p class="heading-bigger text-capitalize"><?php echo esc_html( $hero['image_title']);?></p>
                  <p class="offer-title-1 text-uppercase font-weight-bold"><?php echo esc_html( $hero['image_subtitle']);?></p>
                  <a href="<?php echo esc_url($hero['image_button_link']['url']); ?>" class="btn btn-outline-danger text-uppercase mt-4"><?php echo esc_html( $hero['image_button_link']['title']); ?></a>
                </div>
              </div>
            </div>
          </div>
        </a>
    </div>
  </div>
</div>
<?php endif; ?>


<!-- Products Section -->

<?php
// Retrieve the repeater field from the options page
$featured_products = get_field('select_products', 'option');
if( $featured_products ) : ?>
<section id="products" class="products">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="headline text-center mb-5">
          <h2 class="pb-3 position-relative d-inline-block">FEATURED PRODUCTS</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($featured_products as $item) :
        // Get the product object from the post object subfield
            $product = $item['product_list'];
            if ($product):
            $product_id = $product->ID; // Post Object field returns an object
            $product_obj = wc_get_product($product_id);
            $image_url = get_the_post_thumbnail_url($product_id);
      ?>
      <div class="col-sm-6 col-lg-4">
        <a href="" class="d-block text-center mb-4">
          <div class="product-list">
            <div class="product-image position-relative">
              <span class="sale">Sale</span>
              <img src="<?php echo esc_url($image_url); ?>" alt="products" class="img-fluid product-image-first">
            </div>
            <div class="product-name pt-3">
              <h3 class="text-capitalize"><?php echo get_the_title($product_id); // Product title ?></h3>
              <p class="mb-0 amount><?php echo $product_obj->get_price_html(); // Product price ?></p>
              <div class="py-1">
                <span class="ti-star"></span>
                <span class="ti-star"></span>
                <span class="ti-star"></span>
                <span class="ti-star"></span>
                <span class="ti-star"></span>
              </div>
              <button type="button" class="add_to_Card">ADD TO CARD</button>
            </div>
          </div>
        </a>
      </div>
      <?php endif;
        endforeach; ?>
        <?php else: ?>
        <p>No featured products found.</p>
      <?php endif; ?>

    <!-- UP to 75 % Off  -->
    <?php
    $image = get_field('image_section');
    if( '$image' ):

        // Image variables
         $url = $image['url'];
         $alt = $image['alt'];
         ?>
     <div class="overflow-hidden my-5">
      <div class="row">
        <div class="col-sm-12 up_to_off">
          <img src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr('$alt'); ?>" class="img-fluid w-100">
          <div class="up_to_content">
            <h2><?php echo esc_html( get_field('image_title') ); ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
</section>

<!-- Special Section -->
<section id="special" class="special">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="headline text-center mb-5">
          <h2 class="pb-3 position-relative d-inline-block">SUMMER SALE</h2>
        </div>
      </div>
      <div class="col-sm-12 col-lg-7 textcenter text-lg-start">
        <div class="countdown-container">
          <h2 class="text-uppercase">Sexy Women Floral Embroidery</h2>
          <p class="my-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam facilis commodi quia,
          esse, fuga veritatis quos aspernatur ratione doloremque aperiam nam veniam, saepe dicta. Nisi quaerat odio
          Lorem ipsum, dolor. </p>
          <ul class="list-unstyled countdown-counter">
            <li><span class="fs-1 d-block" id="days">00</span>Days</li>
            <li><span class="fs-1 d-block" id="hours">00</span>Hr</li>
            <li><span class="fs-1 d-block" id="min">00</span>Min</li>
            <li><span class="fs-1 d-block" id="sec">00</span>Sec</li>
          </ul>
          <span class="countdown-price h3 d-block mb-4">$420.00<del>$670.00</del></span>
          <button type="button" class="btn btn-danger">ADD TO CART</button>
        </div>
      </div>
      <div class="col-sm-12 col-lg-5">
        <div class="special-img position-relative">
          <span>Sale</span>
          <img src="assets/images/p7.jpg" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonial Section -->
<?php if( have_rows('testimonial_options') ): ?>
<section id="testimonial" class="testimonial">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="headline text-center mb-5">
          <h2 class="pb-3 position-relative d-inline-block">Testimonials</h2>
        </div>
      </div>
      <div class="col-sm-12 col-lg-8 offset-lg-2 text-center">
        <div id="carouselExampleIndicatorsTwo" class="carousel slide">
          <div class="carousel-indicators">
              <?php while( have_rows('testimonial_options') ): the_row();?>
              <?php $counter = get_row_index(); ?>
                <button type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide-to="<?php echo $counter-1; ?>" class="<?php if( get_row_index() == 1): echo 'active'; ?><?php endif; ?>" aria-current="true" aria-label="Slide 1"></button>
              <?php endwhile; ?>
          </div>
          <div class="carousel-inner">
          <?php while( have_rows('testimonial_options') ): the_row();?>
            <div class="carousel-item <?php if( get_row_index() == 1 ): echo 'active';  ?><?php endif; ?>">
              <div class="testimonial-wrapper">
                <?php
                  $image = get_sub_field('testimonial_image');
                  $title = get_sub_field('testimonial_title');
                  $subtitle = get_sub_field('testimonial_subtitle');
                  $description = get_sub_field('testimonial_description');
                ?>
                <div class="row">
                  <div class="col-sm-12">
                    <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_html($image['alt']);?>" class="img-fluid">
                  </div>
                  <div class="username">
                    <h3><?php echo esc_html($title); ?></h3>
                    <span><?php echo esc_html($subtitle);?></span>
                    <p><?php echo esc_html($description);?></p>
                  </div>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">
              <span class="ti-angle-left slider-icon"></span>
            </span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true">
              <span class="ti-angle-right slider-icon"></span>
            </span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Contact Section -->
<section id="contact">
  <div class="contact">
    <div class="container">
      <div class="mb-5 text-center">
          <h5>Lets start a Conversation!</h5>
          <h2 class="fw-bold">Contact Us</h2>
      </div>
      <div class="row">
        <div class="col-lg-5 col-md-5">
          <h4 class="fw-bold">Contact Info</h4>
          <ul class="info list-unstyled">
            <li class="d-flex align-items-center">
              <span class="pe-3 ti-location-pin fs-5"></span>
              <p><a href=""><?php echo esc_html( get_field('address') ); ?></a></p>
            </li>
            <li class="d-flex align-items-center">
              <span class="pe-3 ti-mobile fs-5"></span>
              <p><a href=""><?php echo esc_html( get_field('contact_number') ); ?></a></p>
            </li>
            <li class="d-flex align-items-center">
              <span class="pe-3 ti-email fs-5"></span>
              <p><a href=""><?php the_field("email_section");?></a></p>
            </li>
          </ul>
        </div>
        <div class="col-lg-7 col-md-7 pt-lg-0 pt-md-0 pt-4">
        <form id="contactfrm">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email address">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea class="textarea" name="message" id="message" cols="30" rows="4" placeholder="Enter your message"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <input type="submit" name="submit" class="btn btn-danger"></input>
              </div>
            </div>
            <div id="result_msg">

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- Scroll Back To Top  -->
<div id="scrollUp" title="Scroll Top">
  <a href="#home"><span class="ti-arrow-up fs-4 text-white"></span></a>
</div>



</body>
</html>
<style>
  #contactfrm .false{color:red;}
  #contactfrm .true{color:green;}
</style>
<script>
  jQuery('#contactfrm').submit(function(){
    event.preventDefault();
    jQuery('#result_msg').html('');
    var link = "<?php echo admin_url('admin-ajax.php')?>";
    var form = jQuery('#contactfrm').serialize();
    var formData = new FormData;
    formData.append('action','contact_us');
    formData.append('contact_us',form);
    jQuery.ajax({
      url:link,
      data:formData,
      processData:false,
      contentType:false,
      type:'post',
      success:function(result){
        if(result.success==true){
          jQuery('#contactfrm')[0].reset();
        }
        jQuery('#result_msg').html('<span class="'+result.success+'">'+result.data+'</span>')
        // result.success
        // result.data
      }
    });
  });
</script>
<?php get_footer(); ?>