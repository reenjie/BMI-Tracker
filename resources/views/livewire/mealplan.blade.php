<div>
    <div class="container">
  
      
        <div class="row mt-1 mb-4">
          <div class="container" >
            <div class="row">

            @if(session()->has('success'))
       
       <div class="alert  mb-2 mt-2 alert-dismissible fade show" style="background-color:rgb(209, 248, 205);font-size:13px" role="alert">
         {{session()->get('success')}}
         <button type="button" style="color:black" class="btn-close " data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
       </div>
     @endif

     <span class="text-danger" style="font-size:14px"></span>

                   @php 
                    $week = DB::select('SELECT * FROM `weeks`');

                    $day  = DB::select('SELECT * FROM `days`');
                   @endphp

                @foreach($week as $w)

               <div class="col-md-6">
               <div class="card mb-4 shadow">
                    <div class="card-body">
                    <h4>Week ( {{$w->week}} )</h4>
                    <hr>
                    @foreach($day as $d)
                        @if($d->weekid == $w->id)
                    <div class="card mb-2">
                        <div class="card-header">
                            <h6 style="font-size:13px">Day {{$d->day}} </h6>
                            <button class="btn btn-light text-info btn-sm"  data-bs-toggle="modal" data-bs-target="#addModal{{$d->id}}">Add Mealplan</button>


                      

<!-- Modal -->
<div class="modal fade" id="addModal{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Meal-Plan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('meal.saveplan')}}"  method ="post">
        @csrf
     
      <div class="modal-body">
        <h6>Schedule</h6>
        <select name="schedule" required class="form-select" id="">
            @php
                $bf = DB::select('select * from mealplans where dayid='.$d->id.' and schedule = 1 ');
                $lu = DB::select('select * from mealplans where dayid='.$d->id.' and schedule = 2 ');
                $di = DB::select('select * from mealplans where dayid='.$d->id.' and schedule = 3 ');
            @endphp
            @if(count($bf) <= 0)
            <option value="1">Breakfast</option>
            @endif
            @if(count($lu) <= 0)
            <option value="2">Lunch</option>
            @endif
            @if(count($di) <= 0)
            <option value="3">Dinner</option>
            @endif
          
            
           
        </select>  

        <h6>Contents </h6>
        <textarea name="content" required class="form-control" id="" cols="30" placeholder="State all Recommended MealPlans" rows="10"></textarea>
        <input type="hidden" name="dayid" value="{{$d->id}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
                        </div>
                        <div class="card-body">

                        @php
                        $dayid = $d->id;
                        $mealplans = DB::select('SELECT * FROM `mealplans` where dayid = '.$dayid.' order by schedule asc ');
                        @endphp
                        <div class="row">
                        @foreach($mealplans as $ml )
                            @if($ml->schedule == 1) 
                            <div class="col-md-4">
                            <h6 style="font-size:12px;font-weight:normal">
                            BreakFast <i class="fas fa-sunrise"></i>
                            <br>
                            <span style="font-size:14px;font-weight:bold">
                           <textarea name="" class="contentedit" data-id="{{$ml->id}}" style="width:100%;border:none;outline:none;resize:none" rows="5"  id="" >{{$ml->content}}</textarea>
                        </span>

                            </h6>
                            </div>
                            
                      
                            @endif

                            @if($ml->schedule == 2)
                            <div class="col-md-4">
                            <h6 style="font-size:12px;font-weight:normal">
                           Lunch
                            <br>
                            <span style="font-size:14px;font-weight:bold">
                            <textarea name="" class="contentedit" data-id="{{$ml->id}}" style="width:100%;border:none;outline:none;resize:none;" rows="5"  id="" >{{$ml->content}}</textarea>
                        </span>

                            </h6>
                            </div>
                            @endif

                            @if($ml->schedule == 3)
                            <div class="col-md-4">
                            <h6 style="font-size:12px;font-weight:normal">
                            Dinner
                            <br>
                            <span style="font-size:14px;font-weight:bold">
                            <textarea name="" class="contentedit" data-id="{{$ml->id}}" style="width:100%;border:none;outline:none;resize:none;" rows="5"  id="" >{{$ml->content}}</textarea>
                        </span>

                            </h6>
                            </div>
                            @endif  


                        @endforeach
                        </div>

                      

                        </div>
                    </div>
                        @endif
                    @endforeach

                    </div>
                </div>
               </div>

                @endforeach
                </div>
          
          </div>
        </div>

    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.contentedit').change(function(){
        var id = $(this).data('id');
        var content = $(this).val();
        
            $.ajax({
            method: "GET",
            url: "{{route('meal.updatecontent')}}",
            data: { id: id, content: content }
            })
            .done(function( msg ) {
            
            });
        
    })
</script>
