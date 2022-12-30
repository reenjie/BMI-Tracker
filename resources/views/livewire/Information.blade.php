<div>
    <div class="container">
        <div class="row mb-4">
           
            <div class="col-md-4 d-flex">
                <div class="card  shadow flex-fill " style="border-left:10px solid rgb(64, 152, 155)">
                    <div class="card-body">
                    <h6>
                       Physical Activity
                    </h6>
                  
                    <h4  style="font-weight: bold;color:rgb(223, 162, 49)">
                      {{$userStatistics[0]->PA}} KCal
                    </h4>
                    </div>

                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card  shadow flex-fill " style="border-left:10px solid rgb(245, 129, 129)">
                    <div class="card-body">
                    <h6>
                        Desired Body Weight
                    </h6>
                  
                    <h4  style="font-weight: bold;color:rgb(223, 162, 49)">
                        {{$userStatistics[0]->DBW}} Kg
                    </h4>
                    </div>

                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="card  shadow flex-fill " style="border-left:10px solid rgb(101, 116, 167)">
                    <div class="card-body">
                    <h6>
                      Total Energy Requirement
                    </h6>
                  
                    <h4  style="font-weight: bold;color:rgb(223, 162, 49)">
                    {{$userStatistics[0]->TER}}
                    </h4>
                    </div>

                </div>
            </div>

        </div>
      
        <div class="row mt-1 mb-4">
          <div class="container" >
            <div class="row">
                    <div class="col-md-4">
                         <div class="card shadow" style="background-color:rgb(252, 235, 214)">
                <div class="card-body">
                    @php
                    $user = auth()->user();
                   @endphp
                    <h5>
                      {{$user->name}}
                   
                    <br>
                    <span class="text-secondary" style="font-size:12px">
                        {{$user->email}}
                        </span>
                    </h5>

                    <br>
                    <h6>
                        <div style="display: flex">
                            <span style="font-weight: normal">
                                Age :
                            </span>
                            <span style="margin-left: 5px">
                               {{date('Y') - date('Y',strtotime($user->birthday)) }} yrs old
                            </span>
                        </div>
                        <div style="display: flex">
                            <span style="font-weight: normal">
                              Gender :
                            </span>
                            <span style="margin-left: 5px">
                              {{$user->gender}}
                            </span>
                        </div>
                        <div style="display: flex">
                            <span style="font-weight: normal">
                               Birthday:
                            </span>
                            <span style="margin-left: 5px">
                               {{date('F j, Y',strtotime($user->birthday))}}
                            </span>
                        </div>
                    </h6>

                    <h6 class="mt-2" style="font-weight: bold">

                        @foreach ($info as $item)
                        <div style="display: flex">
                            <span style="font-weight: normal">
                              Height :
                            </span>
                            <span style="margin-left: 5px">
                              {{$item->height}} cm
                            </span>
                        </div>
                   

                 
                        <div style="display: flex">
                            <span style="font-weight: normal">
                              Weight :
                            </span>
                            <span style="margin-left: 5px">
                                {{$item->weight}} kg
                            </span>
                        </div>

                        <div style="display: flex">
                            <span style="font-weight: normal">
                              Body Mass Index :
                            </span>
                            <span style="margin-left: 5px">
                                {{$item->bmi}}
                            </span>
                        </div>
                        @endforeach
                    
                        <div style="display: flex">
                            <span style="font-weight: normal">
                              BMI - Result :
                            </span>
                            <span style="margin-left: 5px">
                          {{$bmi_Conclusion}} 
                            </span>
                        </div>
                    </h6>
                   
                </div>
            </div> 
                    </div>

                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-body">
                                <h6>
                                    Recommendations
                                </h6>
                                <h6 style="font-size: 14px;font-weight:normal">
                                    <ul class="list-group-flush" style="list-style: disc">
                                      
                                        @foreach ($recommendation as $item => $value )
                                        @php
                                            $key = $item + 1;
                                        @endphp
                                    <li class="list-group-item">  {{$key." . ".$value->contents}}</li>
                                    @endforeach
                                       
                                      </ul>
                            
                                </h6>
                            </div>
                        </div>
                       
                              
                                <button  class="btn mt-3 text-primary btn-light" id="calculateagain">
                                    Calculate BMI again
                                    <i style="margin-left:2px" class="fas fa-sync"></i>
                                </button>

                                <button  style="margin-left:5px" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn  mt-3 text-info btn-light" >
                                   Log & Statistics
                                    <i style="margin-left:2px" class="fas fa-info-circle"></i>
                                </button>

                  
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-body">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Logs</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Statistics</button>
  </li>
 
</ul>
<div class="tab-content" id="myTabContent">
    
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <table class="table table-sm table-bordered" style="font-size:13px">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Height</th>
      <th scope="col">Weight</th>
      <th scope="col">BMI</th>
    </tr>
  </thead>
  <tbody>
    @foreach($userStatisticsl as $row)
    <tr>
      <td>{{date('F j,Y',strtotime($row->created_at))}}</td>
      <td>{{$row->height}}</td>
      <td>{{$row->weight}}</td>
      <td>{{$row->BMI}}</td>
    </tr>
    @endforeach
 
  
  </tbody>
</table>

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="container p-5">
  <h6>Weight</h6>
    <span style="font-size:14px">
    Current : {{$userStatistics[0]->weight}} Kg
    
    <br>

    Heaviest :

    @php
    $highest = DB::select('SELECT max(weight) as heaviest , min(weight) as lowest FROM `statistics` WHERE user_id = '.$userStatistics[0]->user_id.' ');
    @endphp
    {{$highest[0]->heaviest}} Kg
    <br>
    Lightest : {{$highest[0]->lowest}} Kg
    <br>
</span>
    <h6>Height</h6>
    <span style="font-size:14px">
    Current : {{$userStatistics[0]->height}} Cm

    </span>
    <hr>
    <span style="font-size:14px">
    BMI : {{$userStatistics[0]->BMI}}

    <br>
    
    <span class="badge bg-success">Overweight</span>
</span>
  </div>
  </div>
 
</div>

      </div>
      
    </div>
  </div>
</div>
                            
                    </div>
                </div>
          
          </div>
        </div>

    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
const btnagain = document.getElementById('calculateagain');
btnagain.addEventListener("click",alert)
function alert(){
    swal({
  title: "Are you sure?",
  text: "This will Reset Information and Recommendations",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="{{route('calc.Recalculate')}}";
   
  }
});
}

</script>