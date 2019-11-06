@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="card-title text-white"><b>Item #{{$data->id}} info</b></h3>
                    </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$data->title}}</h5>
                                <p class="card-text">{{$data->description}}</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-warning float-left" href="/data/{{$data->id}}/edit">Edit</a>
                            <form action="/data/{{$data->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger float-right">Delete</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
</div>
@endsection
@section('NewScript')
    @include('layouts.script')
@endsection