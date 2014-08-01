<article class="post-list holder">
	<?php if(has_post_thumbnail()):?>
	<a href="<?php the_permalink(); ?>" class="img">
		<?php echo get_the_post_thumbnail(get_the_ID()); ?>
	</a>
	<div>
	<?php endif; ?>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<?php the_excerpt(); ?>

	<a href="<?php the_permalink(); ?>" class="button secondary">Les mer</a>
	<?php if(has_post_thumbnail()):?>
	</div>
	<?php endif; ?>
</article>