
<div class="clear"></div>
</div>
</div>





<?php if(is_front_page()){ ?>

		<?php $args = array( 'post_type' => 'mt_section', 'meta_key' => 'mt_sorting', 'orderby' => 'meta_value_num', 'order' => 'ASC' ); ?>
		<?php $query = new WP_Query( $args ); ?>
					
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		
				<?php global $post; ?>
				
				<?php $class = ""; if(get_post_meta($post->ID, "mt_class", true)!="") { $class = get_post_meta($post->ID, "mt_class", true); } ?>
				
				<?php if(get_post_meta($post->ID, "mt_check_page_home", true) == "on") { ?>
					
						<section class="section-fix mt-style-<?php echo $post->ID; ?> <?php echo $class; ?>" ><div class="container"><div class="row"><div class="span12"><?php the_content(); ?></div></div></div></section>
					
				<?php } ?>
	
		<?php endwhile;  wp_reset_query();  ?>

<?php } ?>




<?php 

$page_sections = get_post_meta($post->ID, "mb_page_sections_in", true); 

if($page_sections!="") { 

	foreach($page_sections as $page_section){
		
		if($page_section['section']!="") {
			
			$args = array( 'post_type' => 'mt_section', 'p' => $page_section['section'] );
			
			$query = new WP_Query( $args );
			
			while ( $query->have_posts() ) : $query->the_post();
				
				global $post;
				 
				$class = ""; if(get_post_meta($post->ID, "mt_class", true)!="") { $class = get_post_meta($post->ID, "mt_class", true); } 
				 
				 
				 ?><section class=" section-fix mt-style-<?php echo $post->ID; ?> <?php echo $class; ?>" ><div class="container"><div class="row"><div class="span12"><?php the_content(); ?></div></div></div></section><?php
				 
			
			endwhile;  wp_reset_query(); 
			
		}
		
	}

} 

?>



<?php if  (ot_get_option('enable_footer') == 'on') { ?>
<footer id="footer">
   
        	<?php function_footer_widget_areas(); ?>
    
    

	<?php if  (ot_get_option('footer_buttom') == 'footer_buttom_on') { ?>
	
	<div class="container">
		<div class="row"><div class="span12 mt-subfooter-line"></div></div>
 		<div class="row" id="sub-footer">
			
			<div id="footer-left" class="span6">
			
		        <div><p><?php printf( __( ot_get_option('copyright'), 'madza_translate')); ?></p></div> 
		        
		    </div>    
		    
		    <div id="footer-right" class="span6">
		    
		        <div id="button-nav"><?php wp_nav_menu( array('theme_location'  => "footer_menu", 'container' =>false, 'fallback_cb' => false, 'menu_class' => 'bottom-menu', 'menu_id' => 'menu_footer','echo' => true, 'before' => '','after' => '', 'link_before' => '','link_after' => '', 'depth' => 0));  ?></div>
		        
		    </div> 
 		</div>    
		        
		    <?php if  (ot_get_option('bottom_footer_html')) { ?>
		    <div class="row">       
		        <div class="span12 footer_widget_midle"> <?php echo of_get_option('bottom_footer_html'); ?> </div>
		    </div>        
		    <?php } ?>
		
	</div>
	
	<?php } ?>   
	
</footer>     
   
<?php } ?>


<?php wp_footer(); ?>

</body>

</html>