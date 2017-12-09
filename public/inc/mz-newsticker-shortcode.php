<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       muizzit.com/porosh-bio
 * @since      1.0.0
 *
 * @package    Mz_Newsticker
 * @subpackage Mz_Newsticker/public/partials
 */



//element shortcode out team  [mz-newsticker]

function mz_newsticker_shortcode($atts,$content = null){
	extract(shortcode_atts(array(
		     //'post_per_page' => '',		 	  
		 	 //'category_name'	=> '',		 	 
	),$atts, 'mz-newsticker'));

 
  ?>

              <div class="latest-news">
              	<div class="marquee-title">
              		<h2>Latest News</h2>
              		
              	</div>
 
					<ul class="marquee-items">
    
							<?php 
 
								$shamakalteam = new WP_Query(array(

										'posts_per_page' => mz_newsticker_get_option( 'mz_newsticker_post_limit', 'mz_newsticker_general_settings', '5' ),

										'post_type' => 'post',

										'category_name' => mz_newsticker_get_option( 'mz_newsticker_post_category', 'mz_newsticker_general_settings'),

										'post_status' => 'publish',

										'order' => 'DSC'

										));

								

							 if($shamakalteam->have_posts()) :					 

					while($shamakalteam->have_posts()) : $shamakalteam->the_post();

					$ticker_icon = mz_newsticker_get_option( 'mz_newsticker_fontawesome', 'mz_newsticker_style_settings', 'fa-star-half-full' );
						 

							?>
       <li><span> <i class="fa <?php echo $ticker_icon; ?>"></i> </span><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></li>
       	<?php 

							

									endwhile;

									endif;	

							?>  
       
       
	  </ul>
	 
   </div>
 



  <?php

 wp_reset_postdata();


 

  }
add_shortcode('mz-newsticker','mz_newsticker_shortcode');

