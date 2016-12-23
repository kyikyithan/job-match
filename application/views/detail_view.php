<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="inner-areabox-normal">
    <?php foreach ($jobs as $job){?>
        <?php echo '<img src="'.base_url().'uploads/'.$job['img_loc'].'"/>';?>

        <div class="txt-right">
            <h1 class="title"><?php echo $job['title'];?></h1>
        </div>

        <div class="row">
            <h4>Location</h4><hr>
            <span><?php echo $job['locname'];?></span>
        </div>

        <div class="row">
            <h4>Industry</h4><hr>
            <span><?php echo $job['indname'];?></span>
        </div>

        <div class="row">
            <h4>Description</h4><hr>
            <span><?php echo nl2br($job['description']);?></span>
        </div>

        <div class="row">
            <h4>Responsibilities</h4><hr>
            <span><?php echo nl2br($job['responsibilities']);?></span>
        </div>

        <div class="row">
            <h4>Requirement</h4><hr>
            <span><?php echo nl2br($job['requirement']);?></span>
        </div>

        <div class="row">
            <h4>Other Information</h4><hr>
            <span><?php echo nl2br($job['other_information']);?></span>
        </div>



        <div class="row">
            <h4>Apply Method</h4><hr>
                <span class="apply"><?php echo $job['apply_method'];?></span>
            </h4>
        </div>
    <?php } ?>
</div>

<div>

</div>
