@php
    use App\Models\AdminService;
    use App\Models\Fabric_sheet;
    use App\Models\Finish;

    $collection = AdminService::find($data_id);
    // dd( $collection);

    $date = ''; $type = 'All Product';$item = ''; $dept = '';$seasonal = ''; $year = '';$status = ''; $division = '';$style_label = '';
    $title_image = '';
    // $data_photo_arr = json_decode($collection->image_path, true);
    if ($collection) {
    $data_photo_arr = json_decode($collection->image_path, true);
    } else {
        $data_photo_arr = [];
    }
    if ($collection != null) {
        $date = $collection->date;
        $type = $collection->collection_type;
        $item = $collection->item;
        $dept = $collection->dept;
        $seasonal = $collection->seasonal;
        $year = $collection->year;
        $status = $collection->status;
        $division = $collection->division;
        $style_label = $collection->style_label;
        $title_image = $collection->title_image;
    }
    // dd($date, $type);
@endphp

<div class="container">
    <div class="panel-body minimal" style="min-height:400px">
        <div class="row" style="padding-top: 10px">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-xs-4 v_mid text-center bold " >
                        ID#{{ $data_id }}
                        <input type="hidden" name="style_id" value="{{ $data_id }}">
                    </div>
                    <div class="col-sm-4 col-md-4 col-xs-4 custom_input">
                        <div class="form-group">
                            <div class="input-append input-group date datetimepicker_real">
                                <input class="form-control date-picker date_tip main_style_form" data-toggle="tooltip" title="Date" id="date" name="date" type="date"  value="{{ date('d/m/Y', strtotime($date)) }}" placeholder="Date">
                                <span class="input-group-addon date_addon">
                                <span class="glyphicon glyphicon-calendar date_symbol"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 col-xs-6 custom_input">
                        <div class="form-group">
                            <select name="collection_type" id="collection_type" class="form-control collection_type main_style_form required" placeholder="Collection type" data-placeholder="Collection_type" required>
                                <option value="All Product" {{ ($type == 'All Product') ? 'selected' : '' }}>All Product</option>
                                <option value="Mood Board" {{ ($type == 'Mood Board') ? 'selected' : '' }}>Mood Board</option>
                                <option value="Artwork" {{ ($type == 'Artwork') ? 'selected' : '' }}>Artwork</option>
                                <option value="Seasons" {{ ($type == 'Seasons') ? 'selected' : '' }}>Seasons</option>
                                <option value="New Idea" {{ ($type == 'New Idea') ? 'selected' : '' }}>New Idea</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-xs-6 custom_input">
                        <div class="form-group">
                            <select name="item" id="item" class="form-control item main_style_form required" placeholder="Item" data-placeholder="Item" required>
                                <option value="">Item</option>
                                @if ($item != "")
                                    <option value="{{ $item }}" selected>{{ get_single_db_value($item, 'Item', 'name') ?? '' }}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-4 col-md-4 custom_input">
                        <div class="form-group">
                            <select name="dept" id="dept" class="form-control dept main_style_form required" placeholder="Department" data-placeholder="Department" required>
                                <option value="" >Department</option>
                                @if ($item != "")
                                    <option value="{{ $dept }}" selected>{{ get_single_db_value($dept, 'Department', 'name') ?? '' }}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-4 col-xs-12 custom_input">
                        <div style="width: 65%; float:left; margin-right: 5%;">
                            <div class="form-group">
                                <select name="seasonal" id="seasonal" class="style_info  form-control main_style_form seasonal" data-placeholder="Season" title="Season">
                                    <option value="">Season</option>
                                    <option value="Summer"{{ ($seasonal == 'Summer') ? 'selected' : '' }} >Summer</option>
                                    <option value="Winter"{{ ($seasonal == 'Winter') ? 'selected' : '' }}>Winter</option>
                                    <option value="Spring"{{ ($seasonal == 'Spring') ? 'selected' : '' }} >Spring</option>
                                    <option value="Fall"{{ ($seasonal == 'Fall') ? 'selected' : '' }}>Fall</option>
                                    <option value="AUTUMN"{{ ($seasonal == 'AUTUMN') ? 'selected' : '' }}>AUTUMN</option>
                                    <option value="SS" {{ ($seasonal == 'SS') ? 'selected' : '' }}>SS</option>
                                    <option value="FW" {{ ($seasonal == 'FW') ? 'selected' : '' }}>FW</option>
                                    <option value="AW" {{ ($seasonal == 'AW') ? 'selected' : '' }}>AW</option>
                                </select>
                            </div>
                        </div>

                        <div style="width: 30%; float:left;">
                            <select name="year" id="year" class="style_info main_style_form form-control year" data-placeholder="Year"  data-toggle="tooltip" data-placement="top" title="Year">
                                @for ($i = 2000; $i < 2100; $i++)
                                    <option value="{{$i}}" <?php $y = (!empty($style[0]->year)) ? $style[0]->year : date("Y"); echo $retVal = ($y == $i) ? 'selected data-aria-selected="true"' : "" ; ?>>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 col-xs-4 custom_input">
                        <div class="form-group">
                            <select name="status" id="status" class="style_info form-control main_style_form status required"  data-placeholder="Status" data-toggle="tooltip" data-placement="top" title="Status" required>
                                <option value="Current" {{ ($status == 'Current') ? 'selected' : '' }} >Current</option>
                                <option value="Customer Dev." {{ ($status == 'Customer Dev.') ? 'selected' : '' }} >Customer Dev.</option>
                                <option value="Own Dev." {{ ($status == 'Own Dev.') ? 'selected' : '' }}>Own Dev.</option>
                                <option value="Pending" {{ ($status == 'Pending') ? 'selected' : '' }}>Pending</option>
                                <option value="Cancelled" {{ ($status == 'Cancelled') ? 'selected' : '' }}>Cancelled</option>
                                <option value="Shipped" {{ ($status == 'Shipped') ? 'selected' : '' }}>Shipped</option>
                                <option value="Shipment Cancelled" {{ ($status == 'Shipment Cancelled') ? 'selected' : '' }}>Shipment Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-4 col-md-4 custom_input">
                        <div class="form-group">
                            <select name="division" id="division" class="form-control division main_style_form required" placeholder="Division" data-placeholder="Division" required>
                                <option value="" >Division</option>
                                @if ($item != "")
                                    <option value="{{ $division }}" selected>{{ get_single_db_value($division, 'Division', 'name') ?? '' }}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-3 custom_input">
                        <div class="form-group">
                            <select name="style_label" id="style_label" class="form-control style_info main_style_form style_label" placeholder="Label/Brand" data-placeholder="Label/Brand">
                                <option value="" >  </option>
                                @if ($item != "")
                                    <option value="{{ $style_label }}" selected>{{ get_single_db_value($style_label, 'Label', 'name') ?? '' }}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <label for="all_collection">Collection Images</label>
                        </div>
                        <div class="col-md-12">
                            <input style="opacity: 0;z-index:1;position:relative" type="file" name="images[]" id="images"  value=""  multiple>
                            <button class="upload" style="position: relative;right:250px">Upload</button>
                        </div>

                        <div id="image_preview">
                            @if ($data_photo_arr != null)
                                @foreach ($data_photo_arr as $sp)
                                    <div style="display: inline-block; position: relative; margin: 5px; border: 1px solid #ddd; padding: 5px; background-color: #f9f9f9;" data-id="{{ $sp['filename'] ??  $sp }}">
                                        <a href="{{ asset('public/uploads/collections/' .  ($sp['filename'] ?? $sp ?? '')) }}" loading="lazy">
                                            <img src="{{ asset('public/uploads/collections/' . ($sp['filename'] ?? $sp ?? '')) }}" loading="lazy" style="height: 100px; width: 100px; display: block; margin-bottom: 5px;">
                                        </a>
                                        <p style="text-align: center; font-size: 14px; color: #333; margin-top: 5px;">
                                            {{ $sp['title'] ?? 'No Title' }}
                                        </p>
                                        <button style="position: absolute; top: 5px; right: 5px; background-color: red; color: white; border: none; cursor: pointer; font-size: 12px; padding: 2px 5px;"
                                                class="remove-existing-image"
                                                data-photo="{{ $sp['filename'] ?? "" }}">
                                            Remove
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label for="title_image">Title Image</label>
                <input type="file" name="title_image" value="{{'public/uploads/collections/'. $title_image}}"  style="opacity: 0;z-index:1;position:relative" onchange="readURL(this);">
                <button class="upload" style="position: relative;bottom:26px;">Upload</button>
                <div class="">
                    <img class="form-control" name="title_image" src="{{ 'public/uploads/collections/'.$title_image ?? '' }}" id="previewImage" style="height:120px;width:140px; background: #3f4a49;">
                </div>
            </div>


            <div class="row" style=" display: table; table-layout: fixed; width: 100%; ">
                <div class="col-md-12 col-sm-12 col-xs-12" style="display: table-cell; width: 100%;overflow-x:auto">
                    <table class="table" id="fabric_sheet" style="width:100%; padding:5px;">
                        <thead>
                            <tr>
                                <th>fabric</th>
                                <th>composition</th>
                                <th>finish</th>
                                <th> wght</th>
                                <th>type</th>
                                <th>gg</th>
                                <th>Construction</th>
                                <th><button type="button" style="width:100%; font-weight:bold; margin-top:5px" id="add_fabric_sheet_btn" class=" add-more"></button></button></th>
                            </tr>
                        </thead>

                        <tbody id="fabric_sheet_tbody">
                            @php
                                $all_fabrics = Fabric_sheet::where('style_id', $data_id)->get();
                                $f = 1; $all_fabric_count = (count($all_fabrics) != 0) ? count($all_fabrics) : 1;
                            @endphp
                            @if (count($all_fabrics) != 0)
                                @foreach ($all_fabrics as $fabric)
                                    @php
                                        $finish_arr = explode(',', $fabric->finish_id) ?? [];
                                    @endphp
                                    <tr id="fabric_sheet_edit_tr{{ $f }}">
                                        <td class="w-15">
                                            <select name="fabric_fabric_id_{{ $f }}" id="fabric_fabric_id_{{ $f }}" class="form-control  fabric_fabric_id_{{ $f }}  "  data-placeholder="Fabric Name">
                                                <option value="" ></option>
                                                {{-- <option value="" >{{  $f_name }}</option> --}}
                                                @if (!empty($fabric->fabric_id))
                                                    <option value="{{ $fabric->fabric_id }}" selected>{{ get_single_db_value($fabric->fabric_id, 'Fabric', 'name') ?? '' }}</option>
                                                @endif
                                            </select>
                                            <input type="hidden" name="fabric_save_id_{{ $f }}" ?? value="{{ $fabric->id ?? '' }}">
                                        </td>
                                        <td class="w-30">
                                            <select name="fabric_composition_id_{{ $f }}" id="fabric_composition_id_{{ $f }}" class="form-control fabric_composition_id_{{ $f }} "  data-placeholder="composition">
                                                <option value="" ></option>
                                                @if (!empty($fabric->composition_id))
                                                    <option value="{{ $fabric->composition_id }}" selected>{{ get_single_db_value($fabric->composition_id, 'Composition', 'name') ?? '' }}</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td class="w-12" >
                                            <select name="fabric_finish_id_{{ $f }}[]" id="fabric_finish_id_{{ $f }}" class="form-control fabric_finish_id_{{ $f }}"  placeholder="Finish" data-placeholder="Finish"   data-toggle="tooltip" title="Finish" multiple>
                                                <option value="" ></option>
                                                @if (count($finish_arr) != 0)
                                                    @foreach ($finish_arr as $fin_id)
                                                        <option value="{{ $fin_id ?? '' }}" selected>{{ get_single_db_value($fin_id, 'Finish', 'name') ?? '' }}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </td>
                                        <td class="w-5">
                                            <input type="number" autocomplete="off" name="fabric_weight_{{ $f }}" id="fabric_weight_{{ $f }}" class="form-control" value="{{ $fabric->weight ?? '' }}" maxlength="3">
                                        </td>
                                        <td class="w-5">
                                            <select name="fabric_weight_type_{{ $f }}" id="fabric_weight_type_{{ $f }}" data-placeholder="Type" class="fabric_weight_type_{{ $f }} form-control" >
                                                <option value=""></option>
                                                <option value="GSM" {{ ($fabric->weight_type == 'GSM') ? 'selected' : '' }}>GSM</option>
                                                <option value="oz" {{ ($fabric->weight_type == 'oz') ? 'selected' : '' }} >oz</option>
                                            </select>
                                        </td>
                                        <td class="w-5">
                                            <input type="number" autocomplete="off" name="fabric_gg_{{ $f }}" id="fabric_gg_{{ $f }}" class=" form-control" value="{{ $fabric->gg ?? '' }}" maxlength="2" data-max="49">
                                        </td>
                                        <td class="w-15">
                                            <select name="fabric_const_id_{{ $f }}" id="fabric_const_id_{{ $f }}" class="form-control fabric_const_id_{{ $f }} " data-placeholder="Construction">
                                                <option value="" ></option>
                                                @if (!empty($fabric->const_id))
                                                    <option value="{{ $fabric->const_id }}" selected>{{ get_single_db_value($fabric->const_id, 'Construction', 'name') ?? '' }}</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td class="w-3">
                                            <button type="button"  data-id="{{ $fabric->id ?? '' }}" data-model="Fabric_sheet" data-html-id="fabric_sheet_edit_tr{{ $f }}" class="remove_info_db delete"></button>
                                        </td>
                                    </tr>
                                    @php
                                        $f++;
                                    @endphp
                                @endforeach
                            @else
                                <tr id="fabric_sheet_edit_tr1">
                                    <td class="w-15">
                                        <div class="form-goup">
                                        <select name="fabric_fabric_id_1" id="fabric_fabric_id_1" class="form-control  fabric_fabric_id_1  "  data-placeholder="Fabric Name">
                                            <option value="" ></option>
                                        </select>
                                        </div>
                                    </td>
                                    <td class="w-30">
                                        <select name="fabric_composition_id_1" id="fabric_composition_id_1" class="form-control fabric_composition_id_1 "  data-placeholder="composition">
                                            <option value="" ></option>
                                        </select>
                                    </td>
                                    <td class="w-12" style="width:20%">
                                        <select name="fabric_finish_id_1[]" id="fabric_finish_id_1" class="form-control fabric_finish_id_1"  placeholder="Finish" data-placeholder="Finish"   data-toggle="tooltip" title="Finish" multiple>
                                            <option value="" ></option>

                                        </select>
                                    </td>
                                    <td class="w-5">
                                        <input type="number" autocomplete="off" name="fabric_weight_1" id="fabric_weight_1" class="form-control" value="" maxlength="3">
                                    </td>
                                    <td class="w-5">
                                        <select name="fabric_weight_type_1" id="fabric_weight_type_1" data-placeholder="Type" class="fabric_weight_type_1 form-control" >
                                            <option value=""></option>
                                            <option value="GSM" selected>GSM</option>
                                            <option value="oz"  >oz</option>
                                        </select>
                                    </td>
                                    <td class="w-5">
                                        <input type="number" autocomplete="off" name="fabric_gg_1" id="fabric_gg_1" class=" form-control" value="" maxlength="2" data-max="49">
                                    </td>
                                    <td class="w-15">
                                        <select name="fabric_const_id_1" id="fabric_const_id_1" class="form-control fabric_const_id_1 " data-placeholder="Construction">
                                            <option value="" ></option>

                                        </select>
                                    </td>
                                    <td class="w-3">
                                        <button type="button"  data-type="fabric_sheet_edit_tr1" class=" tr_remove delete"></button>
                                    </td>
                                </tr>
                            @endif
                            <input type="hidden" id="fabric_counter" value="{{ $all_fabric_count }}">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-lg-2 col-xs-4 col-sm-2 text-left ">

                </div>
                <div class="col-md-10 col-xs-10 col-sm-10">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
