<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div><?php echo $msg;?></div>
<h1>Posted job list</h1>
<div class="inner-areabox-normal">
    <div class="row">
        <table class="joblist" border="1">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Posted/Update date</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

          <?php
          foreach ($result as $row) {
            echo "<tr>";
            echo "<td class='td-title'>".$row->title."</td>";
            echo "<td class='td-date'>".$row->update_date."</td>";
            echo "<td class='icon'><a href='".base_url('index.php/job_post?id=').$row->id."'><div class='ui-icon ui-icon-pencil'></div>Edit</a></td>";
            echo "<td class='icon'><a href='".base_url('index.php/Job_post/delete?id=').$row->id."'><div class='ui-icon ui-icon-trash'></div>Delete</a></td>";
            echo "</tr>";
          }
          ?>
        </table>
    </div>
    <div class="row">
        <a href="<?php echo base_url('index.php/job_post');?>">Add New job post</a>
    </div>
</div>
