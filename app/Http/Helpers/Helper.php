<?php
    use App\FilesData;
    use App\TrackingData;
    use App\Department;

    // use Auth;
    
    class Helper {
            
        public static function cardData() {
            // echo "helloo";
            // $arr[] = 0;
            // $data = DB::select(DB::raw('select max(track_id) as tid from filedata fd , trackingdata td where fd.file_id = td.fk_file_id group by td.reference_no'));
            // foreach ($data as $key => $value) {
            //     $arr[$key] = $value->tid; 
            // }
            // $data = FilesData::select('file_id','trackingdata.created_at','departments.department_name')->join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->join('departments','trackingdata.fk_department_id','departments.department_id')
            //                                 ->whereIn('trackingdata.track_id',$arr)
            //                                 ->where('status','active')->groupBy('filedata.file_id')->get();
            $data = TrackingData::join('filedata','trackingdata.fk_file_id','filedata.file_id')->select('file_id','reference_no','trackingdata.created_at')->where('status','active')->get();                               
            // echo("<pre>");                                
            // print_r($data);
            $today = date('Y-m-d h:m:s');
            foreach ($data as $key => $value) {
                if(strtotime($today) > strtotime($value->created_at)){
                    if(date('d' ,strtotime($today) - strtotime($value->created_at)) > 7){
                        // echo($value->file_id);
                        // echo(date('Y-m-d' ,strtotime($today) - strtotime($value->created_at)));
                        $files = Filesdata::find($value->file_id);
                        $files->status = 'pending';
                        $files->save();
                    }
                } 
            }
            if(Auth::user()->fk_role_id == 1){
                $data = array(
                    "total" => FilesData::count(),
                    "active" => FilesData::where('status','active')->count(),
                    "finished" => FilesData::where('status','finished')->count(),
                    "pending" => FilesData::where('status','pending')->count()
                    
                );
            }else{
                $total = FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->where('trackingdata.fk_department_id',Auth::user()->fk_department_id)->where('trackingdata.fk_position_id',Auth::user()->fk_pos_id)->orWhere('trackingdata.fk_user_id',Auth::user()->user_id)->count();
                $active1 = FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->where('trackingdata.fk_department_id',Auth::user()->fk_department_id)->where('trackingdata.fk_position_id',Auth::user()->fk_pos_id)->where('filedata.status','active')->where('sent_to',null)->count();
                $active2 = FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->Where('trackingdata.fk_user_id',Auth::user()->user_id)->where('filedata.status','active')->where('sent_to',null)->count();
                $finished1 = FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->where('trackingdata.fk_department_id',Auth::user()->fk_department_id)->where('trackingdata.fk_position_id',Auth::user()->fk_pos_id)->where('filedata.status','finished')->where('sent_to',null)->count();
                $finished2 = FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->Where('trackingdata.fk_user_id',Auth::user()->user_id)->where('filedata.status','finished')->where('sent_to',null)->count();
                $pending1 = FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->where('trackingdata.fk_department_id',Auth::user()->fk_department_id)->where('trackingdata.fk_position_id',Auth::user()->fk_pos_id)->where('filedata.status','pending')->where('sent_to',null)->count();
                $pending2 = FilesData::join('trackingdata','filedata.file_id','trackingdata.fk_file_id')->Where('trackingdata.fk_user_id',Auth::user()->user_id)->where('filedata.status','pending')->where('sent_to',null)->count();
                $data = array(
                    "total" => $total,
                    "active" => $active1 + $active2,
                    "finished" => $finished1 + $finished2,
                    "pending" => $pending1 + $pending2
                );
            }
            // dd($data);
            return $data;
        }

        public static function navbarData(){
            
            $data = array(
                "nooffiles" => TrackingData::join('filedata','filedata.file_id','trackingdata.fk_file_id')->where('trackingdata.fk_department_id',Auth::user()->fk_department_id)->where('trackingdata.fk_position_id',Auth::user()->fk_pos_id)->where('filedata.status','!=','finished')->where('recieved_by',null)->count(),
            );
            return $data;
        }

        public static function getDepShortCode(){
            $data = Department::select('short_code')->where('department_id',Auth::user()->fk_department_id)->first();
            return $data->short_code;
        }
    }
?>