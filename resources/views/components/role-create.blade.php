<div>
     <div class="container-fluid">
        <div class="row  ">
          <div class="col-sm-6 mt-5">
            <h1 class="m-0">Lavozim qo'shish</h1>
          </div>
          <div class="col-sm-6 mt-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Orqaga Qaytish</a></li>
            </ol>
          </div>
        </div>
    </div>
<div class="container-fluid ">
    <div class="row ">
        <div class="col-md-11  pr pt-5  pl-5">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">{{$role ? 'Lavozimni tahrirlash' : 'Lavozim qo\'shish'}}</h3>
                </div>
                <form action="{{ $role ? route('roles.update', $role->id ) : route('roles.store') }}" method="post">
                    @csrf
                    @isset($role)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 pt-2">
                                <label for="FIO" >Lavozim</label>
                                <input type="text" class="form-control " id="FIO" placeholder="Lavozim nomini kiriting" value="{{ $role->name ?? old('name') }}"  name="name">
                                 @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                             </div>
                        </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" >{{ $role ? 'Yangilash' : 'Saqlash'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
