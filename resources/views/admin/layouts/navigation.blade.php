 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-dark">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="index3.html" class="nav-link">Home</a>
         </li>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
        
         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 {{ auth()->user()->name }}

             </a>
             <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                 <span class="dropdown-item dropdown-header">{{ Str::ucfirst(auth()->user()->type) }}</span>
                 <div class="dropdown-divider"></div>
                 <a href="/logout" class="logout"
                     onclick="event.preventDefault(); 
      document.getElementById('logout-form').submit();">
                     <i class="fas fa-sign-out-alt mt-10 mb-10" style="color:#c2c7d0;"></i>
                     <span class="logout_text"> Logout </span>
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                     <a href="#" class="dropdown-item">
                 </form>
                </a>
                 
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item">
                         <i class="fas fa-users mr-2"></i> 8 friend requests
                         <span class="float-right text-muted text-sm">12 hours</span>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item">
                         <i class="fas fa-file mr-2"></i> 3 new reports
                         <span class="float-right text-muted text-sm">2 days</span>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
             </div>
         </li>
         {{-- <li class="nav-item dropdown-show ">
        <a href="/logout" onclick="event.preventDefault(); 
        document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt mt-12" style="color:#fff;"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
      </li> --}}
         <li class="nav-item">
             <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                 <i class="fas fa-expand-arrows-alt"></i>
             </a>
         </li>
     </ul>
 </nav>
 <!-- /.navbar -->
