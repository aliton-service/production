
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Авторизация</h1>

<p>Введите свой логин и пароль:</p>

<div class="form">
<?php //$form=$this->beginWidget('CActiveForm', array(
//	'id'=>'login-form',
//	'enableClientValidation'=>true,
//	'clientOptions'=>array(
//		'validateOnSubmit'=>true,
//	),
//)); ?>
<!---->
<!--<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'Логин'); ?>
<!--		--><?php //echo $form->textField($model,'username'); ?>
<!--		--><?php //echo $form->error($model,'username'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'Пароль'); ?>
<!--		--><?php //echo $form->passwordField($model,'password'); ?>
<!--		--><?php //echo $form->error($model,'password'); ?>
<!--<!--		<p class="hint">-->
<!--<!--			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.-->
<!--<!--		</p>-->
<!--	</div>-->
<!---->
<!--	<div class="row rememberMe">-->
<!--		--><?php //echo $form->checkBox($model,'rememberMe'); ?>
<!--		--><?php //echo $form->label($model,'rememberMe'); ?>
<!--		--><?php //echo $form->error($model,'rememberMe'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton('Login'); ?>
<!--	</div>-->
<!---->
<?php //$this->endWidget(); ?>

	<form id="auth">
		<input type="text" name="fakeLogin" style="display:none">
		<input type="password" name="fakePassword" style="display:none">
		<div>
			<label>Логин: </label>
			<input name="login">
		</div>
		<div>
			<label>Пароль: </label>
			<input type="password" id="pass">
			<input type="password" name="pass" id="passhide" style="display:none">
		</div>
		<div>
			<input type="button" id="submit" value="Войти">
		</div>
	</form>

</div><!-- form -->

<div id="preloader">
	<div class="loader"></div>
</div>
<script>
	$(function () {

		function login() {
			$('#passhide').val($('#pass').val())
			$('#pass').val('')
			$.ajax({
				type: 'post',
				data: {LoginForm:{username: $('input[name=login]').val(), password: $('input[name=pass]').val()}},
				beforeSend: function() {
					$('#preloader').show()
				},
				success: function (r) {
//					alert(r)
//					window.location.replace(location.origin+r)
//					location.reload()
					window.location.replace(location.protocol+'//'+location.host+'/')
				},
				error: function (r) {
					alert(r.responseText)
				},
				complete: function(){
					$('#preloader').hide()
				}
			})
		}

		$('#submit').on('click', function(e){
			e.preventDefault()
			login()
		})
		$('input[name=login], #pass').keypress(function (e) {
			if(e.keyCode == 13) {
//				pass =  $('input[data-id=pass]').val()
//				$('input[data-id=pass]').val('').blur()
				login()
			}
		})


	})
</script>