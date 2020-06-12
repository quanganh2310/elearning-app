@extends('layouts.app')

@section('content')
<div class="loading slider_bg_1">
    <span class="intro">Let's learn something new !</span>
</div>
<div class="welcome">
    <img class="mb-5" src="{{asset('img/welcome-back.png')}}" alt="" width=450>
    <br>
    <a href="{{ url('/all-subjects') }}" class="boxed_btn_orange mr-4">Browse All Subjects</a>
    <a href="{{ url('/all-courses') }}" class="boxed_btn_orange">Browse All Courses</a>
</div>

@section('scripts')
@endsection
