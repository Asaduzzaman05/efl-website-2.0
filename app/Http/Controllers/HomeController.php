<?php

namespace App\Http\Controllers;
use App\Models\AdminService;
use App\Models\CompanyModel;
use App\Models\HcmModel;
use App\Models\Slider;
use App\Models\Management;
use App\Models\PhotoGellary;
use App\Models\Project;
use App\Models\Counter;
use App\Models\Service;
use App\Models\WhyChoose;
use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Models\ReplyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\AisModel;
use App\Models\ScmModel;
use App\Models\TransactionModel;
use App\Models\InvoiceModel;
use App\Models\CourierModel;
use App\Models\ChallanModel;
use App\Models\InventoryModel;
use DB;



class HomeController extends Controller
{
    public function home(){

        $sliders = Slider::get();
        // dd( $sliders);
        $clients = Project::latest()->get();
        $services = Service::latest()->get();
        $team = Management::all();
        $counter1 = Counter::take(1)->first();
        $counter2 = Counter::take(1)->skip(1)->first();
        $counter3 = Counter::take(1)->skip(2)->first();
        $choose1 = WhyChoose::take(1)->first();
        $choose2 = WhyChoose::take(1)->skip(1)->first();
        $choose3 = WhyChoose::take(1)->skip(2)->first();
        $choose4 = WhyChoose::take(1)->skip(3)->first();
        return view('website.index',compact('choose1','choose2','choose3','choose4','sliders','clients','counter1','counter2','counter3','services','team'));
    }

    public function support(){
        return view('website.support');
    }

    public function PhotoGellary(){
        $photo = PhotoGellary::latest()->get();
        return view('website.PhotoGallery',compact('sliders'));
    }

    public function photodetails($id){

        $photoDetails = PhotoGellary::find($id);
        return view('website.photoDetails',compact('photoDetails'));
    }

    public function products(){

        return view('website.products');
    }

    public function service(){
        $service = Service::all();
       return view('website.service',compact('service'));
    }

    public function contact(){

        return view('website.contact');
    }

    public function about(){

        return view('website.about');
    }

    public function blog(){
        $data['blogs'] = BlogPost::select('*')->orderBy('id', 'DESC')->get();

        return view('website.blog')->with($data);
    }

    public function blogdetails($id){
        $data['allblogs'] = BlogPost::select('*')->orderBy('id', 'DESC')->get();
        $blog = BlogPost::findOrFail($id);
        // Increment view count
        $blog->increment('views');
        $data['blog'] = $blog;
        $data['blogs'] = BlogPost::find($id);
        $data['commentCount'] = Comment::where('blog_id', $id)->count();
        $data['comments'] = Comment::orderBy('id', 'desc')->where('blog_id', $id)->get();
        $data['topBlogs'] = BlogPost::orderBy('views', 'desc')->take(5)->get();
        foreach ($data['comments'] as $comment) {
            $comment->replies = ReplyComment::orderBy('id', 'desc')->where('comment_id', $comment->id)->get();
        }
        return view('website.blogdetails')->with($data);
    }


    public function storeComment(Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email|required_without:phone',
            // 'phone' => 'nullable|required_without:email',
            'name' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'comment' => 'required|text',
            'comnt_or_reply' => 'required|string',
            'blog_id' => 'required|string',
        ]);
        $comment = new Comment();
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->website = $request->input('website');
        // $comment->phone = $request->input('phone');
        $comment->comment = $request->input('comment');
        $comment->comnt_or_reply = $request->input('comnt_or_reply');
        $comment->blog_id = $request->input('blog_id');
        // dd($comment);
        $comment->save();
        return redirect()->back()->with('success', 'Your comment/reply has been posted!');
    }
    public function replyComment(Request $request) {
        // Validate input, ensuring either email or phone is provided
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email|required_without:phone',
            'phone' => 'nullable|required_without:email',
            'name' => 'required|string|max:255',
            'reply' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $reply = new ReplyComment();
        $reply->name = $request->input('name');
        $reply->email = $request->input('email');
        $reply->phone = $request->input('phone');
        $reply->reply = $request->input('reply');
        $reply->comment_id = $request->input('comment_id');
        $reply->save();
        return redirect()->back()->with('success', 'Your reply has been posted! ');
    }

    public function allservice($module, $subModule)
    {
        $data = [
            'module' => $module,
            'subModule' => $subModule,

        ];
    }
    public function WebService(){
        // $data = [
        //     'module' => $module,

        // ];
        // $data['allModules'] = AdminService::where(['module'=> $module, 'submodule'=>null])
        //                                 ->orderBy('created_at', 'desc')
        //                                 ->first();

        // $data['submodules'] =  AdminService::where(['module'=> $module,'type'=> 'submodule' ])
        //                                     ->select('submodule','title','description','image_path','module','id','submodule_serial')
        //                                     ->orderBy('submodule_serial', 'asc')
        //                                     ->latest()
        //                                     ->get()
        //                                     ->unique('submodule');
        // foreach ($data['submodules'] as $submodule) {
        //     $images = json_decode($submodule->image_path, true);

        //     if (is_array($images) && count($images) > 0) {
        //         $submodule->images = $images;
        //     } else {
        //         $submodule->images = [];
        //     }
        // }

    return view('website.website_service');

}

