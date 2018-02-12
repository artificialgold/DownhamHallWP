<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Animated
 * @since Animated 1.0
 */

get_header(); ?>

<div class="main_block_animation uber">
	<div class="sub_main">
	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="blog_title">
			<h2><?php echo get_the_title();?></h2>
		</div>
		<div class="container">
			<?php the_content();?>
		</div>
	<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>