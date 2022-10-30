
<h6 class="text-info" style="font-weight:normal;font-size:14px">Recommendation</h6>
<p style="font-size: 15px">
@foreach ($ranges as $item)
    @php
        $id = $item->id;
    @endphp    
    
    <ul class="list-group list-group-flush" style="font-size: 13px">
        
        @foreach ($recommendation as $key => $rec)
            @if($rec->rangeID==$id)
              
                <li class="list-group-item">  {{$rec->contents}}</li>
                @if($loop->last)
                <li class="list-group-item"> <h6 style="font-size:13px;color:rgb(80, 80, 92)">Press Yes to Continue  ...</h6></li>
                @endif
            @endif
    @endforeach
      </ul>
  

@endforeach

</p>

<h6 style="font-size: 15px">Would you like to Continue?</h6>
<button onclick="window.location.href='{{route('login')}}'" class="btn btn-outline-info btn-sm">Yes</button>
<button onclick="window.location.href='{{route('endTempSession')}}'" class="btn btn-outline-primary btn-sm">No</button>