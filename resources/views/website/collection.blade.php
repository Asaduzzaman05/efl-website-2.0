@php
    use App\Models\Fabric_cost;
    use App\Models\Color_cons;
    use App\Models\Fabric;
    use App\Models\Finish;
    use App\Models\Fabric_sheet;
@endphp
@extends('layouts.website')
@section('title','EFL | Collection')
@section('website-content')
<div data-elementor-type="wp-page" data-elementor-id="216" class="elementor elementor-216">

	<section style="" class="elementor-section elementor-top-section elementor-element elementor-element-3f80a98 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="3f80a98" data-element_type="section">
		<div class="elementor-container elementor-column-gap-no">
			<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2324db4" data-id="2324db4" data-element_type="column">
			    <div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-2629207 elementor-align-left elementor-widget elementor-widget-bdevs-banner-pages" data-id="2629207" data-element_type="widget" data-widget_type="bdevs-banner-pages.default">
				        <div class="elementor-widget-container">
                            <section class="banner-header section-padding bg-img bg-fixed bg-img-position-top" data-overlay-dark="0" style="background: url({{  asset('public/website/assets/images/banner/collection.png')  }});background-size:100% 100%;background-repeat:no-repeat;" data-background="">
                                <div class="v-middle">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 text-center mt-60">
                                                <!-- <h1>Image Gallery</h1>
                                                <ul class="breadcrumbs">
                                                    <li><a href="index.html">Home</a></li>
                                                    <li>Image Gallery</li>
                                                </ul> -->
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

    <section style="" class="elementor-section elementor-top-section elementor-element elementor-element-3d9b6e4 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="3d9b6e4" data-element_type="section">
        <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-844d06a" data-id="844d06a" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-c47d611 elementor-align-left elementor-widget elementor-widget-bdevs-gallery-pages" data-id="c47d611" data-element_type="widget" data-widget_type="bdevs-gallery-pages.default">
                        <div class="elementor-widget-container">
                            <section class="section-padding  collection-section">
                                <div class="container">

                                    <h5 style="color: #E35D5D; border-bottom: 2px solid #E35D5D;font-size:30px !important;"> Collection</h5>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="accordion collection-list-box clearfix">
                                                <li class="accordion collection-list block active-block">
                                                    <div class="category-toggle acc-btn" style="cursor: pointer" >Categories</div>
                                                        <div class="content all-products proudct-sidebar collapsible-container">
                                                            <ul>
                                                                <li><a href="javascript:void(0);" class="filter-department active" data-filter="all">All Products</a></li>
                                                                <li><a href="javascript:void(0);" class="filter-department" data-filter="1">Mens</a></li>
                                                                <li><a href="javascript:void(0);" class="filter-department" data-filter="20">Ladies</a></li>
                                                                <li><a href="javascript:void(0);" class="filter-department" data-filter="12">Women</a></li>
                                                                <li><a href="javascript:void(0);" class="filter-department" data-filter="3">Boy's</a></li>
                                                                <li><a href="javascript:void(0);" class="filter-department" data-filter="9">Baby Boy's</a></li>
                                                                <li><a href="javascript:void(0);" class="filter-department" data-filter="3">Girl's</a></li>
                                                                <li><a href="javascript:void(0);" class="filter-department" data-filter="10">Baby Girl's</a></li>
                                                                <li><a href="javascript:void(0);" class="filter-department" data-filter="5">Kid's</a></li>
                                                                <li><a href="javascript:void(0);" class="filter-department" data-filter="37">Big Girl's</a></li>
                                                            </ul>
                                                        </div>
                                                </li>

                                                <li class="accordion collection-list block">
                                                    <div class="acc-btn"><span class="count"></span> Mood Board</div>
                                                    <div class="acc-content">
                                                        <div class="content proudct-sidebar">
                                                            <ul>
                                                                <li><a href="" class="active">Summer</a></li>
                                                                <li><a href="">Autumn</a></li>
                                                                <li><a href="">Winter</a></li>
                                                                <li><a href="">Spring</a></li>
                                                                <li><a href="">Theme</a></li>
                                                                <li><a href="">Color</a></li>
                                                                <li><a href="">Trends</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="accordion collection-list block">
                                                    <div class="acc-btn"><span class="count"></span> Artworks</div>
                                                    <div class="acc-content">
                                                        <div class="content proudct-sidebar">
                                                            <ul>
                                                                <li><a href="" class="active">Summer</a></li>
                                                                <li><a href="">Autumn</a></li>
                                                                <li><a href="">Winter</a></li>
                                                                <li><a href="">Spring</a></li>
                                                                <li><a href="">Theme</a></li>
                                                                <li><a href="">Color</a></li>
                                                                <li><a href="">Trends</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="accordion collection-list block">
                                                    <div class="acc-btn"><span class="count"></span>Seasons</div>
                                                    <div class="acc-content">
                                                        <div class="content proudct-sidebar">
                                                            <ul>
                                                                <li><a href="" class="active">Summer</a></li>
                                                                <li><a href="">Autumn</a></li>
                                                                <li><a href="">Winter</a></li>
                                                                <li><a href="">Spring</a></li>
                                                                <li><a href="">Theme</a></li>
                                                                <li><a href="">Color</a></li>
                                                                <li><a href="">Trends</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <h5 style="color: #E35D5D; border-bottom: 2px solid #E35D5D;" class="collection-head-text">Products</h5>
                                            <div class="all-product gallery-items row" id="department-collections" style="min-height: 200px;"  data-url="{{ route('filter.department') }}">

                                                    @include('website.filtered_department')

                                                {{-- <button  id="showMoreBtn" style="float: right;" class="btn btn-danger btn-readmore-small ">read more &gt;&gt;</button> --}}
                                                <div class="modal fade" id="collection_image_modal" tabindex="-1" aria-hidden="true" role="dialog" aria-labelledby="collection_image_modal" data-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-centered collection_image_modal_dialog" role="document" style="width:100%;">
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="padding: 0px;">
                                                                <button type="button" class="close-modal-btn" data-dismiss="modal" aria-label="Close" style="font-size: 50px;right:-7%;top:-6px;background:transparent;color:red;position: absolute;;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <div class="col-md-12 col-md-12 col-xs-12 collection_modal_head" style="padding: 10px !important;"><b></b> </div>
                                                            </div>
                                                            <div class="modal-body collection_modal_body" style="padding: 0px !important;padding: 0px !important; overflow-y: hidden; overflow-x: hidden;height:500px;">

                                                            </div>
                                                            <div class="modal-footer collection_modal_footer" style="background:#FFFFFF;color:#000000;min-height:60px;">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <h5 style="color: #E35D5D; border-bottom: 2px solid #E35D5D;" class="collection-head-text">Mood Board</h5>
                                            <div class="row gallery-items" style="min-height: 400px">

                                                @foreach ($mood_boards as $boards )
                                                <div class="col-lg-6 col-md-6 single-item architecture  mb-25">
                                                    <a href="{{ asset('public/uploads/collections/'.$boards->title_image ?? '') }}" title="" class="img-zoom">
                                                        <div class="gallery-box">
                                                            <div class="gallery-img img-grayscale">
                                                            <img loading="lazy" decoding="async" src="{{ asset('public/uploads/collections/'.$boards->title_image ?? '') }}" class="img-fluid mx-auto d-block" alt=""> </div>
                                                            <div class="gallery-detail">
                                                                {{-- <h4>Exterior Design</h4>
                                                                <p>Architecture </p> --}}
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endforeach

                                            </div>
                                            <h5 style="color: #E35D5D; border-bottom: 2px solid #E35D5D;" class="collection-head-text">Artworks</h5>
                                            <div class="row gallery-items artwork" style="min-height: 400px">

                                                @foreach ($artworks as $artwork )
                                                    <div class="col-lg-3 col-md-3 single-item design  mb-25">
                                                        <a href="{{ asset('public/uploads/collections/'.$artwork->title_image ?? '') }}" title="" class="img-zoom">
                                                            <div class="gallery-box">
                                                                <div class="gallery-img img-grayscale">
                                                                <img loading="lazy" decoding="async" src="{{ asset('public/uploads/collections/'.$artwork->title_image ?? '') }}" class="img-fluid mx-auto d-block" alt=""> </div>
                                                                <div class="gallery-detail">
                                                                    {{-- <h4>Branding Design</h4>
                                                                    <p>Design </p> --}}
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach

                                               <div class="col-md-12 single-item"> <p style="border-bottom: 2px solid #9DA7AC"></p></div>
                                            </div>
                                            <h5 style="color: #E35D5D; border-bottom: 2px solid #E35D5D;" class="collection-head-text">New Ideas</h5>
                                            <div class="row gallery-items" style="min-height: 400px">
                                                @foreach ($new_ideas as $ideas )
                                                    <div class="col-lg-6 col-md-6 single-item design  mb-25">
                                                        <a href="{{ asset('public/uploads/collections/'.$ideas->title_image ?? '') }}" title="" class="img-zoom">
                                                            <div class="gallery-box">
                                                                <div class="gallery-img img-grayscale">
                                                                <img loading="lazy" decoding="async" src="{{ asset('public/uploads/collections/'.$ideas->title_image ?? '') }}" class="img-fluid mx-auto d-block" alt=""> </div>
                                                                <div class="gallery-detail">
                                                                    {{-- <h4>Branding Design</h4>
                                                                    <p>Design </p> --}}
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                                <div class="col-md-12 single-item"><p style="border-bottom: 2px solid #9DA7AC"></p></div>
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
<script>
    var filterDepartmentUrl = "{{ route('filter.department') }}";
</script>
