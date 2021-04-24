	<?php get_header('transparent');?>

		
    <?php $homeID = get_the_ID();
    
    $headerimageid = 5;
    $headerimage = get_image_tag($headerimageid, "Header Image", "Home Header Image", "image", "headerimage");       
    ?>



    <div style="padding-top:30px;" class="titlewrapper-image">
		
  <!--  <video id="videoBG" poster="poster.JPG" autoplay muted loop>
    <source src="https:products.//quickandeasylighting.com/wp-content/uploads/2020/05/Adjustment-Layer.mp4"             type="video/mp4"> 
</video> -->
		
		
        <div class="hometopcontainer">
        
          <!--<img src="<?php echo get_site_url() . "/wp-content/uploads/2021/01/man-5419522.jpg"?>" alt="">-->
          <?php echo $headerimage ?>

          <div class="hometopwrapper"> 
			
          <div class="glitchheader" title="<?php the_title();?>"><?php the_title();?></div>


         <h2>Welcome to my Portfolio</h2>



            </div>


          </div>



        </div>

        
	<div class="belowvideo">

<div class="container"  pt-5 pb-5>  




       <div class="wrapper">
		  
		 <div class="space"></div>


         <h3 style="font-weight:300;text-align:center; padding-bottom:40px;padding-top:40px; font-size:2.6rem;">Let's find something inspirational!</h3>


         <div style="margin-top:20px;" class="space"></div>


		 <div id="searchBox"><?php get_search_form();?></div>
		   
		 <div class="space"></div>


         <?php $catid = '11' ?>
         <?php include( locate_template( 'includes/section-gallery.php', false, false ) ); 
		   
		   ?>		 <div class="space"></div> <?php

		   
           echo get_post_field('post_content', $homeID);
?>
		   		 
		 <div class="space"></div>

         











    </div>


</div>
</div>




<?php get_footer();?>