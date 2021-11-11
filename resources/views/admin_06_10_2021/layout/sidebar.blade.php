<div id="left-sidebar" class="sidebar">

    <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-angle-left"></i></a>

    <div class="navbar-brand">

        <a href="{{secure_url('/')}}"><img style="width: 66px !important" src="{{ secure_url('uploads/image/1606104776_44343.jpg') }}" alt="Mooli Logo" class="img-fluid logo"><span>{{ Auth::user()->name }}</span></a>

        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="fa fa-close"></i></button>

    </div>

    <div class="sidebar-scroll" style="overflow-y: scroll; height: 500px;">

        <div class="user-account">

            <div class="user_div">

                <img src="{{ secure_url('assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">

            </div>

            <div class="dropdown">

                <span>Web Developer,</span>

                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Belvedere Admin</strong></a>

                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">

                    <li><a href="{{secure_url('editprofile')}}"><i class="fa fa-user"></i>My Profile</a></li>

                    <!--<li><a href="{{url('apps.inbox')}}"><i class="fa fa-envelope"></i>Messages</a></li>-->

                    <li class="{{ Request::segment(2) === 'changepassword' ? 'active' : null }}"><a href="{{secure_url('changepassword')}}"><i class="fa fa-lock"></i><span>Change Password</span></a></li>

                    <!--<li><a href="{{url('pages.settings')}}"><i class="fa fa-gear"></i>Settings</a></li>-->

                    <li class="divider"></li>

                    <li><a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>Logout</a></li>

                </ul>

            </div>

        </div>

        <nav id="left-sidebar-nav" class="sidebar-nav">

            <ul id="main-menu" class="metismenu animation-li-delay">

                <li class="header">Main</li>

                <li class="{{ Request::segment(1) === 'admin' ? 'active' : null }}"><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

                <li class="{{ Request::segment(1) === 'managepackage' ? 'active' : null }}"><a href="{{url('managepackage')}}"><i class="fa fa-th-list"></i> <span>Packages</span></a></li>

                <li class="{{ Request::segment(1) === 'primiummember' ? 'active' : null }}"><a href="{{url('primiummember')}}"><i class="fa fa-diamond"></i> <span>Primium Member Billing</span></a></li>

                <li class="{{ Request::segment(1) === 'membersbilling' ? 'active' : null }}"><a href="{{url('membersbilling')}}"><i class="fa fa-info"></i> <span>Billing History Logs</span></a></li>

                <li class="header">Pages</li>

                <li class="{{ Request::segment(1) === 'newslist' ? 'active' : null }}"><a href="{{secure_url('newslist')}}"><i class="fa fa-newspaper-o"></i> <span>News</span></a></li>

                <li class="{{ Request::segment(1) === 'manageevent' ? 'active' : null }}"><a href="{{secure_url('manageevent')}}"><i class="fa fa-calendar"></i> <span>Events</span></a></li>

                <li class="{{ Request::segment(1) === 'geteventsubscribers' ? 'active' : null }}"><a href="{{secure_url('geteventsubscribers')}}"><i class="fa fa-cc-visa"></i> <span>Events Billing History</span></a></li>

                <!-- <li class="{{ Request::segment(1) === 'managecareer' ? 'active' : null }}"><a href="{{secure_url('managecareer')}}"><i class="icon-graduation"></i> <span>Careers</span></a></li> -->



                {{-- <li class="{{ Request::segment(1) === 'forms' ? 'active' : null }}">

                    <a href="#forms" class="has-arrow"><i class="fa fa-pencil"></i><span>Role Manage</span></a>

                    <ul>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('roles')}}">Role</a></li>

                        <li class="{{ Request::segment(2) === 'advanced' ? 'active' : null }}"><a href="{{url('forms.advanced')}}">ManageUser</a></li>

                        <li class="{{ Request::segment(2) === 'advanced' ? 'active' : null }}"><a href="{{url('forms.advanced')}}">ManageRole</a></li>

                        <li class="{{ Request::segment(2) === 'validation' ? 'active' : null }}"><a href="{{url('forms.validation')}}">Manage Product</a></li>

                    </ul>

                </li> --}}



                <li class="{{ Request::segment(1) === 'forms' ? 'active' : null }}">

                    <a href="#forms" class="has-arrow"><i class="fa fa-pencil"></i><span>Newsletter</span></a>

                    <ul>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('subscriberslist')}}">Import Users</a></li>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('newsletter')}}">Send Newsletter</a></li>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('newsletterlogs')}}">Newsletter Logs</a></li>

                    </ul>

                </li>



                <li class="{{ Request::segment(1) === 'forms' ? 'active' : null }}">

                    <a href="#forms" class="has-arrow"><i class="fa fa-pencil"></i><span>CMS</span></a>

                    <ul>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('homecms')}}">Home</a></li>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('ourclub')}}">Our Club</a></li>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('layout')}}">Layout</a></li>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('managesponsors')}}">Sponsors</a></li>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('aboutcms')}}">About</a></li>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('whyjoincms')}}">WhyJoin</a></li>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('managecommiitee')}}">Committee </a></li>

                        <li class="{{ Request::segment(1) === 'formsbasic' ? 'active' : null }}"><a href="{{url('adbelvederebenevolentassociation')}}">Donate BBA </a></li>

                        <li class="{{ Request::segment(2) === 'formsbasic' ? 'active' : null }}"><a href="{{url('olddatalist')}}">Old Data List </a></li>

                    </ul>

                </li>

                <li class="{{ Request::segment(1) === 'advertisers' ? 'active' : null }}"><a href="{{secure_url('advertisers')}}"><i class="icon-graduation"></i><span>Careers</span></a></li>

                <li class="{{ Request::segment(1) === 'managesponsors' ? 'active' : null }}"><a href="{{secure_url('managesponsors')}}"><i class="fa fa-heartbeat"></i><span>Sponsors</span></a></li>



<!--                <li class="header">Profile</li>

                <li class="{{ Request::segment(2) === 'changepassword' ? 'active' : null }}"><a href="{{secure_url('changepassword')}}"><i class="fa fa-lock"></i><span>Change Password</span></a></li>-->

                <li class="extra_widget">

                    <div class="form-group">

                        <label class="d-block">Traffic this Month <span class="float-right">77%</span></label>

                        <div class="progress progress-xxs">

                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="d-block">Server Load <span class="float-right">50%</span></label>

                        <div class="progress progress-xxs">

                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>

                        </div>

                    </div>

                </li>

            </ul>

        </nav>

    </div>

</div>