<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div>
    <?php foreach ($jobs as $job){?>
        <?php if(!empty($job['img_loc'])) { ?>
            <img src="<?php echo site_url('uploads/'.$job['img_loc']);?>">
        <?php } ?>

        <div class="txt-right">
            <h1 class="title"><?php echo $job['title'];?></h1>
        </div>

        <div class="row">
            <span class="label label-primary">location : <?php echo $job['locname'];?></span>
            <span class="label label-success">Industry : <?php echo $job['indname'];?></span>
        </div>

        <div class="bs-callout bs-callout-info">
            <h4>Description</h4>
            <span><?php echo nl2br($job['description']);?></span>
        </div>

        <div class="bs-callout bs-callout-warning">
            <h4>Responsibilities</h4>
            <span><?php echo nl2br($job['responsibilities']);?></span>
        </div>

        <div class="bs-callout bs-callout-danger">
            <h4>Requirement</h4>
            <span><?php echo nl2br($job['requirement']);?></span>
        </div>

        <div class="bs-callout bs-callout-info">
            <h4>Other Information</h4>
            <span><?php echo nl2br($job['other_information']);?></span>
        </div>

        <div class="row">
            <h4>Apply Method</h4><hr>
                <span class="apply"><?php echo $job['apply_method'];?></span>
            </h4>
        </div>
    <?php } ?>
</div>
