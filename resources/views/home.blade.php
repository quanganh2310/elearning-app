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
@endsection

@section('scripts')
<script>

    if (!sessionStorage.getItem('firstVisit')) {
        sessionStorage.setItem('firstVisit', '1');
    }
    else {
        sessionStorage.setItem('firstVisit', '0');
    }

    if (sessionStorage.getItem('firstVisit') === "1") {
        $(".loading").delay(1200).fadeOut(800);
        $(".welcome").hide();
        $(".welcome").delay(1500).fadeIn(800);
    } else {
        $(".loading").hide();
        $(".welcome").show();
    }

</script>
@endsection
