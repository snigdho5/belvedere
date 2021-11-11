<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CMS | Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/jumbotron.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/assets/images/cms_logo.png" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>" target="_blank">Visit Site</a>
            </li>
        </ul>
        <?php $attributes = array('class' => 'navbar-form navbar-right'); ?>
        <?php echo form_open('admin/articles/index', $attributes); ?>
        <?php
        $data = array(
            'name'        => 'keywords',
            'class'       => 'form-control form-control-dark w-100',
            'placeholder' => 'Search Articles...'
        );

        echo form_input($data);
        ?>
        <?php echo form_close(); ?>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?php echo base_url();?>admin/authenticate/logout">Sign out</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">