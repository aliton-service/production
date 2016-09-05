<script type="text/javascript">
    
    $(document).ready(function () {
        
        $("#SaveNewPriceMonitoring").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#SaveNewPriceMonitoring").on('click', function ()
        {
            $('#PriceMonitoring').submit();
        });
    });   
    
</script>
<?php
/**
 *
 * @var PriceMonitoringController $this
 */
$this->renderPartial('_form', array('model'=>$model));
?>

<div class="row-column" style="margin: 15px 5px;"><input type="button" value="Сохранить" id='SaveNewPriceMonitoring' /></div>