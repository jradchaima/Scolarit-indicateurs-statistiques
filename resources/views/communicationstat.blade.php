@extends('layouts.sidebar')
@section('content')
<header>{{Auth::user()->representant}}
    
    <h3>{{ Auth::user()->name}}</h3>
</header>
<ul>
<li><a href="/region"><i class="fas fa-qrcode"></i>Aceuil</a></li>
<li><a href="#"><i class="fas fa-clipboard"></i>Recommondation</a></li>
<li><a href="#"><i class="fas fa-stream"></i>Rapport mensuel</a></li>
<li><a href="#"><i class="fas fa-chart-pie"></i>Les indicateurs</a></li>

<li><a href="{{ route('sancstat') }}"><i class="fas fa-sliders-h"></i>Les statistiques</a></li>
<li>
          <a  href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     <i class="fas fa-sign-out-alt"></i>{{ __('Déconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
</ul>
</div>
<section>
    


<div class="wrapper d-flex align-items-stretch" style="margin-left:15%;margin-top:5%;">

<div id="content" class="p-4 p-md-5 pt-5">
     

     <div id="chartContainer" style="height: 550px; max-width: 920px; margin-top: 30px auto;"></div>
     <br>
            <?php
             $a1 =  $etabliss[0]->id_etabl;
             $a = DB::table('etablissements')->where('id','=',$a1)->get();
             foreach ($a as $n){
                 $l = $n->nom;
                
             }
             
             $av=  $etabliss[0]->order_count;
        

      
      
          $bv=  $etabliss[1]->order_count;
          $b1 =  $etabliss[1]->id_etabl;
          $b = DB::table('etablissements')->where('id','=',$b1)->get();
          foreach ($b as $n1){
              $l1 = $n1->nom;
          }

          $c1 =  $etabliss[2]->id_etabl;
          $c = DB::table('etablissements')->where('id','=',$c1)->get();
          foreach ($c as $n2){
              $l2 = $n2->nom;
          }
          $cv =  $etabliss[2]->order_count;

          $d1 =  $etabliss[3]->id_etabl;
          $d = DB::table('etablissements')->where('id','=',$d1)->get();
          foreach ($d as $n3){
              $l3 = $n3->nom;
          }
          $dv =  $etabliss[3]->order_count;

          $f1 =  $etabliss[4]->id_etabl;
          $f = DB::table('etablissements')->where('id','=',$f1)->get();
          foreach ($f as $n4){
              $l4 = $n4->nom;
          }
          $fv =  $etabliss[4]->order_count;
       ?>
        
         
          
     <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
     <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
     </div>
   </div>
   <script>
window.onload = function () {
//Better to construct options first and then pass it as a parameter
var options = {
 title: {
   text: "comunication statistiques"              
 },
 data: [              
 {
   // Change type to "doughnut", "line", "splineArea", etc.
   type: "column",
   dataPoints: [
    
     { label: "{{ $l}}",  y: {{$av}}  },
     { label: "{{ $l2 }}", y: {{$cv}}  },
     { label: "{{ $l1 }}", y: {{$bv}} },
     { label: "{{ $l4 }}",  y: {{$fv}}  },
     { label: "{{ $l3 }}",  y: {{$dv}}  }
     
   ]
 }
 ]
};
$("#chartContainer").CanvasJSChart(options);
}
</script>
@endsection