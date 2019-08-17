@extends('layouts.app')

@section('content')
<?php 
//echo '<pre>';print_r($role->permissions);die();
?>
<div class="container">
    <a class="btn btn-primary" href="{{ route('roles.index') }}"> <i class="fa fa-angle-double-left"></i> Back</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Role Detail</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive-xs">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td><strong>Name:</strong></td>
                                    <td>{{ $role->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Slug:</strong></td>
                                    <td>{{ $role->slug }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div> <!-- /.table-stats -->
                    <div class="form-group">
                        <label for="module_id"><strong>Select Module</strong></label>
                        <select name="module_id" id="module_id" class="standardSelect form-control" tabindex="1" data-placeholder="Choose a Module...">
                            <option value=""></option>
                            <option value="{{ $role->id.'+1' }}">Post</option>
                        </select>
                    </div>
                    <div class="table-responsive-xs">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Permission</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="module">
                                
                            </tbody>
                        </table>
                        <button id="save-permissions" class="btn btn-success" disabled>Save Permissions</button>
                        <div id="msg"></div>
                    </div> <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection