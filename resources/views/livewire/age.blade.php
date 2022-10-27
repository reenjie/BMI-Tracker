<div>
  <div class="mt-2 container ">
    <div class="card mb-5">
        <div class="card-body">
            <button  class="btn bg-gradient-primary btn-sm mb-0" >Add Range</button>
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
                                    <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                        data-bs-original-title="Edit recommendation">
                                        <i class="fas fa-edit text-secondary"></i>
                                    </a>
                                    <span>
                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
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
