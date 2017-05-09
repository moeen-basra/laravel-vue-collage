<?php

namespace App\Http\Controllers\User;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function index() {
        return \Auth::user()->images()->get();
    }

    public function saveImage(Request $request)
    {
        try {
            $image = Image::make($request->get('image'));
        } catch (\Exception $e) {
            return $this->sendResponse($e->getMessage(), false, 406);
        }

        $name = uniqid() . ".png";

        $image->save(public_path("images/user/{$name}"));

        $url = url("/images/user", [$name]);

        \Auth::user()->images()->save(new User\Image([
            'filename' => $name,
            'is_active' => true
        ]));

        return $this->sendResponse("Image saved successfully!", true, 201, $url);
    }
}
