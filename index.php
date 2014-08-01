<?php get_header(); ?>
<div class="content-holder holder">
	<div class="main-content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<?php mb_content_nav(); ?>
		<?php endif; ?>
	</div>
	<?php get_template_part( 'sidebar' ); ?>
</div>
<?php get_footer(); ?>