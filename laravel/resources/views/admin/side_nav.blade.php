<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            
            <li>
                <a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('clients.index') }}"><i class="fa fa-users"></i> Clients</a>
                <ul class="nav nav-second-level collapse in">                     
                     <li><a href="{{ route('contracts.index') }}"><i class="fa fa-folder-open-o"></i> Contracts</a></li>
                     <li><a href="{{ route('projects.index') }}"><i class="fa  fa-th-list"></i> Projects</a></li>
                     <li><a href="#" onclick="alert('Under Development')"><i class="fa fa-database"></i> Collections</a></li>
                     <li><a href="{{ route('credentials.index') }}"><i class="fa  fa-check "></i> Credentials</a></li>
                     
                </ul>
            </li>
            

             <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> Users</a> </li> 
              <li><a href="{{ route('roles.index') }}"><i class="fa fa-user-md"></i> Roles</a>  </li> 
             
            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->