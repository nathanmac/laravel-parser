laravel-parser
==============

[![Build Status](https://travis-ci.org/nathanmac/laravel-parser.svg?branch=master)](https://travis-ci.org/nathanmac/laravel-parser)
[![Still Maintained](http://stillmaintained.com/nathanmac/laravel-parser.png)](http://stillmaintained.com/nathanmac/laravel-parser)


Simple Format Parser For Laravel 4

Installation
------------

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `Nathanmac/laravel-parser`.

	"require": {
		"nathanmac/laravel-parser": "dev-master"
	}

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Nathanmac\Parser\ParserServiceProvider'

##### Parsing Functions
```php
	Parse::json($payload);		// JSON > Array
	Parse::xml($payload);		// XML > Array
	Parse::yaml($payload);		// YAML > Array
	Parse::querystr($payload);	// Query String > Array
	Parse::serialize($payload);	// Serialized Object > Array
```

##### Parse Input/Payload (PUT/POST)
```php
	Parse::payload();		// Auto Detect Type - 'Content Type' HTTP Header
	Parse::payload('application/json');	// Specifiy the content type
```

##### Parse JSON
```php
$parsed = Parse::json('
	{
		"message": {
			"to": "Jack Smith",
			"from": "Jane Doe",
			"subject": "Hello World",
			"body": "Hello, whats going on..."
		}
	}');
```

##### Parse XML
```php
$parsed = Parse::xml('
			<?xml version="1.0" encoding="UTF-8"?>
			<xml>
				<message>
					<to>Jack Smith</to>
					<from>Jane Doe</from>
					<subject>Hello World</subject>
					<body>Hello, whats going on...</body>
				</message>
			</xml>');
```

##### Parse Query String
```php
$parsed = Parse::querystr('to=Jack Smith&from=Jane Doe&subject=Hello World&body=Hello, whats going on...');
```

##### Parse Serialized Object
```php
$parsed = Parse::serialize('a:1:{s:7:"message";a:4:{s:2:"to";s:10:"Jack Smith";s:4:"from";s:8:"Jane Doe";s:7:"subject";s:11:"Hello World";s:4:"body";s:24:"Hello, whats going on...";}}');
```

##### Parse YAML
```php
$parsed = Parse::yaml('
				---
				message: 
				    to: "Jack Smith"
				    from: "Jane Doe"
				    subject: "Hello World"
				    body: "Hello, whats going on..."
				');
```

###### Supported Content-Types
```
XML
---
application/xml > XML
text/xml > XML

JSON
----
application/json > JSON
application/x-javascript > JSON
text/javascript > JSON
text/x-javascript > JSON
text/x-json > JSON

YAML
----
text/yaml > YAML
text/x-yaml > YAML
application/yaml > YAML
application/x-yaml > YAML

MISC
----
application/vnd.php.serialized > Serialized Object
application/x-www-form-urlencoded' > Query String
```

