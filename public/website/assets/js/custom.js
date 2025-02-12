var getUrl = window.location;
var baseurl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] ;
console.log(baseurl);

// $(document).ready(function () {
//     let itemsToShow = 10;
//     let itemsIncrement = 10;

//     $(".single-item").hide().slice(0, itemsToShow).show();

//     $("#showMoreBtn").click(function () {
//         let totalItems = $(".single-item").length;
//         let visibleItems = $(".single-item:visible").length;

//         $(".single-item").slice(visibleItems, visibleItems + itemsIncrement).fadeIn();

//         if ($(".single-item:visible").length >= totalItems) {
//             $(this).fadeOut();
//         }
//     });
// });
$(document).ready(function () {
    $("#scrollDown").click(function () {
        console.log('HI');

        $("html, body").animate({ scrollTop: $(window).scrollTop() + 500 }, "slow");
    });
});



$(document).on('click', '.cartrisel', function(e){
    e.preventDefault();

    let type = $(this).attr('data-type');
    $('.carear-trshow').hide();
    $('.carear-details-none').hide();
    console.log(type);

    $('.cartrisel').removeClass('active');
    $(this).addClass('active');
    $('.'+type+'-tri').show();
    $('.'+type+'-section').show();
})


function tinymce_textarea(used_ids, box_height = 100){
    jQuery('<script>', {
        type: 'text/javascript',
        src: baseurl+'/public/js/tinymce.min.js'
    }).appendTo('head');

    var used_id_arr = used_ids.split(',');
    console.log(used_ids, used_id_arr);
    for (let x = 0; x < used_id_arr.length; x++) {
        var text_title = $('#'+used_id_arr[x]).attr('data-title');
        console.log(text_title);
        $('#'+used_id_arr[x]).before(`<div class="textarea_title">${text_title}</div>`);

        tinymce.init({
            selector: '#'+used_id_arr[x],
            height: box_height,
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste imagetools  autosave emoticons'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | forecolor backcolor removeformat | alignleft aligncenter alignright alignjustify | bullist numlist | link image | preview restoredraft emoticons',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            image_caption: true,
            image_advtab: true,
            // toolbar: 'undo redo | link image | code',
            /* enable title field in the Image dialog*/
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px } .tox-statusbar{ display:none !important;}'
        });
    }
}
    $(".category-toggle").on("click", function () {
        $(".collapsible-container").slideToggle();
    });

$(document).ready(function () {
    $(document).on("click", ".filter-department", function (e) {
        e.preventDefault();

        let dept = $(this).data("filter");

        $(".filter-department").removeClass("active");
        $(this).addClass("active");

        // Handle "All Products" click
        if (dept === "all") {
            $.ajax({
                url: filterDepartmentUrl,
                type: "GET",
                data: { dept: "" },
                success: function (response) {
                    $("#department-collections").html(response);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    alert("Error fetching all products.");
                },
            });
        } else {

            $.ajax({
                url: filterDepartmentUrl,
                type: "GET",
                data: { dept: dept },
                success: function (response) {
                    $("#department-collections").html(response);
                    setTimeout(() => {
                        $(".all-product.gallery-items").css({
                            "height": "",
                            "min-height": "200px"
                        });
                        adjustGalleryHeight();
                    }, 100);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    alert("Error fetching filtered data.");
                },
            });
        }
    });
});

function adjustGalleryHeight() {
    let maxHeight = 200;

    $(".gallery-item").each(function () {
        let itemHeight = $(this).outerHeight();
        if (itemHeight > maxHeight) {
            maxHeight = itemHeight;
        }
    });
    $(".gallery-items").css("min-height", maxHeight + "px");
}



$(document).on('click', '.collection-image', function(e) {
    e.preventDefault();
    let data_id = $(this).attr('data-id') || 'no';

    let collection_image = get_async_data('/get_collection_view_image/' + data_id);
    $('.collection_modal_body').html(collection_image);

    setTimeout(function() {
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: false,
            autoplayTimeout: 5000,
            onTranslated: function(event) {
                let currentIndex = event.item.index;
                let activeTitle = $('.owl-item').eq(currentIndex).find('img').attr('data-title') || '';

                $('.collection_modal_footer').html(activeTitle);
            }
        });

        let initialTitle = $('.owl-item.active img').attr('data-title') || '';
        $('.collection_modal_footer').html('<strong>' + initialTitle + '</strong>');

    }, 500);

    $('#collection_image_modal').modal('show');
});


