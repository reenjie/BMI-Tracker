<div>
    
    @if($userBMI == 0 )
        @include('livewire/CalculateBMI')
    @else
    @empty($userStatistics)
    <div class="container">
      <div class="card mt-5 mb-3 " style="background-color: rgb(250, 233, 185)">
          <div class="card-body">
              <div class="container">
                  <h5 class="" style="color: rgb(28, 74, 92)" style="font-weight: bold">Physical Activity</h5>
                  <span style="font-size:12px">
                  Select to Continue</span>
               
                  <div class="row align-items-stretch justify-content-start">
                      <div class="col-md-6 d-flex mb-2">
                        <div class="card shadow border-light border flex-fill">
                          <div class="card-body" style="font-weight: bold">
                            Sedementary
                            <br>
                            <h6 style="font-size: 13px">
                              Mostly Resting with a little or no Activity
                             </h6>
                          </div>
                          <div class="card-footer">
                           
                           
                             <form action="{{route('calc.dbwter')}}" method="post">
                              @csrf
                              <input type="hidden" name="kcal" value="30">
                           <button type="submit" class="btn btn-sm form-control btn-dark">
                            Select
                           </button>
                          </form>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 d-flex  mb-2">
                          <div class="card shadow border-light border ">
                            <div class="card-body" style="font-weight: bold">
                              Light

                              <br>
                              <h6 style="font-size: 13px">
                                Occupations that require minimal movement, mostly sitting/desk work or standing for long hours and/or with occasional walking (professional,clerical,technical workers,administrative and managerial staff,driving light vehicles (Cars, Jeepney) Housewives with light housework(dishwashing ,preparing food))
                                </h6>
                            </div>
                            <div class="card-footer">
                             
                           
                              <form action="{{route('calc.dbwter')}}" method="post">
                                  @csrf
                                  <input type="hidden" name="kcal" value="35">
                               <button type="submit" class="btn btn-sm form-control btn-dark">
                                Select
                               </button>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 d-flex  mb-2">
                          <div class="card shadow border-light border">
                            <div class="card-body" style="font-weight: bold">
                              Moderate
                              <br>
                              <h6 style="font-size: 13px">
                                Occupations that require extended periods of walking , pushing or pulling or lifting or carrying heavy objects (cleaning/domestic services,waiting table,homebuilding task,farming ,patient care)
                                </h6>
                            </div>
                            <div class="card-footer">
                             
                              
                              <form action="{{route('calc.dbwter')}}" method="post">
                                  @csrf
                                  <input type="hidden" name="kcal" value="40">
                               <button type="submit" class="btn btn-sm form-control btn-dark">
                                Select
                               </button>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 d-flex  mb-2">
                          <div class="card shadow border-light border">
                            <div class="card-body" style="font-weight: bold">
                              Very Active
                              <br>
                              <h6 style="font-size: 13px">
                                Occupations that require extensive periods of running , rapid movement, pushing or pulling heavy objects or tasks frequently requiring strenous effor and extensiv total body movements, (teaching a class or skill requiring active and strenous participation such as aerobics or physical education instructor, firefighting; masonry and heavy construction work; coal mining. manually shoveling , using heavy non-powered tools)
                                </h6>
                            </div>
                            <div class="card-footer">
                             
                            
                              <form action="{{route('calc.dbwter')}}" method="post">
                                  @csrf
                                  <input type="hidden" name="kcal" value="45">
                               <button type="submit" class="btn btn-sm form-control btn-dark">
                                Select
                               </button>
                              </form>
                            </div>
                          </div>
                        </div>
                  </div>

              </div>
          </div>
      </div>

      </div>
        @else 

       @include('livewire/Information')
    @endempty


    @endif

</div>
