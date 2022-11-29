<?php

class Sorsolasok_Controller
{
	public $baseName = 'sorsolasok';
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>