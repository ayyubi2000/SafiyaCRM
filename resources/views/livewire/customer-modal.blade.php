<div>
    @if(!empty($customer))
    <div class="modal fade" id="modal-lg" style="display: block !important; opacity: 1 !important;  !important; padding-top: 50px !important;">
        <div class="modal-dialog modal-xl" style=" opacity: 1 !important;">
            <div class="modal-content" style="height: 600px !important;">
                <div class="modal-header">
                    <div class="row w-100">
                        <div class="col-lg-1  d-md-none">
                            <button type="button" class="close float-right "  data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class=" float-right">&times;</span>
                            </button>
                        </div>
                        <div class="col-lg-1">
                            <h5 class="modal-title  btn btn-default" style="background-color: {{ $status->name ?? '#fff' }}">{{ $status->name ?? 'Yangi' }}</h5>
                        </div>
                        <div class="col-lg-1">
                            <h5 class="modal-title h6"> ID : {{ $customer->id }}</h5>
                        </div>
                        <div class="col-lg-2">
                            <h5 class="modal-title h6"> Karta raqam  : {{ $customer->card_number }}</h5>
                        </div>
                        <div class="col-lg-2">
                            <h5 class="modal-title h6">FIO : {{ $customer->name }}</h5>
                        </div>
                        <div class="col-lg-2">
                            <h5 class="modal-title h6">Tel : +{{ $customer->number }}</h5>
                        </div>
                        <div class="col-lg-3">
                            <h5 class="modal-title h6">Tug'ulgan kun : {{ $customer->birthday }}</h5>
                        </div>
                        <div class="col-lg-1 d-none d-lg-block">
                            <button type="button" class="close float-right "  data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class=" float-right">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12  col-sm-3">
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link {{ $activeTab == 'purchaseList' ? ' active' : 'hide'  }}" wire:click="openPurchaseListTab">Haridlar</a>
                                  <a class="nav-link {{ $activeTab == 'smsList' ? ' active' : 'hide'  }}" wire:click="openSmsListTab">Habarlar</a>
                                 <a class="nav-link {{ $activeTab == 'noteList' ? ' active' : 'hide'  }}" wire:click="openNoteListTab">Eslatmalar</a>
                                  <a class="nav-link {{ $activeTab == 'sms' ? ' active' : 'hide'  }}" wire:click="openSmsTab">Habar junatish</a>
                                <a class="nav-link {{ $activeTab == 'note' ? ' active' : 'hide'  }}" wire:click="openNoteTab">Eslatma qo'shish</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                 <div class="tab-pane text-left table-resposive {{ $activeTab == 'purchaseList' ? 'show active' : 'hide'  }}  "  style="height:450px !important ; overflow-y: auto !important;" >
                                    <table class="table  table-striped table-bordered table-warning  " >
                                        <thead>
                                            <tr>
                                                <th>Mahsulot nomi</th>
                                                <th>Mahsulot miqdori</th>
                                                <th>Mahsulot narhi</th>
                                                <th>Jami narh</th>
                                                <th>Harid vaqti</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach($customer->purchases as $purchase)
                                            <tr>
                                                <td>{{ $purchase->product->name }}</td>
                                                <td>{{ $purchase->amount }}</td>
                                                <td>{{ $purchase->product->cost }} so'm</td>
                                                <td>{{ $purchase->PurchaseCost }} so'm</td>
                                                <td>{{ $purchase->created_at }}</td>
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                                  <div class="tab-pane text-left fade table-resposive {{ $activeTab == 'smsList' ? 'show active' : 'hide'  }}  "   style="height:450px !important ; overflow-y: auto !important;" >
                               <table class="table  table-striped table-bordered table-warning">
                                        <thead>
                                            <tr>
                                                <th>Habar</th>
                                                <th>Hodim</th>
                                                <th>Vaqti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customer->messages as $message)
                                            <tr>
                                                <td>{{ $message->message }}</td>
                                                <td>{{ $message->user->name }}</td>
                                                <td>{{ $message->created_at }}</td>
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                                 <div class="tab-pane text-left  fade {{ $activeTab == 'noteList' ? 'show active' : 'hide'  }}  "  style="height:450px !important ; overflow-y: auto !important;" >
                                    <table class="table  table-striped table-bordered table-warning">
                                        <thead>
                                            <tr>
                                                <th>Eslatma</th>
                                                <th>Hodim</th>
                                                <th>Vaqti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customer->notes as $note)
                                            <tr>
                                                <td>{{ $note->text }}</td>
                                                <td>{{ $note->user->name }}</td>
                                                <td>{{ $note->created_at }}</td>
                                                <td><i class="fe fe-trash text-danger" wire:click="noteDelete({{ $note->id }})"></i></td>
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane text-left fade {{ $activeTab == 'sms' ? 'show active' : 'hide'  }}  "  >
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <div class="col-md-12">
                                            <textarea style="outline: none;" class="w-100"  maxlength="160" 
                                                placeholder="habarni kiriting va habardagi harflar soni 160 tadan oshmasin" wire:model="smsText">
                                            </textarea>
                                            </div>
                                            <div class="col-md-12">
                                              <button class="float-right btn btn-primary " wire:click="sendMessage">Yuborish</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane text-left fade {{ $activeTab == 'note' ? 'show active' : 'hide'  }}  "  >
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <div class="col-md-12 text-dark">
                                            <textarea class="w-100"   
                                                placeholder=" Eslatma yozing  " style="outline:none;" wire:model="noteText" >
                                            </textarea>
                                            </div>
                                            <div class="col-md-12">
                                              <button class="float-right btn btn-primary " wire:click="noteSave">Saqlash</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- end livewire tabs -->
                </div>
            </div>
        </div>
    </div>
    @endif
<script>
Livewire.on('showCustomerModal', (customerId) => {
    @this.fillCustomerID(customerId);
     setTimeout(function(){  
            $('#modal-lg').modal('show')
    }, 800);
});


</script>
   
<style type="text/css">
#modal-lg{
    animation-duration: 1s;
    animation-name: for-time;
}
@keyframes for-time {
    from{opacity: 0;}
    to{opacity: 1;}
}
</style>

</div>
