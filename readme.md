PHP To JavaScript Variables
===

Simple package which allows easy sharing of variables from PHP to JavaScript.


Installation
---

composer.json

```javascript
"require": {
	...
	"rosio/php-to-javascript-variables": "~0.0.1"
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