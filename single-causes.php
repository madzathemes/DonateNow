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
$mt_layout = get_post_meta($post->ID, "layout_positions", true);
$mt_doctor_image = get_post_meta($post->ID, "mt_causes_image_size", true);

$mt_float_layout = "";
$mt_float_sidebar = "";
	
if ($mt_layout == "left") {

	$mt_float_layout = "floatright";
	$mt_float_sidebar = "floatleft";
}

$mt_image_width = "960";

if($mt_layout != "full" ) { $mt_image_width = "620"; }
if($mt_doctor_image == "small" ) { $mt_image_width = "300"; }

?>
<div class="row">

	<div class="span<?php if ($mt_layout != "full") { echo "8 "; } else {  echo "12 "; } echo $mt_float_layout; ?> ">
		
		<header class="entry-header mt_doctor_image_<?php echo $mt_doctor_image; ?>">
			<div class="mb_portfolio_slider entry-page-image">
			
				<div class="flexslider"> 
				
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
									    <video class="video-js" width="<?php echo $mt_image_width; ?>" height="<?php echo $mt_portfolio_slider_height; ?>" controls preload poster="<?php echo $slide['slider_image']; ?>">
									      <source src="<?php echo $slide['slider_m4v']; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
									      <source src="<?php echo $slide['slider_webm']; ?>" type='video/webm; codecs="vp8, vorbis"' />
									      <source src="<?php echo $slide['slider_ogv']; ?>" type='video/ogg; codecs="theora, vorbis"' />
									      <!-- Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class. -->
									      <object class="vjs-flash-fallback" width="<?php echo $mt_image_width; ?>" height="<?php echo $heightSingle; ?>" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
									        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
									        <param name="allowfullscreen" value="true" />
									        <param name="flashvars" value='config={"playlist":["<?php echo $slide['slider_image'];; ?>", {"url": "<?php echo $slide['slider_mp4'];; ?>","autoPlay":false,"autoBuffering":true}]}' />
									        <!-- Image Fallback. Typically the same as the poster image. -->
									        <img src="<?php echo $image_prew; ?>" width="<?php echo $mt_image_width; ?>" height="<?php echo $mt_portfolio_slider_height; ?>" alt="Poster Image" title="No video playback capabilities." />
									      </object>
									    </video>
									    
									  </div>
									 </li>
											          	
								<?php } else if ($slide['slider_image'] != "") { ?>    
								
									<li><img src="<?php echo aq_resize($slide['slider_image'], 960, $mt_portfolio_slider_height); ?>"></li>
								
								<?php } ?>
								
							<?php } ?>
							
						<?php } else if(has_post_thumbnail()) { ?>
						
							<li><?php   echo get_the_post_thumbnail( $post->ID, array($mt_image_width, $mt_portfolio_slider_height, 'bfi_thumb' => true), $src[0] ); ?></li>

						<?php } ?>
							
						<?php if($comment=='Yes'){ comments_template( '', true );  }?>
					
					</ul>
				      
				</div>
				
				<script type="text/javascript">
				jQuery(window).load(function() {
				  	jQuery('.flexslider').flexslider({
					    animation: "slide",
					    smoothHeight: true	              
				    });
				});
				</script>	
				
			</div>
		</header>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="entry-content"><?php  the_content(); ?></div>
			<?php if ($mt_layout == "full") { ?>
				<div class="entry-meta" style="margin-top: 10px!important;"><a href='<?php echo get_post_meta($post->ID, 'mt_causes_button_url', TRUE); ?>' class='more-link mt-donate-link'><span><?php echo get_post_meta($post->ID, 'mt_causes_button_name', TRUE); ?></span></a><div class="clear"></div></div>
			<?php } ?>
		<?php endwhile;  wp_reset_query(); ?>

	</div>
	
	<?php if ($mt_layout != "full") { ?>
		
		<div class="span4 <?php echo $mt_float_sidebar; ?> ">
			
			<div class="entry-meta" style="margin-top: 10px!important;"><a href='<?php echo get_post_meta($post->ID, 'mt_causes_button_url', TRUE); ?>' class='more-link mt-donate-link'><span><?php echo get_post_meta($post->ID, 'mt_causes_button_name', TRUE); ?></span></a><div class="clear"></div></div>
			<?php get_sidebar(); ?>
		
		</div>
	
	<?php } ?>
			
</div>     
<?php get_footer(); ?>