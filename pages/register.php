<div class="signin-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
        <div class="mytitle">Account Registration</div>
        <div id="error"></div>
        <div id="success"></div>
        <form action="functions/register.php" class="form-signin" method="POST" id="register-form">
          <div class="form-group">
            <label for="user">Username:</label>
            <input type="text" id="user" class="form-control" name="user" required>
            <span id="check-e"></span>
          </div>
          <div class="form-group">
            <label for="pass">Password:</label>
            <input type="password" id="pass" class="form-control" name="pass" required>
          </div>
          <div class="form-group">
            <label for="pass2">Confirm Password:</label>
            <input type="password" id="pass2" class="form-control" name="pass2" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label for="exp">Expansion:</label>
            <select name="exp" id="exp" class="form-control" required>
              <option value="0" hidden disabled selected></option>
              <option value="0">Vanilla</option>
              <option value="1">TBC</option>
              <option value="2">Wotlk</option>
            </select>
          </div>
          <div class="g-recaptcha" data-sitekey="<?php echo $sitekey; ?>"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-save" id="btn-submit">
              <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
