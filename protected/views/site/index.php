<script>
    $(document).ready(function() {
        
//        var Object_id = null;
//        //var Addr = null;
//        
//        var AdrSource =
//        {
//            datatype: "json",
//            datafields: [
//                { name: 'Object_id', type: 'int' },
//                { name: 'ObjectGr_id', type: 'int' },
//                { name: 'Address_id', type: 'int' },
//                { name: 'Addr', type: 'string' },
//            ],
//            id: 'Object_id',
//            url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=AddressList',
//            root: 'Rows',
//            cache: true,
//            async: false,
//            pagenum: 0,
//            pagesize: 300,
//            beforeprocessing: function (data) {
//                    this.totalrecords = data[0].TotalRows;
//           },
//           data: {
//                    featureClass: "P",
//                    style: "full",
//                    maxRows: 12,
//                    username: "jqwidgets"
//                }
//        };
//        var DataAddress = new $.jqx.dataAdapter(AdrSource, 
//            {
//                formatData: function (data) {
//                    data.NotExecute = '';
//                    var Addr = $("#edAddressList").jqxComboBox('searchString')
//                    if (Addr != '') {
//                        data.Filters = ["a.Addr like '" + Addr + "%'"];
//                        //data.name_startsWith = $("#edAddressList").jqxComboBox('searchString');
//                        return data;
//                    } else
//                        data.NotExecute = 'NotExecute'
//                    
//                    
//                    
//                    return data;
//                }
//        });
//        $('#btnSetValue').jqxButton($.extend(true, {}, ButtonDefaultSettings, {disabled: false}));
//        
//        $("#edAddressList").jqxComboBox({
//            remoteAutoComplete: true,
//            //autoDropDownHeight: true,               
//            selectedIndex: 0,
//            source: DataAddress,
//            width: '350',
//            height: '25px',
//            displayMember: "Addr",
//            valueMember: "Object_id",
//            autoComplete: true,
//            search: function (searchString) {
//                    Addr = searchString;
//                    DataAddress.dataBind();
//                    
//                }
//        });
//        
//        $('#btnSetValue').on('click', function() {
//            $("#edAddressList").val(Object_id);
//        });
//        
//        
//        DataAddress.dataBind();
//        $("#edAddressList").val(Object_id);
//        
//        
//        
//        var DataAddress2 = new $.jqx.dataAdapter(AdrSource, {
//                formatData: function (data) {
//                    console.log($("#edAddressList2").val());
//                    data.NotExecute = '';
//                    if (Addr != '') {
//                        data.Filters = ["a.Addr like '" + Addr + "%'"];
//                        //data.name_startsWith = $("#edAddressList").jqxComboBox('searchString');
//                        return data;
//                    } else
//                        data.NotExecute = 'NotExecute'
//                    
//                    
//                    
//                    return data;
//                }});
//            
//        $("#edAddressList2").on('keyup', function(){
//            DataAddress2.dataBind();
//        });
//        
//        $("#edAddressList2").jqxComboBox({ source: DataAddress2, width: '350', height: '25px', displayMember: "Addr", valueMember: "Object_id", autoComplete: false});
    });
</script>    

<?php
    if (Yii::app()->user->isGuest)
        echo '<p>Для авторизации кликните: <a href="' . Yii::app()->createUrl ('site/login') .'">здесь</a>.';
   
?>

<?php if (!Yii::app()->user->isGuest):?>
    <div class="logo" style="width: 100%; height: 44px;"></div>
    <div class="row" style="font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 400; line-height: 1.3em; color: #171412; letter-spacing: 0.02em;">
        Приветствуем Вас на страницах сайта нашей компании!<br>
        С 1987 года мы оказываем услуги по обслуживанию и поддержанию работоспособности систем безопасности и инженерных систем 
        на различных объектах Санкт-Петербурга и Ленинградской области. <br>
        Осознавая всю степень ответственности за безопасность наших горожан, 
        за комфортные условия жизни и труда жителей Санкт-Петербурга и области, мы идем в ногу со временем и сегодня являемся прогрессивной и клиентоориентированной компанией.
    </div>
<?php endif; ?>

