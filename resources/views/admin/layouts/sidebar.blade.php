@php
$email =$full_name='';
$profile_pic =asset('/assets/img/no-image.png');
if(Auth::guard('admin')->check())
{
if(Auth::guard('admin')->user()->email)
$email = Auth::guard('admin')->user()->email;
if(Auth::guard('admin')->user()->first_name)
$full_name = Auth::guard('admin')->user()->first_name;
if(Auth::guard('admin')->user()->image)
$profile_pic = Auth::guard('admin')->user()->image;
}

@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