$(document).on('click', '.close-modal-btn', function(e){
    e.preventDefault();
    $('#collection_image_modal').modal('hide');
});

$(document).on('click', '.collection-modal', function(e){
    e.preventDefault();
    console.log('hi');

    let data_id = $(this).attr('data-id') || 'no';
    let collection_form = get_async_data('/get_collection_add_edit_form/'+data_id);
    $('.collection_modal_body').html(collection_form);

    $('#emp_gatepass_modal').modal('show');
    select2_single_writeable('dept', 'true', 'Department', 'name');
    select2_single_writeable('item', 'true', 'Item', 'name');
    select2_single('seasonal');
    select2_single('collection_type');
    select2_single('status');
    select2_single_writeable('division', 'true', 'Division', 'name');
    select2_single_writeable('style_label','true','Label', 'name');
    select2_single('year');


    var l = parseInt($('#fabric_counter').val()) || 1;
    for (let fi = 1; fi <= l; fi++) {
        select2_single_writeable('fabric_fabric_id_'+fi, 'true', 'Fabric', 'name');
        select2_single_writeable('fabric_composition_id_'+fi, 'true', 'Composition', 'name');
        select2_count_writeable('fabric_finish_id_'+fi, 'true', 'Finish', 'name');
        select2_single('fabric_weight_type_'+fi);
        select2_single_writeable('fabric_const_id_'+fi, 'true', 'Construction', 'name');
    }
    // let url = `admin-service-delete/${data_id}`;
    $('#admin_service_delete_btn').attr('data-id' ,data_id)


});

$(document).ready(function () {

    $('#admin_service_delete_btn').on('click', function (e) {
        e.preventDefault();

        let data_id = $(this).attr('data-id');
        let url = `admin-service-delete/${data_id}`;

        $.confirm({
            title: 'DELETE!',
            content: 'Do you really Want to <b>DELETE</b>??',
            closeIcon: true,
            closeIconClass: 'fa fa-close',
            autoClose: 'cancel|5000',
            backgroundDismiss: true,
            buttons: {
                cancel: {
                    btnClass: 'btn btn-warning',
                    keys: ['enter'],
                    action: function() {}
                },
                delete: {
                    btnClass: 'btn btn-danger',
                    action: function() {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            success: function (response) {
                                alert('Item deleted successfully!');
                                window.location.reload();
                            },
                            error: function (xhr) {
                                alert('An error occurred while deleting the item.');
                                console.error(xhr.responseText);
                            }
                        });

                    }
                }
            }
        });
    });
});


