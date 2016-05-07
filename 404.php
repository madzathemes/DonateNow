<?php

get_header(); 

?>
<article id="post-0" class="post error404 no-results not-found">
	<header class="entry-header" style="text-align:center;">
		<h2 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'madza_translate' ); ?></h2>
	</header>

	<div class="entry-content" style="text-align:center!important; float:none!important;">
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'madza_translate' ); ?></p>
		<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 -->

<div class="clear"></div>

<?php

 if ( function_exists( 'ot_get_option' ) ) {
/* get the slider array */
  $object_x = ot_get_option( 'portfolio_page', array() );
  if ( ! empty( $object_x )) {
    foreach( $object_x as $slide ) {
    	if ("404page" == $slide['for_home_page']) {
    
	    ?><div class="mt-padding-layout"><?php
	    	if( $slide['portfolio_menu']=="portfolio_menu_sorting" ) {
				
			
					$categorys = $slide['portfolio_category'];
					if($categorys=="Select..." OR $categorys=="All" OR $categorys=="" ){
						
						$term_obj = get_terms('portfolio_cat'); ?>
						<div class="clear"></div>
							<ul id="filterm">
								<li class="current"><a href="#"><?php _e( 'All', "madza_translate" ); ?></a></li>
								<?php foreach ($term_obj as $term) { ?><li><a href="#"><?php echo $term->name; ?></a></li><?php } ?>
							</ul>
							<div class="clear"></div><?php
					}
				
			}
    		    	
	    	?></div><?php

				
			}
    	
	    	
	    }
    }
  }
  

get_footer(); ?>