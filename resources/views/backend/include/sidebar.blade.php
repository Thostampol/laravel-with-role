
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            @if(Auth::check())
              <p><span class="hidden-xs">{{ Auth::user()->name }}</span></p>
            @endif
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Daftar tampilan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
          <ul class="treeview-menu">
            @if(Auth::user()->hasRole('SuperAdmin'))
              <li class="{{ set_active('companies') }}"><a href="/companies"><i class="fa fa-circle-o"></i> Company</a></li>
              <li class="{{ set_active('posts') }}"><a href="/posts"><i class="fa fa-circle-o"></i> Post</a></li>
              <li class="{{ set_active('galleries') }}"><a href="/galleries"><i class="fa fa-circle-o"></i> Galeri</a></li>
              <li class="{{ set_active('roles') }}"><a href="/roles"><i class="fa fa-circle-o"></i> Roles</a></li>
              <li class="{{ set_active('users') }}"><a href="/users"><i class="fa fa-circle-o"></i> Users</a></li>
              <li class="{{ set_active('permissions') }}"><a href="/permissions"><i class="fa fa-circle-o"></i> Permissions</a></li>
            @elseif(Auth::user()->hasRole('Admin'))
              <li class="{{ set_active('companies') }}"><a href="/companies"><i class="fa fa-circle-o"></i> Company</a></li>
              <li class="{{ set_active('posts') }}"><a href="/posts"><i class="fa fa-circle-o"></i> Post</a></li>
              <li class="{{ set_active('galleries') }}"><a href="/galleries"><i class="fa fa-circle-o"></i> Galeri</a></li>
              <li class="{{ set_active('users') }}"><a href="/users"><i class="fa fa-circle-o"></i> Atur hak akses</a></li>
            @else 
              <li class="{{ set_active('posts') }}"><a href="/posts"><i class="fa fa-circle-o"></i> Post</a></li>
              <li class="{{ set_active('galleries') }}"><a href="/galleries"><i class="fa fa-circle-o"></i> Galeri</a></li>
            @endif   
            
          </ul>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>