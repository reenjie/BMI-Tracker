<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="container">
          <div class="card">
            <div class="card-body">
              
              <button  class="btn bg-gradient-primary btn-sm mb-0" >Add Recommendation</button>
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
                                <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                    data-bs-original-title="Edit recommendation">
                                    <i class="fas fa-edit text-secondary"></i>
                                </a>
                                <span>
                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
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
  </main>


