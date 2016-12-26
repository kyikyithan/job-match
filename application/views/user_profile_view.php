<h1>User Profile</h1>
<?php echo validation_errors('<span class="error-msg ui-icon ui-icon-alert"></span><span>', '</span><br/>');?>
<ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#tabs-1">Profile</a></li>
    <li><a data-toggle="tab" href="#tabs-2">Change password</a></li>
</ul>
<div class="tab-content">
    <div id="tabs-1" class="tab-pane fade in active">
        <?php echo form_open_multipart('/user_profile/update_profile');?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="txt-first-name">First Name:</label>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'type'          => 'text',
                    'class'         => 'form-control',
                    'id'            => 'txt-first-name',
                    'name'          => 'txt-first-name',
                    'value'         => set_value('txt-first-name', isset($user_data) ? $user_data->first_name : '')
                ));?>
                <span class="error">* </span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="txt-last-name">Last Name:</label>
            <div class="col-sm-10">
            <?php
                echo form_input(array(
                    'type'          => 'text',
                    'class'         => 'form-control',
                    'id'            => 'txt-last-name',
                    'name'          => 'txt-last-name',
                    'value'         => set_value('txt-last-name', isset($user_data) ? $user_data->last_name : '')
                ));
            ?>
            <span class="error">* </span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="txt-email">Email:</label>
            <div class="col-sm-10">
            <?php
                echo form_input(array(
                    'type'          => 'text',
                    'class'         => 'form-control',
                    'id'            => 'txt-email',
                    'name'          => 'txt-email',
                    'readonly'      => 'true',
                    'value'         => set_value('txt-email', isset($user_data) ? $user_data->email : '')
                ));
            ?>
            <span class="error">* </span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="txt-description">Company Info:</label>
            <div class="col-sm-10">
            <?php
                echo form_textarea(array(
                    'name'          => 'txt-description',
                    'id'            => 'txt-description',
                    'class'         => 'form-control',
                    'form-groups'   => 7,
                    'cols'          => 70,
                    'value'         => set_value('txt-description', isset($user_data) ? $user_data->description: '')
                ));
            ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="Submit" class="btn btn-warning" value="Update">
                <input type="Reset" class="btn btn-danger" value="Cancel">
            </div>
        </div>
        </form>
    </div>

    <div id="tabs-2" class="tab-pane fade">
        <?php echo form_open_multipart('/user_profile/update_password');?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="txt-current-password">Current Password</label>
            <div class="col-sm-10">
            <?php
                echo form_input(array(
                    'type'          => 'password',
                    'class'         => 'form-control',
                    'id'            => 'txt-old-password',
                    'name'          => 'txt-old-password',
                    'value'         => set_value('txt-password')
                ));
            ?>
            <span class="error">* </span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="txt-new-password">New Password</label>
            <div class="col-sm-10">
            <?php
                echo form_input(array(
                    'type'          => 'password',
                    'class'         => 'form-control',
                    'id'            => 'txt-password',
                    'name'          => 'txt-password',
                    'value'         => set_value('txt-password')
                ));
            ?>
            <span class="error">* </span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="txt-conf-password">Confirm Password</label>
            <div class="col-sm-10">
            <?php
                echo form_input(array(
                    'type'          => 'password',
                    'class'         => 'form-control',
                    'id'            => 'txt-conf-password',
                    'name'          => 'txt-conf-password',
                    'value'         => set_value('txt-conf-password')
                ));
            ?>
            <span class="error">* </span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="Submit" class="btn btn-warning" value="Change password">
                <input type="Reset" class="btn btn-danger" value="Cancel">
            </div>
        </div>
    </form>
    </div>
</div>
