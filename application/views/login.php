
<div class="container">
 <div class="row">
      <span>Ready for styling</span>
      <?php 
      $form = array(
        'class' => 'form-group', 
      );
      $input = array(
        'class' => 'form-control', 
      );

      ?>
      <h1><?php echo lang('login_heading');?></h1>
      <p><?php echo lang('login_subheading');?></p>
<div class="col-md-9">
      <div id="infoMessage"><?php echo $message;?></div>

      <?php echo form_open("auth/login", $form);?>

        <p>
          <?php echo lang('login_identity_label', 'identity');?>
          <?php echo form_input($identity,$input);?>
        </p>

        <p>
          <?php echo lang('login_password_label', 'password');?>
          <?php echo form_input($password);?>
        </p>

        <p>
          <?php echo lang('login_remember_label', 'remember');?>
          <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
        </p>


        <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

      <?php echo form_close();?>
    

      <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
    </div>
  </div>
  </div>