public function visitCounter(){

        $data['visit_count'] = DB::table('user_visits')->orderBy('updated_at', 'desc')->get();
        return view('admin.visitcount' , $data);
    }
public function carrers(){

        return view ('website.carrers');

    }
    public function filterDepartment(Request $request)
    {
        $dept = $request->dept;

        if (empty($dept)) {
            $collections =  DB::table('admin_services')
                                ->where('collection_type', '=', 'All Product')
                                ->orderBy('admin_services.created_at', 'desc')
                                ->get();;
        } else {
            $collections = DB::table('admin_services')
                ->where('dept', '=', $dept)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('website.filtered_department', compact('collections'));
    }



public function collection(){

    $data['collections'] = DB::table('admin_services')
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
    // $data['new_ideas'] = DB::table('admin_services')
    //                             ->join('fabric_sheets', 'fabric_sheets.style_id', '=', 'admin_services.id')
    //                             ->where('collection_type', '=', 'New Idea')
    //                             ->orderBy('admin_services.created_at', 'desc')
    //                             ->get();
    $data['new_ideas'] = DB::table('admin_services')

                                ->select('*')
                                ->where('collection_type', 'New Idea')
                                ->orderBy('created_at', 'desc')
                                ->get();

    // dd( $data['new_ideas']);

    return view ('website.collection', $data);

}
public function check_table_field($model_name, $field_name){
    $value = $_GET['value'];
    $extra_val = $_GET['extra_val'];
    $model_name = '\\App\\Models\\'.$model_name;
    if($extra_val != null){
        $has_data = $model_name::select('id')->where($field_name, $value)->where('category_id', $extra_val)->distinct('name')->get();
    }else{
        $has_data = $model_name::select('id')->where($field_name, $value)->distinct('name')->get();
    }
    if(count($has_data) == 0){
        return "true";
    }else{
        return $has_data[0]->id;
    }
}

public function get_select2_data($model_name, $field_name){
    $model_name = '\\App\\Models\\'.$model_name;
    if($model_name == 'Factory'){
        $all_data = $model_name::select('id', $field_name)->groupBy($field_name)->where('status', 1)->where('status', 4)->orderBy($field_name, 'asc')->get();
    }elseif($model_name == 'Trim_name'){
        $all_data = $model_name::select('id', $field_name)->where('status', 1)->groupBy($field_name)->orderBy($field_name, 'asc')->get();
    }
    else{
        $all_data = $model_name::select('id', $field_name)->groupBy($field_name)->orderBy($field_name, 'asc')->get();
    }

    foreach ($all_data as $data) {
        echo '<option value="'.$data->id.'">'.$data->$field_name.'</option>';
    }
}

public function remove_info_from_db($data_id){
    ini_set('memory_limit', '128M');
    ini_set('max_execution_time', 30000);

    $model_name = '\\App\\Models\\'.$_POST['data_model'];
    $type = $_POST['d_type'];

    $data_row = null;
    if ($type == "linked") {
        $linked_ids = explode(',', $_POST['linked_id']);
        $data_ids = explode(',', $data_id);
        for ($li=0; $li < count($linked_ids); $li++) {
            $field_name = $_POST['linked_field'];
            $linked_model = '\\App\\Models\\'.$_POST['linked_model'];
            // dd($model_name);

            $data_row = $model_name::find($data_ids[$li]);
            $li_del = $linked_model::where($field_name, $linked_ids[$li])->first();
            $linked_model::where($field_name, $linked_ids[$li])->delete();
            $data_row->delete();
        }

        return "success";
    }elseif($type == "delete_by_type"){
        $data_delete_type = $_POST['data_delete_type'];
        $deleted_style_id = '';
        $return_empty = '';
    }
    elseif($type == "single"){
        $data_row = $model_name::find($data_id);
        $data_row->delete();

        // activity()->performedOn($data_row)->log('deleted');

        return "success";
    }

}


}




