PHP To JavaScript Variables
===

Simple package which allows easy sharing of variables from PHP to JavaScript.
This is a rewrite of the [laracasts/utilities](https://github.com/laracasts/PHP-Vars-To-Js-Transformer) package.  I was prompted to do this due to the aformentioned package requiring PHP 5.4+, and I disliked their design.


Installation
---

composer.json

```javascript
"require": {
	...
	"rosio/php-to-javascript-variables": "~1.0"
}
```

config/app.php
```php
'providers' => array(

	...
	'Rosio\PhpToJavaScriptVariables\PhpToJavaScriptVariablesServiceProvider',

),
```

Usage
---

controllers\HomeController.php
```php
	public function showWelcome()
	{
		JSLocalize::put(array(
			'variableName' => 'variableValue',
			'anotherVariable' => array(1, 2, 3)
		));

		return View::make('hello');
	}
```

views\hello.php
```html
<!doctype html>
<html lang="en">
<head>
	...
	{{ App::make('JSLocalizeDumper')->dump() }}
	...
</head>
<body>

	<script type="text/javascript">
		alert(app.variableName);
	</script>
</body>
</html>
```