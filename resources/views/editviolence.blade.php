
@extends('layouts.sidebar')
@section('content')
<header>
    
    {{ Auth::user()->name}}
</header>

                                    </li>
</ul>
</div>
<section>




        <form action="{{ url('violenceupdate/'.$violence->id)}}"   method="post" style="margin-left:10%;">
        {{csrf_field()}}
        {{ method_field('PUT')}}
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="text" name="date" class="form-control" value="{{ $violence->violence_date }}">
          </div>
   
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Type de violence</label>
            <input type="text"   name="type_violence" class="form-control" value="{{ $violence->type_violence }}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cause violence</label>
            <input type="text"  name="cause_violence"class="form-control" value="{{ $violence->cause_violence }}">
          </div>
       
      </div>
      <div class="modal-footer">
        <a href=""  class="btn btn-secondary" >BACK</a>
        <button type="submit" class="btn btn-primary">UPDATE</button>
      </div>
      </form>
    </div>
  </div>
</div>
</section>


   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection