<section class="content mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-12 col-sm-6 col-md-6">
                            <a href="{{ route('activeCustomer') }}">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Faol mijozlar</span>
                                    <span class="info-box-number">
                                      {{ $activeCustomer }}
                                        <small>ta</small>
                                    </span>
                                </div>
                            </div>
                            </a>
                        </div>
                       
                        <div class="col-12 col-sm-6 col-md-6">
                            <a href="{{ route('purchases.index') }}">
                            <div class="info-box">
                                <span class="info-box-icon bg-success elevation-1">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Sotilgan Maxsulotlar</span>
                                    <span class="info-box-number">
                                      {{ $selled_product_amount }}
                                        <small>ta</small>
                                    </span>
                                </div>
                            </div>
                            </a>
                        </div>
                         <div class="col-12 col-sm-6 col-md-6">
                            <a href="{{ route('customers.index') }}">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Mijozlar</span>
                                    <span class="info-box-number">
                                      {{ $customersCount }}
                                        <small>ta</small>
                                    </span>
                                </div>
                            </div>
                            </a>
                        </div> 
                        <div class="col-12 col-sm-6 col-md-6">
                            <a href="{{ route('products.index') }}">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-list"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Maxsulotlar</span>
                                    <span class="info-box-number">
                                      {{ $products_count }}
                                        <small>xil</small>
                                    </span>
                                </div>
                            </div>
                            </a>
                        </div>
                         <div class="col-12 col-sm-12 col-md-12">
                            <h3>Status </h3>
                        </div>
                        @foreach($customersByStatusAll as $statusName => $status)
                         <div class="col-12 col-sm-6 col-md-6">
                            <a href="{{ route('customers.index') }}">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">{{ $statusName }}</span>
                                    <span class="info-box-number">
                                      {{ $status }}
                                        <small>Ta</small>
                                    </span>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                        <div class="col-12 col-sm-12 col-md-12">
                            <h3>Reklama</h3>
                        </div>
                        @foreach($customersByAddver as $addverName => $addver)
                        <div class="col-12 col-sm-6 col-md-6">
                            <a href="{{ route('customers.index') }}">
                            <div class="info-box">
                                <span class="info-box-icon bg-success elevation-1">
                                    <i class="fas fa-tv"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">{{ $addverName }}</span>
                                    <span class="info-box-number">
                                      {{ $addver }} 
                                        <small>Ta</small>
                                    </span>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Savdo Grafigi</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Mijozlar  Grafigi</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="areaChartCustomer" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
 <script type="text/javascript">
   var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['Yanvar', 'Fevral', 'Mart', 'Aprl', 'May', 'Iyyun', 'Iyyul','Avgust','Sentyabr','Oktyabr','Noyabr', 'Dekabr'],
      datasets: [
        {
          label               : 'Electronics',
          backgroundColor     : '#20B2AA',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{ $purchaseRanking[1] }}, {{ $purchaseRanking[2] }}, {{ $purchaseRanking[3] }}, {{ $purchaseRanking[4] }}, {{ $purchaseRanking[5] }}, {{ $purchaseRanking[6] }}, {{ $purchaseRanking[7] }}, {{ $purchaseRanking[8] }}, {{ $purchaseRanking[9] }}, {{ $purchaseRanking[10] }}, {{ $purchaseRanking[11] }}, {{ $purchaseRanking[12] }}]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })


///   mijozlar grafigi


 var areaChartCanvas = $('#areaChartCustomer').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['Yanvar', 'Fevral', 'Mart', 'Aprl', 'May', 'Iyyun', 'Iyyul','Avgust','Sentyabr','Oktyabr','Noyabr', 'Dekabr'],
      datasets: [
        {
          label               : 'Electronics',
          backgroundColor     : '#20B2AA',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{ $customerRanking[1] }}, {{ $customerRanking[2] }}, {{ $customerRanking[3] }}, {{ $customerRanking[4] }}, {{ $customerRanking[5] }}, {{ $customerRanking[6] }}, {{ $customerRanking[7] }}, {{ $customerRanking[8] }}, {{ $customerRanking[9] }}, {{ $customerRanking[10] }}, {{ $customerRanking[11] }}, {{ $customerRanking[12] }}]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    </script>
</section>