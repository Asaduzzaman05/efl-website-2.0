@extends('layouts.website')
@section('title','EFL | Blog Details')
@section('website-content')
<style>
    .works .owl-carousel .owl-dots.disabled, .owl-carousel .owl-nav.disabled{
         display:  block !important;
     }
 </style>
<div data-elementor-type="wp-page" data-elementor-id="86" class="elementor elementor-86 web-blog-details">
    <section class="elementor-section elementor-top-section elementor-element elementor-element-84cd0a1 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="84cd0a1" data-element_type="section">
        <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-784d585" data-id="784d585" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-40f350c elementor-align-left elementor-widget elementor-widget-bdevs-banner-blog" data-id="40f350c" data-element_type="widget" data-widget_type="bdevs-banner-blog.default">
                        <div class="elementor-widget-container">
                            <section class="banner-header section-padding bg-img bg-fixed" data-overlay-dark="0" data-background="" style="background: url({{  asset('public/website/assets/images/banner/blog.png')  }});background-size:100% 100%;background-repeat:no-repeat;">
                                <div class="v-middle">
                                    <div class="container">

                                        </div>
                                    </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row pd-top-10">
        <div class="col-md-12"><h4 class="events-head">Events</h4></div>
            <div class="col-md-9">
                <section class="elementor-section elementor-top-section elementor-element elementor-element-6c0d11b elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="6c0d11b" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-709533d" data-id="709533d" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-ef6e5c9 elementor-align-left elementor-widget elementor-widget-bdevs-blog-grid-2" data-id="ef6e5c9" data-element_type="widget" data-widget_type="bdevs-blog-grid-2.default">
                                    <div class="elementor-widget-container">
                                            <div class="col-md-12 works">
                                                <div class="row">
                                                    <div class="col-md-12 container events-top-slider">
                                                        <div class="owl-carousel owl-theme">
                                                            @foreach ($allblogs as $blog)
                                                                @php
                                                                $d = new DateTime($blog->date);
                                                                $day = $d->format('d');
                                                                $month = $d->format('M Y');
                                                                @endphp
                                                                <div class="item">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="col-md-12" style="background-color: #9798A0;height:150px;top:15%;position:relative;width:150px;">
                                                                                <img src="{{ asset($blog->image_path) }}" alt="" class="blog-up-tiny-img">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="col-md-12" style="height:150px;top:20%;position:relative;left:15px">
                                                                                <span style="font-size:35px !important;color:#E35D5D">{{ $day}}</span> <span>{{ $month }}</span> <br>
                                                                                <p class="text-white">
                                                                                    {!! \Illuminate\Support\Str::limit($blog->title ?? '', 30, '...') !!}
                                                                                </p>
                                                                            </div>
                                                                            <a href="{{ route('blog.details', ['id' => $blog->id]) }}"><button style="float: right;" class="btn btn-danger btn-readmore-small ">read more &gt;&gt;</button></a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <section class="blog2" style="">
                                        <div class="">
                                            <div class="row">
                                                    @php
                                                        $d = new DateTime($blogs->date);
                                                        $day = $d->format('d');
                                                        $month = $d->format('M Y');
                                                    @endphp
                                                <div class="col-lg-12 col-md-12 mb-25">
                                                    <div class="item">
                                                        <div class="img">
                                                            <a href="">
                                                                <div class="row">
                                                                    <div class="col-md-6"><div class="date-box">
                                                                        <h3 style="color: #E35D5D;"> {{$day }}</h3> <p></p>{{ $month }}
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="svg-love-details ">
                                                                            <svg width="59" height="51" viewBox="0 0 85 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M18.0132 44.3245C9.72964 37.9148 0 30.3871 0 17.3367C0 2.93007 16.2255 -7.2861 29.4996 6.56417L35.3998 12.485C36.2636 13.3524 37.6645 13.3524 38.5292 12.485C39.3929 11.6176 39.3929 10.2107 38.5292 9.3424L32.8298 3.62063C45.3374 -5.57526 59.0009 4.11656 59.0009 17.3367C59.0009 30.5569 49.2712 37.9148 40.9877 44.3245C40.1266 44.991 39.2814 45.6451 38.4646 46.2922C35.4016 48.7167 32.4519 50.9999 29.5013 50.9999C26.5508 50.9999 23.6011 48.7167 20.5381 46.2922C19.7212 45.6451 18.8752 44.991 18.0141 44.3245H18.0132Z" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <img decoding="async" src="{{ asset( $blogs->image_path) }}" alt="" class="blog-details-image">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12" style="background: #FFFFFF;min-height:500px;">
                                                   <div class="row">
                                                        <div class="col-md-12"> <p class="blog-details-title">{{ $blogs->title ?? '' }}</p></div>
                                                        <div class="col-md-12">
                                                           <div class="blog-details-desc" style="text-align: justify;padding: 20px 20px">
                                                            {!! $blogs->description ?? '' !!}
                                                           </div>
                                                        </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-12" style="background: #9798A0;height:550px;">
                                                    <div class="row">
                                                        <div class="col-md-6 blog-details-form" style="">
                                                            <h6 class="comment-head">Leave your comments</h6>
                                                            <form action="{{ route('comments.store') }}" method="POST">
                                                                @csrf
                                                                <div class="comments">
                                                                    <input class="comment-name" type="text" name="name" placeholder="Your Name" required  style="background: #9798A0;border-radius:2px;color:#FFFFFF !important;height:40px">
                                                                    <input type="email" name="email" placeholder="Your Email" style="background: #9798A0;border-radius:2px;color:#FFFFFF !important;height:40px">
                                                                    <input type="text" name="website" placeholder="Your Website" style="background: #9798A0;border-radius:2px;color:#FFFFFF !important;height:40px">
                                                                    <textarea name="comment" id="" cols="30" rows="5" placeholder="Your Comments" style="background: #9798A0;border-radius:2px;color:#FFFFFF !important;"></textarea>
                                                                    <input type="hidden" name="comnt_or_reply" value="comment">
                                                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                                    <button type="submit" class="footer-submit-btn btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6"></div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        </section>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-white">Recent Events</h4>
                        <ul class="recent-blog">
                            <li class="text-white">December 2025  </li>
                            <li class="text-white">January 2025</li>
                            <li class="text-white">February 2025</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <h4 class="text-white">Fashion News</h4>
                        <ul class="recent-blog">
                            <li class="text-white">Summer  </li>
                            <li class="text-white">Autumn</li>
                            <li class="text-white">Winter</li>
                            <li class="text-white">Spring</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <h4 class="text-white">Fashion Show</h4>
                        <ul class="recent-blog">
                            <li class="text-white"> National   </li>
                            <li class="text-white">International</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4 class="text-white">Mood Board</h4>
                    <ul class="recent-blog">
                        <li class="text-white">Spring  </li>
                        <li class="text-white">Autumn</li>
                        <li class="text-white">Winter</li>
                        <li class="text-white">Summer</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <h4 class="text-white">Artworks</h4>
                    <ul class="recent-blog">
                        <li class="text-white">Typography  </li>
                        <li class="text-white">Mens</li>
                        <li class="text-white">Kids</li>
                        <li class="text-white">Fun</li>
                        <li class="text-white">Mens</li>
                    </ul>
                </div>
            </div>
    </div>
</div>



@endsection
