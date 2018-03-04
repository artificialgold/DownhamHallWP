<?php


if ( ! function_exists( 'animated_theme_setup' ) ) :
	function animated_theme_setup() {
		add_theme_support( 'menus' );
		add_theme_support( 'post-thumbnails' ); 
	}
endif;

add_action( 'after_setup_theme', 'animated_theme_setup' );

function animated_theme_scripts() {
	wp_enqueue_style( 'main_styles', get_template_directory_uri() . '/css/base.css', array(), '3.2' );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.11.2.min.js', false, null, true );
	wp_enqueue_script( 'jquery');
	
	wp_register_script( 'common_scripts_min', get_template_directory_uri() . '/js/common_scripts_min.js', array( 'jquery' ), '', true );
	wp_register_script( 'functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '', true );
	wp_register_script( 'validate', get_template_directory_uri() . '/js/validate.js', array( 'jquery' ), '', true );
	wp_register_script( 'simpleWeather', get_template_directory_uri() . '/js/jquery.simpleWeather.min.js', array( 'jquery' ), '', true );

	wp_register_script( 'revolution_func', get_template_directory_uri() . '/js/revolution_func.js',array( 'jquery' ), '', true  );
	wp_register_script( 'themepunch_revolution', get_template_directory_uri() . '/js/jquery.themepunch.revolution.min.js',array( 'jquery' ), '', true   );
	wp_register_script( 'themepunch_tools', get_template_directory_uri() . '/js/jquery.themepunch.tools.min.js',array( 'jquery' ), '', true   );


	wp_enqueue_script('themepunch_tools');
	wp_enqueue_script('themepunch_revolution');
	wp_enqueue_script('revolution_func');
	if(is_page( 'gallery' ) ){
		wp_register_script( 'supersized', get_template_directory_uri() . '/js/supersized.3.2.7.min.js',array( 'jquery' ), '', true   );
		wp_register_script( 'supersized_shutter', get_template_directory_uri() . '/js/supersized.shutter.min.js',array( 'jquery' ), '', true   );
		wp_enqueue_script('supersized');
		wp_enqueue_script('supersized_shutter');
	}

	wp_enqueue_script('common_scripts_min');
	wp_enqueue_script('functions');
	wp_enqueue_script('validate');
	wp_enqueue_script('simpleWeather');

}
add_action( 'wp_enqueue_scripts', 'animated_theme_scripts' );

class True_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output
	 * @param object $item
	 * @param int $depth
	 * @param object 
	 */
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;  
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
 
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
 
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 

		$output .= $indent . '<li' . $id . $value . $class_names .'>';
 
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		if(stripos($class_names, 'menu-item-has-children')){
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . '<i class="icon-down-open-mini"></i>' . $args->link_after;
		} else {
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		}
		$item_output .= '</a>';
		$item_output .= $args->after;
 
 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output);
	}
}



function animated_widgets() {
	register_sidebar(array(
	   'name' => __("New Widget Area", 'animatedone'),
	   'id' => 'new-widget-area-sidebar',
	   'description' => __("New Widget Area", 'animatedone'),
	   'before_widget' => '<div id="%1$s">',
	   'after_widget' => '</div>',
	   'before_title' => '<span class="hidden">',
		'after_title' => '</span>',
	));
}
add_action( 'widgets_init', 'animated_widgets' );

