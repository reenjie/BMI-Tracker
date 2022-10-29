<div>
  <div class="mt-2 container ">
    <div class="card mb-5">
        <div class="card-body">
            <button  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn bg-gradient-primary btn-sm mb-0" >Add Range</button>


  <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title fs-5" id="exampleModalLabel">Add Age Range</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('age.store')}}" method="post">
            @csrf
        
        <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <h6>Start</h6>
                <input type="number"
               class="form-control" name="start">
            </div>
            <div class="col-md-6">
                <h6>End</h6>
                <input type="number" class="form-control" name="end">
            </div>
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

                @if(session()->has('error'))
                    <div class="alert mt-2 mb-2 " style="background-color: rgba(255, 134, 134, 0.26);color:rgb(150, 22, 22); border-radius:5px;font-size:13px">
                        <span >
                        Unable to Add :: {{session()->get('error')}}!
                        </span>
                    </div>
                @endif

              


            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Start
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                              End
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Created
                            </th>
        
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                               Action
                                </th>
                              
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr style="font-size:13px">
                                <td class="ps-4">
                                   {{$item->start}}
                                </td>
                                <td>
                                    {{$item->end}}
                                </td>
                                <td class="text-center">
                                    {{date('@h:m a F j, Y',strtotime($item->created_at))}}
                                </td>
                                <td class="text-center">
                             
                                    <span onclick="Delete_rec({{$item->id}})">
                                        <i class="cursor-pointer fas fa-times text-secondary"></i>
                                    </span>
                                </td>
                                
                            </tr>   
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
    window.location.href="{{route('age.destroy')}}?id="+id;
  }
});
}

</script>
