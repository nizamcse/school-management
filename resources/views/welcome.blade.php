@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                {{ Auth::user() }}
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
@endsection
