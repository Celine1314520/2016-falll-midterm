<body>
<form method="post" action="index.php?action=updateAccount">
<fieldset>
<legend>修改資料</legend>
<ol>

<label for="pwd">密碼：</label><input id="pwd" name="ModifyPwdValue" type="password" minlength="8" maxlength="30" required pattern="(?=^[A-Za-z0-9]{8,30}$)^.*$"></br>

<input type="submit"  name="modifying" value="送出">
</ol>
</fieldset>
</form>


</body>