@extends('admin::layouts.master')
@section('title')
    admin create college page
@endsection
@section('page-content')
    <section class="">
        <div class="grid-row">
            <div class="login-block">
                <div class="logo">
                    <img src="{{asset('img/logo.png')}}">
                    <h2>Create College</h2>
                </div>
                <form class="login-form" action="{{route('admin.college.register')}}" method="post">
                    @csrf
                    <div class="form-group">
                    	<label>College Name</label>
                        <input type="text" name="name" class="login-input" placeholder="college name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    	<label>Established Date</label>
                        <input type="date" name="established_date" class="login-input" placeholder="college name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="button-fullwidth cws-button bt-color-3">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection