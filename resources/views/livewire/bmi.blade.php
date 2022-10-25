<section>
    <div class="page-header section-height-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">
                     
                      
                        <div class="card-header pb-0 text-left bg-transparent">
                            @if(session()->has('Temp_userBMI'))
                            <h5>Your BMI is <br/></h5>
                            <h3 class="font-weight-bolder text-info text-gradient">{{ __(session()->get('Temp_userBMI')) }}</h3>
                            <span class="badge bg-success">Normal</span>


                            @else
                            <h3 class="font-weight-bolder text-info text-gradient">{{ __('Calculate BMI') }}</h3>
                            <p class="mb-0">Body Mass Index</p>
                            @endif
                          
                        </div>
                        <div class="card-body">
                            @if(session()->has('Temp_userBMI'))
                                @include('livewire/tempBMI')
                            @else 
                            <form action="{{route('calc.bmi')}}" method="post">
                                @csrf
                            <label style="font-size: 15px" for="">Height
                            <input name="height"  class="form-control" placeholder="in Centimeters" autofocus required />
                        </label>
                        <label style="font-size: 15px" for="">Weight
                            <input name="weight" class="form-control" placeholder="in Kilograms" required />
                        </label>
                        <button type="submit" class="btn btn-info mt-3">
                            Calculate
                        </button>
                    </form>

                            @endif
                         
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                       
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                            style="background-color:#9bfb99"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
