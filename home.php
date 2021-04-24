<?php get_header();?>




  <div class="darkimage">

  <div style="padding-top:30px;" class="titlewrapper-image">
		

      <div class="hometopcontainer">

                        <div class="imageSlide">
                          <?php 
                          $headerimageid = 29;
                          $headerimage = get_image_tag($headerimageid, "Header Image", "Home Header Image", "image", "headerimage");     
                          $headerimage = str_replace("img","img style=\"position:initial;\"", $headerimage);
                          echo $headerimage;  
                          ?>
                        </div>
                        <div class="imageSlide">
                        <?php 
                          $headerimageid = 30;
                          $headerimage = get_image_tag($headerimageid, "Header Image", "Home Header Image", "image", "headerimage");     
                          $headerimage = str_replace("img","img style=\"position:initial;\"", $headerimage);
                          echo $headerimage;  
                          ?>                        </div>

                        <div id="rotatingimagetitle">
                          <span onclick="plusSlides(-1)" class="dashicons dashicons-arrow-left-alt2"></span>
                          <span onclick="plusSlides(1)" class="dashicons dashicons-arrow-right-alt2"></span>
                        </div>

                          <h1>Photography</h1>

                  </div>  
      
      </div>
</div>
<div class="belowvideo">

      <div class="container" pt-5 pb-5>


      <p style="padding-bottom:60px; padding-top:40px;  padding-bottom:20px">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop 

            <section id="photographymenu">
                      <?php
                      if ( has_nav_menu( 'photography-menu' ) ) :

                      $menu_slug  = get_term( get_nav_menu_locations()['photography-menu'], 'nav_menu' )->slug;
                      $menu_items = wp_get_nav_menu_items( $menu_slug );

                      $featuredImages = array();
                      $featuredImages[0]['image'] = 29;
                      $featuredImages[0]['desc'] = "Landscape it like my fav";
                      $featuredImages[1]['image'] = 42;
                      $featuredImages[1]['desc'] = "blop2";
                      $featuredImages[2]['image'] = 43;
                      $featuredImages[2]['desc'] = "blop3";
                      $featuredImages[3]['image'] = 44;
                      $featuredImages[3]['desc'] = "blop4";

                      $counter = 0;


                      ?>

                          <?php foreach ( $menu_items as $menu_item ) : ?>

                            <a onmouseover="displayDescription(event)" onmouseleave="displayDescription(event)" href="">
                            <?php 
                            $headerimage = get_image_tag($featuredImages[$counter]['image'], "Menu Image", "Photography Menu Image", "image", "menuimage");     
                            $headerimage = str_replace("img","img style=\"position:initial;\"", $headerimage);
                            echo $headerimage;  ?>
                            <h3><?= $menu_item->title; ?></h3>
                            <p><?= $featuredImages[$counter]['desc']?></p>
                            </a>
                            
                            <?php $counter++;
 
                          endforeach; ?>
                          <?php endif; ?>
                          
                  

            </section>


      <?php /*wp_nav_menu (
                             array(
                    'theme_location' => 'photography-menu',
                    'menu_class' => 'learn-menu',
                    )

                  );*/?>

                  <div class="space"></div>

    
</p>

    <div class="grey-background">




      

      <?php get_template_part('includes/section', 'archive');?>

      <?php previous_posts_link();?>
      <?php next_posts_link();?>



      <?php get_template_part('includes/section', 'complexpagination');?>
   </div>


</div>
                </div>

<?php get_footer();?>

<script>
  
setInterval(function(){ 
  plusSlides(1);
}, 5000);

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("imageSlide");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.visibility = "hidden";
      slides[i].style.opacity = "0";

  }

  slides[slideIndex-1].style.visibility = "visible";
  slides[slideIndex-1].style.opacity = "1";
}


</script>

