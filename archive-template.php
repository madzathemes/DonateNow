 <?php
 /*
Template Name: Archive
*/ 

global $post;

$mt_comment=get_post_meta($post->ID, "madza_comment", true); 
$mt_layout = get_post_meta($post->ID, "layout_positions", true);

$mt_float_layout = "";
$mt_float_sidebar = "";

if ($mt_layout == "left") {

	$mt_float_layout = "floatright";
	$mt_float_sidebar = "floatleft";
}

$more = 0;


?>

<?php get_header(); ?>

<div class="row">

	<div class="span<?php if ($mt_layout != "full") { echo "8 "; } else {  echo "12 "; } echo $mt_float_layout; ?> ">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<!--BEGIN .hentry -->
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					
					<?php the_content(__('Read more...', 'madza_translate')); ?>
		
						<div class="one_third">
							<div class="menu_categories">
    							<h4 class="widget_h"><span><?php _e('Last 30 Posts', 'madza_translate') ?></span></h4>
							
	    						<ul>
	    						<?php $archive_30 = get_posts('numberposts=30');
	    						foreach($archive_30 as $post) : ?>
	    							<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
	    						<?php endforeach; ?>
	    						</ul>
							</div>
						</div>
						
						<div class="one_third">
							<div class="menu_categories">
								<h4 class="widget_h"><span><?php _e('Archives by Month:', 'madza_translate') ?></span></h4>
    						
	    						<ul>
	    							<?php wp_get_archives('type=monthly'); ?>
	    						</ul>
	    					</div>
    					</div>
						<div class="one_third_last">
							<div class="menu_categories">
	    						<h4 class="widget_h"><span><?php _e('Archives by Subject:', 'madza_translate') ?></span></h4>
							
	    						<ul>
	    					 		<?php wp_list_categories( 'title_li=' ); ?>
	    						</ul>
    						</div>
						</div>
						<div class="clear"></div> 
				</div>
				
				<?php endwhile; else: ?>

				<!--BEGIN #post-0-->
				<div id="post-0" <?php post_class() ?>>
				
					<h1 class="entry-title"><?php _e('Error 404 - Not Found', 'madza_translate') ?></h1>
				
					<!--BEGIN .entry-content-->
					<div class="entry-content">
						<p><?php _e("Sorry, but you are looking for something that isn't here.", "madza_translate") ?></p>
					<!--END .entry-content-->
					</div>
				
				<!--END #post-0-->
				</div>

			<?php endif; ?>
		

		
	</div>
	
	<?php if ($mt_layout != "full") { ?>
		
		<div class="span4 <?php echo $mt_float_sidebar; ?> "><?php get_sidebar(); ?></div>
	
	<?php } ?>
			
</div>

<?php get_footer(); ?>
