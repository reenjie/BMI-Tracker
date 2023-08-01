<!DOCTYPE html>
<html>
<head>
    <title>Print Meal-Plan</title>
   
    <style>
      
        @media print {
            body {
                font-size: 15px; /* Change font size for printing */
            }
            #day {
                display: flex;
             flex-direction: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Your meal-plan content goes here -->
              @php 
                    $week = DB::select('SELECT * FROM `weeks` where id in (select weekid from days where id in (select dayid from mealplans where rangeid = '.$rid.'));');

                    $day  = DB::select('SELECT * FROM `days` where id in (select dayid from mealplans where rangeid = '.$rid.');');
                   @endphp

                 
        <h2>Meal Plan</h1>

        @foreach($week as $w)
        <h4>Week  {{$w->week}} </h5>
     
        @foreach($day as $d)
     
       
     
        @if($d->weekid == $w->id)
        <h5>Day{{$d->day}}</h6>
       
     
        <ul>
        @php
                        $dayid = $d->id;
                        $mealplans = DB::select('SELECT * FROM `mealplans` where dayid = '.$dayid.' and rangeid ='.$rid.' order by schedule asc ');
                        @endphp
                        @if(count($mealplans)>=1)
                        @foreach($mealplans as $ml )
                            @if($ml->schedule == 1) 
                            <li>Breakfast - {{$ml->content}}</li>
                            
                      
                            @endif

                            @if($ml->schedule == 2)
                            <li> Lunch - {{$ml->content}}</li>
                            @endif

                            @if($ml->schedule == 3)
                            <li>Dinner - {{$ml->content}}</li>
                            @endif  


                        @endforeach
                        @endif
            </ul>
        @endif 
      
       
        @endforeach
       
        @endforeach
       
          
         
            <!-- Add more meal items here -->
       
    </div>

  <script>
    window.print();

    window.onafterprint = function() {
    window.close();
  };
  </script>
</body>
</html>