function header_slider_func( $atts ) {
	$slider_id = $atts['slider_id'];
	$args = array( 
                	'numberposts' => -1,
                	'category' => $slider_id,
                	'order' => 'ASC'
                );
                $myposts = get_posts( $args );
               
	echo '
<div class="tp-banner-container">
    <div class="tp-banner">
        <ul>';
    foreach ($myposts as $mypost) {
    	$title = trim(get_post_meta( $mypost->ID, 'main_slider_title', true));
        $sub_title = trim(get_post_meta( $mypost->ID, 'main_slider_sub_title', true));
        $img_url = trim(get_post_meta( $mypost->ID, 'main_slider_img_url', true));
        $left_button_text = trim(get_post_meta( $mypost->ID, 'main_slider_left_button_text', true));
        $left_button_link = trim(get_post_meta( $mypost->ID, 'main_slider_left_button_link', true));
        $right_button_text = trim(get_post_meta( $mypost->ID, 'main_slider_right_button_text', true));
        $right_button_link = trim(get_post_meta( $mypost->ID, 'main_slider_right_button_link', true));

	    echo '<li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on"
                data-title="Intro Slide"><!-- MAIN IMAGE-->
                <img src="http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/slides_bg/dummy.png" alt="slidebg1"
                                                                data-lazyload="'.$img_url.'"
                                                                data-bgposition="center top" data-bgfit="cover"
                                                                data-bgrepeat="no-repeat"><!-- LAYER NR. 1-->
                <div data-x="center" data-y="center" data-hoffset="0" data-voffset="-20"
                     data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300"
                     style="z-index: 5;max-width: auto; max-height: auto; white-space: nowrap;"
                     class="tp-caption white_heavy_40 customin customout text-center text-uppercase">'.$title.'
                </div><!-- LAYER NR. 2-->
                <div data-x="center" data-y="center" data-hoffset="0" data-voffset="15"
                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none"
                     data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1"
                     style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"
                     class="tp-caption customin tp-resizeme rs-parallaxlevel-0 text-center">
                    <div style="color:#ffffff; font-size:16px; text-transform:uppercase;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);">
                        '.$sub_title.'
                    </div>
                </div><!-- LAYER NR. 3-->
                <div data-x="center" data-y="center" data-hoffset="0" data-voffset="70"
                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="500" data-start="2900" data-easing="Power3.easeInOut" data-splitin="none"
                     data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next"
                     style="z-index: 12;" class="tp-caption customin tp-resizeme rs-parallaxlevel-0">
                     <a href="'.$left_button_link.'" class="button_intro">'.$left_button_text.'</a><a href="'.$right_button_link.'" class="button_intro outline">'.$right_button_text.'</a></div>
            </li><!-- SLIDE-->';
    }
        echo '<li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on"
                data-title="Intro Slide"><!-- MAIN IMAGE--><img src="http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/slides_bg/dummy.png" alt="slidebg1"
                                                                data-lazyload="http://nodetowp.dev-test.pro/wp-content/themes/animatedone/img/slides_bg/slide_4.jpg"
                                                                data-bgposition="center top" data-bgfit="cover"
                                                                data-bgrepeat="no-repeat"><!-- LAYER NR. 1-->
                <div data-x="center" data-y="center" data-hoffset="0" data-voffset="-20"
                     data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300"
                     style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;"
                     class="tp-caption white_heavy_40 customin customout text-center text-uppercase">Lots for all the
                    family
                </div><!-- LAYER NR. 2-->
                <div data-x="center" data-y="center" data-hoffset="0" data-voffset="15"
                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none"
                     data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1"
                     style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"
                     class="tp-caption customin tp-resizeme rs-parallaxlevel-0 text-center">
                    <div style="color:#ffffff; font-size:16px; text-transform:uppercase;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);">
                        Fantastic location for all the family
                    </div>
                </div><!-- LAYER NR. 3-->
                <div data-x="center" data-y="center" data-hoffset="0" data-voffset="70"
                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="500" data-start="2900" data-easing="Power3.easeInOut" data-splitin="none"
                     data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next"
                     style="z-index: 12;" class="tp-caption customin tp-resizeme rs-parallaxlevel-0"><a href="/rooms"
                                                                                                        class="button_intro">View
                    Rooms</a><a href="/activities" class="button_intro outline">Activities</a></div>
            </li>
        </ul>
    </div>
    <div id="general_decor"></div>
</div>
	';
}
add_shortcode( 'custom_slider', 'header_slider_func' );

function gallery_json_slider($atts){
	$page_id = $atts['page_id'];
	$metas = get_post_meta($page_id)["wpcf-json-for-gallery"];
	echo "
	<script>
		jQuery(function($){
		    $.supersized({
		        slides :  	[";
			        	foreach ($metas as $meta) {
			        		echo "{";
			        			echo $meta;
			        		echo "},";
			        	}
	echo "	        ]

		    });
		});
	</script>
	";
}
add_shortcode( 'gallery_json_slider', 'gallery_json_slider' );