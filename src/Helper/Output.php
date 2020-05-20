<?php
namespace Hero\Helper;

class Output {
	static function print( $text ) {
		echo $text;
		if ( php_sapi_name() == "cli" ) {
			echo PHP_EOL;
			sleep(1);
		} else {
			echo '<br/>';
		}
	}
}
