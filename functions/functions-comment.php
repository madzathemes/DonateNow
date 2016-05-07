<?php

/*-----------------------------------------------------------------------------------*/
/* Theme Name: 1Design
/* Theme URI: http://themeforest.net/user/madza
/* Description: Business & Portfolio Theme
/* Author: Madars Bitenieks
/* Author URI: http://themeforest.net/user/madza
/* License: GNU General Public License version 3.0
/* License URI: http://www.gnu.org/licenses/gpl-3.0.html
/* Author Madars Bitenieks for http://themeforest.net/user/madza
/* All files, unless otherwise stated, are released under the GNU General Public License
/* version 3.0 (http://www.gnu.org/licenses/gpl-3.0.html)
/*-----------------------------------------------------------------------------------*/



if ( ! function_exists( 'Gooseo_posted_on' ) ) :

function Gooseo_posted_on() {
	printf( __( '<span class="date_links">%2$s</span>' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'madza_translate' ), get_the_author() ),
			get_the_author()
		)
	);
}

endif;

//POST IN
if ( ! function_exists( 'Gooseo_posted_in' ) ) :

function Gooseo_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'madza_translate' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( '%1$s.', 'madza_translate' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'madza_translate' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

endif;

/*-----------------------------------------------------------------------------------*/
/*	Coment Function
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'Gooseo_comment' ) ) :

function Gooseo_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'madza_translate' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'madza_translate' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 80;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 80;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s %2$s', 'madza_translate' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s">- <time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'madza_translate' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( ' Edit', 'madza_translate' ), '<span class="edit-link">', '</span>' ); ?> -<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( ' Reply &rarr;', 'madza_translate' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'madza_translate' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>
			<div class="clear"></div>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for twentyeleven_comment()


?>