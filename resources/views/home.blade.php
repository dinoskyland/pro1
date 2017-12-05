@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns is- is-marginless is-centered">
            <div class="column is-7">
                <nav class="card">
                <!--  At first delete the header
                    <header class="card-header">
                        <p class="card-header-title">
                            Dashboard
                        </p>
                    </header>
                -->
                    <div class="card-content">

                        <div class="content">
                            <div class="title m-b-md">
                            Subscription Project
                                
                            </div>

                            <div class="links">
                                <a href="{{route('euser')}}">Users</a>
                                <a href="{{route('product')}}">Product Features</a>
                                <a href="{{route('time_unit')}}">Basic information process</a>
                                <a href="{{route('sub_sum')}}">Subscription Summary</a>                  
                            </div>

                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