// function facroty_previewImages() {
//     var $preview = $('#image_preview');
//     var files = Array.from(this.files);

//     // Preview newly uploaded images
//     files.forEach(function (file, index) {
//         if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
//             alert(file.name + " is not a valid image file.");
//             return;
//         }
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             var $container = $("<div>", {
//                 style: "display: inline-block; position: relative; margin: 5px; border: 1px solid #ddd; padding: 5px; background-color: #f9f9f9;",
//                 "data-index": index
//             });
//             var $img = $("<img>", {
//                 src: e.target.result,
//                 style: "height: 100px; width: 100px; display: block; margin-bottom: 5px;"
//             });
//             var $btn = $("<button>", {
//                 text: "Remove",
//                 style: "position: absolute; top: 5px; right: 5px; background-color: red; color: white; border: none; cursor: pointer; font-size: 12px; padding: 2px 5px;",
//                 click: function () {
//                     files.splice(index, 1);
//                     $container.remove();
//                     updateFileInput(files);
//                 }
//             });
//             $container.append($img).append($btn);
//             $preview.append($container);
//         };
//         reader.readAsDataURL(file);
//     });

//     function updateFileInput(updatedFiles) {
//         var dataTransfer = new DataTransfer();
//         updatedFiles.forEach(file => dataTransfer.items.add(file));
//         $('#images')[0].files = dataTransfer.files;
//     }
// }
let selectedFiles = [];

function factory_previewImages(event) {
    var $preview = $('#image_preview');
    var newFiles = Array.from(event.target.files);

    newFiles.forEach(function (file) {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            alert(file.name + " is not a valid image file.");
            return;
        }

        // Avoid duplicate files
        if (selectedFiles.some(f => f.name === file.name)) {
            alert(file.name + " is already added.");
            return;
        }

        selectedFiles.push(file); // Add new file to global array

        var reader = new FileReader();
        reader.onload = function (e) {
            var fileIndex = selectedFiles.length - 1;

            var $container = $("<div>", {
                style: "display: inline-block; position: relative; margin: 5px; border: 1px solid #ddd; padding: 5px; background-color: #f9f9f9;",
                "data-index": fileIndex
            });

            var $img = $("<img>", {
                src: e.target.result,
                style: "height: 100px; width: 100px; display: block; margin-bottom: 5px;"
            });

            var $titleInput = $("<input>", {
                type: "text",
                name: "each_image_titles[]",
                class: "image-title",
                placeholder: "Enter title",
                style: "display: block; margin-top: 5px; width: 100%;"
            });

            var $btn = $("<button>", {
                text: "Remove",
                style: "position: absolute; top: 5px; right: 5px; background-color: red; color: white; border: none; cursor: pointer; font-size: 12px; padding: 2px 5px;",
                click: function () {
                    var indexToRemove = selectedFiles.findIndex(f => f.name === file.name);
                    if (indexToRemove !== -1) {
                        selectedFiles.splice(indexToRemove, 1);
                    }
                    $container.remove();
                    updateFileInput();
                }
            });

            $container.append($img).append($titleInput).append($btn);
            $preview.append($container);
        };

        reader.readAsDataURL(file);
    });

    updateFileInput();
}

// Function to update file input with selected images
function updateFileInput() {
    var dataTransfer = new DataTransfer();
    selectedFiles.forEach(file => dataTransfer.items.add(file));
    $('#images')[0].files = dataTransfer.files;
}

// Bind 'change' event
$("#images").off("change").on("change", function (event) {
    factory_previewImages(event);
});


// Removing existing image via Ajax (keep this functionality)
$(document).on('click', '.remove-existing-image', function (event) {
    event.preventDefault();
    const photoName = $(this).data('photo');
    const $container = $(this).closest('div');
    const $button = $(this);
    $button.prop('disabled', true).text('Removing...');

    $.ajax({
        url: '{{ route('delete.image') }}',
        type: 'POST',
        data: {
            photo_name: photoName,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $container.remove();
            } else {
                alert(response.message);
                $button.prop('disabled', false).text('Remove');
            }
        },
        error: function () {
            alert('An error occurred while deleting the image.');
            $button.prop('disabled', false).text('Remove');
        }
    });
});


</script>
