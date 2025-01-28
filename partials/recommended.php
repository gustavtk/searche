<?php 
	$popular_tag = get_term_by('name', 'Popular', 'post_tag');
	$tag_array = wp_get_post_tags($post->ID, array( 'fields' => 'ids', 'exclude' => array($popular_tag->term_id) ));
	$tags = implode(',', $tag_array);
	$tag = get_tag($tag_array[0]);
	$posts = get_posts( array('posts_per_page' => 15, 'tag__in' => array($tags), 'orderby' => 'rand', 'order' => 'asc', 'post__not_in' => array($post->ID) ) ); 
?>
	
<?php if(!empty($tags) && !empty($posts)){; ?>
	<section class="py-5">
		<div class="row align-items-end">
			<div class="col-md text-left text-md-center">
				<h3 class="mb-0">Keep Reading</h3>
			</div>
			
			<div class="col-md text-right small text-md-center">
				<a href="<?php echo '/tag/'.$tag->slug; ?>">Explore more &#8594;</a>
				
			</div>
		</div>
		
		<div class="row">
			<?php foreach($posts as $post) { ?>
				<?php get_template_part( 'partials/post' ); ?>
			<?php } ?>
		</div>
	</section>
<?php } ?>