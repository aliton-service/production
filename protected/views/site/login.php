<script type="text/javascript">
    $(document).ready(function () {
        var Password = '';
        $("#edLogin").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Логин", width: 160}));
        $("#edPassword").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Пароль", width: 160}));
        $("#btnSubmit").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        $("#btnClear").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        
        $("#edPassword").keydown(function(e){
            var Symbols = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789~!@#$%^&*()_-+=|{}:;?><,.йцукенгшщзхъфывапролджэячсмитьбюЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁё';
            var Pos = Symbols.indexOf(e.key);
            var Temp = '';
            if (Pos != -1) {
                Password += e.key;
            }
            for (var i = 1; i <= Password.length; i++){
                Temp += '*'
            }
            $("#edPassword").val(Temp);
            return false;
        });
        
        $("#btnClear").click(function(e){
            Password = '';
            $("#edPassword").val('');
        });
        
        $("#btnSubmit").click(function(e){
            $("#edError").html('');
            var Login = $("#edLogin").val();
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Site/Login') ?>",
                type: "POST",
                async: true,
                data: {
                    LoginForm: {
                        username: Login,
                        password: Password
                    }
                },
                success: function(Res){
                    if (Res == 'Login')
                        window.location.replace("<?php echo Yii::app()->createUrl('Site/Index'); ?>");
                    else 
                        $("#edError").html('Неверный логин или пароль.');
                }
            });
        });
    });
</script>    
    
<h1>Авторизация</h1>

<p>Введите свой логин и пароль:</p>
<style>
    #edError {
        color: #FF0000;
    }
</style>    

<div class="row" style="margin-bottom: 0px; margin-top: 0px;">
    <div class="row-column" style="width: 60px;">Логин:</div>
    <div class="row-column" style="width: 160px;"><input autocomplete="off" id="edLogin" type="text"/><div id="edError"></div></div>
</div>
<div class="row" style="margin-bottom: 0px; margin-top: 0px;">
    <div class="row-column" style="width: 60px;">Пароль:</div>
    <div class="row-column" style="width: 160px;"><input autocomplete="off" id="edPassword" type="text"/></div>
    <div class="row-column" style="width: 120px;"><input type="button" id="btnClear" value="Очистить"></div>
</div>

<div class="row" style="margin-bottom: 0px; margin-top: 0px;">
    <div class="row-column" style="width: 120px;"><input type="button" id="btnSubmit" value="Войти"></div>
</div>
