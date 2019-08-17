@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12">
            <a href="{{ route('permissions.index') }}" class="btn btn-primary pull-right">Back</a>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Update Permission</strong>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" permission="form" method="POST" action="{{ route('permissions.update', ['permission' => $permission->id]) }}">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="permission-name" type="text" class="form-control" name="name" value="{{ old('name',$permission->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="col-md-4 control-label">Slug</label>

                            <div class="col-md-6">
                                <input id="permission-slug" type="text" class="form-control" name="slug" value="{{ old('slug', $permission->slug) }}" required autofocus readonly>

                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
