@php
     use App\Models\Fabric_cost;
    use App\Models\Color_cons;
    use App\Models\Fabric;
    use App\Models\Finish;
    use App\Models\Fabric_sheet;
@endphp
@extends('layouts.admin')
@section('title', 'Collections' )
@section('admin-content')
<main class="mb-5">
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span id="addTitle" class="my-3 heading "><i class="fas fa-home"></i> <a class=""   href="">Home</a> >Collection</span>

    </div>
    <div class="row">
        <div class="col-md-12"><button class="add-more collection-modal" id="emp_getpass"></button></div>
        @foreach ($all_collections as $data)
            <div id="accordion">
                <a class="btn btn-link col-12 collection_collapse_btn" data-toggle="collapse" data-target="collapse{{ $data->id ?? ""}} " aria-expanded="true" aria-controls="collapseOne">
                    <div class="panel-heading" role="tab" id="heading2" style="padding-top: 10px;">
                        <table class="table collection-list" style="margin-bottom: 0px;">
                            <tbody>
                                <tr>
                                    <td class="w-40 text-left">Item:{{ get_single_db_value($data->item, 'Item', 'name') }}
                                         <br> Dept:{{get_single_db_value( $data->dept, 'Department', 'name') }} </td>
                                    <td class="w-20 text-center">
                                        <img class="alt_image" src="{{ asset('public/uploads/collections/'.$data->title_image ?? '') }}" alt="">
                                        <br>
                                        <span class="green_text"></span>
                                    </td>
                                    <td class="w-40 text-right"> ID#{{ $data->id ?? '' }} <br> Date:{{$data->date ?? '' }} <br>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </a>

                @php
                    $all_fabrics = Fabric_sheet::where('style_id', $data->id)->get();
                    // dd(count($all_fabrics));
                @endphp
                <div id="collapse{{ $data->id }}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="display: none">
                    <div class="card-body">
                       <div class="container">
                        @if (count($all_fabrics) != 0)
                        <ol>
                            @foreach ($all_fabrics as $fabric)
                                @php
                                    $finish_arr = explode(',', $fabric->finish_id);
                                    $finish_names = Finish::select('id', 'name')->whereIn('id', $finish_arr)->orderBy('name','asc')->get();
                                    $fin = '';
                                    for ($i=0; $i < count($finish_names); $i++) {
                                        if ($i == count($finish_names)-1) {
                                            $fin .= $finish_names[$i]->name;
                                        }else{
                                            $fin .= $finish_names[$i]->name.', ';
                                        }
                                    }
                                    if ($fin != "") {
                                        $fin = '('.$fin.')';
                                    }

                                    $f_name = get_single_db_value($fabric->fabric_id, 'Fabric', 'name');
                                    if ($f_name != '') {  $f_name = $f_name.', '; }

                                    $com_name = get_single_db_value($fabric->composition_id, 'Composition', 'name');
                                    if ($com_name != '') {  $com_name = $com_name.', '; }

                                    $ct_name = get_single_db_value($fabric->const_id, 'Construction', 'name');
                                    if ($ct_name != '') {  $ct_name = $ct_name.', '; }


                                    $f_weight = ($fabric->weight) ? $fabric->weight : "" ;
                                    $f_weight_type = ($fabric->weight_type) ? $fabric->weight_type.', ' : "" ;
                                    $f_weight_final = "";
                                    if ($f_weight != "") { $f_weight_final = $f_weight.$f_weight_type; }

                                    $f_gg = ($fabric->gg) ? $fabric->gg.'gg, ' : "" ;
                                    $fabric_per_name = $f_name.$com_name.$f_weight_final.$f_gg.$ct_name.$fin;
                                @endphp
                                <li>{{ $fabric_per_name ?? '' }}</li>
                            @endforeach
                        </ol>
                        @endif
                       </div>
                       <a href="#" style="float: right;">
                            <button type="button" data-id="{{ $data->id }}" class="edit-xs edit-collection collection-modal"></button>
                       </a>
                     </div>

                </div>
            </div>
        @endforeach

    <div class="modal fade" id="emp_gatepass_modal" role="dialog" aria-labelledby="emp_gatepass_modal" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered emp_gatepass_modal_dialog" role="document" style="width:100%;right:11%">
            <form id="admin_service_form" action="{{ url('module-service/') }}" method="POST" style="min-width: 900px" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header" style="padding: 0px;">
                        <div class="col-md-12 col-md-12 col-xs-12" style="padding: 10px !important;"><b>ADD/Edit</b></div>
                    </div>
                    <div class="modal-body collection_modal_body" style="padding: 0px !important;padding: 0px !important; overflow-y: auto; overflow-x: hidden;height:450px;">

                    </div>
                    <div class="modal-footer" style="background:#FFFFFF">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#" id="admin_service_delete_btn"  data-id="">
                                        <button class="btn btn-danger btn-medium">Delete</button>
                                    </a>
                                </div>

                                <div class="col-md-4" >
                                    <button id="reset_btn" class="btn btn-warning btn-medium  pull-right" data-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-md-2" >
                                    <button type="submit" id="admin_service_save_btn" name="btnsave" class="btn btn-success btn-medium">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </form>
        </div>
    </div>
