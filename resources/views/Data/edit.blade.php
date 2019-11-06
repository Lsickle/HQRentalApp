@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h3 class="card-title">item #{{$data->id}} Edit</h3>
                    </div>
                    <form class="needs-validation" novalidate role="form" action="/data/{{$data->id}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        <div class="card-body">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <p>{{$error}}</p>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="input-title"><h5>Title</h5></label>
                                <input class="form-control" id="input-title" type="text" name="title" maxlength="32" value="{{$data->title}}">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    description is required...
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-description"><h5>Description</h5></label>
                                <textarea style="resize: vertical;" maxlength="65535" name="description" id="input-description" class="form-control" rows ="10">{{$data->description}}</textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    description is required...
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
@section('NewScript')
    @include('layouts.script')
@endsection