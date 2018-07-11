@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-weight: bold">Add New User</div>

                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('authors.store') }}" method="post">
                            {{ csrf_field() }}
                            First name:
                            <br />
                            <input type="text" name="first_name" value="{{ old('first_name') }}" />
                            <br /><br />
                            Last name:
                            <br />
                            <input type="text" name="last_name" value="{{ old('last_name') }}" />
                            <br /><br />
                            Phone:
                            <br />
                            <input type="text" name="phone" value="{{ old('phone') }}" />
                            <br /><br />
                            Email:
                            <br />
                            <input type="text" name="email" value="{{ old('email') }}" />
                            <br /><br />

                            Password:
                            <br />
                            <input type="text" name="password" value="{{ old('password') }}" />
                            <br /><br />
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection