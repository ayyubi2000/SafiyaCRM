<div>
       <div class="container-fluid">
    <div class="row ">
      <div class="col-sm-6 mt-5">
        <h1 class="m-0">Savdo Qo'shish</h1>
      </div>
      <div class="col-sm-6 mt-5 ">
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
                        <div class="col-md-12 ">
                        <h3 class="card-title">{{$product ? 'Savdoni  tahrirlash' : 'Savdoni qo\'shish'}}</h3>
                            <a href="{{ route('customers.create') }}" class="btn btn-primary float-right">Mijoz qushish</a>
                        </div>
                    </div>
                    @csrf
                    @isset($product)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pt-2">
                                <label for="FIO" >Mijozni tanlang</label>
                                <input type="text" class="form-control " id="FIO" placeholder="Mijozni , id raqami , ismi orqali qidirishingiz mumkin " value="{{ $product->name ??  old('customer') }}"  name="name" wire:model="customerSearch" wire:keydown.enter="getCustomer">
                                 @error('customer') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 pt-2">
                            @if(isset($customer))
                                <div class="alert alert-info py-0">
                                    <p>Id  : {{ $customer->id ?? null  }}</p>
                                    <p>Ismi  : {{ $customer->name ?? null  }}</p>
                                    <p>Telefon raqam :{{ $customer->number ?? null }}</p>
                                </div>
                            @else
                                <div class="alert alert-danger mt-4" style="display: {{ $customerError ? 'block' : 'none' }};">
                                    <p>{{ $customerError}}</p>
                                </div>
                            @endif
                            </div>
                            <div class="col-md-6 pt-2">
                                <label for="product">Mahsulotni tanlang</label>
                                 <input class="form-control" type="text" placeholder="Mahsulot ni tanlang" id="autocomplete_product"  >
                                  @error('product') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>   
                            <div class="col-md-6 pt-2">
                                <label for="Email">Mahsulot Miqdori</label>
                                <input type="amount" class="form-control " placeholder="Mahsulot miqdorini kiriting" 
                                 wire:model="amount"  wire:keydown.enter="addProduct" id="product-amount"> 
                                  @error('email') <span class="text-danger h3">{{ $message }}</span> @enderror
                            </div>
                             @if(!empty($productsBag))
                            <div class="col">
                                <table class="table table-striped mg-b-0 text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mahsulot</th>
                                            <th>Narxi</th>
                                            <th>Miqdori</th>
                                            <th>Jami narhi</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? $all_cost = 0; ?>
                                        @foreach($productsBag as $product)
                                            <tr>
                                                <td wire:key="{{ $loop->index }}">{{ $loop->iteration }}</td>
                                                <td wire:key="{{ $loop->index }}">{{ $product['name'] }}</td>
                                                <td wire:key="{{ $loop->index }}">{{ $product['cost'] }}  So'm </td>
                                                <td wire:key="{{ $loop->index }}">{{ $product['amount'] }} </td>
                                                <td wire:key="{{ $loop->index }}">{{ $product['amount'] * $product['cost'] }} So'm </td>
                                                <td wire:key="{{ $loop->index }}"><i class="icon ion-md-trash text-danger pointer"
                                                    wire:click="deleteProduct({{ $product['id'] }})"></i>
                                                </td>
                                            </tr>
                                            <?  $all_cost +=  $product['amount'] * $product['cost'] ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Jami narhi :</th>
                                            <th>{{ $all_cost }}  So'm </th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                             @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary float-right" wire:click="save">Saqlash</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <script>
        document.addEventListener('livewire:load', function () {

            $("#autocomplete_product").on( "autocompleteselect", function( event, ui ) {
                @this.product = ui.item;
            });

            $('#product-amount').keydown(function(event){
                if (event.keyCode == 13) {
                    $('#autocomplete_product').val('');
                    $('#autocomplete_product').focus();
                    @this.amount = 1;
                }
            });
        })
    </script>
</div>