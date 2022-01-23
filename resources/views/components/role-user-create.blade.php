<div class="content-header">
    <div class="card-head">
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
    </div>
    <div class="container mt-25">
        <div class="card-body bg-white border">
            <form action="{{ isset($roleUserEdit) ? route('role-users.update' , $roleUserEdit->id) : route('role-users.store') }}" method="post">
            @csrf
            @isset($roleUserEdit)
            @method('PUT') 
            @endisset

            <div class="row">
                <div class="col-md-5">
                    <label for="role">Lavozimni tanlang</label>
                    <select class="form-control" id="role" name="role_id">
                        @foreach($roles  as $role)
                        <option value="{{ $role->id }}" {{ isset($roleUserEdit) && $roleUserEdit->role->id === $role->id ? 'selected' : ""   }} >{{ $role->name }}</option>
                        @endforeach 
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="user"> Hodimni tanlang tanlang</label>
                    <select class="form-control" id="user" name="user_id">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ isset($roleUserEdit) && $roleUserEdit->role->id === $role->id ? 'selected' : ""   }} >{{ $user->name }}</option>
                        @endforeach  
                    </select>
                </div>   
                <div class="col-md-2 mt-4">
                   <button type="submit" class="btn  btn-primary mt-2">Saqlash</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>