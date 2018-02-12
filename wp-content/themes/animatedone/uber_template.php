<?php
/**
 * Template Name: Gallery template
 *
 * @package WordPress
 * @subpackage Animated
 * @since Animated 1.0
 */
get_header(); ?>
<a id="close" href="/"></a>
<a id="prevslide" class="load-item"></a>
<a id="nextslide" class="load-item"></a>
<div id="slidecaption"></div>

<?php wp_footer(); ?>
<style type="text/css">
	#top_header,#top_line{
		display: none;
	}
</style>
<?php echo do_shortcode('[gallery_json_slider page_id="79"]'); ?>
<!-- <script>
	jQuery(function($){
	    $.supersized({
	        slides :  	[
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/10.jpg', 
	            title : 'Frontage of Downham Hall - <span>The house awaits you up a drive from a country lane. Credits : Photo by Pure Image Photography</span>'
	        	},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/11.jpg', title : 'Weddings at Downham Hall - <span>Downham Hall is a new wedding venue in Essex. Credits : Bride’s Hair by Hair Affair, Car by SL Executive Cars</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/20.jpg', title : 'Old Fireplace - <span>It is believed the old fireplace is one of the oldest parts of Downham Hall.</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/30.jpg', title : 'Tree seat - <span>Take a seat next to the chestnut tree and look to the fields.</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/40.jpg', title : 'View direct on to fields - <span>The bottom of the garden leads straight onto the farm fields.</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/50.jpg', title : 'Natural bowl - <span>Many of the fields to the North Side create a natural bowl</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/60.jpg', title : 'Fireplace alight - <span>A warm fire can await on a cold day.</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/70.jpg', title : 'Eucalyptus tree - <span>We have many trees but our Eucalyptus is among the more notable.</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/80.jpg', title : 'Fairy garden - <span>Your younger minds we have created a fairy garden.</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/90.jpg', title : 'Crops grow - <span>Yards from the front door wheat grows.</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/100.jpg', title : 'Garden wall - <span>Between the North and South Wing is a lovely old brick wall.</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/110.jpg', title : 'More fields - <span>Sun shining over the fields.</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/120.jpg', title : 'Front of the house - <span>Wider aspect view.</span>'},
	            {image : 'http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/gallery_fullscreen/130.jpg', title : 'Cows on the farm - <span>Cows and other farm activities are part of life at Downham Hall.</span>'},]

	    });
	});
</script> -->