<div>
    <div class="container-fluid">
        <div class="row  ">
          <div class="col-sm-6 mt-5">
            <h1 class="m-0">Mijozlar harid reytingi</h1>
          </div>
          <div class="col-sm-6 mt-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Orqaga Qaytish</a></li>
            </ol>
          </div>
        </div>
    </div>
    <div class="card ">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Mijoz Id raqami</th>
                        <th>Ismi</th>
                        <th>Sotib olingan Mahsulot Miqdori</th>
                        <th>Jami sarflangan pul</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($customers)
                        @foreach($customers as $id => $customer)
                                <tr>
                                    <td>{{$customer[0]->customer->id}}</td>
                                    <td onclick="openModal({{$customer[0]->customer->id}})">
                                        {{$customer[0]->customer->name}}
                                    </td>
                                    <td>{{$customer->sum('amount')}}</td>
                                    <td>{{ $customer->sum('PurchaseCost')}} so'm</td>
                                </tr>
                        @endforeach
                    @endisset
                </tbody>    
            </table>
        </div>
    </div>
</div>

                    