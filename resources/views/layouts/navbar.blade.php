 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 ">

     <!-- Sidebar Toggle (Topbar) -->
     <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
         <i class="fa fa-bars"></i>
     </button>


     <!-- Topbar Navbar -->
     <ul class="navbar-nav ml-auto">

         <div class="topbar-divider d-none d-sm-block"></div>

         <!-- Nav Item - User Information -->
         <li class="nav-item dropdown no-arrow">
             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="mr-2 d-none d-lg-inline text-gray-600 small text-right">
                     Helo,
                     @php
                     $userRole = App\Models\UserRoleView::select('display_name')->where('email', auth()->user()->email)->first();
                     @endphp
                     <span class="text-primary text-sm" style="font-size:10px">{{ $userRole->display_name ?? '' }}</span> <br />
                     <span class=" h6">{{ Auth::user()->name ?? '' }}</span>
                 </span>

                 <figure class="img-profile rounded-circle avatar font-weight-bold" data-initial="{{ Auth::user()->name[0] }}"></figure>
             </a>
             <!-- Dropdown - User Information -->
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                 <a class="dropdown-item" href="{{ route('profile') }}">
                     <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                     {{ __('Profile') }}
                 </a>
                 <a class="dropdown-item" href="{{route('laratrust.roles.index')}}">
                     <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                     {{ __('Role Managament') }}
                 </a>
                 <a class="dropdown-item" href="{{route('logs')}}">
                     <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                     {{ __('App Logs') }}
                 </a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                     {{ __('Logout') }}
                 </a>
             </div>
         </li>

     </ul>

 </nav>
