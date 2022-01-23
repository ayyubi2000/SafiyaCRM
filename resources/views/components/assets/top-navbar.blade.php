<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
      <div class="input-group input-group-sm form-inline ml-3 d-none d-sm-block">
          <livewire:search />
      </div>

      <div class="input-group  d-flex form-inline-sm ml-0 ml-sm-3">
          <a href="{{ route('purchases.create') }}" style="width:45%;" class="btn btn-danger  text-center">Savdo +</a>
          <a href="{{ route('customers.create') }}" style="width:45%;" class="btn btn-warning  ml-0 ml-sm-3   text-center">Mijoz +</a>
      </div>

    <!-- Right navbar links -->
   
      <!-- Messages Dropdown Menu -->
        <livewire:show-notification />
  </nav>
