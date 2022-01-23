<div>
       <div class="container-fluid">
        <div class="row  ">
          <div class="col-sm-6 mt-5">
            <h1 class="m-0">Hodimlar Lavozimi</h1>
          </div>
          <div class="col-sm-6 mt-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Orqaga Qaytish</a></li>
            </ol>
          </div>
        </div>
    </div>
    <div class="card ">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('role-users.create') }}" class="btn btn-primary float-right">
                            Hodimga lavozim berish
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ismi</th>
                        <th>Roli</th>
                        <th>Qo'shilgan vaqti</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  
                   @foreach($roleUsers as $roleUser) 
                    <tr>
                        <td>{{ $roleUser->user->name }}</td>
                        <td>{{ $roleUser?->role->name }}</td>
                        <td>{{ $roleUser->updated_at }}</td>
                        <td class="d-flex">
                            <a href="{{ route('role-users.edit', $roleUser->id) }}"> 
                                <i class="fe fe-edit-2 mr-2 text-primary" ></i>
                            </a>
                            <form  action="{{ route('role-users.destroy', $roleUser->id ) }}" method="post">
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