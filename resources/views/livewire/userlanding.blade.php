<div>
    
    @if($userBMI == 0 )
        @include('livewire/CalculateBMI')
    @else
    @empty($userStatistics)
    @if(auth()->user()->isverified == 0)

   <div class="container" style="text-align: center">
    <img src="{{asset('assets/img/lock.svg')}}" style="width: 50%"  alt="">
   </div>
   <div class="mb-5">
      <h6 style="text-align: center">
        Your are not yet Verified. Please Contact Administrator to verify your account.
      </h6>
   </div>
    @else
    @include('livewire/select')
    @endif
       
        @else 

       @include('livewire/Information')
    @endempty


    @endif

</div>
