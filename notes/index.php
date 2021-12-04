<html lang="en"><head><title>MultiNoteWebApp</title></head><body>

<?php
$flag = true;

if($flag){
echo "<table><tr><td>   
<form id='forma' action='authorizationController.php' method='post'> 
<h1>Форма входа</h1> 
<p>Заполните поля для входа на сайт</p> 
<p>Логин<br /><input type='text' name='login'></p> 
<p>Пароль<br /><input type='password' name='password'></p> 
<p><input type='submit' name='submit' value='Войти'> <br></p></form>
</td>
<td>
<form id='forma2' action='authorizationController.php' method='post'>
<h1>Форма Регистрации</h1>
<p>Заполните поля для регистрации на сайт</p>
<p>Логин<br /><input type='text' name='reg_login'></p>
<p>Пароль<br /><input type='password' name='reg_password'></p>
<p>Электронная почта<br /><input type='email' name='reg_email'></p>
<p><input type='submit' name='submit1' value='Зарегистрироваться'> <br></p></form>

</td>
</tr>";
}
?></body></html>
