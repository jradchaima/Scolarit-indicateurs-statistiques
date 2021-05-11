  
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



<fieldset  style="margin-left:8%">
        <legend>Modifier utilisateur établissement</legend>
        <form action="{{ route('user.update',$etabliss->id)  }}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="Nom du responsable<">Nom du responsable</label>
                        <input type="text" name="name" value="{{ old('name')  ?? $etabliss->name}}" id="name" class="form-control" placeholder="" >
                      @error('name')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="Nom du établissement">Nom du établissement</label>
                      <input type="text" name="representant" value="{{ old('representant')  ?? $etabliss->representant}} " id="representant" class="form-control" placeholder="" >
                      @error('representant')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="Email">Email du responsable</label>
                      <input type="email" name="email"  value="{{ old('email')  ?? $etabliss->email }}" id="email" class="form-control" placeholder="" >
                      @error('email')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                </div>
             
            <div class="row">
                <button type="submit" class="btn btn-outline-primary btn-block">Confirm update!</button>
            </div>
        </form>
    </fieldset>
    </section>
    @endsection