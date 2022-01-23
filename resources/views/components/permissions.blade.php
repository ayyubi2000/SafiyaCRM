<div>
<div class="content-header">
    <div class="card-head">
        <div class="container-fluid">
        <div class="row  ">
          <div class="col-sm-6 mt-5">
            <h1 class="m-0">Boshqaruv</h1>
          </div>
          <div class="col-sm-6 mt-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Orqaga Qaytish</a></li>
            </ol>
          </div>
        </div>
    </div>
    </div>
       <div class="card-body bg-white border mt-1" >
        <div class="table-responsive p-3">
            <form method="post"  > 
                @csrf
                <table class="table table-hover mb-0 text-md-nowrap">
                    <thead>
                        <tr>
                            <th>Huquqlar</th>
                            @isset($roles)
                            @foreach($roles as $role)
                            <th>{{ $role->name }}</th>
                            @endforeach
                            @endisset
                        </tr>
                    </thead>
                    <tbody>
                    @isset($permissions)
                        @foreach($permissions as $permission)
                            <tr>    
                                <td>{{ $permission->liveName }}</td>

                                @foreach($roles as $role)
                                    <td>
                                        <input type="checkbox"  name="roles[{{ $role->id }}][]" value="{{ $permission->id }}" class="checkbox ml-4" 
                                        {{ $role->hasPermission($permission->name) ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary float-right">Saqlash</button>
            </form>
        </div>
    </div>
</div>
<livewire:adverstement-create />
</div>
