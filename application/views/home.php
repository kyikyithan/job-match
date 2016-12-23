<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
$attributes = array(
    'class' => 'lbl-search',
);
?>
<!-- for Search Area st -->
<div class='search-area'>
    <?php echo form_open('home/index', array('method' => 'get', 'class' => '')); ?>
      <div class='inner-areabox'>
        <div class="row">
            <?php
                echo form_label('Job Title', 'search[jobtitle]',$attributes);
                echo form_input(array(
                    'type'          => 'text',
                    'id'            => 'search[jobtitle]',
                    'name'          => 'search[jobtitle]',
                    'value'         => set_value('search[jobtitle]', isset($jobpost_data) ? $jobpost_data->title : '')
                ));
            ?>
        </div>
        <div class="row">
            <?php
                echo form_label('Industry', 'search[industry]',$attributes);
                echo form_dropdown(
                    'search[industry]',
                    $industry,
                    set_value('search[industry]', isset($jobpost_data) ? $jobpost_data->industry: ''),
                    array('id' => 'search[industry]'));
            ?>
        </div>
      </div>

      <div class="inner-areabox">
          <div class="row">
            <?php
                echo form_label('Job Function', 'search[function]',$attributes);
                echo form_dropdown(
                    'search[function]',
                    $function,
                    set_value('search[function]', isset($jobpost_data) ? $jobpost_data->function: ''),
                    array('id' => 'search[function]'));
            ?>
          </div>
          <div class="row">
              <?php
                  echo form_label('location', 'search[location]',$attributes);
                  echo form_dropdown(
                      'search[location]',
                      $location,
                      set_value('search[location]', isset($jobpost_data) ? $jobpost_data->location : ''),
                      array('id' => 'search[location]'));
              ?>
          </div>

          <div class="row" class="lbl-search">
            <input type="submit" value="Search" class="btn btn-success">
            <input type="reset" value="Reset" class="btn btn-danger">
          </div>
      </div>
    <?php echo form_close(); ?>
</div>
<!-- for Search Area ed -->

<div class="clear"></div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th width="15%">Industry</th>
            <th width="10%">Posted date</th>
            <th width="10%">View Detail</th>
        </tr>
    </thead>
    <tbody>
        <tbody>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td nowrap>
                        <?php echo $row->title; ?>
                    </td>
                    <td>
                        <?php echo $row->name; ?>
                    </td>
                    <td>
                        <?php echo $row->update_date; ?>
                    </td>
                    <td>
                        <a class="btn btn-xs btn-warning" href="<?php echo site_url('detail?id='.$row->id); ?>">Detail</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </tbody>
</table>
<div class="clearfix">
    <div class="pull-right"><?php //echo $pagination; ?></div>
</div>
<?php echo form_close(); ?>
