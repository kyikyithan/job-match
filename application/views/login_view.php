<div class="row">
<?php echo form_open()?>
  <div class="login-form">
      <div class="form-module">
          <div class="row">
              <span class="error"><?php echo $msg;?></span>
          </div>
          <div class="row">
            <label for="txt-email" class="lbl-search">E-mail</label>
            <input type="text" name="txt-email" id="txt-email" value="">
          </div>
          <div class="row">
            <label for="txt-password" class="lbl-search">Password</label>
            <input type="password" name="txt-password" id="txt-password" value="">
          </div>
          <div class="row">
            <input type="submit" name="login" value="Login"><br/>
            <!-- <input type="button" name="btn_create_user" value="Create Account" onclick="window.location='User_reg'"> -->
            <a href="<?php echo  site_url('user_reg');?>">Create your JMS Account</a>
          </div>
      </div>
  </div>
<?php echo form_close();?>
</div>
