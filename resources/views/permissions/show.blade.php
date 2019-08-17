@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary" href="{{ route('permissions.index') }}"> <i class="fa fa-angle-double-left"></i> Back</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Permission Detail</strong>
                </div>
            <div class="table-responsive-xs">
                <table class="table">
                    <thead>
                        <tr>
                            <td><strong>Name:</strong></td>
                            <td>{{ $permission->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Slug:</strong></td>
                            <td>{{ $permission->slug }}</td>
                        </tr>
                    </thead>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
    </div>
@endsection