/* Add More Fabric Sheet */
$(document).on('click', '.tr_remove', function(){
    var data_type = $(this).attr("data-type");
    $('#'+data_type).remove();
});

 function get_select2_data(used_id, model_name, field_name) {
    $.ajax({
        type: "GET",
        //delay: 250,
        cache: true,
        url: baseurl + '/get_select2_data/' + model_name + '/' + field_name,
        success: function(response) {
            $('.' + used_id).append(response);
            $('#select2-' + used_id + '- results ').append(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}
function select2_capitalize(){
    $('.select2-search__field').on('keyup keypress', function(e){
        e.target.value = e.target.value.toUpperCase();
        $('.select2-results__option--highlighted[aria-selected]').children('.wrap').text(e.target.value.toUpperCase());
    });
}

function get_single_value(field_id, model_name, field_name) {
    var check_val = function() {
        var return_val = '';
        $.ajax({
            async: false,
            type: "POST",
            url: baseurl + '/get_single_value',
            data: { field_id: field_id, model_name: model_name, field_name: field_name },
            success: function(response) {
                return_val = response;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
        return return_val;
    }();

    return check_val;
}
function select2_check_company_wise(used_class, model_name) {
    if (model_name == 'Factory') {
        $('.' + used_class).on('change', function(f) {
            var final_id = $(this).children("option:selected").last().val();
            var factory_status = get_single_value(final_id, model_name, 'status');
            var factory_name = get_single_value(final_id, model_name, 'name');
            if (factory_name != '' && factory_status != '1') {
                toastr.warning('The Selected Company is Non-Listed/Blocked');
                $('.' + used_class).val('');
                $('.' + used_class).select2("close");
                return 0;
            }
        });
    }else{
        $('.' + used_class).on('change', function(f) {
            try {
                $('.' + used_class).select2("close");
                return 0;
            } catch (error) {
                return 0;
            }
        });
    }
 }
 function select2_single(used_class, get_data, model_name, field_name) {
    if (get_data == "true") {
        get_select2_data(used_class, model_name, field_name);
    }
    select2_capitalize();
    $.fn.select2.amd.require([
        'select2/selection/single',
        'select2/selection/placeholder',
        'select2/selection/allowClear',
        'select2/dropdown',
        'select2/dropdown/search',
        'select2/dropdown/attachBody',
        'select2/utils',
        'select2/dropdown/closeOnSelect'
    ], function(SingleSelection, Placeholder, AllowClear, Dropdown, DropdownSearch, AttachBody, Utils) {
        var SelectionAdapter = Utils.Decorate(
            SingleSelection,
            Placeholder
        );

        SelectionAdapter = Utils.Decorate(
            SelectionAdapter,
            AllowClear
        );

        var DropdownAdapter = Utils.Decorate(
            Utils.Decorate(
                Dropdown,
                DropdownSearch
            ),
            AttachBody
        );

        var base_element = $('.' + used_class);
       //  var base_id = $('.' + used_class).attr('id');

        $(base_element).select2({
            placeholder: $(this).attr('placeholder'),
            selectionAdapter: SelectionAdapter,
            dropdownAdapter: DropdownAdapter,
            closeOnSelect: true,
            allowClear: true,
            tags:false,
            templateResult: function(data) {
                if (!data.id) { return data.text; }
                var $res = $('<div></div>');
                $res.text(data.text);
                $res.addClass('wrap');
                return $res;
            }
        });

    });
    select2_check_company_wise(used_class, model_name);
}

function select2_single_writeable(used_class, get_data, model_name, field_name) {
    if (get_data == "true") {
        get_select2_data(used_class, model_name, field_name);
    }
    select2_capitalize();
    $.fn.select2.amd.require([
        'select2/selection/single',
        'select2/selection/placeholder',
        'select2/selection/allowClear',
        'select2/dropdown',
        'select2/dropdown/search',
        'select2/dropdown/attachBody',
        'select2/utils',
        'select2/dropdown/closeOnSelect'
    ], function(SingleSelection, Placeholder, AllowClear, Dropdown, DropdownSearch, AttachBody, Utils) {
        var SelectionAdapter = Utils.Decorate(
            SingleSelection,
            Placeholder
        );

        SelectionAdapter = Utils.Decorate(
            SelectionAdapter,
            AllowClear
        );

        var DropdownAdapter = Utils.Decorate(
            Utils.Decorate(
                Dropdown,
                DropdownSearch
            ),
            AttachBody
        );

       var base_element = $('.' + used_class);
        $(base_element).select2({
            placeholder: $(this).attr('placeholder'),
            selectionAdapter: SelectionAdapter,
            dropdownAdapter: DropdownAdapter,
            closeOnSelect: true,
            allowClear: true,
            tags: true,
            //tokenSeparators: [','],
            templateResult: function(data) {
                if (!data.id) { return data.text; }
                var $res = $('<div></div>');
                $res.text(data.text);
                $res.addClass('wrap');
                return $res;
            }
        });
        $('.' + used_class).select2("close");
    });

    select2_add(used_class, model_name, field_name, 'single');
}


function select2_count_writeable(class_name, get_data, model_name, field_name){
    if (get_data == "true") {
        get_select2_data(class_name, model_name, field_name);
    }
    select2_capitalize();
    $.fn.select2.amd.require([
        'select2/selection/single',
        'select2/selection/placeholder',
        'select2/selection/allowClear',
        'select2/dropdown',
        'select2/dropdown/search',
        'select2/dropdown/attachBody',
        'select2/utils'
    ], function (SingleSelection, Placeholder, AllowClear, Dropdown, DropdownSearch, AttachBody, Utils) {

            var SelectionAdapter = Utils.Decorate(
                SingleSelection,
                Placeholder
            );

            SelectionAdapter = Utils.Decorate(
                SelectionAdapter,
                AllowClear
            );

            var DropdownAdapter = Utils.Decorate(
                Utils.Decorate(
                    Dropdown,
                    DropdownSearch
                ),
                AttachBody
            );

            let base_element = $('.'+class_name);
            if ($('.'+class_name+" option[value='all']").length == 0 && $('.'+class_name+" option[value='deselect_all']").length == 0) {
                var all_select = true;
                $('.'+class_name+' option').each(function() {
                    if(!$(this).is(':selected')){
                        all_select = false;
                    }
                });

                var total_real = $(base_element).children('option').length;
                var total = total_real - 1;
                if (total_real > 0) {
                    $(base_element).addClass('slmul');
                    if (all_select == false) {
                        $(base_element).prepend('<option value="all">SELECT ALL</option>');
                    }else{
                        $(base_element).prepend('<option value="deselect_all">DESELECT ALL</option>');
                    }
                }
            }


            $(base_element).select2({
                placeholder: $(this).attr('data-placeholder'),
                selectionAdapter: SelectionAdapter,
                dropdownAdapter: DropdownAdapter,
                allowClear: true,
                tags: true,
                tokenSeparators: [','],
                templateResult: function (data) {
                    if (!data.id) { return data.text; }
                    var $res = $('<div></div>');
                    $res.text(data.text);
                    $res.addClass('wrap');
                    return $res;
                },
                templateSelection: function (data) {
                    if (!data.id) { return data.text; }
                    var selected = ($(base_element).val() || []).length;
                    return selected  + " of " + total;
                }
            });

    });

    select2_add(class_name, model_name, field_name, 'multi');
}
function select2_add(used_class, model_name, field_name, select_type = 'single') {
    $('.' + used_class).on('change', function(f) {
        var final_val = $(this).children("option:selected").last().text();
        var final_id = $(this).children("option:selected").last().val();
        if (model_name == 'Factory') {
           var factory_status = get_single_value(final_id, model_name, 'status');
           if (factory_status != '1') {
               toastr.warning('The Selected Company is Non-Listed/Blocked');
               $('.' + used_class).val('');
               $('.' + used_class).select2("close");
           }
           return 0;
        }
        var ch_result = check_table_field(final_val, model_name, field_name);

        if (ch_result == "true" && final_val != "") {
            $.confirm({
                title: 'Are You Sure',
                content: 'Want to add ' + final_val,
                closeIcon: true,
                closeIconClass: 'fa fa-close',
                autoClose: 'cancel|5000',
                buttons: {
                    cancel: {
                        btnClass: 'btn btn-danger',
                        keys: ['enter'],
                        action: function() {
                            $('.' + used_class).val(1).trigger("change");
                        }
                    },
                    save: {
                        btnClass: 'btn btn-default',
                        keys: ['esc'],
                        action: function() {
                            $.ajax({
                                type: "POST",
                                url: baseurl + '/add_new_select',
                                data: { datas: final_val, model: model_name, field_name: field_name },
                                success: function(response) {
                                    if (select_type == 'multi') {
                                       if (response[0] != "false") {
                                           $('.' + used_class).append(response);
                                           $('.' + used_class +' option[data-select2-tag="true"]').remove();
                                       }
                                    }else{
                                       if (response[0] != "false") {
                                           $('.' + used_class).append(response[0]);
                                           $('.' + used_class +' option[data-select2-tag="true"]').remove();
                                           $('.' + used_class).val(response[1]).trigger('change');
                                       }else{
                                           $('.' + used_class).val(response[1]);
                                       }
                                    }

                                   if (used_class.substr(0, 9) == 'finish_id') {
                                       var fserial = used_class.substr(9);
                                       style_fabric_name_maker(fserial);
                                       style_fabric_name_maker_edit(fserial);
                                   }
                                   $('.' + used_class).select2("close");

                                },
                                error: function(response) {
                                    console.log(response);
                                }
                            });
                        }
                    }
                }
            });
        } else {
           if (select_type == 'single') {
               $('.' + used_class).val(ch_result);
               if ($('.'+used_class).hasClass('value_tooltip') == true && $('.'+used_class).val() != '') {
                   $(`.${used_class}`).siblings('.select2-container').children('.select2_tooltiptext').text($('#'+used_class).children('option:selected').text())
               }
               $('.' + used_class).select2("close");
           }
        }
    });
}

function check_table_field(value, model_name, field_name, extra_val = null) {
    var check_val = function() {
        var return_val = null;
        $.ajax({
            async: false,
            type: "GET",
            url: baseurl + '/check_table_field/' + model_name + '/' + field_name,
            data: { value: value, extra_val:extra_val },
            success: function(response) {
                return_val = response;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
        return return_val;
    }();

    return check_val;
}


function get_async_data(url) {
    var get_async_data = function() {
        var return_val = '';
        $.ajax({
            async: false,
            type: "GET",
            url: baseurl + url,
            success: function(response) {
                return_val = response;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
        return return_val;
    }();
    return get_async_data;
}

function get_async_data_with_data(url, data) {
    var get_async_data = function() {
        var return_val = '';
        $.ajax({
            async: false,
            type: "GET",
            url: baseurl + url,
            data: data,
            success: function(response) {
                return_val = response;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
        return return_val;
    }();
    return get_async_data;
}

async function get_data_from_url(url) {
    const resp =  await fetch(url)
        .then(response => {
            if (!response.ok) { throw new Error('Network response was not ok'); }
            return response.json();
        })
        .then(data => { return data; })
        .catch(error => { console.error('There was a problem with the fetch operation:', error); });
    const printAddress = async () => { return await resp; };
    return await printAddress();
}


function get_async_data_post(url, data_object) {
    console.log(data_object);
    var get_async_data = function() {
        var return_val = '';
        $.ajax({
            async: false,
            type: "POST",
            url: baseurl + url,
            data: data_object,
            success: function(response) {
                return_val = response;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
        return return_val;
    }();
    return get_async_data;
}

remove_info_from_db();
function remove_info_from_db() {
    $(document).on('click', '.remove_info_db', function(e){
         e.preventDefault();
         var data_id = $(this).attr('data-id');
         var data_model = $(this).attr('data-model');
         var data_linked_model = $(this).attr('linked-data-model');
         var data_linked_field = $(this).attr('linked-field-name');
         var data_linked_id = $(this).attr('linked-data-id');
         var linked_html_id = $(this).attr('linked-html-id');
         var this_html_id = $(this).attr('data-html-id');
         var data_delete_type = $(this).attr('data-delete-id');

         $.confirm({
             title: 'DELETE!',
             content: 'Do you really Want to delete <b>SAVE DATA</b>??',
             closeIcon: true,
             closeIconClass: 'fa fa-close',
             autoClose: 'cancel|5000',
             backgroundDismiss: true,
             buttons: {
                 cancel: {
                     btnClass: 'btn btn-warning',
                     keys: ['enter'],
                     action: function() {}
                 },
                 delete: {
                     btnClass: 'btn btn-danger',
                     action: function() {
                         if (typeof data_linked_model !== typeof undefined && data_linked_model !== false) {
                             var d_type = "linked";
                             $.ajax({
                                 type: "POST",
                                 url: baseurl + '/remove_info_from_db/' + data_id,
                                 data: { data_model: data_model, d_type: d_type, linked_model: data_linked_model, linked_field: data_linked_field, linked_id: data_linked_id },
                                 success: function(response) {
                                     console.log(response);
                                     $('#' + this_html_id).remove();
                                     $('#' + linked_html_id).remove();
                                 },
                                 error: function(response) {
                                     console.log(response);
                                 }
                             });
                         } else if (typeof data_delete_type !== typeof undefined && data_delete_type !== false) {
                                var d_type = "delete_by_type";
                                $.ajax({
                                    type: "POST",
                                    url: baseurl + '/remove_info_from_db/' + data_id,
                                    data: { data_model: data_model, d_type: d_type, data_delete_type: data_delete_type },
                                    success: function(response) {
                                        console.log(response);
                                        $('#' + this_html_id).remove();
                                    },
                                    error: function(response) {
                                        console.log(response);
                                        toastr.warning("Used in Other Module or Function");
                                    }
                                });
                         } else {
                             var d_type = "single";
                             $.ajax({
                                 type: "POST",
                                 url: baseurl + '/remove_info_from_db/' + data_id,
                                 data: { data_model: data_model, d_type: d_type },
                                 success: function(response) {
                                     console.log(response);
                                     $('#' + this_html_id).remove();
                                 },
                                 error: function(response) {
                                     console.log(response);
                                     toastr.warning("Used in Other Module or Function");
                                 }
                             });
                         }

                     }
                 }
             }
         });


     });

 }
