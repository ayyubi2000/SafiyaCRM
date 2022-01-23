<div>
      <div class="container-fluid">
        <div class="row  ">
          <div class="col-sm-6 mt-5">
            <h1 class="m-0">Eslatma va Vazifa qo'shish</h1>
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
        <div class="col-md-11  pr pt-1   pl-5">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">{{$event ? 'Eslatma yoki Vazifani tahrirlash' : 'Eslatma yoki Vazifa qo\'shish'}}</h3>
                </div>
                <form action="{{ $event ? route('notification.update', $event->id ) : route('notification.store') }}" method="post">
                    @csrf
                    @isset($event)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pt-2">
                                <label for="note" >Eslatma yoki Vazifa yozing</label>
                                <textarea   id="note" placeholder="Eslatma yoki Vazifani kiriting"   name="note" rows="8" cols="60">{{ $event->note ?? old('note') }}</textarea>
                                 @error('note') <span class="text-danger">{{ $message }}</span> @enderror
                             </div>
                             <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="col-md-6 pt-2">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <label for="reminder_time">Eslatish vaqtini belgilang</label>
                                        <input type="date" class="form-control" id="reminder_time" placeholder="Telefon raqamingizni kiriting" 
                                        value="{{ $event ?  date('Y-m-d', strtotime($event->reminder_time) ) : old('reminder_time') }}"  name="reminder_time">
                                          @error('reminder_time') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="reminder_time">Vazifa turini tanlang</label>
                                            <select class="form-control" name="note_type">
                                                <option value="{{$event->note_type ?? 1  }}" {{ isset($event) && $event->note_type === '1' ? 'selected' : '' }}>Shaxsiy</option>
                                                <option value="{{$event->note_type ?? 2  }}" {{ isset($event) && $event->note_type === '2' ? 'selected' : '' }}>Hamma uchun</option>
                                            </select>
                                          @error('reminder_time') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 pt-2 {{ $event ? 'show' : 'invisible' }}" >
                                    <label for="raqam">Vazifa bajarildimi ?</label>
                                     <textarea   id="answear" placeholder="Vazia bajarilgani yoki nima uchun bajarilmadi shu haqida yozin"   name="answear" rows="4" cols="60">{{ $event->answear ?? old('answear') }}</textarea>
                                      @error('answear') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>   
                        </div>
                    </div>
                    <div class="card-footer">
                      <input type="submit" class="btn btn-primary float-left  {{ $event ? 'show' : 'invisible'}}" name="close" value="Yopish">
                      <input type="submit" class="btn btn-primary float-right" name="save" value=" {{ $event ? 'Yangilash' : 'Saqlash'}}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
