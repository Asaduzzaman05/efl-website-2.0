@extends('layouts.admin')
@section('title', 'Module-Service' )
@section('admin-content')
<main class="mb-5">
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span id="addTitle" class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Add Collection</span>
        {{-- <span id="updateTitle" class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Update Ais</span> --}}
    </div>
    <div class="row">

           <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="table-head"><i class="fas fa-cogs me-1"></i>Service Form</div>
                    </div>
                        <div class="card-body table-card-body p-3">
                            <form action="{{ url('module-service') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <input type="hidden" name="id" id="itemId" value="{{ isset($aisItem) ? $aisItem->id : '' }}">

                               <div class="row">
                                <div class="col-6"> <!-- Type Field -->
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="All Products" {{ (isset($aisItem) && $aisItem->type == 'All Products') ? 'selected' : '' }}>All Product</option>
                                            <option value="Mood Brand" {{ (isset($aisItem) && $aisItem->type == 'Mood Brand') ? 'selected' : '' }}>Mood Board</option>
                                            <option value="Artwork" {{ (isset($aisItem) && $aisItem->type == 'Artwork') ? 'selected' : '' }}>Artwork</option>
                                            <option value="Seasons" {{ (isset($aisItem) && $aisItem->type == 'Seasons') ? 'selected' : '' }}>Seasons</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                  
                                    <div class="form-group">
                                        <label for="module">Model</label>
                                        <select name="department" id="module" class="form-control">
                                            <option value="Mens" {{ (isset($aisItem) && $aisItem->module == 'Mens') ? 'selected' : '' }}>Mens</option>
                                            <option value="Womens" {{ (isset($aisItem) && $aisItem->module == 'Womens') ? 'selected' : '' }}>Womens</option>
                                            <option value="Kids" {{ (isset($aisItem) && $aisItem->module == 'Kids') ? 'selected' : '' }}>Kids</option>

                                        </select>
                                    </div>
                                </div>
                               </div>


                               <div class="row">
                                <div class="col-12">
                                    <div class="form-group" id="submodule-group" style="display: {{ (isset($aisItem) && $aisItem->type == 'seasons') ? 'block' : 'none' }};">
                                        <label for="seasons">Seasons</label>
                                        <input type="text" name="seasons" class="form-control" value="{{ isset($aisItem) ? $aisItem->seasons : '' }}" placeholder="Seasons Name">
                                    </div>
                                </div>
                                {{-- <div class="col-6">
                                    <div class="form-group"  id="submodule-group2" style="display: {{ (isset($aisItem) && $aisItem->type == 'submodule') ? 'block' : 'none' }};">
                                        <label for="submodule" >Submodule serial</label>
                                        <input type="text" name="submodule_serial" class="form-control"value="{{ isset($aisItem) ? $aisItem->submodule_serial : '' }}"  placeholder=" submodule serial no.">
                                    </div>
                                </div> --}}
                               </div>

                                <!-- Other Fields -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ isset($aisItem) ? $aisItem->title : '' }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="2">{{ isset($aisItem) ? $aisItem->description : '' }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="images">Upload Images</label>
                                    <input type="file" name="images[]" id="images" class="form-control" value="{{ isset($aisItem) ? $aisItem->image_path : '' }}"  multiple>

                                </div>


                                <div id="image_preview" ></div>

                                <button type="submit" class="btn btn-primary">{{ isset($aisItem) ? 'Update' : 'Submit' }}</button>
                            </form>
                        </div>
                </div>
            </div>
             <div class="col-6">
               <div class="card">
                <div class="card-header">
                    <div class="table-head"><i class="fas fa-table me-1"></i> FORM</div>
                </div>
                <div class="card-body table-card-body p-3">

                    <table id="datatablesSimple">
                        <thead class="text-center bg-light">
                            <tr>
                                <th>SL</th>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Preview</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="AisBody">
                            @foreach($collections as $aisItem)
                                <tr>
                                    <td>01</td>
                                    <td>{{ $aisItem->seasons ?? '' }}</td>
                                    <td>{{ $aisItem->title ??''}}</td>
                                    <td style="vertical-align: middle;">{!! Str::limit($aisItem->description ?? '', 50, '...') !!}</td>
                                    <td>
                                        <img src="{{ asset('public/uploads/collections/' .$aisItem->first_image) }}" alt="No Image" style="height: 50px; width:50px" >
                                    </td>
                                    <td>

                                    </td>
                                    <td style="display: ruby;vertical-align:center !important">
                                        <a href="{{ route('module-service.edit', $aisItem->id) }}" class="">
                                           <button class="edit-xs" style="position: relative;top:12px;"></button>
                                        </a>
                                        <a href="#" class="" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $aisItem->id }}').submit();">
                                           <button class="delete-xs" style="position: relative;top:12px;"></button>
                                        </a>
                                        <form id="delete-form-{{ $aisItem->id }}" action="{{ route('module-service.destroy', $aisItem->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
    </div>
