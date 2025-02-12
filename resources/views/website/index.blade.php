

@extends('layouts.website')
@section('title','EFL | Home')
@section('website-content')
<div data-elementor-type="wp-page" data-elementor-id="172" class="elementor elementor-172 web-index" style="padding-top: ;">
	<section class="elementor-section elementor-top-section elementor-element elementor-element-72ab2d2 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="72ab2d2" data-element_type="section">
		<div class="elementor-container elementor-column-gap-no">
			<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7a5ad8c" data-id="7a5ad8c" data-element_type="column">
			    <div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-10df995 elementor-align-left elementor-widget elementor-widget-bdevs-slider" data-id="10df995" data-element_type="widget" data-widget_type="bdevs-slider.default">
				        <div class="elementor-widget-container">
                            <header class="header slider-fade">
                                <div class="owl-carousel owl-theme">
                                     @foreach ($sliders as $key => $item)
                                        @php
                                            $imagePaths = json_decode($item->image_path, true) ?? [];
                                        @endphp
                                      @foreach ($imagePaths as $imagePath)
                                        <div class="item bg-img" data-overlay-dark="0" loading="lazy" style="background-image: url('{{ asset('public/uploads/slider/'.$imagePath) }}');">
                                            <div class="v-middle caption">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 mt-60">
                                                            <a class="blinking-btn down-arrow" id="scrollDown" role="button" href="javascript:void(0)"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      @endforeach
                                    @endforeach
                                </div>
                            </header>
			            </div>
				    </div>
				</div>
		    </div>
	    </div>

	</section>

    <section style="" id="fair"  class="elementor-section elementor-top-section elementor-element elementor-element-fda7fdc elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="fda7fdc" data-element_type="section">
        <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1dbb068" data-id="1dbb068" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-f7bc9c2 elementor-align-left elementor-widget elementor-widget-bdevs-banner-pages" data-id="f7bc9c2" data-element_type="widget" data-widget_type="bdevs-banner-pages.default">
                        <div class="elementor-widget-container">
                            <section class="banner-header fair-header section-padding bg-img bg-fixed bg-img-position-top" data-overlay-dark="0" style="margin-top:20px;">
                                <div class="v-middle"  >
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <a href="{{  asset('public/website/assets/images/banner/EFL_EVENT_LIFLET.pdf')  }}" target="_blank" class="pdf-link">
                                                    <button class="pdf blinking-btn">Download PDF</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<section class="elementor-section elementor-top-section elementor-element elementor-element-6c37fa2 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="6c37fa2" data-element_type="section">
		<div class="elementor-container elementor-column-gap-no">
			<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b0b87f8" data-id="b0b87f8" data-element_type="column">
			    <div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-02ab0d7 elementor-align-left elementor-widget elementor-widget-bdevs-services-home-slider" data-id="02ab0d7" data-element_type="widget" data-widget_type="bdevs-services-home-slider.default">
				        <div class="elementor-widget-container">
                            <section class="services ">
                                <div class="container">
                                    <div class="row mb-30">
                                        <div class="col-md-12 ">
                                            <h6 class="wow collection-text" data-splitting>Collections</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="owl-carousel owl-theme collecttion-index">

                                                <div class="item">
                                                    <img loading="lazy" src="{{ asset('public/website/assets/images/collection/collection (1).png') }}" alt="" style="background:#775BB4;border-radius:2px;">
                                                    <p class="active-wear collecttion-item" style="">Active Wear</p>
                                                </div>

                                                <div class="item">
                                                    <img loading="lazy" src="{{ asset('public/website/assets/images/collection/collection (2).png') }}" alt=""style="background:#24255A;border-radius:2px;">
                                                    <p class="functional-wear collecttion-item" style="">Functional Wear</p>
                                                </div>
                                                <div class="item">
                                                    <img loading="lazy" src="{{ asset('public/website/assets/images/collection/collection (3).png') }}" alt=""style="background:#2E7C1A;border-radius:2px;">
                                                    <p class="casual-wear collecttion-item"  style="">Casual Wear</p>
                                                </div>
                                                <div class="item">
                                                    <img loading="lazy" src="{{ asset('public/website/assets/images/collection/collection (4).png') }}" alt="" style="background:#D92429;border-radius:2px;">
                                                    <p class="denim-wear collecttion-item" style="">Denim</p>
                                                </div>

                                                <div class="item">
                                                    <img loading="lazy" src="{{ asset('public/website/assets/images/collection/collection (5).png') }}" alt="" style="background:#3089BA;border-radius:2px;">
                                                    <p  class="kids-wear collecttion-item"  style="">Kids Wear</p>
                                                </div>
                                                <div class="item">
                                                    <img loading="lazy" src="{{ asset('public/website/assets/images/collection/collection (6).png') }}" alt="" style="background:#1A637C;border-radius:2px;">
                                                    <p  class="jacket-wear collecttion-item"  style="">Jacket</p>
                                                </div>
                                                <div class="item">
                                                    <img loading="lazy" src="{{ asset('public/website/assets/images/collection/collection (7).png') }}" alt="" style="background:#728590;border-radius:2px;">
                                                    <p class="swim-wear collecttion-item" style="">Swim Wear</p>
                                                </div>
                                                <div class="item">
                                                    <img loading="lazy" src="{{ asset('public/website/assets/images/collection/collection (8).png') }}" alt="" style="background:#331A7C;border-radius:2px;">
                                                    <p  class="sleep-wear collecttion-item" style="">Sleep Wear</p>
                                                </div>
                                                <div class="item">
                                                    <img loading="lazy" src="{{ asset('public/website/assets/images/collection/collection (9).png') }}" alt="" style="background:#393F48;border-radius:2px;">
                                                    <p  class="formal-wear collecttion-item"  style="">Formal Wear</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
			            </div>
				    </div>
				</div>
		    </div>
		</div>
	</section>

	<section class="elementor-section elementor-top-section elementor-element elementor-element-defa094 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="defa094" data-element_type="section">
		<div class="elementor-container elementor-column-gap-no">
			<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1529bd8" data-id="1529bd8" data-element_type="column">
			    <div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-027b5f9 elementor-align-left elementor-widget elementor-widget-bdevs-projects" data-id="027b5f9" data-element_type="widget" data-widget_type="bdevs-projects.default">
				        <div class="elementor-widget-container">
                            <section id="works" data-scroll-index="2" class="works">
                                    <div class="container">
                                        <div class="row mb-30">
                                             <div class="col-md-12 full-width" style="padding-bottom: 30px;">
                                                <h6 class="wow wel-text" data-splitting>Welcome to Earth Fashion Ltd.</h6>
                                                 <!-- <h1 class="wow" data-splitting>Our Works</h1> -->
                                                <!-- <div class="line-hr-section"></div> -->
                                                 <p class="wow text-white">
                                                    we are  passionate to create fashion and deliver to our happy customers. We are  your ultimate fashion need. We groom you up to suite your taste and  comfort. We are experienced in designing, developing samples to fit  psychological and physical comfort with ultimate usability. We are  constantly evolving. We are a profitable, fast growing business and our  continued success is the result of the entrepreneurial spirit embedded  throughout the company.
                                                 </p>
                                             </div>
                                             <div class="col-md-12 col-sm-12 col-xs-12 full-width" style="background-color: #FFFFFF;min-height: 450px;">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12 col-xs-12 team-video">
                                                        <h6 style="color: #FFFFFF !important;positon:relative;top:5px;font-size:30px !important;">Earth Fashion</h6>
                                                        <div class="youtube-video">
                                                            <iframe
                                                                src="https://www.youtube.com/embed/8pIJBoC1e9s?si=4iNIVCzNiEVyvhJ3"
                                                                title="YouTube video player"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen>
                                                            </iframe>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12 col-xs-12 team-details" style="min-height: 400px;">
                                                        <div class="container">
                                                            <h6 class="wow meet-text" data-splitting style="padding-top: 20px;padding-bottom:20px">Meet The Team</h6>
                                                        <p class="wow " style="color: #393F48;">
                                                            We formed a  team with versatility and vast experience of talented individuals who  share our passion and commitment to achieve exceptional results, working  autonomously in an environment where challenging the norm is welcomed.  We are in fashion industry for more than a decade and serving our  customers for design, develop, production and quality. Together we serve  all purposes for your fashion demand. Together we are powerhouse, we  are warrior, we are ready to harness the force for good. We are your  ultimate fashion destination
                                                        </p>
                                                        </div>
                                                        <a href="{{ url('about-us') }}"><button style="float: right;" class="btn btn-danger btn-readmore-small ">read more >></button></a>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                            </section>
			            </div>
				    </div>
				</div>
		    </div>
		</div>
	</section>

	<section class="elementor-section elementor-top-section elementor-element elementor-element-10c4c34 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="10c4c34" data-element_type="section">
		<div class="elementor-container elementor-column-gap-no">
			<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-dd8930f" data-id="dd8930f" data-element_type="column">
			    <div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-96a75eb elementor-align-left elementor-widget elementor-widget-bdevs-video" data-id="96a75eb" data-element_type="widget" data-widget_type="bdevs-video.default">
				        <div class="elementor-widget-container">
                            <section class="services">
                                <div class="container">
                                    <div class="col-md-12 full-width" style="padding-bottom: 30px;border-bottom:2px solid #D9D9D9">
                                        <h6 class="wow qual-text" data-splitting>Quality Services</h6>
                                     </div>
                                     <div class="col-md-12">
                                        <div class="row ">
                                            <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                                                <img loading="lazy" src="{{ asset('public/website/assets/images/logo/Vector.png') }}" class="service_logo pd-top-10" alt="">
                                            </div>
                                            <div class="col-md-7 col-xs-7 col-sm-7 index-service">
                                                <h3 class="wow pd-top-10 " style="color: #A3B6BE;font-size:28px">OUR SERVICES & CORE VALUES</h3>
                                                <p class="text-white">
                                                    Our team ingeniously design and develop sample. We develop and source  best product and cheaper price every day to match with our cost cutting  technology. We deliberately select factories for product, quality,  financial capabilities and efficiency. Our line of quality management  team is hired with the deliberate process to ensure our highest level of  job quality.
                                                </p>
                                                <!-- <button >read more >></button> -->
                                                <a href="{{ url('our_service') }}"> <button class="btn btn-danger btn-readmore-small ">read more >></button></a>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                            </section>
			            </div>
				    </div>
				</div>
		    </div>
		</div>
	</section>
	<section class="elementor-section elementor-top-section elementor-element elementor-element-10c4c34 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="10c4c34" data-element_type="section">
		<div class="elementor-container elementor-column-gap-no">
			<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-dd8930f" data-id="dd8930f" data-element_type="column">
			    <div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-96a75eb elementor-align-left elementor-widget elementor-widget-bdevs-video" data-id="96a75eb" data-element_type="widget" data-widget_type="bdevs-video.default">
				        <div class="elementor-widget-container">
                            <section class="services section-padding" style="background: #E33727;">
                                <div class="container">
                                    <div class="col-md-12 text-center "><h6 class="text-white belive-text">We Belive In Being Fair And Compassionate</h6></div>
                                    <div class="col-md-12 pd-top-10">
                                        <div class="row">
                                            <div class="w-20">
                                                <a href="{{ url('carrers') }}">
                                                    <div class="item">
                                                       <div class="wrap">
                                                           <div class="icon-1">
                                                               {{-- <h4 class="text-white">Ideas</h4> --}}
                                                                <img loading="lazy" src="{{ asset('public/website/assets/images/logo/healthcare 1.png') }}" alt="" class="service-logo"></div>
                                                           <div class="con">
                                                               <p class="text-white">MEDICAL <br> INSURANCE</p>

                                                           </div>
                                                           {{-- <div class="numb">1</div> --}}
                                                       </div>
                                                    </div>
                                                   </a>

                                            </div>
                                            <div class="w-20">
                                                <a href="{{ url('carrers') }}">
                                                    <div class="item">
                                                       <div class="wrap">
                                                           <div class="icon-1">
                                                               {{-- <h4 class="text-white">Ideas</h4> --}}
                                                                <img loading="lazy" src="{{ asset('public/website/assets/images/logo/bonus 1.png') }}" alt="" class="service-logo"></div>
                                                           <div class="con">
                                                               <p class="text-white">COMPETITIVE <br> COMPENSATION</p>

                                                           </div>
                                                           {{-- <div class="numb">1</div> --}}
                                                       </div>
                                                    </div>
                                                   </a>

                                            </div>
                                            <div class="w-20">
                                                <a href="{{ url('carrers') }}">
                                                    <div class="item">
                                                       <div class="wrap">
                                                           <div class="icon-1">
                                                               {{-- <h4 class="text-white">Ideas</h4> --}}
                                                                <img loading="lazy" src="{{ asset('public/website/assets/images/logo/commission 1.png') }}" alt="" class="service-logo"></div>
                                                           <div class="con">
                                                               <p class="text-white">COMMISSION <br> ON PROJECT</p>

                                                           </div>
                                                           {{-- <div class="numb">1</div> --}}
                                                       </div>
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="w-20">
                                                <a href="{{ url('carrers') }}">
                                                    <div class="item">
                                                       <div class="wrap">
                                                           <div class="icon-1">
                                                               {{-- <h4 class="text-white">Ideas</h4> --}}
                                                                <img loading="lazy" src="{{ asset('public/website/assets/images/logo/personal-development 1.png') }}" alt="" class="service-logo"></div>
                                                           <div class="con">
                                                               <p class="text-white">LEARNING <br> AND DEVELOPMENT</p>

                                                           </div>
                                                           {{-- <div class="numb">1</div> --}}
                                                       </div>
                                                    </div>
                                                </a>


                                            </div>
                                            <div class="w-20">
                                                <a href="{{ url('carrers') }}">
                                                    <div class="item">
                                                       <div class="wrap">
                                                           <div class="icon-1">
                                                               {{-- <h4 class="text-white">Ideas</h4> --}}
                                                                <img loading="lazy" src="{{ asset('public/website/assets/images/logo/dish 1.png') }}" alt="" class="service-logo"></div>
                                                           <div class="con">
                                                               <p class="text-white">SUBSIDIZED <br> FOOD</p>

                                                           </div>
                                                           {{-- <div class="numb">1</div> --}}
                                                       </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
			            </div>
				    </div>
				</div>
		    </div>
		</div>
	</section>

	<section class="elementor-section elementor-top-section elementor-element elementor-element-a35e242 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="a35e242" data-element_type="section">
		<div class="elementor-container elementor-column-gap-no">
			<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f031c6e" data-id="f031c6e" data-element_type="column">
			    <div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-00f1e0a elementor-align-left elementor-widget elementor-widget-bdevs-team" data-id="00f1e0a" data-element_type="widget" data-widget_type="bdevs-team.default">
				        <div class="elementor-widget-container">
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-a86b1e8 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="a86b1e8" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-no">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-11b4daa" data-id="11b4daa" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-7c14df8 elementor-align-left elementor-widget elementor-widget-bdevs-events" data-id="7c14df8" data-element_type="widget" data-widget_type="bdevs-events.default">
                                                <div class="elementor-widget-container mood-index" style="">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-8"><p class="text-white index-project-help" style="">We can help you with any project</p></div>
                                                        <div class="col-md-12">
                                                            <div class="container">
                                                                <p class="ideas-text" style="">THROUGH CREATIVE IDEAS <br/> INNOVATION & SHEER DETERMINATION </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-3"><a href="{{ url('blog-page') }}"><img loading="lazy" src="{{ asset('public/website/assets/images/background/help-picure-1.png') }}" alt="" class="help-picture"></a></div>
                                                                    <div class="col-md-3"><a href="{{ url('blog-page') }}"><img loading="lazy" src="{{ asset('public/website/assets/images/background/help-picure-2.png') }}" alt="" class="help-picture"></a></div>
                                                                    <div class="col-md-3"><a href="{{ url('blog-page') }}"><img loading="lazy" src="{{ asset('public/website/assets/images/background/help-picure-3.png') }}" alt="" class="help-picture"></a></div>
                                                                    <div class="col-md-3"><a href="{{ url('blog-page') }}"><img loading="lazy" src="{{ asset('public/website/assets/images/background/help-picure-4.png') }}" alt="" class="help-picture"></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection


