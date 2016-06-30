<?php

class altabs extends CWidget
{
	public $header = null;
	public $content = null;

	public function init()
	{
		parent::init();
	}

	public function run()
	{
		if(!in_array($this->header) || !in_array($this->content))
		{
			?>
			<div class="error">Error</div>
			<?php
			die;
		}
		$head = $this->header;
		for($i = 0; $i <= count($head); $i++)
		{
			?>
			<div><?=$head['name']?></div>
			<?php
		}
	}
}