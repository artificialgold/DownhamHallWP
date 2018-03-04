<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Animated
 * @since Animated 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <?php if (is_front_page()) { ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.4.1/snap.svg-min.js"></script>
    <?php } ?>
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>

    <title>Downham Hall - Essex countryside accommodation and Essex Wedding Venue near Billericay, Wickford,
        Hanningfield and Stock</title>
    <meta name="keywords"
          content="downham hall, country hotel, country b&amp;b, farm activities, essex accommodation, essex b&amp;B, essex holiday let, bed and breakfast, hotels">
    <meta name="description"
          content="Downham Hall - New rural accommodation in the heart of Essex yet near fast transport links and lots of local activities. Historic house with rolling views and lots to do or plenty of scope to do nothing.">
    <meta name="author" content="Downham Hall">
    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
          href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-144x144-precomposed.png">
    <!-- Google web fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet" type="text/css">
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>
     <script id="guestline-tag" src="https://tag.guestline.net/static/js/tag.js" data-group-id="DOWNHAMHALL" async></script>
    <!-- if lt IE 9script(src='js/html5shiv.min.js') script(src='js/respond.min.js') -->
</head>
<body style="overflow: visible;">
<header>
    <div id="top_line">
        <div class="container"></div>
    </div>
    <div id="top_header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div id="logo"><a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/DownhamHall.png"
                                                    height="41"
                                                    alt="Downham Hall, Essex - Wedding Venue, Accommodation, Function Venue"
                                                    data-retina="true"></a></div>
                </div>
                <nav class="col-md-8 col-sm-8 col-xs-8">
                    <a href="javascript:void(0);" class="cmn-toggle-switch cmn-toggle-switch__rot open_close"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/DownhamHall.png"
                                                   width="240" height="40" alt="CountryHolidays" data-retina="true">
                        </div>
                        <a id="close_in" href="#" class="open_close"><i class="icon_set_1_icon-77"></i></a>
                        
                        <?php
                        $args = array(
                            'menu' => 'primary',
                            'walker'=> new True_Walker_Nav_Menu()
                         
                        );
                        wp_nav_menu( $args );
                        ?>

                    </div><!-- End main-menu--></nav>
            </div>
        </div>
    </div>
</header>
