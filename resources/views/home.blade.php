@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @if(auth()->user()->can("isAdmin"))
                        <h2>You Are Admin </h2>
                    @endif
                    @cannot('isUser')
                            <h2>You Are not user </h2>

                        @endcannot
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
