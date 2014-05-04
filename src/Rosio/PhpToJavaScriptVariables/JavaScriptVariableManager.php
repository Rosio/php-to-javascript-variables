<?php

namespace Rosio\PhpToJavaScriptVariables;

class JavaScriptVariableManager
{
	protected $variables = array();

	public function __construct ()
	{

	}

	public function put (array $variables)
	{
		$this->variables = array_merge($this->variables, $variables);
	}

	public function getVariables ()
	{
		return $this->variables;
	}
}