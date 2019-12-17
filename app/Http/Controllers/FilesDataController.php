<?php

namespace App\Http\Controllers;

use App\FilesData;
use App\TrackingData;
use App\Faculty;
use App\Position;
use Illuminate\Http\Request;
use App\Http\Requests\fileAddRequest;
use App\Http\Requests\fileUpdateRequest;

use Session;
use Crypt;

class FilesDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::getFaculties();
        $positions = Position::getPosts();
        return view('add_file_data')->with('faculties',$faculties)->with('positions',$positions);
    }

    public function createUpdate(){
        $faculties = Faculty::getFaculties();
        $positions = Position::getPosts();
        $filesdata = FilesData::getFileRefToUpdate();
        return view('update_file_data')->with('faculties',$faculties)->with('positions',$positions)->with('filesdata',$filesdata);
    }

    public function createTrackView(){
        // $faculties = Faculty::getFaculties();
        // $positions = Position::getPosts();
        $filesdata = FilesData::getFileRef();
        return view('track_file')->with('filesdata',$filesdata);
        // return view('track_file')->with('faculties',$faculties)->with('positions',$positions);
    }

    public function getAjaxData(Request $request){
        $data = FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->join('departments','trackingdata.fk_department_id','departments.department_id')->join('faculties','departments.fk_faculty_id','faculties.faculty_id')->where('trackingdata.reference_no',$request->reference_no)->first();
        return $data;
    }

    public function getAjaxHistory(Request $request){
        $data = FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->join('departments','trackingdata.fk_department_id','departments.department_id')->join('faculties','departments.fk_faculty_id','faculties.faculty_id')->join('positions','positions.pos_id','trackingdata.fk_position_id')->join('users','trackingdata.fk_user_id','users.user_id')->where('filedata.file_id',$request->file_no)->orderBy('trackingdata.created_at')->get();
        return $data;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(fileAddRequest $request)
    {
        $id = FilesData::saveFileData($request);
        TrackingData::saveTrackData($request , $id->file_id);
        Session::flash('message','Data is saved successfully');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
        
        
        

        
        
        // $trackingdata = where('track_id',$trackid->track_id)->update(['fk_file_id'=>$fileid->file_id]);
    }

    public function storeUpdate(fileUpdateRequest $request){
        if(FilesData::checkUpdateId($request)){
            TrackingData::saveTrackData($request , $request->file_id);
            Session::flash('message','Data is updated successfully');
            Session::flash('alert-class','alert-success');
        }else{
            Session::flash('message','File reference does not match our records');
            Session::flash('alert-class','alert-danger');
        }
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\FilesData  $filesData
     * @return \Illuminate\Http\Response
     */

    public function changeStatus($id){
        FilesData::changeStatusToFin(Crypt::decrypt($id));
        Session::flash('message','File status is updated to finished successfully');
        Session::flash('alert-class','alert-warning');
        return redirect()->back();
    }
    public function changeStatusact($id){
        FilesData::changeStatusToAct(Crypt::decrypt($id));
        Session::flash('message','File status is updated to active successfully');
        Session::flash('alert-class','alert-warning');
        return redirect()->back();
    }
    

    public function show(FilesData $filesData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FilesData  $filesData
     * @return \Illuminate\Http\Response
     */
    public function edit(FilesData $filesData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FilesData  $filesData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FilesData $filesData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FilesData  $filesData
     * @return \Illuminate\Http\Response
     */
    public function destroy(FilesData $filesData)
    {
        //
    }
}
