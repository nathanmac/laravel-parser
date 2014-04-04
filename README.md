laravel-parser
==============

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
