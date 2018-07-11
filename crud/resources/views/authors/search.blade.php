@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-weight: bold">Search</div>

                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <div class="header_search " style="float: right">
                            <form style="margin-bottom: 10px" role="search" action="{{ route('search')}}" method="get">
                                <input type="text" name="key" placeholder="Search...">
                                <button style="border: 1px solid;background: #007bff;color:white;" name="button"
                                        class="search">search
                                </button>
                            </form>
                        </div>
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
                            @forelse($a as $author1)
                                <tr>
                                    <td>{{ $author1->first_name }}</td>
                                    <td>{{ $author1->last_name }}</td>
                                    <td>{{ $author1->email }}</td>
                                    <td>{{ $author1->phone }}</td>
                                    <td style="text-align: center">
                                        <a href="{{ route('authors.edit', $author1->id) }}"
                                           style="border: 1px solid;background: #007bff; color: white"
                                           class="btn btn-default">Edit</a>
                                        <form action="{{ route('authors.destroy', $author1->id) }}" method="POST"
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
                        {{--<form style="float: left">     {{ $a->links() }}</form>--}}
                        <a style="float: right;    border: 1px solid blue; padding: 5px 15px;  color: white;  background: #007bff;"
                           href="{{ route('download') }}">Export</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection	