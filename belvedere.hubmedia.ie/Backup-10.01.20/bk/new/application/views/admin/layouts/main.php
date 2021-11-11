<?php $this->load->view('admin/layouts/includes/header'); ?>

<?php $this->load->view('admin/layouts/includes/sidebar'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <?php $this->load->view($main_content); ?>

    </main>

<?php $this->load->view('admin/layouts/includes/footer'); ?>