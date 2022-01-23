<div>
     <div class="container-fluid">
        <div class="row  ">
          <div class="col-sm-6 mt-5">
            <h1 class="m-0">Eslatma va Vazifalar</h1>
          </div>
          <div class="col-sm-6 mt-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Orqaga Qaytish</a></li>
            </ol>
          </div>
        </div>
      </div>
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('notification.create') }}" class="btn btn-primary float-right">
                            Eslatma qo'shish
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Eslatma</th>
                        <th>Turi</th>
                        <th>Holati</th>
                        <th>Natija</th>
                        <th>Eslatish vaqti</th>
                        <th>Hodim</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event) 
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->note }}</td>
                        <td>{!! $event->note_type == 1 ? "<i class='ion ion-ios-person  text-primary h3' ></i>" : "<i class='ion ion-ios-people text-primary h3' ></i>" !!}</td>
                        <td>{!! $event->closed == 'closed' ?
                             "<i class='ion ion-md-checkmark-circle-outline mr-2 text-primary h3' ></i>" 
                            : "<i class='ion ion-ios-clock  text-primary h3' ></i>" !!}
                        </td>
                        <td>{{ $event->answear }}</td>
                        <td>{{ date('Y-m-d', strtotime($event->answear)) }}</td>
                        <td>{{ $event->user->name }}</td>

                        <td class="d-{{ $event->note_type == 1 && $event->user_id == Auth::user()->id ? 'flex' : 'none'}}">
                            <a href="{{ route('notification.edit', $event->id) }}"> 
                                <i class="fe fe-edit-2 mr-2 text-primary" ></i>
                            </a>
                            <form  action="{{ route('notification.destroy', $event->id ) }}" method="post">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="fe fe-trash-2 mr-2 text-danger br-none  " 
                                style="background: transparent; outline: none; border: none;" >
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>    
            </table>
        </div>
    </div>
</div>