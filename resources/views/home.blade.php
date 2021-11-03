@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(session('response'))
                    <div class="alert alert-success">

                        {{session('response')}}

                        </div>
                        @endif
                
                {{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{url('/message')}}">
                        @csrf          
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"> Message</label>

                            <div class="col-md-6">

                            <textarea name="message" rows="10" cols="30"></textarea>
                            <table class="table table bordered table-hover">
                                <thead> 
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>username</th>
                            <th>email</th>
                            <th>telephone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users)>0)
                        @foreach($users->all() as $user)
                        <tr>
                            <td><input type="checkbox" name="telephone[]" class="checkbox" value="{{$user->telephone}}"></td>
                            <th>{{$user->id}}</th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->email}}</th>
                            <td>{{$user->telephone}}</td>
                        </tr>
                            @endforeach
                            @endif
                        
                        </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                            
                            </div>
                        </div>
                        
</form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
