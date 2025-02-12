<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as Req;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Stevebauman\Location\Facades\Location;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(Req $request)
    {
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');
        $uniqueKey = md5($ipAddress . $userAgent);

        // dd(\Str::uuid());
        // $location = Location::get($request->ip());

        $visit = DB::table('user_visits')->where('unique_key', $uniqueKey)->first();
        if ($visit) {
            DB::table('user_visits')->where('unique_key', $uniqueKey)->increment('visit_count');
        } else {
            DB::table('user_visits')->insert([
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'unique_key' => $uniqueKey,
                'visit_count' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
    
    // image upload
    public function imageUpload($request, $name, $directory)
    {
        $doUpload = function ($image) use ($directory) {
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extention = $image->getClientOriginalExtension();
            $imageName = $name . '_' . uniqId() . '.' . $extention;
            $image->move (public_path($directory), $imageName);

            // Image::make($this)->resize(100, 200, function ($constraint) {
            //     $constraint->aspectRatio();
            // });

            return 'public/'.$directory . '/' . $imageName;
        };

        if (!empty($name) && $request->hasFile($name)) {
            $file = $request->file($name);
            if (is_array($file) && count($file)) {
                $imagesPath = [];
                foreach ($file as $key => $image) {
                    $imagesPath[] = $doUpload($image);
                }
                return $imagesPath;
            } else {
                return $doUpload($file);
            }
        }

        return false;
    }
    //

    public function createThumbnail($path, $width, $height)
    {

    }

    public function generateCode($model, $prefix = '')
    {
        $code = "000001";
        $model = '\\App\\Models\\' . $model;
        $num_rows = $model::count();
        if ($num_rows != 0) {
            $newCode = $num_rows + 1;
            $zeros = ['0', '00', '000', '0000','00000'];
            $code = strlen($newCode) > count($zeros) ? $newCode : $zeros[count($zeros) - strlen($newCode)] . $newCode;
        }
        return $prefix . $code;
    }


}
