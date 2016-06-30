<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
<div id='page-content'>
    <div id="content">
        <div id='text'>
            <?php echo $content; ?>
        </div>
        <div id="sidebar-right">
            <?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Операции',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
            ?>
        </div><!-- sidebar-right -->
        <div id="sidebar-bottom">
        </div><!-- sidebar-right -->
    </div><!-- content -->
    
</div>
<?php $this->endContent(); ?>

