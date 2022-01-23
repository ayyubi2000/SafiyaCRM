<div>
  <div class="container-fluid">
    <div class="row  ">
      <div class="col-sm-6 mt-5">
        <h1 class="m-0">Hodim qo'shish</h1>
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
                    <h3 class="card-title">{{$user ? 'Hodim tahrirlash' : 'Hodim qo\'shish'}}</h3>
                </div>
                <form action="{{ $user ? route('users.update', $user->id ) : route('users.store') }}" method="post">
                    @csrf
                    @isset($user)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pt-2">
                                <label for="FIO" >FIO</label>
                                <input type="text" class="form-control " id="FIO" placeholder="Familya ism sharif kiriting" value="{{ $user->name ?? old('name') }}"  name="name">
                                 @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                             </div>
                            <div class="col-md-6 pt-2">
                                <label for="raqam">Telefon raqam</label>
                                <input type="text" class="form-control" id="raqam" placeholder="Telefon raqamingizni kiriting" value="{{ $user->number ?? old('number') }}"  name="number">
                                  @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>   
                            <div class="col-md-6 pt-2">
                                <label for="Email">Email address</label>
                                <input type="email" class="form-control " id="Email" placeholder="Email kirigizing" 
                                value="{{ $user->email ?? old('email') }}" name="email"> 
                                  @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                             </div>
                            <div class="col-md-6 pt-2">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" placeholder="Parolni kiriting" 
                                   value="{{ $user->password ?? old('password') }}" name="password">
                                  @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" >{{ $user ? 'Yangilash' : 'Saqlash'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
