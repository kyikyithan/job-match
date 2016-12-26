
<h1>Job Post</h1>
<?php echo validation_errors('<span class="error-msg ui-icon ui-icon-alert"></span><span>', '</span><br/>');?>
<?php echo form_open_multipart('/job_post/save');?>
    <div class="form-group">
        <?php
            if(isset($jobpost_data->img_loc)) {
                echo '<div><img src="'.base_url().'uploads/'.$jobpost_data->img_loc.'"/></div>';
            } else { ?>
                <input type="file" name="userfile" size="20" />
            <?php }
        ?>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="txt-title">Title</label>
        <div class="col-sm-10">
        <?php
            echo form_input(array(
                'type'          => 'text',
                'class'         => 'form-control',
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
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="ddl-location">location</label>
        <div class="col-sm-10">
        <?php
            echo form_dropdown(
                'ddl-location',
                $location,
                set_value('ddl-location', isset($jobpost_data) ? $jobpost_data->location : ''),
                array('id' => 'ddl-location', 'class' => 'form-control',));
        ?>
        <span class="error">* </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="ddl-industry">Industry</label>
        <div class="col-sm-10">
        <?php
            echo form_dropdown(
                'ddl-industry',
                $industry,
                set_value('ddl-industry', isset($jobpost_data) ? $jobpost_data->industry: ''),
                array('id' => 'ddl-industry', 'class' => 'form-control',));
        ?>
        <span class="error">* </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="ddl-function">Job Function</label>
        <div class="col-sm-10">
        <?php
            echo form_dropdown(
                'ddl-function',
                $function,
                set_value('ddl-function', isset($jobpost_data) ? $jobpost_data->job_function: ''),
                array('id' => 'ddl-function', 'class' => 'form-control',));
        ?>
        <span class="error">* </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="txt-responsibilities">Responsibilities</label>
        <div class="col-sm-10">
        <?php
            echo form_textarea(array(
                'class'         => 'form-control',
                'name'          => 'txt-responsibilities',
                'id'            => 'txt-responsibilities',
                'form-groups'   => 7,
                'cols'          => '60',
                'value'         => set_value('txt-responsibilities', isset($jobpost_data) ? $jobpost_data->responsibilities: '')
            ));
        ?>
        <span class="error">* </span>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="txt-requirement">Requirement</label>
        <div class="col-sm-10">
        <?php
            echo form_textarea(array(
                'class'         => 'form-control',
                'name'          => 'txt-requirement',
                'id'            => 'txt-requirement',
                'form-groups'   => 7,
                'cols'          => 60,
                'value'         => set_value('txt-requirement', isset($jobpost_data) ? $jobpost_data->requirement: '')
            ));
        ?>
        <span class="error">* </span>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="txt-description">Description</label>
        <div class="col-sm-10">
        <?php
            echo form_textarea(array(
                'class'         => 'form-control',
                'name'          => 'txt-description',
                'id'            => 'txt-description',
                'form-groups'   => 7,
                'cols'          => 60,
                'value'         => set_value('txt-description', isset($jobpost_data) ? $jobpost_data->other_information: '')
            ));
        ?>
        <span class="error">* </span>
        </div>
    </div>

    <div class="form-group">
        <label class="lbl-normal">&nbsp;</label>
        <?php
            echo form_submit('submit', isset($jobpost_data) ? 'Update': 'Save');
            echo form_reset('btn-reset','reset');
        ?>
    </div>
  </div>
</form>
