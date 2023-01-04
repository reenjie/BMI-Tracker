<div>
    <div class="container">
  
      
        <div class="row mt-1 mb-4">
          <div class="container" >
            <div class="row">

          

     

     <span class="text-danger" style="font-size:14px"></span>

                   @php 
                    $week = DB::select('SELECT * FROM `weeks`');

                    $day  = DB::select('SELECT * FROM `days`');

                    $ranges = DB::select('SELECT * FROM `ranges`');
                   @endphp

            <div class="card">
              <div class="card-body">
               
                  <select name="" class="selecttabs form-select" id="selecttabs">
                  
                    <option value="">Select BMI-ranges to 
                      Manage </option>
                    @foreach ($ranges as $item)
                    <option value="{{$item->id}}">{{$item->conclusion}}</option>
                        
                    @endforeach
                  </select>

                  <hr>

                  <h6>
                    @foreach ($ranges as $item)
                      @if($item->id == request('id'))
                      {{$item->conclusion}}
                      @endif
                        
                    @endforeach

                  </h6>
                  <div id="content">
                    @if(request('id'))
                    @php
                      $rangeid = request('id');
                    @endphp
                      @include('livewire.meal_content');
                    @endif

                  </div>
              </div>
            </div>
                </div>
          
          </div>
        </div>

    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

  $('#selecttabs').change(function(){
    var id = $(this).val(); 
    $('#content').html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
    $.ajax({
            method: "GET",
            url: "{{route('meal.manage')}}",
            data: { range: id }
            })
            .done(function( msg ) {
              window.location.href='{{route('Meal-Plan')}}?id='+id;
            });

  })
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
