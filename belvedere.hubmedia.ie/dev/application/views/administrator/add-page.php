 <!-- jquery file upload Frame work -->
    <link href="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
    

    
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Page</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Page</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"><?php echo $title; ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Product edit card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5><?php echo $title; ?></h5>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                     <?php echo form_open_multipart('administrator/create_page'); ?>
                                      <div class="product-edit">
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-ui-user"></i></span>
                                                                    <input class="form-control" value="" name="title" placeholder="Page Title" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-clip"></i></span>
                                                                    <input name="userfile" class="form-control" type="file" placeholder="Featured Image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-ui-user"></i></span>
                                                                    <input class="form-control" value="" name="f_video" placeholder="Featured Video" type="text">
                                                                </div>
                                                            </div>
                                                        </div>

                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                     <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-copy-alt"></i></span>
                                                                        <textarea name="description" placeholder="Please Provide a valid Formated Description!" id="editor1"></textarea>
                                                                    </div>     
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h5>SEO DETAILS</h5>
                                                                            
                                                                        </div>
                                                                        <div class="card-block">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon"><i class="icofont icofont-underline"></i></span>
                                                                                    <input class="form-control" name="meta_title" placeholder="Meta Title" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon"><i class="icofont icofont-ui-keyboard"></i></span>
                                                                                        <input class="form-control" name="meta_keyword" placeholder="Meta Keyword" type="text">
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon"><i class="icofont icofont-copy-alt"></i></span>
                                                                                        <textarea class="form-control" name="meta_desc" placeholder="Meta Description"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <div class="form-group">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit
                                                                </button>
                                                            </div>

                                                        </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product edit card end -->
                    
                </div>
                        <!-- Basic Form Inputs card end -->
             

   