</main>
@endsection


@push('admin-js')


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.collection_collapse_btn').on('click', function(e){
        e.preventDefault();

        var data_target = $(this).attr('data-target');
        $('.collapseOne:not(#'+data_target+')').fadeOut();
        $('#'+data_target).fadeToggle();
    });

    // $('.collapse').collapse()

$(document).on('click', '#admin_service_save_btn', function(e){
    e.preventDefault();

    $('#admin_service_form').submit();
});

$(document).on('click', '#reset_btn', function(e){
    e.preventDefault();
    $('#emp_gatepass_modal').modal('hide');
});


$(document).on('click', '#add_fabric_sheet_btn', function() {
    var l = parseInt($('#fabric_counter').val()) || 1;
    l++;
    $('#fabric_counter').val(l);
    $('#fabric_sheet_tbody').append(`
            <tr id="fabric_sheet_edit_tr${l}">
                <td class="w-15">
                    <div class="form-goup">
                    <select name="fabric_fabric_id_${l}" id="fabric_fabric_id_${l}" class="form-control fabric_fabric_id_${l}"  data-placeholder="Fabric Name">
                        <option value="" ></option>
                    </select>
                    </div>
                </td>
                <td class="w-30">
                    <select name="fabric_composition_id_${l}" id="fabric_composition_id_${l}" class="form-control fabric_composition_id_${l}"  data-placeholder="composition">
                        <option value="" ></option>
                    </select>
                </td>
                <td class="w-12" style="width:20%">
                    <select name="fabric_finish_id_${l}[]" id="fabric_finish_id_${l}" class="form-control fabric_finish_id_${l}"  placeholder="Finish" data-placeholder="Finish"   data-toggle="tooltip" title="Finish" multiple>
                        <option value="">Finish</option>

                    </select>
                </td>
                <td class="w-5">
                    <input type="number" autocomplete="off" name="fabric_weight_${l}" id="fabric_weight_${l}" class="form-control input-text fabric_sheet_edit fabric_name_make_edit fab_name_edit  {{-- currency_two_decimal --}}" data-fab-sheet-id="" value="" maxlength="3">
                </td>
                <td class="w-5">
                    <select name="fabric_weight_type_${l}" id="fabric_weight_type_${l}" data-placeholder="Type" class="fabric_weight_type_${l} form-control input-text fabric_sheet_edit fabric_name_make_edit fab_name_edit currency_two_decimal"  data-fab-sheet-id="">
                        <option value=""></option>
                        <option value="GSM" selected>GSM</option>
                        <option value="oz">oz</option>
                    </select>
                </td>
                <td class="w-5">
                    <input type="number" autocomplete="off" name="fabric_gg_${l}" id="fabric_gg_${l}" class="fabric_sheet_edit form-control input-text fabric_name_make_edit fab_name_edit  currency_two_decimal" data-fab-sheet-id="" value="" maxlength="2" data-max="49">
                </td>
                <td class="w-15">
                    <select name="fabric_const_id_${l}" id="fabric_const_id_${l}" class="form-control input-text fabric_name_make_edit fab_name_edit fabric_const_id_${l} fabric_sheet_edit" data-fab-sheet-id="" placeholder="Construction" data-placeholder="Construction">
                        <option value="" selected></option>
                        <option value="" ></option>
                    </select>
                </td>

                <input type="hidden" class="count_fabric_sheet" name="count_fabric_sheet" id="count_fabric_sheet" value="" data-fabric-code="">
                <td class="w-3">
                    <button type="button"  data-type="fabric_sheet_edit_tr${l}" class="tr_remove  delete"></button>
                </td>
            </tr>
        `);

        select2_single_writeable('fabric_fabric_id_'+l, 'true', 'Fabric', 'name');
        select2_single_writeable('fabric_composition_id_'+l, 'true', 'Composition', 'name');
        select2_count_writeable('fabric_finish_id_'+l, 'true', 'Finish', 'name');
        select2_single('fabric_weight_type_'+l);
        select2_single_writeable('fabric_const_id_'+l, 'true', 'Construction', 'name');

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload=function(e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<script>
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

