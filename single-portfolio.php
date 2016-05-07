<?php
/**
 * @author madars.bitenieks
 * @copyright 2013
 */

get_header(); 

global $post;

$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array( 999,999 ), false, '' );
$mt_portfolio_slider_height = get_post_meta($post->ID, "mt_portfolio_slider_height", true); 
$mt_fields = get_post_meta($post->ID,'mb_portfolio_fields', true);
$slides = get_post_meta($post->ID,'mb_portfolio_slider', true);
$mt_layout = get_post_meta($post->ID, "layout_positions4", true);
$mt_sidebar = get_post_meta($post->ID, "layout_sidebar", true);

$mt_float_layout = "";
$mt_float_sidebar = "";

if ($mt_layout == "left") {

	$mt_float_layout = "floatright";
	$mt_float_sidebar = "floatleft";
}

?>
<div class="row">

	<div class="span<?php if ($mt_layout != "full") { echo "8 "; } else {  echo "12 "; } echo $mt_float_layout; ?> ">
	
		<div class="mb_portfolio_slider ">
		
			<div class="flexslider fslider"> 
			    
				<ul class="slides">
				
					<?php if($slides!="") { ?>
					
						<?php foreach($slides as $slide) { ?>
					
							<?php if ($slide['slider_embed'] != "") { ?>
							
								<li><div class="video-container"><?php echo $slide['slider_embed']; ?></div></li>
								
							<?php } else if ($slide['slider_m4v'] != "") { ?>
								
								<li><script type="text/javascript" charset="utf-8"> VideoJS.setupAllWhenReady(); </script>
								   <!-- Begin VideoJS -->
								  <div class="video-js-box">
								    <!-- Using the Video for Everybody Embed Code http://camendesign.com/code/video_for_everybody -->
								    <video class="video-js" width="960" height="<?php echo $mt_portfolio_slider_height; ?>" controls preload poster="<?php echo $slide['slider_image']; ?>">
								      <source src="<?php echo $slide['slider_m4v']; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
								      <source src="<?php echo $slide['slider_webm']; ?>" type='video/webm; codecs="vp8, vorbis"' />
								      <source src="<?php echo $slide['slider_ogv']; ?>" type='video/ogg; codecs="theora, vorbis"' />
								      <!-- Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class. -->
								      <object class="vjs-flash-fallback" width="960" height="<?php echo $heightSingle; ?>" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
								        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
								        <param name="allowfullscreen" value="true" />
								        <param name="flashvars" value='config={"playlist":["<?php echo $slide['slider_image'];; ?>", {"url": "<?php echo $slide['slider_mp4'];; ?>","autoPlay":false,"autoBuffering":true}]}' />
								        <!-- Image Fallback. Typically the same as the poster image. -->
								        <img src="<?php echo $image_prew; ?>" width="960" height="<?php echo $mt_portfolio_slider_height; ?>" alt="Poster Image" title="No video playback capabilities." />
								      </object>
								    </video>
								    
								  </div>
								 </li>
										          	
							<?php } else if ($slide['slider_image'] != "") { ?>    
							
								<li><img src="<?php echo aq_resize($slide['slider_image'], 960, $mt_portfolio_slider_height); ?>"></li>
							
							<?php } ?>
							
						<?php } ?>
						
					<?php } else if(has_post_thumbnail()) { ?>
					
						<li><?php  echo get_the_post_thumbnail( $post->ID, array(960, $mt_portfolio_slider_height, 'bfi_thumb' => true), $src[0] );?></li>
					
					<?php } ?>
						
					<?php if($comment=='Yes'){ comments_template( '', true );  }?>
				
				</ul>
			      
			</div>
			
			<script type="text/javascript">
				jQuery(window).load(function() {
				  	jQuery('.flexslider.fslider').flexslider({
					    animation: "fade",
					    smoothHeight: true	              
				    });
				});
			</script>	
			
		</div>
		

	</div>
	
	
	
	<div class="span4 <?php echo $mt_float_sidebar; ?> ">
		
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php  the_content(); ?>
		<?php endwhile;  wp_reset_query(); ?>
		
		<ul id="mt_portfolio_tabs">
			<li><strong class="mt_portfolio_spart">Date:</strong> <?php echo get_the_date(); ?></li>
			<?php if($mt_fields!="") { ?>
				<?php foreach($mt_fields as $slide) { ?>
					<?php if ($slide['metabox_url'] == "") { ?>
						<li><strong class="mt_portfolio_part"><?php echo $slide['metabox_name']; ?>:</strong> <?php echo $slide['metabox_text']; ?></li>		
					<?php } else if ($slide['metabox_url'] != "") { ?>
						<li><strong class="mt_portfolio_spart"><?php echo $slide['metabox_name']; ?>:</strong> <a href="<?php $slide['metabox_url']; ?>"><?php echo $slide['metabox_text']; ?></a></li>	
					<?php } ?>
				<?php } ?>
			<?php } ?> 		        
		</ul>
	
		<?php if ($mt_sidebar != "") {  get_sidebar(); } ?>
		
	</div>
	
			
</div>     
<?php get_footer(); ?>