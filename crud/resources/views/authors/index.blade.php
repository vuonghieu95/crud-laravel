@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    {{--<div class="panel-heading">User-management</div>--}}

                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <a href="{{ route('authors.create') }}"
                           style="border: 1px solid;background: #007bff;color:white; margin-bottom:5px;float: left"
                           class="btn btn-default">Add New User</a>

                        <form role="search" action="{{ route('search') }}" style="float: right;" method="get">
                            <input type="text" value="" name="key" placeholder="Search...">

                            <button type="submit" id="searchsubmit"
                                    style="border: 1px solid;background: #007bff;color:white;" name="button"
                                    class="search">search
                            </button>

                        </form>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="background: #007bff;color: white">First name</th>
                                <th style="background: #007bff;color: white">Last name</th>
                                <th style="background: #007bff;color: white">Email</th>
                                <th style="background: #007bff;color: white">Phone</th>
                                <th style="background: #007bff;color: white">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($authors as $author)
                                <tr>
                                    <td>{{ $author->first_name }}</td>
                                    <td>{{ $author->last_name }}</td>
                                    <td>{{ $author->email }}</td>
                                    <td>{{ $author->phone }}</td>
                                    <td style="text-align: center">
                                        <a href="{{ route('authors.edit', $author->id) }}"
                                           style="border: 1px solid;background: #007bff; color: white"
                                           class="btn btn-default">Edit</a>
                                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST"
                                              style="display: inline"
                                              onsubmit="return confirm('Are you sure to delete the user?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No entries found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <form style="float: left">     {{ $authors->links() }}</form>
                        <a style="float: right;    border: 1px solid blue; padding: 5px 15px;  color: white;  background: #007bff;"
                           href="{{ route('download') }}">Export</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection	