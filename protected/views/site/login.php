<script type="text/javascript">
    $(document).ready(function () {
        var Password = '';
        $("#edLogin").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Логин", width: 160}));
        $("#edPassword").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Пароль", width: 160}));
        $("#btnSubmit").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        $("#btnClear").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        $("#edPassword").keypress(function(e){
            var Temp = '';
            Password += String.fromCharCode(e.charCode);
            for (var i = 1; i <= Password.length; i++){
                Temp += '*'
            }
            $("#edPassword").val(Temp);
            return false;
        });
        
        $("#edPassword").keydown(function(e){
            if (    (e.which == 8) ||
                    (e.which == 46) ||
                    (e.which == 37) ||
                    (e.which == 38) ||
                    (e.which == 39) ||
                    (e.which == 40) ||
                    (e.which == 35) ||
                    (e.which == 36) ||
                    (e.which == 16)) return false;
            if (e.which == 13) {
                $("#btnSubmit").click();
                return false;
            }
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
                    Res = JSON.parse(Res);
                    if (Res.Data.Result == 'Login')
                        window.location.replace(Res.Data.Url);
                        
                    else 
                        $("#edError").html('Неверный логин или пароль.');
                }
            });
        });
    });
</script>    

<p style="margin-top: 0;">Введите свой логин и пароль:</p>
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
