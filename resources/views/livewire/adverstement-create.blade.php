<div>
   <div class="container-fluid">
        <div class="row ">
            <div class="col-md-11  pr pt-5  pl-lg-5">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Reklama Turini qo'shish</h3>
                        <div class="col-md-12 mt-5 ">
                            <div class="input-group">
                            <input type="text" placeholder="Reklama Nomini kiriting" 
                                class="form-control " wire:model="newAddver">
                                <button class="btn btn-primary" wire:click="adverCreate">Qo'shish</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Nomi</td>
                                    <td>Qoshilgan vaqti</td>
                                    <td>action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($addvers as $addver)
                                <tr>
                                    <td>{{ $addver->name }}</td>
                                    <td>{{ $addver->created_at }}</td>
                                    <td>
                                        <i class="fe fe-trash text-danger" wire:click="addverDelete({{ $addver->id }})"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
     </div> 



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11  pr pt-5  pl-lg-5">
                <div class="card card-dark">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-md-12 ">
                            <h3 class="card-title">Mijoz statusi </h3>
                        </div>
                        <div class="col-md-12 mt-3 ">
                            <div class="row">
                                
                            <div class="col-md-5  ">
                                    <label>Status nomi</label>
                                <div class="input-group">
                                    <input type="text" 
                                    class="form-control " placeholder="status nomini kiriting" wire:model="newStatus">
                                </div>
                            </div>
                            <div class="col-md-5 ">
                                <label>Status Miqdori</label>
                                <div class="input-group">
                                    <input type="text" 
                                    class="form-control" placeholder="Boshlang'ich qiymatni kiriting"  wire:model="statusAmount">
                                    <span class="input-text-group">So'm</span>
                                </div>
                            </div>
                            <div class="col-md-2  mt-4">
                                <button class="btn btn-primary mt-2 float-right" wire:click="statusCreate">Qo'shish</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Status</td>
                                    <td>Status boshlang'ich qiymati</td>
                                    <td>Qoshilgan vaqti</td>
                                    <td>action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statuses as $status)
                                <tr>
                                    <td>{{ $status->name }}</td>
                                    <td>{{ $status->amount }}</td>
                                    <td>{{ $status->created_at }}</td>
                                    <td>
                                        <i class="fe fe-trash text-danger" wire:click="statusDelete({{ $status->id }})"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
