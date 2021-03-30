<?php

add_action( 'wp_footer', static function () {
	var_dump( 'Hello, world. I am a child theme. And I have some updates.' );
}, 12 );
