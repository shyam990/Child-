<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header(); ?>



<div class="wrap">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
	</header>
	<?php endif; ?>

	

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
				$args = array('post_type' => 'post','post_status'=>'publish',
					'posts_per_page' => 2,);
				$query = new WP_Query( $args );
              	 if( $query->have_posts() ):
				
					while( $query->have_posts() ): $query->the_post(); 

					?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(500, 370)); ?></a>
					<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
							
							by <span><?php the_author_posts_link(); ?>
							Categories: <span><?php the_category( ' ' ); ?>
							<?php the_tags( ' Tags: <span>', ', ', '</span>' ); ?>
								
				
					<a href="btn btn-dark"><?php the_excerpt(); ?></a>	
					<?php
					// get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile; 
				 if (  $wp_query->max_num_pages > 1 )
	      		   echo '<div class="misha_loadmore">More posts</div>'; 
				get_next_posts_link(); 
				get_previous_posts_link();
				 
			else :

			 _e('Sorry, no posts matched your criteria.'); 

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php
get_footer();





	