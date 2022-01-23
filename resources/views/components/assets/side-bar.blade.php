<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('images/brand.png') }}" alt="AdminLTE Logo" class="brand-image  elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Mahsulotlar
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{ route('customers.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Mijozlar
              </p>
            </a>
          </li>
         @can('SeeSelling')
          <li class="nav-item">
            <a href="{{ route('purchases.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Savdolar
              </p>
            </a>
          </li>
          @endcannot
          <li class="nav-item">
            <a href="{{ route('customerBirthdays') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tug'ulgan kunlar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('notification.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Vazifalar
              </p>
            </a>
          </li>
          @can('SeeReport')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Hisobot
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>

            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('bestSellingProduct') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Mahsulot Sotuv reytingi
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bestCustomers') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Mijozlar reytingi
                  </p>
                </a>
              </li>
            </ul>
          </li>
             @endcannot
             @can('SeeManagment')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Boshqaruv
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Hodimlar
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Lavozimlar
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="{{ route('permission.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Boshqaruv
                <span class="right badge badge-danger">Manager</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('role-users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Lavozim  berish
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>  
            </ul>
          </li>
          @endcannot
        </ul>
      </nav>
    </div>
  </aside>
