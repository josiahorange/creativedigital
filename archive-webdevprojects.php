<?php get_header('');?>

<div class="darkimage">

<div style="padding-top:0px;" class="titlewrapper-colour">
		
            <!--  <video id="videoBG" poster="poster.JPG" autoplay muted loop>
              <source src="https:products.//quickandeasylighting.com/wp-content/uploads/2020/05/Adjustment-Layer.mp4"             type="video/mp4"> 
          </video> -->
                      
 
                  <div class="hometopcontainer">
                  <?php /*
                          $headerimageid = 55;
                          $headerimage = get_image_tag($headerimageid, "Header Image", "Home Header Image", "image", "headerimage");     
                          $headerimage = str_replace("img","img style=\"position:initial;\"", $headerimage);
                          echo $headerimage;  */
                          ?>
                        <h1>Web Development Projects</h1>
                  </div>      
                  </div>
    
      </div>
	<div class="belowvideo">

      <div class="container" pt-5 pb-5>   

                  <div class="space"></div>


      
      <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

      <?php get_template_part('includes/section', 'archiveideas');?>

      <?php previous_posts_link();?>
      <?php next_posts_link();?>



      <?php get_template_part('includes/section', 'complexpagination');?>


</div>
</div>
<?php get_footer();?>


