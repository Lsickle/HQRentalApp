@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
    @foreach($data as $item)
        <div class="col-sm-4 mb-5">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h6 class="card-title float-left text-truncated">{{$item->title}}</h6>
                    <a class="btn btn-primary float-right" href="data/{{$item->id}}">See more</a>
                </div>
                <div class="card-body overflow-auto" style="max-height: 50vh;">
                    <p>
                        {{$item->description}}
                    </p> 
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
