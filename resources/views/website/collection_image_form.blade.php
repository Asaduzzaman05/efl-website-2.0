@php
    use App\Models\AdminService;
    use App\Models\Fabric_sheet;
    use App\Models\Finish;

    $collection = AdminService::find($data_id);
    $detail_image = '';

    if ($collection) {
        $data_photo_arr = json_decode($collection->image_path, true);
    } else {
        $data_photo_arr = [];
    }
    $all_fabrics = Fabric_sheet::where('style_id', $data_id)->get();
    $fabric_title = "<ol>";

@endphp

@if (count($all_fabrics) != 0)

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
          $fabric_title .= "<li>" . ($fabric_per_name ?? '') . "</li>";
      @endphp

  @endforeach
  @php
      $fabric_title .= "</ol>";
  @endphp

@endif
<div class="container">
    <div class="panel-body minimal">
        <div class="row" style="padding-top: 10px">
            <div class="owl-carousel owl-theme ">
                <img loading="lazy" src="{{ asset('public/uploads/collections/' . $collection->title_image) }}" alt="Image" style="" data-title="{{$fabric_title?? ""}}">
                @if (!empty($data_photo_arr))
                    @foreach ($data_photo_arr as $image)
                        <div class="item">
                            <img loading="lazy"
                            src="{{ asset('public/uploads/collections/' . ($image['filename'] ?? $image ?? '')) }}"
                            alt="Image"
                            data-title="{{ $image['title'] ?? '' }}">
                        </div>
                    @endforeach
               
                @endif
            </div>
        </div>
    </div>
</div>





