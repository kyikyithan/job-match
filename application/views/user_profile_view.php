<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->library('upload');
    $attributes = array(
        'class' => 'lbl-normal',
    );
?>
<script type="text/javascript">
$( function() {
  $( '#tabs' ).tabs();
  $( '#tabs' ).tabs( 'option', 'active', '<?php echo $tab; ?>' );
 // $( "#tabs" ).tabs( 'select', '<?php echo $tab; ?>');
} );
</script>

<h1>User Profile</h1>
<?php echo validation_errors('<span class="error-msg ui-icon ui-icon-alert"></span><span>', '</span><br/>');?>
<div id="tabs" class="ui-tabs ui-corner-all ui-widget ui-widget-content">
    <ul>
        <li><a href="#tabs-1">Profile</a></li>
        <li><a href="#tabs-2">Change password</a></li>
    </ul>
    <div id="tabs-1" class="inner-areabox-normal">
        <?php echo form_open_multipart('/user_profile/update_profile');?>
        <div class="row">
            <?php
                echo form_label('First Name', 'txt-first-name',$attributes);
                echo form_input(array(
                    'type'          => 'text',
                    'class'         => 'txt-long',
                    'id'            => 'txt-first-name',
                    'name'          => 'txt-first-name',
                    'value'         => set_value('txt-first-name', isset($user_data) ? $user_data->first_name : '')
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
                    'value'         => set_value('txt-last-name', isset($user_data) ? $user_data->last_name : '')
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
                    'readonly'      => 'true',
                    'value'         => set_value('txt-email', isset($user_data) ? $user_data->email : '')
                ));
            ?>
          <span class="error">* </span>
        </div>

        <div class="row">
            <?php
                echo form_label('Company Info', 'txt-description',$attributes);
                echo form_textarea(array(
                    'name'          => 'txt-description',
                    'id'            => 'txt-description',
                    'rows'          => 7,
                    'cols'          => 70,
                    'value'         => set_value('txt-description', isset($user_data) ? $user_data->description: '')
                ));
            ?>
        </div>

        <div class="row">
          <label class="lbl-search">&nbsp;</label>
          <?php
              echo form_submit('submit','Update');
              echo form_reset('btn-reset','reset');
          ?>
        </div>
        </form>
    </div>

    <div id="tabs-2" class="inner-areabox-normal">
        <?php echo form_open_multipart('/user_profile/update_password');?>
        <div class="row">
            <?php
                echo form_label('Current Password', 'txt-current-password',$attributes);
                echo form_input(array(
                    'type'          => 'password',
                    'class'         => 'txt-long',
                    'id'            => 'txt-old-password',
                    'name'          => 'txt-old-password',
                    'value'         => set_value('txt-password')
                ));
            ?>
          <span class="error">* </span>
        </div>

        <div class="row">
            <?php
                echo form_label('New Password', 'txt-new-password',$attributes);
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
          <label class="lbl-search">&nbsp;</label>
          <?php
              echo form_submit('submit','Change password');
              echo form_reset('btn-reset','Cancel');
          ?>
        </div>
    </form>
    </div>
</div>
