<div>
     <div class="container-fluid">
        <div class="row  ">
          <div class="col-sm-6 mt-5">
            <h1 class="m-0">Bugungi Tug'ulgan kunlar</h1>
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
        </div>
        <div class="card-body">
            <table  class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ismi</th>
                        <th>Telefon raqami</th>
                        <th>Tug'uglan kuni</th>
                        <th>Qo'shilgan vaqti</th>
                        <th style="display:none;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer) 
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer?->number }}</td>
                        <td>{{ $customer?->birthday }}</td>
                        <td>{{ $customer->updated_at }}</td>
                    </tr>
                    @endforeach   
                </tbody>    
            </table>
        </div>
    </div>
</div>