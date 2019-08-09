@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif

    <a class="btn btn-success pull-right" href="{{ route('posts.create') }}"> <i class="fa fa-plus"></i> New Post</a>
    
    @include('posts/_search')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title"> <i class="fa fa-credit-card"></i> Posts</strong>
                    <span class="pull-right">Showing <strong>{{ $posts-> firstItem() }}-{{ $posts-> lastItem() }}</strong> of <strong>{{ $posts->total() }}</strong> items</span>
                </div>
                <div class="table-stats order-table ov-h table-responsive-xs">

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Body</th>
                            <th>User</th>
                            <th width="280px">Action</th>
                        </tr>

                        @foreach ($posts as $post)

                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->body }}</td>
                            <td></td>
                            <td>
                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}"><i class="fas fa-quidditch"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </table>

                    {!! $posts->links() !!}
                </div> <!-- /.table-stats -->
            </div>
        </div>
    </div>
</div>
@endsection