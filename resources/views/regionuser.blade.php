  
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
<li><a href="#"><i class="fas fa-qrcode"></i>Aceuil</a></li>
<li><a href="{{ route('user.index') }}"><i class="fas fa-address-book"></i>Les utilisateurs</a></li>
<li><a href="#"><i class="fas fa-stream"></i> rapports mensuels</a></li>
<li><a href="#"><i class="fas fa-chart-pie"></i>les  indicateurs</a></li>

<li><a href="#"><i class="fas fa-sliders-h"></i> Les statistiques</a></li>
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



<div class="container">
<button style="background-color:#1E90FF;width:100px;height:30px;border:none;border-radius:5px" type="button" data-toggle="tooltip" data-placement="top" title="Ajouter"><a href="">Ajouter</a></button>
<br><br>
	<table>
		<thead>
			<tr>
			
				<th>Nom du responsable</th>
				<th>Nom du région</th>
				<th>Email du responsable</th>
				<th>opérations</th>
			</tr>
		</thead>
    <tbody>
        @foreach ($regionuser as $region)           
            <tr>
              
                <td> {{ $region->name }}</td>
                <td> {{ $region->representant }}</td>
                <td> {{ $region->email }}</td>
                <td>
                                            <!-- Call to action buttons -->
                                         
                                                   
                                              
                                             
                                                    <button style="background-color:#FFD700;width:70px;border:none;border-radius:5px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                     
                                                    <button style="background-color:#DC143C;width:70px;border:none;border-radius:5px" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                              
                                        </td>
            </tr>
        @endforeach
    </tbody>
  </table>

</section>

@endsection