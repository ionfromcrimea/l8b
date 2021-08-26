<?php
namespace App\Http\Controllers;

use App\Models\Image;
use App\Jobs\ProcessImageThumbnails;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    /**
     * Show Upload Form
     *
     * @param  Request  $request
     * @return Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return view('upload_form');
    }

    /**
     * Upload Image
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
//       dd($request);
        // upload image
        $this->validate($request, [
            'demo_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('demo_image');
        $input['demo_image'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/images');
        $image->move($destinationPath, $input['demo_image']);

        // make db entry of that image
        $imageModel = new Image;
        $imageModel->org_path = 'images' . DIRECTORY_SEPARATOR . $input['demo_image'];
        $imageModel->save();

        // defer the processing of the image thumbnails
        ProcessImageThumbnails::dispatch($imageModel);

        return Redirect::to('image/index')->with('message', 'Image uploaded successfully!');
    }
}
