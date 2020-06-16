@extends('layouts.master')

@section('content')
    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay2">
        <h3>contact us</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
            @auth
                @if(auth()->user()->isAdmin())
                <h3>User's feedback list.</h3>
                <div class="comments-area">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="hpanel mg-b-15">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-mailbox">
                                            <thead>
                                                <th>Name</th>
                                                <th>Content</th>
                                                <th>Email</th>
                                                <th>Created At</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($contacts as $contact)
                                                    <tr>
                                                        <td style="white-space: nowrap">{{ $contact->name }}</td>
                                                        <td style="white-space: nowrap">{{ $contact->content }}</td>
                                                        <td style="white-space: nowrap">{{ $contact->email }}</td>
                                                        <td style="white-space: nowrap">{{$contact->created_at->diffForHumans()}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                @else
                    <div class="row">
                        <div class="col-12">
                            <h2 class="contact-title">User's feedback</h2>
                        </div>
                        <div class="col-lg-8">
                            <form class="form-contact contact_form" action="{{ route('contacts.store') }}" enctype="multipart/form-data" method="POST" id="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="content" id="content" cols="30" rows="9"
                                            placeholder="Please leave a question..."></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
                                    <input type="hidden" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3 offset-lg-1">
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <h3>Ha Noi, Viet Nam.</h3>
                                    <p>Hai Ba Trung, Bach Khoa</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                <div class="media-body">
                                    <h3>+84 987 654 321</h3>
                                    <p>Mon to Fri 9am to 6pm</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-email"></i></span>
                                <div class="media-body">
                                    <h3>support@gmail.com</h3>
                                    <p>Send us your query anytime!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth
            @guest
            <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">User's feedback</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="{{ route('contacts.store') }}" enctype="multipart/form-data" method="POST" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                    <textarea class="form-control w-100" name="content" id="content" cols="30" rows="9"
                                        placeholder="Please leave a question..."></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Ha Noi, Viet Nam.</h3>
                                <p>Hai Ba Trung, Bach Khoa</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+84 987 654 321</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>support@gmail.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endguest
            </div>
        </section>
    <!-- ================ contact section end ================= -->
@endsection