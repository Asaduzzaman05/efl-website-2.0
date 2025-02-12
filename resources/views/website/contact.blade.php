@extends('layouts.website')
@section('title','EFL | Contact')
@section('website-content')
<div data-elementor-type="wp-page" data-elementor-id="229" class="elementor elementor-229">
	<section class="elementor-section elementor-top-section elementor-element elementor-element-7cd2d4f elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="7cd2d4f" data-element_type="section">
		<div class="elementor-container elementor-column-gap-no">
			<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-510c5c4" data-id="510c5c4" data-element_type="column">
			    <div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-03e4165 elementor-align-left elementor-widget elementor-widget-bdevs-banner-pages" data-id="03e4165" data-element_type="widget" data-widget_type="bdevs-banner-pages.default">
				        <div class="elementor-widget-container">
                            <section class="banner-header  bg-img bg-fixed bg-img-position-top" style="height: 450px" >
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9705.853076163849!2d90.4086731939698!3d23.813374144673983!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7c43004be17%3A0x3a93ae18e1d8e067!2sEarth%20Fashion%20Ltd!5e1!3m2!1sen!2sbd!4v1736424655379!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </section>
			            </div>
				    </div>
				</div>
		    </div>
		</div>
	</section>

	<section class="elementor-section  elementor-top-section elementor-element elementor-element-40f19ff elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="40f19ff" data-element_type="section">
		<div class="elementor-container elementor-column-gap-no">
			<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ae99e75" data-id="ae99e75" data-element_type="column">
			    <div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-7579ea8 elementor-align-left elementor-widget elementor-widget-bdevs-contact-pages" data-id="7579ea8" data-element_type="widget" data-widget_type="bdevs-contact-pages.default">
				        <div class="elementor-widget-container">
                            <section class="contact" >
                                <div class="container">
                                    <h5 style="color: #E35D5D;border-bottom:2px solid #E35D5D;font-size:40px !important;top:10px;" class="contact-text">Contact</h5>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 mb-60">
                                            <div class="row mb-60">
                                                <div class="col-md-12">
                                                    <h5 class="text-white" style="border-bottom:2px solid #D9D9D9;margin-right:20px;font-size:30px !important;">Get in Touch</h5>
                                                    <p  class="text-white" style="font-size: 22px !important;">Dhaka Office </p>
                                                    <p  class="text-white" style="border-bottom:2px solid #D9D9D9;margin-right:20px;">5th Floor, House 251 Road 3, Dhaka 1206 </p>
                                                    {{-- <div class="con">
                                                        <div class="con-content">
                                                            <p class="text text-white">Shanghai Office</p>
                                                        </div>
                                                    </div>
                                                    <div class="con">

                                                        <div class="con-content">
                                                            <p class="text text-white">Room 810, Tower A, SOHO Zhongshan Plaza, 1055 West Zhongshan Road, Changning District, Shanghai 200051 P. R. China</p>
                                                        </div>
                                                    </div> --}}
                                                    {{-- <img src="{{ asset('public/website/assets/images/logo/efl-contact.png') }}" alt=""> --}}

                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-lg-6 col-md-6 contactFormDiv">
                                        <div class="wpcf7 no-js" id="wpcf7-f533-p229-o1" lang="en-US" dir="ltr">
                                            <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
                                                <form action="{{ route('message.store') }}" method="POST" >
                                                    @csrf
                                                    <div class="contact__form">
                                                        <div class="row">
                                                            <div class="col-md-12 form-group">
                                                                <p><span class="wpcf7-form-control-wrap" data-name="name"><input style="border-radius: 2px;background:#CACFD2;height:6vh" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your Name" value="" type="text" name="name" /></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <p><span class="wpcf7-form-control-wrap" data-name="email"><input style="border-radius: 2px;background:#CACFD2;height:6vh" size="40" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email Address *" value="" type="email" name="email" /></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <p><span class="wpcf7-form-control-wrap" data-name="phone"><input style="border-radius: 2px;background:#CACFD2;height:6vh" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Phone *" value="" type="text" name="phone" /></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <p><span class="wpcf7-form-control-wrap" data-name="subject"><input style="border-radius: 2px;background:#CACFD2;height:6vh" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Subject *" value="" type="text" name="subject" /></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <p><span class="wpcf7-form-control-wrap" data-name="message"><textarea style="border-radius: 2px;background:#CACFD2;" cols="40" rows="20" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" id="message" aria-required="true" aria-invalid="false" placeholder="How can we help you? Feel free to get in touch! *" name="message"></textarea></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <button type="submit" class="footer-submit-btn btn btn-primary" style="position: relative;font-size:20px !important;padding-top:0;">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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

