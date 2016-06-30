<?php

$this->breadcrumbs=array(
	'Список объектов'=>array('/object/index'),
        'Карточка объекта: ' . $model->Address,
);

                

$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
    'reload' => false,
    'header' => array(
        
        array(
            'name'=>'Общие данные',
            'ajax'=>true,
            'options'=>array(
                'url'=>$this->createUrl('Objectsgroup/ajaxgeneral', array(
                    'ObjectGr_id' => $model->ObjectGr_id,
                ))
            ),

        ),

        array(
            'name'=>'Системы',
            'ajax'=>true,
            'options'=>array(
                'url'=>$this->createUrl('ObjectsGroupSystems/index', array(
                    'ObjectGr_id' => $model->ObjectGr_id,
                    'GridKeyUrl' => Yii::app()->request->hostInfo . Yii::app()->request->requestUri,
                ))
            ),

        ),
        array(
            'name'=>'Оборудование',
            'ajax'=>true,
            'options'=>array(
                'url'=>$this->createUrl('ObjectsAndEquips/ajaxview', array(
                    'ObjectGr_id' => $model->ObjectGr_id,
                    'Common_id' => $model->getCommonObject_id(),
                ))
            ),

        ),
        array(
            'name'=>'Контакты',
            'ajax'=>true,
            'options'=>array(
                'url'=>$this->createUrl('contacts/index', array(
                    'ObjectGr_id' => $model->ObjectGr_id,
                ))
            ),

        ),

        array(
            'name'=>'Предложения и события графика',
            'ajax'=>true,
            'options'=>array(
                'url'=>$this->createUrl('eventoffers/objectoffer', array(
                    'objgr_id' => $model->ObjectGr_id,
                ))
            ),

        ),
         

         
    ),

    'content'=> array(
        array(
            'id'=>'objgr_gen',
        ),
        array(
            'id'=>'objgr_sys',
        ),
        array(
            'id'=>'objgr_eq',
        ),
        array(
            'id'=>'objgr_cont',
        ),
        array(
            'id'=>'objgr_events',
        ),
    ),
));

//Yii::app()->createUrl('ObjectsAndEquips/ajaxview', array('ObjectGr_id' => $model->ObjectGr_id,))

?>



<?php /*
<div id="tabs">
    <ul>
        <li id="objgr_gen   "><a href="<?=$this->createUrl('Objectsgroup/ajaxgeneral', array(
                'ObjectGr_id' => $model->ObjectGr_id,
            ))?>">Общие данные</a></li>
        <li id="objgr_sys"><a href="<?=$this->createUrl('ObjectsGroupSystems/index', array(
                'ObjectGr_id' => $model->ObjectGr_id,
                'GridKeyUrl' => Yii::app()->request->hostInfo . Yii::app()->request->requestUri,
            ))?>">Системы</a></li>
        <li id="objgr_eq"><a href="<?=$this->createUrl('ObjectsAndEquips/ajaxview', array(
                'ObjectGr_id' => $model->ObjectGr_id,
                'Common_id' => $model->getCommonObject_id(),
            ))?>">Оборудование</a></li>
        <li id="objgr_cont"><a href="<?=$this->createUrl('contacts/index', array(
                'ObjectGr_id' => $model->ObjectGr_id,
            ))?>">Контакты</a></li>
    </ul>
</div>
*/
?>
<div id="res1"></div>
<script>

   // $("#tabs").tabs()

    $("body").on("mouseover",".datepicker",function() {
        $(this).datepicker({showButtonPanel:true, changeMonth:true, changeYear:true, dateFormat:'dd.mm.yy'})
    })



    $(function(){
        var hash = location.hash
        if(hash == '') hash = '#objgr_gen'
        $(hash+" a").click();
    })

</script>
