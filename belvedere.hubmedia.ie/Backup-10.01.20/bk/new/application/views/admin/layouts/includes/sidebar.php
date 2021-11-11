<nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>" href="<?php echo base_url();?>admin/dashboard">
                            <span data-feather="home"></span>
                            Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(2)=="articles"){echo "active";}?>" href="<?php echo base_url();?>admin/articles">
                            <span data-feather="file"></span>
                            Articles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(2)=="categories"){echo "active";}?>" href="<?php echo base_url();?>admin/categories">
                            <span data-feather="folder"></span>
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(2)=="users"){echo "active";}?>" href="<?php echo base_url();?>admin/users">
                            <span data-feather="user"></span>
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(2)=="groups"){echo "active";}?>" href="<?php echo base_url();?>admin/groups">
                            <span data-feather="users"></span>
                            User Groups
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(2)=="settings"){echo "active";}?>" href="<?php echo base_url();?>admin/settings">
                            <span data-feather="settings"></span>
                            Settings
                        </a>
                    </li>
                </ul>
            </div>
        </nav>