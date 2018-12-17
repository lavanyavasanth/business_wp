<?php
/**
 * The template for displaying all pages
 */

get_header("int"); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				
				
				
				<?php if( ! empty( $post->post_title ) ) : ?>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php /*themesgenerator_edit_link( get_the_ID() );*/?>
					</header><!-- .entry-header -->					
				<?php endif; ?>
				
				
				
				
				
					
					<div class="entry-content">
						<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'themesgenerator' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?		
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->



<?php get_footer("int");
