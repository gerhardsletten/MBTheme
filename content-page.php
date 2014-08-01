<?php mb_breadcrumbs() ?>

<h1><?php the_title(); ?></h1>
<?php if ( !empty( $post->post_excerpt ) ): ?> 
<div class="intro">
	<?php the_excerpt(); ?>
</div>
<?php endif; ?>
<div class="entry-content">
	<?php the_content(); ?>
	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'elevespeilet' ), 'after' => '</div>' ) ); ?>
</div>

<?php  $posts = get_pages("child_of=".get_the_ID()."&parent=".get_the_ID()."&sort_order' =>'ASC'&sort_column=menu_order"); ?>
<?php if( $posts ): ?>
	<div class="holder">
	 	<?php foreach( $posts as $post): ?>
			<?php setup_postdata($post); ?>
				<?php get_template_part( 'content' ); ?>
		<?php endforeach; ?>
		
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
