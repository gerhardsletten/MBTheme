<?php get_header(); ?>
	<div class="content-holder holder">
		<article class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'single' ); ?>
			<?php endwhile; ?>
		</article>
		<?php get_template_part( 'sidebar' ); ?>
	</div>
<?php get_footer(); ?>