@foreach ($collections as $collection)
    <div class="col-lg-3 col-md-3 single-item design mb-25">
        <div class="gallery-box collection-image" data-id="{{ $collection->id }}">
            <div class="gallery-img img-grayscale">
                <img loading="lazy" style="background: #9798a0" decoding="async"
                    src="{{ asset('public/uploads/collections/'.$collection->title_image ?? '') }}"
                    class="img-fluid mx-auto d-block" alt="">
            </div>
            <div class="gallery-detail"></div>
        </div>
    </div>
@endforeach
