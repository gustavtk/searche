<?php 
  global $wp_query;
  $total_results = $wp_query->found_posts;
?>

<?php get_header(); ?>

<!-- TITLE, FORM, AND RESULT COUNT -->
<section class="py-5">
  <div class="container">
    <h1 class="text-center mb-3">Search Results</h1>
    <?php get_template_part( 'partials/searchform' ); ?>
    <p class="mb-3 text-center">We've found about <strong><?php echo $total_results; ?></strong> result(s).</p>
  </div>
</section>

<!-- SEARCH RESULTS -->
<section class="pb-5">
  <div class="container min-height">
    <div class="row">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'partials/post' ); ?>
      <?php endwhile; ?>
    </div>

	  <div><?php next_posts_link( 'See More Posts' ); ?></div>
	  <div><?php previous_posts_link( 'See Previous Posts' ); ?></div>
	
    <?php else: ?>
	   <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>