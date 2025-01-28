<section class="py-5">
	<div class="container">
		<div class="row align-items-end">
			<div class="col-md text-left text-md-center">
				<h2  class="mb-0 text-center">Latest</h2>
			</div>
		</div>
		<div class="col-md text-right text-md-center">
					<a href="https://www.searche.co.za/posts/">Explore more &#8594;</a>
				</div>
		<?php $args = array('posts_per_page' => 15, 'post_type' => 'post', 'post_status' => 'publish'); ?>
		<?php $posts = get_posts($args); ?>
		<div class="row">
			<?php foreach ( $posts as $post ) { ?>
				<?php echo get_template_part( 'partials/post' ); ?>
			<?php } ?>
		</div>
	</div>
	
</section>