<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$attributes = array(
    'class' => 'lbl-normal',
);
?>
<h1>Job Post</h1>
<?php echo validation_errors('<span class="error-msg ui-icon ui-icon-alert"></span><span>', '</span><br/>');?>
<?php echo form_open_multipart('/job_post/save');?>
  <div class="inner-areabox-normal">
      <div class="row">
        <?php
          if(isset($jobpost_data->img_loc)) {
              echo '<div><img src="'.base_url().'uploads/'.$jobpost_data->img_loc.'"/></div>';
          } else { ?>
              <input type="file" name="userfile" size="20" />
          <?php }
          ?>
      </div>
      <div class="row">
        <?php
            echo form_label('Title', 'txt-title',$attributes);
            echo form_input(array(
                'type'          => 'text',
                'class'         => 'txt-long',
                'id'            => 'txt-title',
                'name'          => 'txt-title',
                'value'         => set_value('txt-title', isset($jobpost_data) ? $jobpost_data->title : '')
            ));
            echo form_input(array(
                'type'          => 'hidden',
                'id'            => 'txt-id',
                'name'          => 'txt-id',
                'value'         => set_value('txt-title', isset($jobpost_data) ? $jobpost_data->id : '')
            ));
        ?>
        <span class="error">* </span>
    </div>
    <div class="row">
        <?php
            echo form_label('location', 'ddl-location',$attributes);
            echo form_dropdown(
                'ddl-location',
                $location,
                set_value('ddl-location', isset($jobpost_data) ? $jobpost_data->location : ''),
                array('id' => 'ddl-location'));
        ?>
      <span class="error">* </span>
    </div>
    <div class="row">
        <?php
            echo form_label('Industry', 'ddl-industry',$attributes);
            echo form_dropdown(
                'ddl-industry',
                $industry,
                set_value('ddl-industry', isset($jobpost_data) ? $jobpost_data->industry: ''),
                array('id' => 'ddl-industry'));
        ?>
      <span class="error">* </span>
    </div>
    <div class="row">
        <?php
            echo form_label('Job Function', 'ddl-function',$attributes);
            echo form_dropdown(
                'ddl-function',
                $function,
                set_value('ddl-function', isset($jobpost_data) ? $jobpost_data->job_function: ''),
                array('id' => 'ddl-function'));
        ?>
      <span class="error">* </span>
    </div>
    <div class="row">
        <?php
            echo form_label('Responsibilities', 'txt-responsibilities',$attributes);
            echo form_textarea(array(
                'name'          => 'txt-responsibilities',
                'id'            => 'txt-responsibilities',
                'rows'          => 7,
                'cols'          => '60',
                'value'         => set_value('txt-responsibilities', isset($jobpost_data) ? $jobpost_data->responsibilities: '')
            ));
        ?>
      <span class="error">* </span>
    </div>
    
    <div class="row">
        <?php
            echo form_label('Requirement', 'txt-requirement',$attributes);
            echo form_textarea(array(
                'name'          => 'txt-requirement',
                'id'            => 'txt-requirement',
                'rows'          => 7,
                'cols'          => 60,
                'value'         => set_value('txt-requirement', isset($jobpost_data) ? $jobpost_data->requirement: '')
            ));
        ?>
      <span class="error">* </span>
    </div>

    <div class="row">
        <?php
            echo form_label('Description', 'txt-description',$attributes);
            echo form_textarea(array(
                'name'          => 'txt-description',
                'id'            => 'txt-description',
                'rows'          => 7,
                'cols'          => 60,
                'value'         => set_value('txt-description', isset($jobpost_data) ? $jobpost_data->other_information: '')
            ));
        ?>
        <span class="error">* </span>
    </div>

    <div class="row">
        <?php
            echo form_label('How to apply', 'txt-apply-method',$attributes);
            echo form_input(array(
                'type'          => 'text',
                'class'         => 'txt-long',
                'id'            => 'txt-apply-method',
                'name'          => 'txt-apply-method',
                'value'         => set_value('txt-title', isset($jobpost_data) ? $jobpost_data->apply_method: '')
            ));
        ?>
    </div>

    <div class="row">
        <label class="lbl-normal">&nbsp;</label>
        <?php
            echo form_submit('submit', isset($jobpost_data) ? 'Update': 'Save');
            echo form_reset('btn-reset','reset');
        ?>
    </div>
  </div>
</form>
