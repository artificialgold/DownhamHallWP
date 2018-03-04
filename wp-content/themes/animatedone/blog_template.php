<?php
/**
 * Template Name: Blog Template
 *
 * @package WordPress
 * @subpackage Animated
 * @since Animated 1.0
 */
get_header(); ?>
<div class="main_block_animation blog">
	<div class="sub_main">
		<div class="blog_title">
				<h2><?php echo get_the_title();?></h2>
		</div>
	</div>
	<div class="container">
		<div class="half_path empty"></div>
		<div class="half_path">
			<?php 
			global $post;
                $args = array( 
                	'numberposts' => -1,
                	'category' => 1,
                	'order' => 'ASC'
                );
                $myposts = get_posts( $args );
			$i = 1;
			foreach ($myposts as $mypost) {
				echo "<a href=".get_permalink($mypost->ID).">";
					echo "<div class='third_path'>";
						echo "<span class='big_number'>0$i<span>";
					echo "</div>";
					echo "<div class='twothird_path'>";
						echo "<h3>".$mypost->post_title."</h3>";
						echo "<span>".$mypost->post_content."</span>";
						echo "<br class='clear'>";
					echo "</div>";
				echo "</a>";
				$i++;
			}
			?>
			<br class="clear" />
		</div>
	</div>
</div>
<?php get_footer(); ?>