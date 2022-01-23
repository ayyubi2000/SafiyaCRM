 <div>
 <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{ $eventCount }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <span class="dropdown-header">{{ $eventCount }} Eslatma</span>
          <div class="dropdown-divider"></div>
          @foreach($events as $event)
          <a href="{{ $event->note_type == 1 ? route('notification.edit' , $event->id) : '#' }}" class="dropdown-item align-items-center d-flex justify-content-between">
            <i class="ion ion-ios-{{$event->note_type == 1 ? 'person' : 'people' }} text-primary mr-4 h3 "></i><p > {{ $event->note  }}</p>
            <span class="float-right text-muted text-sm">{{ date('Y-m-d', strtotime($event->reminder_time)) }}</span>
          </a>
          @endforeach
          <div class="dropdown-divider"></div>
          <a href="{{ route('notification.index') }}" class="dropdown-item dropdown-footer">Hamma Eslatmalar</a>
        </div>
      </li> 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header"> 
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Chiqish') }}
                </x-dropdown-link>
            </form>
          </span>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item d-sm-none">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
  </ul>
</div>
