<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="container">
          <div class="card">
            <div class="card-body">
              
              <button data-bs-toggle="modal" data-bs-target="#exampleModal"  class="btn bg-gradient-primary btn-sm mb-0" >Add Recommendation</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title fs-5" id="exampleModalLabel">Add Recommendation</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('rec.store')}}" method="POST">
        @csrf
     
      <div class="modal-body">
        
        <div class="mb-2" >
          <select name="rangeID" required id="" style="text-align: center" class="form-select">
            <option value="">-- Select BMI range --</option>
            @foreach ($allranges as $item)
            <option value="{{$item->id}}">{{$item->start." - ".$item->end." -> ".$item->conclusion}}</option>
            @endforeach
          
          </select>
        </div>

        <div class="mb-2" >
          <select name="ageID" required id="" style="text-align: center" class="form-select">
            <option value="">-- Select Age range --</option>
            @foreach ($age as $item)
                <option value="{{$item->id}}">{{$item->start." - ".$item->end}} yrs old</option>
            @endforeach
         
          </select>
        </div>

        <div class="mb-2" >
          <h6 style="font-weight: normal">Recommendation</h6>
      <textarea name="content" required placeholder="Type your Recommendation here.." style="font-size:14px" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
      @if(session()->has('success'))
       
        <div class="alert  mb-2 mt-2 alert-dismissible fade show" style="background-color:rgb(209, 248, 205);font-size:13px" role="alert">
          {{session()->get('success')}}
          <button type="button" style="color:black" class="btn-close " data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
      @endif

       <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  BMI
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                  Recommendations
                    </th>
                 
                
                {{--     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action
                    </th> --}}
                </tr>
            </thead>
            <tbody>

            @foreach ($ranges as $item)
        <tr style="font-size: 13px">
           
              <td>
                 {{$item->conclusion}}
              </td>
              <td class="text-center">
                  <p class="text-xs font-weight-bold mb-0">
                    <div class="table-responsive p-0 bg-light">
                      <table class="table align-items-center mb-0">
                          <thead>
                              <tr class="table-info">
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Age range
                                  </th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                             Content
                                  </th>
                               
                              
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $rec )
                            @if($rec->rangeID == $item->id)
                            <tr>
                              <td>
                                @foreach ($age as $uage)
                                    @if($uage->id == $rec->ageID)
                                  {{$uage->start." - ".$uage->end}}
                                    @endif
                                @endforeach

                              </td>
                              <td style="font-size: 12px">{{$rec->contents}}</td>
                              <td class="text-center">
                                <a href="#" class="mx-3" 

                                data-bs-toggle="modal" data-bs-target="#editmodal"
                                data-bs-toggle="tooltip"
                                    data-bs-original-title="Edit recommendation">
                                    <i class="fas fa-edit text-secondary"></i>
                                </a>


<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title fs-5" id="exampleModalLabel">Update Recommendation</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('rec.update')}}" method="post">
        @csrf
     
      <div class="modal-body">
        <div class="mb-2" >
          <h6 style="font-weight: normal;text-align:left">Recommendation</h6>
      <textarea name="content" required placeholder="Type your Recommendation here.." style="font-size:14px" class="form-control" id="" cols="30" rows="10">{{$rec->contents}}</textarea>
      <input type="hidden" name="id" value="{{$rec->id}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm"  data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
                                <span onclick="Delete_rec({{$rec->id}})">
                                    <i class="cursor-pointer fas fa-trash text-secondary "></i>
                                </span>
                            </td>
                            </tr>
                            @endif
                         @endforeach
                            
                            
                          </tbody>
                      </table>
                  </div>
              

             
              
                  </p>
              </td>
            
        
           
        
            @endforeach 
              
              
            </tbody>
        </table>
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
  text: "Action cannot be un done.",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location.href="{{route('rec.destroy')}}?id="+id;
  }
});
}

</script>
  </main>


