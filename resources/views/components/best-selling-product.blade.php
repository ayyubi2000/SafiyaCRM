<div>
     <div class="container-fluid">
        <div class="row  ">
          <div class="col-sm-6 mt-5">
            <h1 class="m-0">Mahsulot sotuv reytingi</h1>
          </div>
          <div class="col-sm-6 mt-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Orqaga Qaytish</a></li>
            </ol>
          </div>
        </div>
    <div class="card ">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Mahsulot Id</th>
                        <th>Mahsulot</th>
                        <th>Sotilgan miqdori</th>
                    </tr>
                </thead>
                <tbody>
                     @isset($products)
                        @foreach($products as $id => $product)
                                <tr>
                                    <td>{{$product[0]->product->id}}</td>
                                    <td>{{$product[0]->product->name}}</td>
                                    <td>{{$product->sum('amount')}}</td>
                                </tr>
                        @endforeach
                    @endisset
                </tbody>    
            </table>
        </div>
    </div>
</div>

                    
