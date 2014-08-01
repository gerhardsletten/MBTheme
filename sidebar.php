<aside class="sidebar">
	<?php if(is_page()): ?>
		<?php dynamic_sidebar( 'primary-widget-area' ) ?>
	<?php else: ?>
		<?php dynamic_sidebar( 'secondary-widget-area' ) ?>
	<?php endif; ?>
</aside>