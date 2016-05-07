

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<div class="entry-content">
		<?php if(!is_single()) { 
				
				if(ot_get_option("blog_content_type")=="full_content") { the_content( __( '', 'madza_translate' ) ); } else { the_excerpt(); }
				
			} else { 
			
				the_content( __( '', 'madza_translate' ) ); 
				
			}  ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'madza_translate' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'madza_translate' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
