<div>
     <div class="container-fluid">
    <div class="row ">
      <div class="col-sm-6 mt-5">
        <h1 class="m-0">Savdolar</h1>
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
                    <div class="col-md-12">
                        <a href="{{ route('purchases.create') }}" class="btn btn-primary float-right">
                            Xarid qo'shish
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Mijoz</th>
                        <th>Mahsulot</th>
                        <th>Mahsulot miqdori</th>
                        <th>Narxi</th>
                        <th>Jami narxi</th>
                        <th>Hodim</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase) 
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        <td onclick="openModal({{ $purchase->customer->id }})">{{ $purchase->customer->name }}</td>
                        <td>{{ $purchase->product->name }}</td>
                        <td>{{ $purchase->amount }}</td>
                        <td>{{ $purchase->product->cost }}</td>
                        <td>{{ $purchase->PurchaseCost }}</td>
                        <td>{{ $purchase->user->name }}</td>
                        <td class="d-flex">
                            <!-- <a href="{{ route('purchases.edit', $purchase->id) }}"> 
                                <i class="fe fe-edit-2 mr-2 text-primary" ></i>
                            </a> -->
                            <form  action="{{ route('purchases.destroy', $purchase->id ) }}" method="post">
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