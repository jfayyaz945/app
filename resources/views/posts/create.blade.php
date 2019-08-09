@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())

        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>
        </div>

    @endif

    <a class="btn btn-primary" href="{{ route('posts.index') }}"> <i class="fa fa-angle-double-left"></i> Back</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Post Form</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="title"><strong>Title*</strong></label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="slug"><strong>Slug*</strong></label>
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="body"><strong>Body</strong></label>
                                    <textarea type="text" id="body" name="body" class="form-control" placeholder="Body"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection