@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row">
          <h1>Payment Type Management</h1>
       </div> 
        <div class="row">

            <div class="col-xs-6">
                <!--                           
                <form id= "payment" name="payment" action="{{route('payment_type')}}" method="post">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors
                        </div>
                    @endif

                    {!! Form::token() !!}
                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        <label for="type">Payment Type</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="Payment type" value="{{ old('type') }}">
                        @if($errors->has('type'))
                            <span class="help-block">{{ $errors->first('type') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{ old('description') }}">
                        @if($errors->has('description'))
                            <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <button id="payment_save" type="submit" class="btn btn-success">Save Payment Type</button>
                </form>
                -->
                {!! Form::open(array('route' => 'payment_type', 'class' => 'form')) !!}

                        <div class="form-group">
                            {!! Form::label('Payment Type') !!}
                            {!! Form::text('p_kind', null, 
                                array('required', 
                                    'class'=>'form-control', 
                                    'placeholder'=>'Payment type')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Description') !!}
                            {!! Form::text('description', null, 
                                array('required', 
                                    'class'=>'form-control', 
                                    'placeholder'=>'Description')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Save payment type', 
                            array('class'=>'btn btn-success')) !!}
                        </div>

                {!! Form::close() !!}
            </div>
        </div>

        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="row">
                  <div class="col-sm-8">
                    <h3 class="box-title-center"><h2>Payments Type list</h2></h3> 
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Payment Type</th>
                    <th>Creation Date</th>
            </tr>
                </thead>
                <tbody>
                  <div>
                      @foreach($pays as $pay)  
                  <tr>       
                        <td> {{ $pay->payment_type_id }} </td>
                        <td> {{ $pay->p_kind }} </td>
                        <td> {{ $pay->created_at }} </td>
                  </tr>           
                      @endforeach  
            </div> 
                          
                </tbody>
                <tfoot>
                <tr>
                        <th>Payment ID</th>
                        <th>Payment Type</th>
                        <th>Creation Date</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



    </div>
    
@endsection