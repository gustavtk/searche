<div class="col-md-4 post-card">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="body-text no-underline">
		<?php if ( has_post_thumbnail() ) { ?>
			<img src="<?php the_post_thumbnail_url('original'); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded border">
		<?php } else { ?>
			<img src="<?php bloginfo('template_directory'); ?>/images/no-image.svg" alt="No Featured Image" class="img-fluid rounded border">
		<?php } ?>
		<h4><?php the_title(); ?></h4>
		<p class="small dark-gray"><?php carbonate_post_description(); ?></p>
	</a>
</div>

