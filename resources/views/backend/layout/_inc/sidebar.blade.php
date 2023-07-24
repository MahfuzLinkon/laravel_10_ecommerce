<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
{{--            <li><a href="messages.html"><i class="icon-envelope"></i><span class="hidden-tablet"> Messages</span></a></li>--}}
{{--            <li><a href="tasks.html"><i class="icon-tasks"></i><span class="hidden-tablet"> Tasks</span></a></li>--}}
{{--            <li><a href="ui.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span></a></li>--}}
{{--            <li><a href="widgets.html"><i class="icon-dashboard"></i><span class="hidden-tablet"> Widgets</span></a></li>--}}
            <li>
                <a class="dropmenu" href="#"><i class="icon-th-large"></i><span class="hidden-tablet"> Category</span></a>
                <ul>
                    <li><a class="submenu" href="{{ route('categories.index') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Category</span></a></li>
                    <li><a class="submenu" href="{{ route('categories.create') }}"><i class="icon-edit"></i><span class="hidden-tablet"> Create Category</span></a></li>
                </ul>
            </li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-th"></i><span class="hidden-tablet"> Sub Category</span></a>
                <ul>
                    <li><a class="submenu" href="{{ route('sub-categories.index') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All SubCategory</span></a></li>
                    <li><a class="submenu" href="{{ route('sub-categories.create') }}"><i class="icon-edit"></i><span class="hidden-tablet"> Create SubCategory</span></a></li>
                </ul>
            </li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-th"></i><span class="hidden-tablet"> Brand</span></a>
                <ul>
                    <li><a class="submenu" href="{{ route('brands.index') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Brand</span></a></li>
                    <li><a class="submenu" href="{{ route('brands.create') }}"><i class="icon-edit"></i><span class="hidden-tablet"> Create Brand</span></a></li>
                </ul>
            </li>


{{--            <li><a href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>--}}
{{--            <li><a href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>--}}
{{--            <li><a href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>--}}
{{--            <li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>--}}
{{--            <li><a href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>--}}
{{--            <li><a href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>--}}
{{--            <li><a href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>--}}
{{--            <li><a href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>--}}
{{--            <li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>--}}
        </ul>
    </div>
</div>
