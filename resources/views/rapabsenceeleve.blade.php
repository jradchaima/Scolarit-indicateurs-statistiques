  
@extends('layouts.sidebar1')

@section('content')
 <style>
 .container {
	position: absolute;
	top: 30%;
	left: 50%;
	transform: translate(-50%, -50%);
}

table {
	width: 800px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}


td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
}

th {
	text-align: left;
}


	th{
		background-color:#FFF;
	}


tbody {
	tr {
		&:hover {
			background-color: rgba(255,255,255,0.3);
		}
	}
	td {
		position: relative;
		&:hover {
			&:before {
				content: "";
				position: absolute;
				left: 0;
				right: 0;
				top: -9999px;
				bottom: -9999px;
				background-color: rgba(255,255,255,0.2);
				z-index: -1;
			}
		}
	}
}
 </style>

<header>{{Auth::user()->representant}}
    
    <h3>{{ Auth::user()->name}}</h3>
</header>
<ul>
<li><a href="/etablissement"><i class="fas fa-qrcode " class="nav-link"></i>Aceuil</a></li>
<li><a href="/layouts/recommondation"><i class="fas fa-clipboard" ></i>Recommondation</a></li>
<li><a href="/lesrapports"><i class="fas fa-stream"></i>Les Rapports</a></li>


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



<div class="container" style="margin-left:10%;margin-top:5%">

<br><br>
	<table>
		<thead>
			<tr>
			
				<th>Absence Eleve</th>
				<th>Nombre Absence</th>
				
			
			</tr>
		</thead>
    <tbody>
            
            <tr>
              
                <td> Maladie de longue durée</td>

                <td>

                <?php
               $k = Auth::user()->etabliss_id;
                $m ="maladie de longue duree";
$san = DB::table('absenceeleves')->where([
    ['id_etabl', '=', $k],
    ['type_abs','=' ,$m],
    
])->count();


echo($san);

?>

       
            </tr>

			
    <tr>
      
    <td> Maladie normale</td>
    <td>
    <?php
  
    $k1 = Auth::user()->etabliss_id;
                $m1 ="maladie normale";
$san1 = DB::table('absenceeleves')->where([
    ['id_etabl', '=', $k1],
    ['type_abs','=' ,$m1],
    
])->count();
echo($san1);

?>
</td>


    </tr>


	<tr>
      
	  <td> Autre raison</td>
	  <td>
	  <?php
	
	  $k1 = Auth::user()->etabliss_id;
				  $m1 ="autre raison";
  $san1 = DB::table('absenceeleves')->where([
	  ['id_etabl', '=', $k1],
	  ['type_abs','=' ,$m1],
	  
  ])->count();
  echo($san1);
  
  ?>
  </td>
  
  
	  </tr>
    </tbody>
  </table>
 
       
      </div>
    </div>
  </div>
</section>

@endsection