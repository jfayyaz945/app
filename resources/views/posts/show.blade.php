@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary" href="{{ route('posts.index') }}"> <i class="fa fa-angle-double-left"></i> Back</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Post Detail</strong>
                </div>
            <div class="table-responsive-xs">
                <table class="table">
                    <thead>
                        <tr>
                            <td><strong>Title:</strong></td>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <td><strong>Slug:</strong></td>
                            <td>{{ $post->slug }}</td>
                        </tr>
                        <tr>
                            <td><strong>Body:</strong></th>
                            <td>{{ $post->body }}</td>
                        </tr>
                    </thead>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
    </div>
@endsection