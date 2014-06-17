<?php

namespace Rosio\PhpToJavaScriptVariables;

class JavaScriptDumper
{
	protected $variables;

	public function __construct (JavaScriptVariableManager $variables)
	{
		$this->variables = $variables;
	}

	public function dump($namespace = 'app')
	{
		$output = '<script type="text/javascript">'."\n";
		
		$namespace = 'window.' . $namespace;
		$output .= $namespace . ' = {};'."\n";

		$output .= '(function (context) {'."\n";

		foreach ($this->variables->getVariables() as $name => $value)
		{
			$output .= 'context["' . $name . '"] = ' . $this->transformValue($value) . "\n";
		}

		$output .= '})(' . $namespace . ');'."\n";

		$output .= '</script>';

		return $output;
	}

	public function transformValue ($value)
	{
		switch (true)
		{
			case is_null($value):
				return 'null';
			case is_bool($value):
				return $value ? 'true' : 'false';
			case is_numeric($value):
				return $value;
			case is_array($value):
				return json_encode($value);
			case is_object($value):
				if (method_exists($value, 'toJson'))
					return $value->toJson();
				if (method_exists($value, 'toArray'))
					return json_encode($value->toArray());

				if (method_exists($value, '__toString'))
					return $this->quote($value);
				break;
			case is_string($value):
				return $this->quote($value);
			default:
				throw new \Exception('Type ' . gettype($value) . ' could not be converted to JavaScript.');
		}
	}

	protected function quote ($value)
	{
		return "'" . addcslashes($value, "'\\") . "'";
	}
}