@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('roles.create') }}" class="btn btn-success pull-right">Create</a>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Roles</strong>
                </div>
                <div class="card-body">
                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col" width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td>
                                        <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-key"></i></a>
                                            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-user"></i></a>
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil-alt"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection