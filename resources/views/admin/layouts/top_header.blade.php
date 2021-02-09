@php
$email =$full_name='';
$profile_pic =asset('/assets/img/no-image.png');
if(Auth::guard('admin')->check())
{
if(Auth::guard('admin')->user()->email)
$email = Auth::guard('admin')->user()->email;
if(Auth::guard('admin')->user()->name)
$full_name = Auth::guard('admin')->user()->name;
if(Auth::guard('admin')->user()->image)
$profile_pic = Auth::guard('admin')->user()->image;
}

@endphp
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="{{ $profile_pic }}" class="w-35 h-35 rounded-circle" alt="Albert Einstein" height="35px">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)"><i class="icon dripicons-user"></i> My Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)"><i class="icon dripicons-gear"></i> Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="icon dripicons-lock"></i> Logout</a>
                <div class="dropdown-divider"></div>
            </div>
        </li>
    </ul>
</nav>
