<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <!-- TITLE -->
    <section class="my-4">
        <div class="container text-center">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>
    
    <!-- BYLINE -->
    <section class="container-800 mb-4 small muted">
        <?php get_template_part('partials/byline'); ?>
    </section>
    
    <!-- CONTENT -->   
    <section class="container pb-5">
        <article class="article">
        
            <?php the_content(); ?>
           
            
            <?php get_template_part('partials/recommended'); ?>
 
    
        </article>
    </section>

<?php endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_footer(); ?>