</main>
@endsection


@push('admin-js')
<script src="{{ asset('public/admin/js/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        });


</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // $(document).ready(function () {
    //     function toggleSubmoduleField() {
    //         const type = $('#type').val();
    //         if (type === 'module') {
    //             $('#submodule-group').hide();
    //         } else {
    //             $('#submodule-group').show();
    //         }
    //     }
    //     toggleSubmoduleField();
    //     $('#type').on('change', function () {
    //         toggleSubmoduleField();
    //     });
    // });
    $(document).ready(function () {
    function toggleSubmoduleField() {
        const type = $('#type').val();
        $('#submodule-group, #submodule-group2').toggle(type !== 'module');
    }

    // Initial check on page load
    toggleSubmoduleField();

    // Recheck on dropdown change
    $('#type').on('change', toggleSubmoduleField);
});

    // function facroty_previewImages() {
    //     var $preview = $('#image_preview').empty();
    //     if (this.files) $.each(this.files, readAndPreview);

    //     function readAndPreview(i, file) {
    //         if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
    //             var reader = new FileReader();
    //             $(reader).on("load", function() {
    //                 $preview.append($("<a>", { href: this.result, height: 80 }));
    //             });
    //             reader.readAsDataURL(file);
    //         } else {
    //             var reader = new FileReader();
    //             $(reader).on("load", function() {
    //                 $preview.append($("<img/>", { src: this.result, style:"opacity: 1;height:100px;width:100px;padding-right:10px;padding-bottom:5px" }));
    //                 var $btn = $("<button>", {
    //                 text: "Remove",
    //                 style: "position: absolute; top: 5px; right: 5px; background-color: red; color: white; border: none; cursor: pointer; font-size: 12px; padding: 2px 5px;",
    //                 click: function () {
    //                     $container.remove();
    //                 }
    //                 $preview.append($btn);
    //             });

    //             });
    //             reader.readAsDataURL(file);
    //         }
    //     }
    // }
    // $('#images').on("change", facroty_previewImages);
    function facroty_previewImages() {
    var $preview = $('#image_preview');
    var files = Array.from(this.files);
    files.forEach(function (file, index) {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            alert(file.name + " is not a valid image file.");
            return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            var $container = $("<div>", {
                style: "display: inline-block; position: relative; margin: 5px; border: 1px solid #ddd; padding: 5px; background-color: #f9f9f9;",
                "data-index": index
            });
            var $img = $("<img>", {
                src: e.target.result,
                style: "height: 100px; width: 100px; display: block; margin-bottom: 5px;"
            });
            var $btn = $("<button>", {
                text: "Remove",
                style: "position: absolute; top: 5px; right: 5px; background-color: red; color: white; border: none; cursor: pointer; font-size: 12px; padding: 2px 5px;",
                click: function () {
                    files.splice(index, 1);
                    $container.remove();
                    updateFileInput(files);
                }
            });
            $container.append($img).append($btn);
            $preview.append($container);
        };
        reader.readAsDataURL(file);
    });
    function updateFileInput(updatedFiles) {
        var dataTransfer = new DataTransfer();
        updatedFiles.forEach(file => dataTransfer.items.add(file));
        $('#images')[0].files = dataTransfer.files;
    }
}
$('#images').on("change", facroty_previewImages);



</script>

@endpush

