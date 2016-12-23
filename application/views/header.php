<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Job Search System</title>
  <?php
    echo link_tag('assets/css/style.css');
    echo link_tag('assets/css/mystyle.css');
    echo link_tag('assets/bootstrap/css/bootstrap.min.css');
    echo link_tag('assets/bootstrap/css/bootstrap-theme.css');
  ?>
  <script src="<?php echo site_url('assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
  <script src="<?php echo site_url('assets/js/jquery-ui.min.js'); ?>" type="text/javascript"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php echo $this->config->item('site_title'); ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo site_url('home');?>">Home</a></li>
              <li><a href="<?php echo site_url('job_post_list');?>">View Posted List</a></li>
              <li><a href="<?php echo site_url('job_post');?>">Add New job post</a></li>

              <?php
                if(!empty($_SESSION['id_user'])) {
                  echo '<li><a href="'.site_url("user_profile").'">'.$_SESSION['username'].'</a></li>';
                  echo '<li><a href="'.site_url("logout").'">Log Out</a></li>';
                } else {
                    echo '<li><a href="'.site_url("login").'">Login</a></li>';
                }
               ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container theme-showcase main" role="main">
