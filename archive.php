<?php get_header();?>





      <div class="titlewrapper">
           <h1><?php single_cat_title();?></h1>
      </div>
      
      <div class="container" pt-5 pb-5>   

      <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>


      <div class="space"></div>

      <?php get_template_part('includes/section', 'archive');?>

      <?php previous_posts_link();?>
      <?php next_posts_link();?>



      <?php get_template_part('includes/section', 'complexpagination');?>



</div>

<?php get_footer();?>


