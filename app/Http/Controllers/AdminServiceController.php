<?php

namespace App\Http\Controllers;

use App\Models\AdminService;
use App\Models\Fabric_sheet;
use Illuminate\Http\Request;
use DB;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function index2() {
        $data['collections'] = DB::table('admin_services')
                                ->join('fabric_sheets', 'fabric_sheets.style_id', '=', 'admin_services.id')
                                ->where('collection_type', '=', 'All Product')
                                ->orderBy('admin_services.created_at', 'desc')
                                ->get();

        $data['mood_boards'] = DB::table('admin_services')
                            ->where('collection_type', '=', 'Mood Board')
                            ->orderBy('admin_services.created_at', 'desc')
                            ->get();

        $data['artworks'] = DB::table('admin_services')
                                    ->where('collection_type', '=', 'Artwork')
                                    ->orderBy('admin_services.created_at', 'desc')
                                    ->get();

        $data['seasons'] = DB::table('admin_services')
                                    ->where('collection_type', '=', 'Seasons')
                                    ->orderBy('admin_services.created_at', 'desc')
                                    ->get();

        $data['all_collections'] = DB::table('admin_services')
                                    ->select('*')
                                    ->orderBy('admin_services.created_at', 'desc')
                                    ->get();

        // dd( $data['all_collections'] );

        return view('admin.service_details.admin_service',$data );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


public function store(Request $request)
{
    $validated = $request->validate([
        'date' => 'nullable',
        'style_id' => 'nullable',
        'collection_type' => 'nullable|string|max:255',
        'item' => 'nullable|string|max:255',
        'dept' => 'nullable|string|max:255',
        'seasonal' => 'nullable|string|max:255',
        'year' => 'nullable',
        'status' => 'nullable|string|max:255',
        'division' => 'nullable|string|max:255',
        'style_label' => 'nullable|string|max:255',
        'title_image' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
        'each_image_titles'=>'nullable|array',
    ]);
    $style_id = $validated['style_id'] ?? 'no';

    if ($style_id != 'no') {
        $collection = AdminService::find($style_id);
    }else{
        $collection = new AdminService();
    }
    $collection->date = $validated['date'];
    $collection->collection_type = $validated['collection_type'];
    $collection->item = $validated['item'];
    $collection->dept = $validated['dept'];
    $collection->seasonal = $validated['seasonal'];
    $collection->year = $validated['year'];
    $collection->status = $validated['status'];
    $collection->division = $validated['division'];
    $collection->style_label = $validated['style_label'];

    if ($request->hasFile('images')) {
        $imageData = [];

        foreach ($request->file('images') as $index => $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/collections');
            $image->move($destinationPath, $filename);
            $imageTitle = $request->each_image_titles[$index] ?? '';
            $imageData[] = [
                'filename' => $filename,
                'title' => $imageTitle
            ];
        }
        $collection->image_path = json_encode($imageData);
        $collection->save();
    }

    if ($request->hasFile('title_image')) {
        $image = $request->file('title_image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $destinationPath = public_path('uploads/collections');
        $image->move($destinationPath, $filename);
        $collection->title_image = $filename;
    }

    $collection->save();
    $style_id = $collection->id;

    $fabric_arr_full = [];
    foreach($request->all() as $key => $value ){
        if(substr($key, 0, 6) == 'fabric'){
            $la = explode("_",$key);
            $serial =  $la[count($la) - 1];
            if (!array_key_exists($serial, $fabric_arr_full)) {
                $fabric_arr_full[$serial] = [];
            }
            if(!empty($value)){
                $key_main = substr($key, 7);
                if($key_main == 'save_id_'.$serial){
                    $fabric_arr_full[$serial]['save_id'] = $value;
                }elseif($key_main == 'fabric_id_'.$serial){
                    $fabric_arr_full[$serial]['fabric_id'] = $value;
                }elseif($key_main == 'composition_id_'.$serial){
                    $fabric_arr_full[$serial]['composition_id'] = $value;
                }elseif($key_main == 'weight_'.$serial){
                    $fabric_arr_full[$serial]['weight'] = $value;
                }elseif($key_main == 'weight_type_'.$serial){
                    $fabric_arr_full[$serial]['weight_type'] = $value;
                }elseif($key_main == 'gg_'.$serial){
                    $fabric_arr_full[$serial]['gg'] = $value;
                }elseif($key_main == 'const_id_'.$serial){
                    $fabric_arr_full[$serial]['const_id'] = $value;
                }elseif($key_main == 'finish_id_'.$serial){
                    $fabric_arr_full[$serial]['finish_id'] = $value;
                }
            }
        }
    }
    // dd($fabric_arr_full);
    if(count($fabric_arr_full) != 0){
        foreach($fabric_arr_full as $fabric){
            if(isset($fabric['fabric_id']) && isset($fabric['composition_id'])){
                if (isset($fabric['save_id'])) {
                    $fabric_sheet = Fabric_sheet::find($fabric['save_id']);
                }else{
                    $fabric_sheet = new Fabric_sheet;
                }
                $fabric_sheet->style_id  = $style_id;
                if(isset($fabric['fabric_id'])){ $fabric_sheet->fabric_id = $fabric['fabric_id']; }
                if(isset($fabric['composition_id'])){ $fabric_sheet->composition_id = $fabric['composition_id']; }
                if(isset($fabric['weight'])){ $fabric_sheet->weight = $fabric['weight']; }else{$fabric_sheet->weight = null;}

                if(isset($fabric['weight_type'])){ $fabric_sheet->weight_type = $fabric['weight_type']; }
                elseif(isset($fabric['weight'])){ $fabric_sheet->weight_type = 'GSM'; }else{$fabric_sheet->weight_type = null;}

                if(isset($fabric['gg'])){ $fabric_sheet->gg = $fabric['gg']; }else{$fabric_sheet->gg = null;}
                if(isset($fabric['const_id'])){ $fabric_sheet->const_id = $fabric['const_id']; }else{$fabric_sheet->const_id = null;}
                if(isset($fabric['finish_id'])){ $fabric_sheet->finish_id = implode(",", $fabric['finish_id']); }else{$fabric_sheet->finish_id = null;}
                $fabric_sheet->save();
            }
        }
    }


    return redirect()->back()->with('success', ' Successfully created');
}

public function deleteImage(Request $request)
{
    $photoName = $request->input('photo_name');

    if (!$photoName || !preg_match('/^[a-zA-Z0-9._-]+$/', $photoName)) {
        return response()->json(['success' => false, 'message' => 'Invalid image name.']);
    }

    $filePath = public_path('uploads/collections/' . $photoName);
    if (file_exists($filePath)) {
        try {
            unlink($filePath);
            return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting the image.']);
        }
    } else {
        return response()->json(['success' => false, 'message' => 'Image not found.']);
    }
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
     {
         $collection = AdminService::findOrFail($id);
            return response()->json([
                'collection' => $collection
            ]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
{
    $validated = $request->validate([
        'type' => 'required|string|max:255',
        'department' => 'nullable|string',
        'subdepartment' => 'nullable|string',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
        'department_title' => 'nullable|string|max:255',
    ]);

    $aisItem = AdminService::find($id);
    if ($aisItem) {
        $aisItem->title = $validated['title'];
        $aisItem->description = $validated['description'];
        $aisItem->department = $validated['department'] ?? $aisItem->department;
        $aisItem->subdepartment = $validated['subdepartment'] ?? $aisItem->subdepartment;
        $aisItem->department_title = $validated['department_title'] ?? $aisItem->department_title;

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('uploads/collections');
                $image->move($destinationPath, $filename);
                $imagePaths[] = $filename;
            }
            $aisItem->image_path = json_encode($imagePaths);
        }
        $aisItem->save();
        return redirect()->route('department.service')->with('success', 'Successfully updated !');
    } else {
        return redirect()->back()->with('error', 'Item not found')->withInput();
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = AdminService::find($id);
        if ($service->delete()) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
