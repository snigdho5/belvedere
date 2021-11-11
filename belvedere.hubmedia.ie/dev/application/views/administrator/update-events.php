 <!-- jquery file upload Frame work -->
    <link href="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.min.css">
    

    
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Events</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Events</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Update Event</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Event edit card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Event Update</h5>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                     <?php echo form_open_multipart('administrator/update_events_data'); ?>
                                     <input class="form-control" value="<?php echo $eventsDetails['id']; ?>" name="id" type="hidden">
                                        <div class="product-edit">
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-ui-user"></i></span>
                                                                    <input class="form-control" value="<?php echo $eventsDetails['name']; ?>" name="name" placeholder="Event Title" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-numbered"></i></span>
                                                                    <input class="form-control" name="quantity" value="<?php echo $eventsDetails['quantity']; ?>" placeholder="Seat Available" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-cur-dollar"></i></span>
                                                                    <input class="form-control" value="<?php echo $eventsDetails['price']; ?>" name="price" placeholder="Normal Price" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-cur-dollar"></i></span>
                                                                    <input class="form-control" value="<?php echo $eventsDetails['save_price']; ?>" name="save_price" placeholder="Offer Price" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-ui-calendar"></i></span>
                                                                    <input class="form-control" name="start_date" value="<?php echo $eventsDetails['start_date']; ?>" placeholder="Start Date & Time" type="text" id="datetimepicker1">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-ui-calendar"></i></span>
                                                                    <input class="form-control" name="end_date" value="<?php echo $eventsDetails['end_date']; ?>" placeholder="End Date & Time" type="text" id="datetimepicker2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-copy-alt"></i></span>
                                                                    <input class="form-control" name="short_description" placeholder="Event Short Description" type="text" maxlength="100" value="<?php echo $eventsDetails['short_description']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select name="cat_id" class="form-control form-control-primary">
                                                                    <?php foreach($event_categories as $post) : ?>
                                                                         <option value="<?php echo $post['id']; ?>" 
                                                                         <?php if($eventsDetails['cat_id'] == $post['id']){ echo "selected" ; } ?> ><?php echo $post['name']; ?></option>
                                                                     <?php endforeach; ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-clip"></i></span>
                                                                        <input name="userfile" class="form-control" type="file">
                                                                       </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="input-group">
                                                                   <img src="<?php echo site_url();?>assets/images/events/<?php echo $eventsDetails['image']; ?>" width="50px">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-underline"></i></span>
                                                                    <input class="form-control" name="tag" placeholder="Event Tag" type="text" value="<?php echo $eventsDetails['tag']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                     <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-copy-alt"></i></span>
                                                                        <textarea name="description" placeholder="Please Provide a valid Formated Event Description!" id="editor1"><?php echo $eventsDetails['description']; ?></textarea>
                                                                    </div>     
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h5>Upload Event Multiple Image </h5>
                                                                            <div class="card-header-right">  
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-block">
                                                                            <input type="file" name="imgFiles[]" id="filer_input" multiple="multiple">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                 <?php foreach($eventImages as $postImg) : ?>
                                                                    <div class="col-lg-2 col-sm-3">
                                                                        <div class="thumbnail">
                                                                            <div class="thumb">
                                                                                <a href="<?php echo site_url();?>assets/images/events_multiple/<?php echo $postImg['file_name']; ?>" data-lightbox="1" data-title="My caption 1">
                                                                                    <img src="<?php echo site_url();?>assets/images/events_multiple/<?php echo $postImg['file_name']; ?>" alt="" class="img-fluid img-thumbnail">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                                   
                                                                </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h5>CONTACT DETAILS</h5>
                                                                            
                                                                        </div>
                                                                        <div class="card-block">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon"><i class="icofont icofont-underline"></i></span>
                                                                                    <input class="form-control" value="<?php echo $eventsDetails['phone']; ?>" name="phone" placeholder="Phone" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon"><i class="icofont icofont-ui-keyboard"></i></span>
                                                                                        <input class="form-control" value="<?php echo $eventsDetails['email']; ?>" name="email" placeholder="Email" type="text">
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon"><i class="icofont icofont-copy-alt"></i></span>
                                                                                        <textarea class="form-control" value="<?php echo $eventsDetails['address']; ?>" name="address" placeholder="Venue Address"><?php echo $eventsDetails['address']; ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon"><i class="icofont icofont-map"></i></span>
                                                                                        <textarea class="form-control" value="<?php echo $eventsDetails['map']; ?>" name="map" placeholder="Venue Map"><?php echo $eventsDetails['map']; ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                                                                    <input class="form-control" name="meta_title" placeholder="Meta Title" type="text" value="<?php echo $eventsDetails['meta_title']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon"><i class="icofont icofont-ui-keyboard"></i></span>
                                                                                        <input class="form-control" name="meta_tag" placeholder="Meta Tag" type="text" value="<?php echo $eventsDetails['meta_tag']; ?>">
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon"><i class="icofont icofont-copy-alt"></i></span>
                                                                                        <textarea class="form-control" name="meta_desc" placeholder="Meta Description" value="<?php echo $eventsDetails['meta_desc']; ?>"><?php echo $eventsDetails['meta_desc']; ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <div class="form-group">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update
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
                        <!-- Event edit card end -->
                    
                </div>
                        <!-- Basic Form Inputs card end -->
             

   

