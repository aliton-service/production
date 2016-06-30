<?php

class altabs extends CWidget
{
	public $id = null;
	public $header = null;
	public $content = null;
	public $success = '';
	public $beforeLoad = '';
	public $afterLoad = '';
	public $beforeActivate = '';
	public $afterActivate = '';
	public $reload = false;


	public function init()
	{
		if (Yii::getPathOfAlias('altabs') === false)
			Yii::setPathOfAlias('altabs', realpath(dirname(__FILE__) . '/'));
		//$this->registerCoreJs();
		parent::init();
	}

	public function run()
	{
		if(!is_array($this->header) || !is_array($this->content))
		{
			?>
			<div class="error">Error</div>
			<?php
			die;
		}

		if ($this->id == null)
		{
			$this->id = 'tabs'.uniqid();
		}
		$head = &$this->header;
		$content = &$this->content;
		?><div id="<?=$this->id?>" >
			<ul class="tab-nav" <?php $this->renderOptions($head) ?>><?php

				for($i=0; $i < count($head); $i++)
				{
					if(isset($head[$i]['visible']) && $head[$i]['visible'] === false) {
						continue;
					}
					if(!isset($content[$i]['id']))
						$content[$i]['id'] = $this->id."-$i";
					?>
					<li><a href="#<?=$content[$i]['id']?>"  <?php echo isset($head[$i]['ajax']) && $head[$i]['ajax'] ? " type=\"ajax\"" : "" ?>
							<?php $this->renderOptions($head[$i]) ?>><?=$head[$i]['name']?></a></li>
					<?php
				}

			?></ul>

			<?php
			for($i=0; $i < count($content); $i++)
			{
				if(isset($head[$i]['visible']) && $head[$i]['visible'] === false) {
					continue;
				}
				?>
				<div id="<?=$content[$i]['id']?>" <?php $this->renderOptions($content[$i]) ?>>
					<?php
					if(!isset($head[$i]['ajax']) || !$head[$i]['ajax'])
					{

						if(isset($content[$i]['content']) && is_string($content[$i]['content'])) {
							echo $content[$i]['content'];
						} elseif (isset($content[$i]['content']) && is_object($content[$i]['content']) == 'object') {
							$content[$i]['content']();
						} else {
							echo "not found";
						}
					}

					?>
				</div>
				<?php
			}
			?>
		</div>
		<div class="clearfix"></div>

		<?php $this->registerJS('altabs.js'); ?>
		<script type="text/javascript">
			(function($){

				$(function(){
					$( "#<?=$this->id?>" ).altabs({
						success:<?=json_encode($this->success)?>,
						activate: <?=json_encode($this->afterActivate)?>,
						reload: <?=json_encode($this->reload)?>,
						afterLoad: <?=json_encode($this->afterLoad)?>,
					});
				})
			})(jQuery)
		</script>
		<?php
	}

	public function registerCoreJs() {
		Yii::app()->clientScript->registerPackage('jquery_js');
                //$this->registerJS('jquery-1.11.3.min.js');
		//$this->registerJS('jquery-ui.js');

	}

	public function registerJS($jsFile, $position = CClientScript::POS_HEAD) {
		$cs = Yii::app()->getClientScript();
		$cs->registerScriptFile($this->getAssetsUrl() . "/js/{$jsFile}", $position);
	}

	public function getAssetsUrl() {
		// Возвращает путь к alias
		if (isset($this->_assetsUrl))
			return $this->_assetsUrl;
		else {
			$assetsPath = Yii::getPathOfAlias('altabs.assets');
			$assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, true);
			return  $assetsUrl;
		}
	}

	public function renderOptions(&$list)
	{

		if(isset($list['options']) && is_array($list['options']) && count($list['options'])>0)
		{
			foreach($list['options'] as $key => $value)
			{
				echo ' '.$key.'="'.$value.'"';
			}
		}


	}
}