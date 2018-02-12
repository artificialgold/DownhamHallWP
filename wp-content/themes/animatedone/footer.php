<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Animated
 * @since Animated 1.0
 */
?>
<footer>
    <?php if (!dynamic_sidebar('New Widget Area')) :?> <?php endif;?>
</footer><!-- End footer-->
<?php wp_footer(); ?>
<div id="toTop"></div><!-- Back to top button--><!-- Common scripts-->

<script>(function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-90878740-1', 'auto');
    ga('send', 'pageview');
</script>

</body><!--if lte IE 8p.chromeframe
  | You are using an
  strong outdated
  |  browser. Please
  a(href='http://browsehappy.com/') upgrade your browser
  | .
-->

</html>

