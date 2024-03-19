 <!-- Sidebar -->
 <ul class="navbar-nav bg-light text-secondary sidebar sidebar-light accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
         <div class="mb-2 p-4 flex flex-row ">
             <img src="{{asset('img/svg/logoipsum-297.svg')}}" width="80%">
         </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ Nav::isRoute('home') }}">
         <a class="nav-link" href="{{ route('home') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>{{ __('Dashboard') }}</span></a>
     </li>

     <li class="nav-item  {{ Nav::isRoute('users.*')}}">
         <a class="nav-link" href="{{ route('users.index') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>{{ __('Managemen User') }}</span></a>
     </li>

     <li class="nav-item {{Nav::isRoute('products.*')}}">
         <a class="nav-link" href="{{ route('products.index') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>{{ __('Manajemen Produk') }}</span></a>
     </li>



     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
