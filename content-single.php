<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="holder">
	<?php if ( !empty( $post->post_excerpt ) ): ?> 
	<div class="intro">
		<?php the_excerpt(); ?>
	</div>
	<?php endif; ?>
	<div class="meta">
		<strong>Date:</strong> <?php the_date() ?>
		<?php if ( count( get_the_category() ) ) : ?>
			<div class="categories">	
				<?php echo get_the_category_list(''); ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="entry-content">
	<?php the_content(); ?>
	</div>
	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'elevespeilet' ), 'after' => '</div>' ) ); ?>
</div>

