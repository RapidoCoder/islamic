<?php

namespace App\Http\Controllers\Alim;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Video;
use App\VideoCategory;
use Auth;
use Validator;
class VideosController extends Controller
{
	public function index(){
		$videos = Video::where('posted_by', '!=', 'admin')->where('posted_id', '=', Auth::guard('alim')->user()->id)->get();
		$breadcrumb = array(
			array(
				'title'=>'control panel',
				'homeIcon'=>true,
				'rightSide'=>true,
				'url'=>'alim-dashboard'
				),
			array(
				'title'=>'Videos List',
				'homeIcon'=>true,
				'rightSide'=>false,
				'url'=>'alim-Videos'
				)
			);
		return view('alims.videos.index')->with('videos', $videos)->with("title", "Videos List")->with("breadcrumb", $breadcrumb);
	}
    /**
     *use to add video
     *@param $request
    */
    public function add(Request $request){
    	if($request->isMethod('post')){
    		$validator = Validator::make($request->all(), [
    			'category_id'=>'Required|not_in:0',
    			'title' => 'required',
    			'description' => 'required',
    			'url' => 'required',
    			'description' => 'required'
    			]);
    		if ($validator->fails()) {
    			return redirect()->back()
    			->withErrors($validator)
    			->withInput();
    		}else{
    			parse_str( parse_url( $request->input('url'), PHP_URL_QUERY ), $params ); 
    			$video = new Video;
    			$video->video_category_id = $request->input('category_id');
    			$video->title = $request->input('title');
    			$video->description = $request->input('description');
    			$video->posted_by = Auth::guard('alim')->user()->name;
    			$video->posted_id = Auth::guard('alim')->user()->id;
    			$video->status = true;
    			$video->youtube_id = $params['v'];
    			$video->save();

    			$msgs = array("type" => "alert alert-success",
    				"msg" => "Record Inserted Successfully");
    			return redirect()->route('alim-videos')->with('msgs', $msgs); 
    		}
    	}

    	$categories = ["0" => "Please Select Any Category"] +  VideoCategory::pluck('name', 'id')->toArray();
    	$breadcrumb = array(
    		array(
    			'title'=>'control panel',
    			'homeIcon'=>true,
    			'rightSide'=>true,
    			'url'=>'alim-dashboard'
    			),
    		array(
    			'title'=>'Videos List',
    			'homeIcon'=>true,
    			'rightSide'=>true,
    			'url'=>'alim-videos'
    			),
    		array(
    			'title'=>'Add Video',
    			'homeIcon'=>true,
    			'rightSide'=>false,
    			'url'=>'alim-add-video'
    			)
    		);
    	return view('alims.videos.add')->with("categories", $categories)->with("title", "Add Video")->with("breadcrumb", $breadcrumb);
    }
	 /**
     *use to update video
     *@param $request
     *@param $id
    */
	 public function update($id, Request $request){
	 	$video = Video::find( $id );
	 	if($video->posted_by == "admin" || $video->posted_id != Auth::guard('alim')->user()->id){
	 		$msgs = array("type" => "alert alert-danger",
	 			"msg" => "Record Not Found");
	 		return redirect()->route('alim-videos')->with('msgs', $msgs);
	 	}else{
	 		if($video != null){

	 			if($request->isMethod('post')){
	 				$validator = Validator::make($request->all(), [
	 					'category_id'=>'Required|not_in:0',
	 					'title' => 'required',
	 					'description' => 'required',
	 					'url' => 'required',
	 					'description' => 'required'
	 					]);
	 				if ($validator->fails()) {
	 					return redirect()->back()
	 					->withErrors($validator)
	 					->withInput();
	 				}else{

	 					parse_str( parse_url( $request->input('url'), PHP_URL_QUERY ), $params ); 
	 					$video->video_category_id = $request->input('category_id');
	 					$video->title = $request->input('title');
	 					$video->description = $request->input('description');
	 					$video->status = true;
	 					$video->youtube_id = $params['v'];
	 					$video->save();

	 					$msgs = array("type" => "alert alert-success",
	 						"msg" => "Record Updated Successfully");
	 					return redirect()->route('alim-videos')->with('msgs', $msgs); 
	 				}
	 			}
	 			/*get method*/

	 			$categories = ["0" => "Please Select Any Category"] +  VideoCategory::pluck('name', 'id')->toArray();
	 			$breadcrumb = array(
	 				array(
	 					'title'=>'control panel',
	 					'homeIcon'=>true,
	 					'rightSide'=>true,
	 					'url'=>'admin-dashboard'
	 					),
	 				array(
	 					'title'=>'Videos List',
	 					'homeIcon'=>true,
	 					'rightSide'=>true,
	 					'url'=>'admin-videos'
	 					),
	 				array(
	 					'title'=>'Update Video',
	 					'homeIcon'=>true,
	 					'rightSide'=>false,
	 					'url'=>'admin-update-video'
	 					)
	 				);
	 			return view('alims.videos.update')->with("categories", $categories)->with("title", "Update Video")->with('video',$video)->with("breadcrumb", $breadcrumb);

	 		}else{
	 			$msgs = array("type" => "alert alert-danger",
	 				"msg" => "Record Not Found");
	 			return redirect()->route('alim-videos')->with('msgs', $msgs);
	 		}
	 	}
	 }
	 /**
     *use to delete video
     *@param $id
    */
	 public function delete($id){
	 	$video = Video::find($id);
	 	if($video->posted_by == "admin" || $video->posted_id != Auth::guard('alim')->user()->id){
	 		$msgs = array("type" => "alert alert-danger",
	 			"msg" => "Record Not Found");
	 		return redirect()->route('alim-videos')->with('msgs', $msgs);
	 	}
	 	if($video){
	 		$video = Video::find($id);
	 		if($video->posted_by == "admin" || $video->posted_id != Auth::guard('alim')->user()->id){
	 			$msgs = array("type" => "alert alert-danger",
	 				"msg" => "Record Not Found");
	 			return redirect()->route('alim-videos')->with('msgs', $msgs);
	 		}
	 		$video->delete();
	 		$msgs = array("type" => "alert alert-danger",
	 			"msg" => "Record Successfully Deleted");
	 		return redirect()->route('alim-videos')->with('msgs', $msgs);
	 	}else{
	 		$msgs = array("type" => "alert alert-danger",
	 			"msg" => "Record Not Found");
	 		return redirect()->route('alim-videos')->with('msgs', $msgs);
	 	}
	 }
	}
