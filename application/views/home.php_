<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
$attributes = array(
    'class' => 'lbl-search',
);
?>
<script src="<?php echo( base_url().'assets/js/jobsearch.js' ); ?>" type="text/javascript"></script>

<!-- for Search Area st -->
<div class='search-area'>
    <form action='post' name='search-form' id='search-form'>
      <div class='inner-areabox'>
        <div class="row">
            <?php
                echo form_label('Job Title', 'txt-jobtitle',$attributes);
                echo form_input(array(
                    'type'          => 'text',
                    'id'            => 'txt-jobtitle',
                    'name'          => 'txt-jobtitle',
                    'value'         => set_value('txt-jobtitle', isset($jobpost_data) ? $jobpost_data->title : '')
                ));
            ?>
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
        </div>
      </div>

      <div class="inner-areabox">
          <div class="row">
            <?php
                echo form_label('Job Function', 'ddl-function',$attributes);
                echo form_dropdown(
                    'ddl-function',
                    $function,
                    set_value('ddl-function', isset($jobpost_data) ? $jobpost_data->function: ''),
                    array('id' => 'ddl-function'));
            ?>
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
          </div>

          <div class="row" class="lbl-search">
            <input type="button" name="btn-search" id="btn-search" value="Search" class="ui-button">
            <input type="reset" name="btn-search" id="btn-search" value="Reset" class="ui-button">
          </div>
      </div>
    </form>
</div>
<!-- for Search Area ed -->

<div class="clear"></div>
<div class="tbl-area">
  <table class="data-table" id="tbl-searchlist">
      <thead>
          <tr>
              <th>Title</th>
              <th>Industry</th>
              <th width="90px">Posted date</th>
              <th width="90px">View Detail</th>
          </tr>
      </thead>
  </table>
</div>
