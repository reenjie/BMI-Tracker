<div>
   <div class="container">
    <div class="">
        <div class="card card-plain mt-2">
         
          
            <div class="card-header pb-0 ">
              
                <h3 class="font-weight-bolder text-info text-gradient">{{ __('Calculate BMI') }}</h3>
                <p class="mb-0">Body Mass Index</p>
               
              
            </div>
            <div class="card-body">
             
                <form action="{{route('calc.bmi')}}" method="post">
                    @csrf
                <label style="font-size: 15px" for="">Height
                <input name="height" type="number"  class="form-control" placeholder="in Centimeters" autofocus required />
            </label>
            <label style="font-size: 15px"  for="">Weight
                <input name="weight" type="number" class="form-control" placeholder="in Kilograms" required />
            </label>
            <button type="submit" class="btn btn-info mt-3">
                Calculate
            </button>
        </form>

             
             
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
           
            </div>
        </div>
    </div>
 
</div>

   </div>
</div>