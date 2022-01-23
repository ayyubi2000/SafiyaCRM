<div class="content-header">
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
    <div class="container mt-2">
        <div class="card-body bg-white border">
            <form action="{{ isset($product) ? route('products.update' , $product->id) : route('products.store') }}" method="post">
            @csrf
            @isset($product)
            @method('PUT') 
            @endisset
            <div class="row">
                <div class="col-md-6">
                    <label for="role">Mahsulot nomi</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name ?? old('name')}}" placeholder="Mahsulot nomini kiriting">
                </div>
                <div class="col-md-6">
                    <label for="role">Mahsulot miqdori</label>
                    <div class="input-group">
                        <input type="number" name="amount" class="form-control" value="{{ $product->amount ?? old('amount')}}" placeholder="Mahsulot miqdorini kiriting">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="user">Mahsulot narxi</label>
                    <div class="input-group">
                        <input type="number" name="cost" class="form-control" value="{{ $product->cost ?? old('cost')  }}" placeholder="Mahsulot narxini kiriting">
                        <span class="input-group-text">so'm</span>
                    </div>
                </div>  
                <div class="col-md-6 mt-4">
                        <button type="submit" class="btn  btn-primary mt-2 float-right">Saqlash</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>