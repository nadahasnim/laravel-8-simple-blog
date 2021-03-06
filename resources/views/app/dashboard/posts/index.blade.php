@extends('app.dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Create New Post</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-primary btn-sm"><span
                                        data-feather="eye"></span></a>
                                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-success btn-sm"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger btn-sm border-0"
                                        onclick="return confirm('Are you sure?')"><span
                                            data-feather="delete"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            <sm class="d-block text-center">No Posts Found</sm>
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>
@endsection
