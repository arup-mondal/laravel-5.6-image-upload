<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Upload;

class UploadController extends Controller
{
    /*
    * Render the image upload form
    * Added on: 18.03.18
    */
    public function uploadForm(){
    	return view('upload-form');
    }
    /*
    * Upload the image
    * Added on: 18.03.18
    */
    public function upload(Request $request){
    	try{
	    	$validation = Validator::make($request->all(),
	    		[
	    			'image' => 'required|image|mimes:jpeg,bmp,png,gif|max:1000'
		    	],
		    	[
	    			'image.required' 	=> 'Please upload an image',
	    			'image.image' 		=> 'Please upload a valid image',
	    			'image.max' 		=> 'Please upload an image within 1 MB'

		    	]
		    );

		    if ($validation->fails()) {
		    	return redirect()
		    		->back()
		    		->withErrors($validation);
		    }

		    $ext =  $request->file('image')->getClientOriginalExtension();
		    $filename = time().'.'.$ext;

			$upload = $request->file('image')->storeAs(
			    'uploads', $filename
			);
			
			if($upload){
				Upload::create(
					['image1' => $filename]
				);
				return redirect()
		    		->back()
		    		->with(['status' => 'success', 'message' => 'Image uploaded successfully!']);
			}
		}
		catch(\Exception $e){
			return redirect()
    		->back()
    		->with(['status' => 'danger', 'message' => $e->getMessage()]);
		}	
    }
}
