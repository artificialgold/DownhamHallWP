<?php
/*
 ______ _____   _______ _______ _______ _______ ______ _______ 
|   __ \     |_|    ___|_     _|   |   |       |   __ \   _   |
|    __/       |    ___| |   | |       |   -   |      <       |
|___|  |_______|_______| |___| |___|___|_______|___|__|___|___|

P L E T H O R A T H E M E S . C O M                    (c) 2016

File Description: Single View Template Parts / Excerpt
*/
$options = get_query_var( 'options' );
if ( is_array( $options ) ) { extract($options); } ?>
	
<p class="lead"><?php echo trim( get_the_excerpt() ); ?></p>