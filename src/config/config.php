<?php

return array(

	'default' => 'json',

	'supported_formats' => array(
	    'application/xml' => 'xml',
	    'application/json' => 'json',
	    'application/vnd.php.serialized' => 'serialize',
	    'application/x-www-form-urlencoded' => 'querystr'
	)
);