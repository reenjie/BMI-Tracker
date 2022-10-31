<div class="main-content">


    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if(session()->has('success'))
                    <div class="container">
                        
                    <div class="alert  mb-2 mt-2 alert-dismissible fade show" style="background-color:rgb(209, 248, 205);font-size:13px" role="alert">
                        {{session()->get('success')}}
                        <button type="button" style="color:black" class="btn-close " data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                  @endif
                    <div class="container">
                        <button data-bs-toggle="modal" data-bs-target="#add"  class="btn bg-gradient-primary btn-sm mb-0" >Add Administrator</button>
                    </div>


                    @include('livewire/adduser')
         
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                 
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        BMI
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        role
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                @if($item->id != auth()->user()->id)
                                <tr>
                                 
                                 <td class="text-center">
                                        <p 
                                        style="color: rgb(92, 92, 212);cursor:pointer"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}" style="cursor: pointer" class="text-xs font-weight-bold mb-0">{{$item->name}}</p>

  

  <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
       
        <div class="modal-body" style="">
            <h5 >{{$item->name}}</h5>
            <span style="font-size: 14px">{{$item->email}}</span>
            <div class="container">
                <h6 style="text-align:left;font-size:14px" class="mt-3">
                    <div style="">
                        <span style="font-weight: normal">
                            Age :
                        </span>
                        <span style="margin-left: 5px">
                           {{date('Y') - date('Y',strtotime($item->birthday)) }} yrs old
                        </span>
                    </div>
                    <div style="">
                        <span style="font-weight: normal">
                          Gender :
                        </span>
                        <span style="margin-left: 5px">
                          {{$item->gender}}
                        </span>
                    </div>
                    <div style="">
                        <span style="font-weight: normal">
                           Birthday:
                        </span>
                        <span style="margin-left: 5px">
                           {{date('F j, Y',strtotime($item->birthday))}}
                        </span>
                    </div>
                </h6>
                <h6 style="text-align:left;font-size:14px;font-weight:normal">
                
                   
                    @foreach ($random_bmi as $userbmi)
                    @if($userbmi->id == $item->bmi)
                    <span style="font-size:12px;font-weight:bold">BMI</span>
                    <br>
                    Height : {{$userbmi->height}}
                    <br>
                    Weight : {{$userbmi->weight}}
                    <br>
                    Body Mass Index : {{$userbmi->bmi}}
    
                    @php
                    $bmi =$userbmi->bmi;
                    $ranges = DB::select('SELECT * FROM `ranges` WHERE '.$bmi.' BETWEEN start and end');
    
    
                @endphp
                        <br>
                    @foreach ($ranges as $bdw)
                    <span class="badge bg-success">
                        {{$bdw->conclusion}}
                    </span>
                    @endforeach
                    @endif
                
                @endforeach
                    <br><br>
                 
                    @foreach ($statistics as $st)
                        @if($st->user_id == $item->id)
                        <span style="font-size:12px;font-weight:bold">DBW,PA,TER</span>
                        <br>
                      
                        Desired Body Weight
                        <br>
                        {{$st->DBW}} kg
                        <br>
                        Physical Activity
                        <br>
                        {{$st->PA}} kCal
                        <br>
                        Total Energy Requirement
                        <br>
                        {{$st->TER}}
                        <br>
                        Date Generated : {{date('@h:m a F j,Y',strtotime($st->created_at))}}
                        @endif
                    @endforeach
                  
            
                </h6>
            </div>
     

            <br><br>
            <div style="text-align: center">
                <button type="button" class="btn btn-light  btn-sm" style="font-size: 13px" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
       
      </div>
    </div>
  </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->email}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            @foreach ($random_bmi as $userbmi)
                                                @if($userbmi->id == $item->bmi)
                                                {{$userbmi->bmi}}
                                                @endif
                                            
                                            @endforeach
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        @if($item->role == 0)
                                      <span style="font-size:13px;text-align:center">
                                    User</span>
                                        @else
                                        <span style="font-size:13px;text-align:center">
                                            Admin</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{date('@h:m a F j,Y ',strtotime($item->created_at))}}</span>
                                    </td>
                                    <td class="text-center">
                                      @if($item->isverified == 0)
                                        <button
                                        onclick="Verify({{$item->id}})"
                                        style="outline:none;border:none;font-size:13px;text-transform:uppercase;color:rgb(43, 136, 100);border:1px solid rgb(106, 160, 106);border-radius:5px"
                                        >
                                            Verify <i class="fas fa-circle"></i>
                                        </button>
                                      @endif
                                        <span 
                                        style="margin-left: 5px"
                                        onclick="Delete_rec({{$item->id}})">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                @endif 
                                @endforeach
                           
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

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

</script>
