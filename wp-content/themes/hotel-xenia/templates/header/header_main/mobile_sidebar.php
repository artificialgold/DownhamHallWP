<?php
/*
 ______ _____   _______ _______ _______ _______ ______ _______ 
|   __ \     |_|    ___|_     _|   |   |       |   __ \   _   |
|    __/       |    ___| |   | |       |   -   |      <       |
|___|  |_______|_______| |___| |___|___|_______|___|__|___|___|

P L E T H O R A T H E M E S . C O M            (c) 2016

Mobile sidebar template part

*/
$options = get_query_var( 'options' );
extract( $options );
?>
<div<?php echo ( !empty( $class ) ) ? ' class="'. esc_attr( $class ) .'"' : ''; ?><?php echo ( !empty( $id ) ) ? ' id="'. esc_attr( $id ) .'"' : ''; ?>>
	<?php dynamic_sidebar( esc_attr( $sidebar ) ); ?>
</div>