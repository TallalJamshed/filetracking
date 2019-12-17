<?php

namespace App;
use Auth;
use App\TrackingData;
use DB;

use Illuminate\Database\Eloquent\Model;

class FilesData extends Model
{
    protected $table = "filedata";
    protected $primaryKey = "file_id";
    protected $fillable = [
         "date_added" , "reference_no" , "date_finished" , "status"  , "subject" , "created_by"
    ];
    
    public static function getFiles(){
        $arr[] = 0;
        $data = DB::select(DB::raw('select max(track_id) as tid from filedata fd , trackingdata td where fd.file_id = td.fk_file_id group by fd.reference_no'));
            foreach ($data as $key => $value) {
                $arr[$key] = $value->tid; 
            }
            // $sevendays = date('Y-m-d h:m:s' , strtotime('+7 day'));
            // dd($sevendays);
        if(Auth::user()->fk_role_id == 1){
            $data = array(
                'activefiles' => FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->join('departments','trackingdata.fk_department_id','departments.department_id')
                                            ->whereIn('trackingdata.track_id',$arr)
                                            ->where('status','active')->groupBy('filedata.file_id')->get(),
                'finishedfiles' => FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->join('departments','trackingdata.fk_department_id','departments.department_id')
                                            ->whereIn('trackingdata.track_id',$arr)
                                            ->where('status','finished')->groupBy('filedata.file_id')->get(),
                'pendingfiles' => FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->join('departments','trackingdata.fk_department_id','departments.department_id')
                                            ->whereIn('trackingdata.track_id',$arr)
                                            ->where('status','pending')->groupBy('trackingdata.fk_file_id','filedata.file_id')->get(),
                'useraddedfiles' => FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->join('departments','trackingdata.fk_department_id','departments.department_id')
                                            ->whereIn('trackingdata.track_id',$arr)
                                            ->where('trackingdata.fk_user_id',Auth::user()->user_id)->groupBy('filedata.file_id')->get(),
                'referredfiles' => FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->join('departments','trackingdata.fk_department_id','departments.department_id')
                                            ->whereIn('trackingdata.track_id',$arr)
                                            ->where('trackingdata.fk_position_id',Auth::user()->fk_pos_id)
                                            ->where('trackingdata.fk_department_id',Auth::user()->fk_department_id)
                                            ->groupBy('filedata.file_id')->get(),
            );
            return $data;
        }else{
            $data = array(
                'useraddedfiles' => FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->join('departments','trackingdata.fk_department_id','departments.department_id')
                                            ->whereIn('trackingdata.track_id',$arr)
                                            ->where('trackingdata.fk_user_id',Auth::user()->user_id)->groupBy('filedata.file_id')->get(),
                'referredfiles' => FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->join('departments','trackingdata.fk_department_id','departments.department_id')
                                            ->whereIn('trackingdata.track_id',$arr)
                                            ->where('trackingdata.fk_position_id',Auth::user()->fk_pos_id)
                                            ->where('trackingdata.fk_department_id',Auth::user()->fk_department_id)
                                            ->groupBy('filedata.file_id')->get(),
            );
            // dd($data);
            return $data;
        }
        
    }

    public static function getFileRefToUpdate(){
        if(Auth::user()->fk_role_id == 1){
            return FilesData::select('file_id','reference_no','track_id')->join('trackingdata','trackingdata.fk_file_id','filedata.file_id')->groupBy('reference_no')->where('status','!=','finished')->get();
        }else{
            return FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')
            ->select('file_id','reference_no','track_id')
            ->where('trackingdata.fk_department_id',Auth::user()->fk_department_id)
            ->where('trackingdata.fk_position_id',Auth::user()->fk_pos_id)
            ->where('status','!=','finished')
            ->where('recieved_by','!=',null)
            ->where('trackingdata.sent_to',null)
            // ->orWhere('trackingdata.fk_user_id',Auth::user()->user_id)
            ->groupBy('reference_no')->get();
        }
        
    }

    public static function getFileRef(){
        if(Auth::user()->fk_role_id == 1){
            return FilesData::select('file_id','reference_no')->join('trackingdata','trackingdata.fk_file_id','filedata.file_id')->groupBy('reference_no')->get();
        }else{
            return FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->select('file_id','reference_no')->where('trackingdata.fk_department_id',Auth::user()->fk_department_id)->where('trackingdata.fk_position_id',Auth::user()->fk_pos_id)->orWhere('trackingdata.fk_user_id',Auth::user()->user_id)->groupBy('reference_no')->get();
        }
        
    }

    public static function saveFileData($request){
        $filedata = new FilesData;
        $filedata->date_added = date('Y-m-d');
        $filedata->status = "active";
        $filedata->created_by = Auth::user()->user_id;
        $filedata->reference_no = $request->ref_initial .'-'. $request->ref_no;
        $filedata->fill($request->all());
        $filedata->save();
        return FilesData::orderBy('created_at', 'DESC')->select('file_id')->first();
        
    }

    public static function checkUpdateId($request){
        $filedata = FilesData::select('file_id','reference_no','status')->where('filedata.file_id',$request->file_id)->first();
        // dd($filedata);
        // foreach ($filedata as $key => $value) {
            if(($filedata->file_id == $request->file_id) && ($filedata->reference_no == $request->completeref_no) && ($filedata->status != 'finished')){
                return true;
            }
        // }
        return false;
    }

    // public static function checkUpdateId($request){
    //     $filedata = FilesData::join('trackingdata','trackingdata.fk_file_id','filedata.file_id')->select('file_id','reference_no','status')->where('filedata.file_id',$request->file_id)->get();
    //     // dd($filedata);
    //     foreach ($filedata as $key => $value) {
    //         if(($value->file_id == $request->file_id) && ($value->reference_no == $request->completeref_no) && ($value->status != 'finished')){
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    public static function changeStatusToFin($id){
        $file = FilesData::find($id);
        $file->status = 'finished';
        $file->date_finished = date('Y-m-d');
        $file->finished_by = Auth::user()->user_id;
        $file->save();
    }
    public static function changeStatusToAct($id){
        $file = FilesData::find($id);
        $file->status = 'active';
        $file->date_finished = null;
        $file->finished_by = null;
        $file->save();
    }
    
}
