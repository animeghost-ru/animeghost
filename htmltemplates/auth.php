<?
function echoAuthPage()
{
  echo '
  <div class="sblock">
    <h2 style="margin-left: 38%">АВТОРИЗАЦИЯ</h2>
    <form>
    <div class="form-group">
      <label for="authLogin">Логин</label>
      <input type="login" class="form-control" id="authLogin" placeholder="">
    </div>
    <div class="form-group">
      <label for="authPass">Пароль</label>
      <input type="password" class="form-control" id="authPass" placeholder="">
    </div>
      <div class="btn btn-primary" id="login-submit">Submit</div>
    </form>
    <div id="loginMes"></div>
  </div>

  <div class="sblock">
    <h2 style="margin-left: 38%">РЕГИСТРАЦИЯ</h2>
    <form>
    <div class="form-group">
      <label for="regLogin">Логин</label>
      <input type="email" class="form-control" id="regLogin" aria-describedby="loginHelp" placeholder="">
      <small id="loginHelp" class="form-text text-muted">Логин должен состоять из латинских символов и длина логина должна быть более 5 знаков.</small>
    </div>
    <div class="form-group">
      <label for="regMail">Почта</label>
      <input type="email" class="form-control" id="regMail" placeholder="">
    </div>
    <div class="form-group">
      <label for="regPass">Пароль</label>
      <input type="password" class="form-control" id="regPass" placeholder="">
    </div>
      <div class="btn btn-primary" id="reg-submit">Submit</div>
      <div id="regMes"></div>
    </form>
  </div>';
}


?>
