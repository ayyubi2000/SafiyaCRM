<div>
      <div class="container-fluid">
        <div class="row  ">
          <div class="col-sm-6 mt-5">
            <h1 class="m-0">Mijozlar</h1>
          </div>
          <div class="col-sm-6 mt-5 ">
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
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Mijozlar turi</label>
                                <select class="form-control" name="customerType" onchange="window.location.href= this.value ;">
                                    <option value="">Tanlang....</option>
                                    <option value="/activeCustomer">Faol mijozlar</option>
                                    <option value="/customers">Hamma mijozlar</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label> Status </label>
                                <select class="form-control" name="status" onchange="window.location.href= '/getByStatus/'+ this.value ;">
                                    <option value="">Tanlang....</option>
                                @foreach($statuses as  $status)
                                <option value="{{ $status->amount }}">{{ $status->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Reklama turi</label>
                                <select class="form-control" name="addver"
                               onchange="window.location.href= '/getByAddverstament/'+ this.value ;">
                                    <option value="">Tanlang....</option>
                                @foreach($addvers as  $addver)
                                <option value="{{ $addver->id }}">{{ $addver->name }}</option>
                                @endforeach
                                </select>
                            </div> 
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-secondary ml-2 mt-4" data-toggle="modal" data-target="#modal-secondary">
                                  Habar yuborish
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ismi</th>
                        <th>Telefon raqami</th>
                        <th>karta raqami</th>
                        <th>Tug'uglan kuni</th>
                        <th>Qo'shilgan vaqti</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer) 
                    <tr>
                        <td >{{ $customer->id }}</td>
                        <td onclick="openModal({{ $customer->id }})">{{ $customer->name }}</td>
                        <td >{{ $customer?->number }}</td>
                        <td >{{ $customer?->card_number }}</td>
                        <td>{{ $customer?->birthday }}</td>
                        <td>{{ $customer->updated_at }}</td>
                        <td class="d-flex">
                            <a href="{{ route('customers.edit', $customer->id) }}"> 
                                <i class="fe fe-edit-2 mr-2 text-primary" ></i>
                            </a>
                            <form  action="{{ route('customers.destroy', $customer->id ) }}" method="post">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="fe fe-trash-2 mr-2 text-danger br-none" 
                                style="background: transparent; outline: none; border: none;">
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach   
                </tbody>    
            </table>
        </div>
    </div>
     <div class="modal fade" id="modal-secondary">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Barcha foydalanuvchiga habar yuborish</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <textarea rows="8" cols="60" maxlength="160"></textarea>
                </div>
                <div class="col-md-12">
                    <form action="{{ route('sendSms') }}" id="sendsms">
                    <label class="btn btn-outline-light">Faol mijozlar
                        <input type="radio" name="activeOrAll" value="active">
                    </label>
                    <label class="btn btn-outline-light">Hama mijozlar
                        <input type="radio" class="form-radio" name="activeOrAll" value="all">
                    </label>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Yopish</button>
              <button type="button" class="btn btn-outline-light" form="sendsms">Yuborish</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>