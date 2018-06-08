<?php
/*
Template Name: Home
*/
get_header(); ?>

<div class="featured">
	<div class="wrap-featured zerogrid">
		<div class="slider">
			<div class="rslides_container">
				<ul class="rslides" id="slider">

				<?php
					$args = array( 'post_type' => 'music_slider', );
					
					$loop = new WP_Query( $args );
				?>

				<?php while($loop->have_posts()) : $loop->the_post(); ?>
					<li><?php the_post_thumbnail(); ?></li>
				<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div>
</div>


<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block01">
		<?php 
			$args = array('post_type' => 'blurb', 'posts_per_page' => 3);

			$blurbs = new WP_Query( $args );
		?>
		<?php while($blurbs->have_posts()) : $blurbs->the_post(); ?>
			<div class="col-1-3">
				<div class="wrap-col box">
					<h2><?php the_title(); ?></h2>
					<p><?php the_content(); ?></p>
				</div>
			</div>
		<?php endwhile; ?>
		</div>

		<div class="row block02">
			<div class="col-2-3">
				<div class="wrap-col">
					<div class="heading"><h2>Latest Blog</h2></div>
					
				<?php 
					$args = array('post_type' => 'post');

					$posts = new WP_Query($args);
				?>	

				<?php while($posts->have_posts()) : $posts->the_post(); ?>
					<article class="row">
						<div class="col-1-3">
							<div class="wrap-col">
								<?php the_post_thumbnail(); ?>
							</div>
						</div>
						<div class="col-2-3">
							<div class="wrap-col">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="info">By <?php the_author(); ?> on <?php the_time( 'F d, Y' ) ?> with <?php comments_popup_link(); ?></div>

								<?php music_read_more(); ?> <a href="<?php the_permalink(); ?>">Read More</a>

							</div>
						</div>
					</article>
				<?php endwhile; ?>

				</div>
			</div>

			<div class="col-1-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>