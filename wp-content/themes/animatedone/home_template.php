<?php
/**
 * Template Name: Main Animation
 *
 * @package WordPress
 * @subpackage Animated
 * @since Animated 1.0
 */
get_header(); ?>
    <html><!-- <![endif]-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Slider-->
    <div style="position:relative;width:100%;height:auto;margin-top:0px;margin-bottom:0px"
         class="forcefullwidth_wrapper_tp_banner">
        <div class="tp-banner-container" style="left: 0px; position: absolute; width: 1864px; overflow: visible;">
            <?php echo do_shortcode('[custom_slider slider_id="6"]'); ?>
        </div>
        <div class="tp-fullwidth-forcer" style="width: 100%; height: 650px;"></div>
    </div>
    <!-- End Slider-->

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php echo the_content();?>
            </div>
        <?php endwhile; endif; ?>
<?php get_footer(); ?>