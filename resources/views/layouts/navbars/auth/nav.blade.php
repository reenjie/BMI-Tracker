<main class="main-content mt-1 border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
             {{--    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-md"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
             {{ str_replace('-', ' ', Route::currentRouteName())}} 
                     
                    </li>
                </ol> --}}
                <h6 class="font-weight-bolder mb-0 text-capitalize">
                 {{ str_replace('-', ' ', Route::currentRouteName()) }} </h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            
           
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                            <livewire:auth.logout />
                        </a>
                    </li>
                  
                 
                
                </ul>
            </div>
        </div>
    </nav>

    @if(session()->has('changesuccess'))
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
       swal("Password Changed Successfully!", "You have changed your password!", "success");
    </script>
     {{session()->forget('changesuccess')}}
    @endif

    @if(auth()->user()->firstlogin == 0)
     
<button type="button"  class="btn btn-primary d-none" data-bs-toggle="modal" id="firstloginbtn" data-bs-target="#firstlogin">
  asdsad
  </button>
  
  <!-- Modal -->
  <div class="modal fade " id="firstlogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm ">
      <div class="modal-content ">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('user.changepass')}}" method="post">
            @csrf
        <div class="modal-body">
            
            <div>
              
                <h6 style="font-size:13px">
                  New Password :
                </h6>
                <input type="password" required id="pass" name="password" class="form-control sm" style="font-size:13px"  >
            </div>
            <div>
                <h6 style="font-size:13px">
                Re-Enter Password :
                </h6>
                <input type="password" required id="repass"  class="form-control sm" style="font-size:13px"  >
                <div class="invalid-feedback">
                    <span class="text-danger" style="font-size:12px">
                    Password Does not Match!
                    </span>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button id="btnsave" type="submit" class="btn btn-primary btn-sm">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>

    $(document).ready(function(){

		$('#firstloginbtn').click();

        $('#repass').keyup(function(){
            var pass = $('#pass').val();
            var repass = $(this).val();

            if(pass != repass){
                $('#btnsave').attr('disabled',true);
                $(this).addClass('is-invalid');
            }else if (pass == repass){
                $('#btnsave').removeAttr('disabled');
                $(this).removeClass('is-invalid');
            }
            

        })
	
});
  </script>

    @endif

