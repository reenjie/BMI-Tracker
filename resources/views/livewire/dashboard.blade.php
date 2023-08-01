 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Users</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{sizeof($User)}}
                    
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-users text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">BMIs</p>
                    <h5 class="font-weight-bolder mb-0">
                    {{sizeof($random_bmi)}}
                    
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Activity</p>
                    <h5 class="font-weight-bolder mb-0">
                      4
                    
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">New Users</p>
                    <h5 class="font-weight-bolder mb-0 text-danger">
                   {{sizeof($Pending)}}
                      
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


        <div class="row mt-4">
          <div class="col-md-7">
            <div class="card shadow">
              <div class="card-body">
                <h6>Random User Body Mass Indeces</h6>
               
                <ol class="list-group list-group-flush">
                  @foreach ($ranges as $item)
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold">{{$item->conclusion}}</div>
                      <span class="badge bg-primary rounded-pill">
                        @php
                        $id = $item->id;
                        $start = $item->start;
                        $end = $item->end;
                            $count = DB::select('select * from random__bmis where bmi between '.$start.' and '.$end.' ');
  
                            echo sizeof($count);
                        @endphp
                        
                      </span>
                      Counts
                    </div>
                   
                  </li>
                  @endforeach
             
                
                </ol>
              </div>
            </div>
            <div class="card shadow mt-4">
              <div class="card-body">
                <h6 style="text-align: center">
                  {{date('F j, Y')}}
                </h6>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-body">
                <h6 style="color:rgb(231, 73, 73)">Pending Users</h6>
                @foreach ($Pending as $item)
                  <div class="d-flex justify-content-between bg-light p-2 mb-2" style="border-radius: 10px">
                    <div>
                <h6 style="font-weight: normal">
                {{$item->name}}
                <br>
                <span style="font-size: 12px">{{$item->email}}</span>
                </h6>                      
                    </div>
                    <div class="">
                      <button
                      onclick="Verify({{$item->id}})"
                      style="outline:none;border:none;font-size:13px;text-transform:uppercase;color:rgb(43, 136, 100);border:1px solid rgb(106, 160, 106);border-radius:5px"
                      >
                          Verify <i class="fas fa-check-circle"></i>
                      </button>
                      <span 
                                        style="margin-left: 5px"
                                        onclick="Delete_rec({{$item->id}})">
                                            <i class="cursor-pointer fas fa-times text-danger"></i>
                                        </span>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="card shadow mt-3">
              <div class="card-body" style="text-align: center">
                <img src="{{asset('assets/img/dash.svg')}}" alt="" style="width: 240px">
                <h6>
                BMI calculation | Recommendations
                </h6>
              </div>
            </div>
          </div>
        </div>
      
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="/assets/js/plugins/chartjs.min.js"></script>
  <script src="/assets/js/plugins/Chart.extension.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        tooltips: {
          enabled: true,
          mode: "index",
          intersect: false,
        },
        scales: {
          yAxes: [{
            gridLines: {
              display: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 0,
              fontSize: 14,
              lineHeight: 3,
              fontColor: "#fff",
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
          xAxes: [{
            gridLines: {
              display: false,
            },
            ticks: {
              display: false,
              padding: 20,
            },
          }, ],
        },
      },
    });

    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(253,235,173,0.4)');
    gradientStroke1.addColorStop(0.2, 'rgba(245,57,57,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.4)');
    gradientStroke2.addColorStop(0.2, 'rgba(245,57,57,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors


    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#fbcf33",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#f53939",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6

          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        tooltips: {
          enabled: true,
          mode: "index",
          intersect: false,
        },
        scales: {
          yAxes: [{
            gridLines: {
              borderDash: [2],
              borderDashOffset: [2],
              color: '#dee2e6',
              zeroLineColor: '#dee2e6',
              zeroLineWidth: 1,
              zeroLineBorderDash: [2],
              drawBorder: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              fontSize: 11,
              fontColor: '#adb5bd',
              lineHeight: 3,
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
          xAxes: [{
            gridLines: {
              zeroLineColor: 'rgba(0,0,0,0)',
              display: false,
            },
            ticks: {
              padding: 10,
              fontSize: 11,
              fontColor: '#adb5bd',
              lineHeight: 3,
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
        },
      },
    });
  </script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
  

  
  function Verify(id){
      swal({
    title: "Are you sure?",
    text: "This will allow the User to Calculate his/her DBW, TER , and View Full Recommendations ",
    icon: "warning",
    buttons: true,
    dangerMode: false,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location.href="{{route('user.verify')}}?id="+id;
    }
  });
  }

  function Delete_rec(id){
    swal({
  title: "Are you sure?",
  text: "All Records of this User Will be Deleted. Press Ok to Proceed",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location.href="{{route('user.destroy')}}?id="+id;
  }
});
}
  
  </script>
