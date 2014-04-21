<?php

return array(

	'default' => 'json',

	'supported_formats' => array(
// XML
	    'application/xml' => 'xml',
	    'text/xml' => 'xml',
// JSON
	    'application/json' => 'json',
		'application/x-javascript' => 'json',
		'text/javascript' => 'json',
		'text/x-javascript' => 'json',
		'text/x-json' => 'json',
// YAML
	    'text/yaml' => 'yaml',
		'text/x-yaml' => 'yaml',
		'application/yaml' => 'yaml',
		'application/x-yaml' => 'yaml',
// MISC
		'application/vnd.php.serialized' => 'serialize',
	    'application/x-www-form-urlencoded' => 'querystr'
	)
);