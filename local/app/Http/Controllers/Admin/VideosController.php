<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Video;
use App\VideoCategory;
use Validator;
use Auth;
class VideosController extends Controller
{
   /**
   	*use to display videos
   	*
   */
   	public function index(){
   		$videos = Video::all();
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
   				'rightSide'=>false,
   				'url'=>'admin-videos'
   				)
   			);
   		return view('admin.videos.index')->with('videos', $videos)->with("title", "Videos List")->with("breadcrumb", $breadcrumb);
   	}
   /**
   *use to add video
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
   			$video->posted_by = 'admin';
   			$video->posted_id = Auth::guard('admin')->user()->id;
   			$video->status = true;
   			$video->youtube_id = $params['v'];
   			$video->save();

   			$msgs = array("type" => "alert alert-success",
   				"msg" => "Record Inserted Successfully");
   			return redirect()->route('admin-videos')->with('msgs', $msgs); 
   		}
   	}

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
   			'title'=>'Add Video',
   			'homeIcon'=>true,
   			'rightSide'=>false,
   			'url'=>'admin-add-video'
   			)
   		);
   	return view('admin.videos.add')->with("categories", $categories)->with("title", "Add Video")->with("breadcrumb", $breadcrumb);
   }
   /**
   *use to update video
   *@param $id
   */
   public function update($id, Request $request){
   	$video = Video::find( $id );
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
   				$video->youtube_id = $params['v'];
   				$video->save();

   				$msgs = array("type" => "alert alert-success",
   					"msg" => "Record Updated Successfully");
   				return redirect()->route('admin-videos')->with('msgs', $msgs); 
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
   		return view('admin.videos.update')->with("categories", $categories)->with("title", "Update Video")->with('video',$video)->with("breadcrumb", $breadcrumb);

   	}else{
   		$msgs = array("type" => "alert alert-danger",
   			"msg" => "Record Not Found");
   		return redirect()->route('admin-videos')->with('msgs', $msgs);
   	}
   }
   /**
   *@param $id
    *use to delete video
   */
   public function delete($id){
   	$video = Video::find($id);
   	if($video){
   		$video->delete();
   		$msgs = array("type" => "alert alert-danger",
   			"msg" => "Record Successfully Deleted");
   		return redirect()->route('admin-videos')->with('msgs', $msgs);
   	}else{
   		$msgs = array("type" => "alert alert-danger",
   			"msg" => "Record Not Found");
   		return redirect()->route('admin-videos')->with('msgs', $msgs);
   	}
   }

}
