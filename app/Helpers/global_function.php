<?php
function get_single_db_value($field_id, $model, $field_name){
    $model_name = '\\App\\Models\\'.$model;
    $all_data = $model_name::select($field_name)->where('id', $field_id)->get();
    foreach ($all_data as $data) {
        return $data->$field_name;
    }
}

?>
