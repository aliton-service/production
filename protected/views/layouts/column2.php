<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

    <div id="content">

        <?php echo $content; ?>
        
                <!--
		<div id="sidebar">
	            <?php
			/*
                        $this->beginWidget('zii.widgets.CPortlet', array(
				//'title'=>'Операции',
			));
			
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
                       */
                         
		?> 
		</div><!-- sidebar-right --> 
        <div id="sidebar-bottom">
        </div><!-- sidebar-right -->
    </div><!-- content -->
    

<?php $this->endContent(); ?>