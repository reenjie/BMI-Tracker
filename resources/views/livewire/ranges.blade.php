<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
      <div class="row">
      
        <div class="container">
          <div class="card">
            <div class="card-body">
              
       <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                     BMI
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Start
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      End
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      DateCreated
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      LastModified
                    </th>
                
                {{--     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action
                    </th> --}}
                </tr>
            </thead>
            <tbody>

            @foreach ($data as $item)
            <tr>
           
              <td>
                 {{$item->conclusion}}
              </td>
              <td class="text-center">
                  <p class="text-xs font-weight-bold mb-0">{{$item->start}}</p>
              </td>
              <td class="text-center">
                  <p class="text-xs font-weight-bold mb-0">{{$item->end}}</p>
              </td>
              <td class="text-center">
                  <p class="text-xs font-weight-bold mb-0">{{date('@h:m a F j,Y',strtotime($item->created_at))}}</p>
              </td>
              <td class="text-center">
                <p class="text-xs font-weight-bold mb-0">{{date('@h:m a F j,Y',strtotime($item->updated_at))}}</p>
            </td>
           
             
                {{--  <td class="text-center">
                 
               <span>
                      <i class="cursor-pointer fas fa-trash text-secondary"></i>
                  </span> 
              </td>--}}
          </tr>
            @endforeach 
              
              
            </tbody>
        </table>
    </div>
            </div>
          </div>

        </div>

        
    </div>
  </main>


