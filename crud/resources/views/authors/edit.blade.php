@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" >
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-weight: bold">Edit</div>

                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                            <form action="{{ route('authors.update', $author->id) }}" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                {{ csrf_field() }}
                                First name:
                                <br />
                                <input type="text" name="first_name" value="{{ $author->first_name }}" />
                                <br /><br />
                                Last name:
                                <br />
                                <input type="text" name="last_name" value="{{ $author->last_name }}" />
                                <br /><br />
                                Email:
                                <br />
                                <input type="text" name="email" value="{{ $author->email}}" />
                                <br /><br />
                                Phone:
                                <br />
                                <input type="text" name="phone" value="{{ $author->phone }}" />
                                <br /><br />
                                <input type="submit" value="Submit" class="btn btn-default" />
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection