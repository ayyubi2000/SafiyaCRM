<div>
 <div class="container-fluid">
    <div class="row ">
      <div class="col-sm-6 mt-5">
        <h1 class="m-0">Mijoz qo'shish</h1>
      </div>
      <div class="col-sm-6 mt-5 ">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Orqaga Qaytish</a></li>
        </ol>
      </div>
    </div>
  </div>
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-11  pr pt-5  pl-5">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($customer) ? 'Mijozni tahrirlash' : 'Mijoz qo\'shish'}}</h3>
                </div>
                <form action="{{ isset($customer) ? route('customers.update', $customer->id ) : route('customers.store') }}" method="post">
                    @csrf
                    @isset($customer)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pt-2">
                                <label for="FIO" >FIO</label>
                                <input type="text" class="form-control " id="FIO" placeholder="Familya ism sharif kiriting" value="{{ $customer->name ?? old('name') }}"  name="name">
                                 @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                             </div>
                            <div class="col-md-6 pt-2">
                                <label for="raqam">Telefon raqam</label>
                                <input type="text" class="form-control" id="raqam" placeholder="Telefon raqamingizni kiriting" value="{{ $customer->number ?? old('number') }}"  name="number">
                                  @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>  
                            <div class="col-md-4 pt-2">
                                <label for="birthday">Tug'ilgan kun</label>
                                <input type="date" class="form-control" id="birthday" value="{{ $customer->birthday ?? old('birthday') }}"  name="birthday">
                                  @error('birthday') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> 
                            <div class="col-md-4 pt-2">
                                <label for="birthday">So'rovnoma</label>
                                    <select class="form-control"  name="addver_id">
                                        <option value="">Tanlang...</option>
                                    @foreach($addvers as $addver)
                                        <option value="{{$addver->id}}">
                                            {{ $addver->name }}
                                        </option>
                                    @endforeach
                                    </select>
                                  @error('addver') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> 
                            <div class="col-md-4 pt-2">
                                <label for="cardNumber">Mijoz karta raqami</label>
                                <div class="input-group">
                                    @if($customer)
                                    <input type="number" class="form-control" id="cardNumber" placeholder="mijoz karta raqami" value="{{ $customer->card_number ?? old('card_number') }}"  name="card_number" disabled>
                                    @else
                                    <input type="number" class="form-control" id="cardNumber" placeholder="mijoz karta raqami" value="{{ $this->cardNumber ?? old('card_number') }}"  name="card_number" disabled>
                                    @endif
                                    <span  class="input-group-text" wire:click="getCardNumber"><i class="fas fa-copy"></i>
                                    </span>
                                </div>
                                  @error('birthday') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> 
                           
                             
                        </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary float-right" >{{ isset($customer) ? 'Yangilash' : 'Saqlash'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  

<!-- <script type="text/javascript">
    function cardNumber(argument) {
        let input = document.getElementById("cardNumber");
        const answear  =  Math.floor(Math.random() * 10000) + 1;
        input.value = answear;
    }
</script> -->

</div>
