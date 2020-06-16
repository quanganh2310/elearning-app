@extends('layouts.master')

@section('content')
<div class="slider_area ">
    <div class="bradcam_area breadcam_bg overlay2">
        <h3>Community</h3>
    </div>
</div>

<div class="container" style="min-height: 100vh">
    <div class="row">
        <div class="col-lg-8 posts-list">
        <div class="comments-area">
            <div class="comment-list">
            <h3>Join our Community</h3>
            @foreach ($posts as $post)
                <div class="single-comment justify-content-between d-flex mt-4">
                    <div class="user justify-content-between d-flex">
                    <div class="thumb">
                        @if( \App\User::where(['id' => $post->user_id])->first()->avatar == NULL)
                        <img style="border-radius: 50%" src="img/blog/default-avatar.png" alt="" width=70 height=70>
                        @endif
                        <img src="{{ asset('storage/'.\App\User::where(['id' => $post->user_id])->first()->avatar) }}" alt="" width=70 height=70>
                    </div>
                    <div class="desc">
                        <p class="comment">
                            {{ $post->content }}
                        </p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <h5>
                                <a href="javascript:;"> {{ \App\User::where(['id' => $post->user_id])->first()->name }}</a>
                                </h5>
                                <p class="date">{{$post->created_at->diffForHumans()}} </p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        </div>
        <div class="col-lg-4">
            <div class="blog_right_sidebar">
                <div class="comment-form">
                @auth
                    <div class="name mb-3">
                        @if( \App\User::where(['id' => Auth::user()->id])->first()->avatar == NULL)
                        <img style="border-radius: 50%" src="img/blog/default-avatar.png" alt="" width=70 height=70>
                        @endif
                        <img style="border-radius: 50%" src="{{ asset('storage/'.\App\User::where(['id' => Auth::user()->id])->first()->avatar) }}" alt="" width=70 height=70>
                        <h4 class="d-inline ml-3">Hello, {{ Auth::user()->name }}</h4>
                    </div>
                    
                    <form class="form-contact comment_form" action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="content" id="content" cols="30" rows="9"
                                        placeholder="What's in your mind"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm btn_1 boxed-btn">Share</button>
                        </div>
                    </form>
                @endauth
                @guest
                    <h4>Please log in to discuss with us!</h4>
                @endguest
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection