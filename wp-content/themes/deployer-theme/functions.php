<?php

add_action( 'wp_footer', static function () {
	var_dump( 'Hello, world. I am a child theme.' );
}, 12 );
