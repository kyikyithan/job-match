<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('upload');
$attributes = array(
    'class' => 'lbl-normal',
);
?>
<h1>Create User</h1>
<?php echo validation_errors('<div class="error-msg"><span class="ui-icon ui-icon-alert"></span><span>', '</span></div>');?>
<?php echo form_open_multipart('/user_reg/save');?>
  <div class="inner-areabox-normal">
      <div class="row">
        <?php
            echo form_label('First Name', 'txt-first-name',$attributes);
            echo form_input(array(
                'type'          => 'text',
                'class'         => 'txt-long',
                'id'            => 'txt-first-name',
                'name'          => 'txt-first-name',
                'value'         => set_value('txt-first-name')
            ));
        ?>
      <span class="error">* </span>
    </div>
    <div class="row">
        <?php
            echo form_label('Last Name', 'txt-last-name',$attributes);
            echo form_input(array(
                'type'          => 'text',
                'class'         => 'txt-long',
                'id'            => 'txt-last-name',
                'name'          => 'txt-last-name',
                'value'         => set_value('txt-last-name')
            ));
        ?>
      <span class="error">* </span>
    </div>
    <div class="row">
        <?php
            echo form_label('Email', 'txt-email',$attributes);
            echo form_input(array(
                'type'          => 'text',
                'class'         => 'txt-long',
                'id'            => 'txt-email',
                'name'          => 'txt-email',
                'value'         => set_value('txt-email')
            ));
        ?>
      <span class="error">* </span>
    </div>
    <div class="row">
        <?php
            echo form_label('Password', 'txt-password',$attributes);
            echo form_input(array(
                'type'          => 'password',
                'class'         => 'txt-long',
                'id'            => 'txt-password',
                'name'          => 'txt-password',
                'value'         => set_value('txt-password')
            ));
        ?>
      <span class="error">* </span>
    </div>
    <div class="row">
        <?php
            echo form_label('Confirm Password', 'txt-conf-password',$attributes);
            echo form_input(array(
                'type'          => 'password',
                'class'         => 'txt-long',
                'id'            => 'txt-conf-password',
                'name'          => 'txt-conf-password',
                'value'         => set_value('txt-conf-password')
            ));
        ?>
      <span class="error">* </span>
    </div>
    <div class="row">
        <?php echo form_label('User Type', 'rdo-usertype',$attributes); ?>
        <input type="radio" name="rdo-usertype" value="1" checked="checked"  />Company
        <input type="radio" name="rdo-usertype" value="2"  />Job Finder
    </div>
    <div class="row">
        <?php
            echo form_label('Company Info', 'txt-description',$attributes);
            echo form_textarea(array(
                'name'          => 'txt-description',
                'id'            => 'txt-description',
                'rows'          => 7,
                'value'         => set_value('txt-description')
            ));
        ?>
    </div>
    <div class="row">
      <label class="lbl-search">&nbsp;</label>
      <?php
          echo form_submit('submit', isset($user_data) ? 'Update': 'Save');
          echo form_reset('btn-reset','reset');
      ?>
    </div>
  </div>
</form>
