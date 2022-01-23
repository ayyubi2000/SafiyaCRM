<div>
      <div class="container-fluid">
        <div class="row  ">
          <div class="col-sm-6 mt-5">
            <h1 class="m-0">Mahsulotlar</h1>
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
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('products.create') }}" class="float-right btn btn-primary">Mahsulot qo'shish</a>
                </div>
            </div> 
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nomi</th>
                        <th>Narhi</th>
                        <th>Miqdori</th>
                        <th>Qo'shilgan vaqti</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product) 
                    <tr>
                        <td>{{ $product->id }}</td>  
                        <td>{{ $product->name }}</td>  
                        <td>{{ $product->cost }} So'm</td>  
                        <td>{{ $product->amount }}</td>  
                        <td>{{ $product->updated_at }}</td>
                        <td class="d-flex">
                            <a href="{{ route('products.edit', $product->id) }}"> 
                                <i class="fe fe-edit-2 mr-2 text-primary" ></i>
                            </a>
                            <form  action="{{ route('products.destroy', $product->id ) }}" method="post">
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