<?php
/**
 * @package dazzling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			<?php the_post_thumbnail( 'dazzling-thumb-post', array( 'class' => 'thumbnail col-sm-4' )); ?>
		</a>

		<div class="col-sm-8">

			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php dazzling_posted_on(); ?><?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><i class="fa fa-comment-o"></i><?php comments_popup_link( __( 'Leave a comment', 'dazzling' ), __( '1 Comment', 'dazzling' ), __( '% Comments', 'dazzling' ) ); ?></span>
			<?php endif; ?>

			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'dazzling' ) );
					if ( $categories_list && dazzling_categorized_blog() ) :
				?>
				<span class="cat-links"><i class="fa fa-folder-open-o"></i>
					<?php printf( __( ' %1$s', 'dazzling' ), $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php edit_post_link( __( 'Edit', 'dazzling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>

			</div><!-- .entry-meta -->
			<?php endif; ?>
			<?php the_excerpt(); ?>

		</div>

		<p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>"><?php _e( 'Continue reading', 'dazzling' ); ?> <i class="fa fa-chevron-right"></i></a></p>
		
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"></a>	


		<?php
			wp_link_pages( array( 
				'before'            => '<div class="page-links">'.__( 'Pages:', 'dazzling' ),
				'after'             => '</div>',
				'link_before'       => '<span>',
				'link_after'        => '</span>',
				'pagelink'          => '%',
				'echo'              => 1 
       		) );
    	?>
	</div><!-- .entry-content -->

	<hr class="section-divider">
</article><!-- #post-## -->
