@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Time Units</h1>
            <form action="{{route('time_unit')}}" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('kind') ? ' has-error' : '' }}">
                    <label for="kind">Time unit</label>
                    <input type="text" class="form-control" id="kind" name="kind" placeholder="Time unit" value="{{ old('kind') }}">
                    @if($errors->has('kind'))
                        <span class="help-block">{{ $errors->first('kind') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{ old('description') }}">
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Save Time unit</button>
            </form>
        </div>

        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">You are in the payment feature view</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    @foreach($pays as $pay)

                 <ul>
                         <p>  {{$pay->payment_id}} </p>
                         <p> {{$pay->p_kind}} </p>
                  </ul>

                  @endforeach                     

                <div>
                  @foreach($timeunits as $timeunit)

                 <ul>
                         <p>  {{$timeunit->time_unit_id}} </p>
                         <p> {{$timeunit->kind}} </p>
                  </ul>
                </div> 
                  @endforeach 
                   
                  
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection