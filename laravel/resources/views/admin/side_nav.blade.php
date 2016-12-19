<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('clients.index') }}"><i class="fa fa-users"></i> Clients</a>
                <ul class="nav nav-second-level collapse in">                     
                     <li><a href="{{ route('contracts.index') }}"><i class="fa fa-folder-open-o"></i> Contracts</a></li>
                     <li><a href="{{ route('clients.index') }}"><i class="fa  fa-th-list"></i> Projects</a></li>
                     <li><a href="{{ route('clients.index') }}"><i class="fa fa-database"></i> Collections</a></li>
                     <li><a href="{{ route('credentials.index') }}"><i class="fa  fa-check "></i> Credentials</a></li>
                     
                </ul>
            </li>
            

             <li><a href="{{ route('clients.index') }}"><i class="fa fa-user"></i> Users</a> </li> 
              <li><a href="{{ route('clients.index') }}"><i class="fa fa-user-md"></i> User Roles</a>  </li> 
             
            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->