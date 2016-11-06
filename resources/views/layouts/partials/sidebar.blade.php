<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            {{--<li class="header">{{ trans('adminlte_lang::message.header') }}</li>--}}
            <!-- Optionally, you can add icons to the links -->
            <li @if(Request::is('home*')) class="active" @endif><a href="{{ url('home') }}"><i class='glyphicon glyphicon-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li @if(Request::is('contacts*')) class="active" @endif><a href="{{ route('contacts.all') }}"><i class='glyphicon glyphicon-user text-aqua'></i> <span>Contacts</span></a></li>
            <li @if(Request::is('companies*')) class="active" @endif><a href="{{ route('companies.all') }}"><i class='glyphicon glyphicon-th-large text-green'></i> <span>Companies</span></a></li>
            @if($user->is_owner)
                <li @if(Request::is('users*')) class="active" @endif><a href="{{ route('users.all') }}"><i class='glyphicon glyphicon-th-large text-green'></i> <span>Users</span></a></li>
            @endif
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-list text-light-blue'></i> <span>My Lists</span> <small><i class="glyphicon glyphicon-chevron-down pull-right"></i></small></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
