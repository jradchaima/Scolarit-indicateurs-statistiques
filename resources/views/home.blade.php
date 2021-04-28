  
@extends('layouts.sidebar')
@section('content')
<header>Centrale
    <br>
    <h3>{{ Auth::user()->name}}</h3>
</header>
<ul>
<li><a href="#"><i class="fas fa-qrcode"></i>Dashboard</a></li>
<li><a href="#"><i class="fas fa-link"></i>Shortcuts</a></li>
<li><a href="#"><i class="fas fa-stream"></i>Overview</a></li>
<li><a href="#"><i class="fas fa-calendar-week"></i>Events</a></li>
<li><a href="#"><i class="far fa-question-circle"></i>About</a></li>
<li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>
<li>
          <a  href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       
                                       <span class="fa fa-sign-out mr-3"> {{ __('Logout') }}</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
</ul>
</div>
<section></section>
  </body>
</html>
@endsection