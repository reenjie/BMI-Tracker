<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title fs-5" id="exampleModalLabel">Add Administrator</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('user.store')}}" method="POST">
          @csrf
       
        <div class="modal-body">
            <div>
                <h6 style="font-size:13px">
                    Email
                </h6>
                <input type="text" name="email" class="form-control sm" style="font-size:13px">
            </div>


             <div>
                <h6 style="font-size:13px">
                   Name
                </h6>
                <input type="text" name="name" class="form-control sm" style="font-size:13px">
            </div>

            <div>
                <h6 style="font-size:13px">
                   Gender
                </h6>
             <select name="gender" class="form-select" id="">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
             </select>
            </div>

            <div>
                <h6 style="font-size:13px">
                   Password By Default :
                </h6>
                <input type="text" id="pass" name="password" class="form-control sm" style="font-size:13px" value="{{date('Ymd')}}_admin" >
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