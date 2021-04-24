<!DOCTYPE html>
<html>

     <head>

          <?php wp_head();?>
             


      </head>

      <body <?php body_class();?>>    

          
            <header class="sticky-top" id="stickyheader" >	
				
					 <!-- <div class="topbanner"> 
				          <h2>Top Banner</h2>
		              </div> -->
				
                 <div id="headercontainer" class="container">
					 
     


                  <?php /*wp_nav_menu (
                             array(
                    'theme_location' => 'top-menu',
                    'menu_class' => 'top-bar',
                   )

                  )*/;

                  $image = get_image_tag(37, "logo", "Creative Digital Logo", "image", "logo");       
                  $logoimage = str_replace("img","img id=\"logoimg\"", $image);
                  $mobileimage = str_replace("img","img id=\"mobilelogo\" style=\"width:auto; height:40px;\"", $image);
                  
                  ?>



                   <a href="<?php echo get_site_url() ?>"><?php echo $mobileimage ?><!--<img  id="mobilelogo" style="width:auto; height:40px;" src="http://localhost:33666/wp-content/uploads/2021/01/text-and-white.png" alt="Quick and Easy Lighting Logo">--></a>


                   <i id="hamburger"  onclick="hamburger()" class="fas fa-bars"></i>
                  <!-- <span id="uparrow"  onclick="uparrow()">&#8743;</span> -->





                  <ul id="top-bar">

                  


            

                  <li> <a href="<?php  echo get_post_type_archive_link( 'post' );?>">Photography</a></li>
                  <li> <a href="<?php echo get_site_url() . '/webdevprojects'?>">Web Development</a></li>
                  <li> <a id="headertextlogo" href="<?php echo get_site_url()?>">JOSIAH ORANGE</a></li>
                    <li> <a href="<?php echo get_site_url() . '/about'?>" >About</a></li>
                  <li style="cursor:pointer;" onclick="searchs()"> <a>Search</a></li>
                  </ul>




                
                 </div>


                 <div id="searchContainer">
                        <div id="searchBox"><?php get_search_form();?></div>
                        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

                        
                  </div>

             </header>


