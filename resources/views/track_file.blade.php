@extends('framwork.template')
@section('content')
<!-- Horizontal Layout -->
<div class="row ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Track File
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="row" align="center">
                    {{-- <form action="" method="post"> --}}
                        <div class="col-md-8">
                            <div class="col-md-6">
                                <label for="" class="control-label">File Reference No:</label>
                            </div>
                            <div class="col-md-6">
                                    <select name="file_id" id="referencehistory" class="form-control addfileselect2" style="">
                                            <option value=""></option>

                                            @foreach ($filesdata as $file)
                                                <option value={{$file->file_id}}>{{$file->reference_no}}</option>
                                            @endforeach
        
                                        </select>
                                {{-- <input type="text" id="referencehistory" class="form-control col-md-6"> --}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button id="trackfile" class="btn btn-primary" >Submit</button>
                        </div>
                        
                    {{-- </form> --}}
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
                        <div class="info-box-2 bg-indigo hover-expand-effect" style=" margin-left:auto; margin-right:auto">
                            <div class="icon">
                                <i class="material-icons">today</i>
                            </div>
                            <div class="content" >
                                <div class="" style="font-weight:bold">Date Added</div>
                                <div class="" id="dateheader"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="info-box-2 bg-purple hover-expand-effect" style=" margin-left:auto; margin-right:auto">
                            <div class="icon">
                                <i class="material-icons">format_align_left</i>
                            </div>
                            <div class="content">
                                <div class="" style="font-weight:bold">Subject</div>
                                <div class="" id="subject"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div align="center">
                    <h3 class="ml-auto mr-auto">History</h3>
                </div>
                    
                    <hr>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <label for="" class="control-label">Faculty:</label>
                            <input type="text" id="facultyhistory" class="">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="control-label">Department:</label>
                            <input type="text" id="departmenthistory" class="">
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <label for="" class="control-label">Position:</label>
                            <input type="text" id="positionhistory" class="">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="control-label">Name:</label>
                            <input type="text" id="namehistory" class="">
                        </div>
                    </div> --}}
                {{-- </div> --}}
                <div class="panel-group" id="accordion_2" role="tablist" aria-multiselectable="true">
                    {{-- <div class="panel panel-success">
                        <div class="panel-heading" role="tab" id="headingOne_2">
                            <div class="col-md-6 panel-title" align="center">
                                <h4 class="panel-title">
                                    <a>
                                        <label id="dateheader" name="trackdate[]">Reference No:  PMAS/AAUR/DU-333</label>
                                    </a>
                                </h4>
                            </div>
                            <div class="col-md-6 panel-title" align="center">
                                <h4 class="panel-title">
                                    <a>
                                        <label id="dateheader" name="trackdate[]">Date Added:  27-8-2019</label>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2" align="center">
                                        <label>Faculty: </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label name="faculty[]" style="font-weight:unset; ">Faculty of Forestry, Range Mangement & Wildlife</label>
                                    </div>
                                    <div class="col-md-2" align="center">
                                        <label>Department: </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label name="department[]" style="font-weight:unset; ">Department of Continuing Education, Home Economic & Women Development</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2" align="center">
                                        <label>Post: </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label name="position[]" style="font-weight:unset; ">Assistant Director</label>
                                    </div>
                                    <div class="col-md-2" align="center">
                                        <label>Name: </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label name="name[]" style="font-weight:unset; ">Nabeel Yousaf Pasha</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2" align="center">
                                        <label>Added By: </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label name="user[]" style="font-weight:unset; ">Majid Tahir</label>
                                    </div> 
                                    <div class="col-md-2" align="center">
                                        <label>Recieved On: </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label name="comment[]" style="font-weight:unset; ">27-04-2019</label>
                                    </div>  
                                </div>
                                
                            </div>
                        </div>
                    </div> --}}
                </div>
                
                {{-- <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12"> --}}
                        {{-- <b>Panel Success</b> --}}
                        {{-- <div class="panel-group" id="accordion_2" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-success">
                                <div class="panel-heading" role="tab" id="headingOne_2">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapseOne_2" aria-expanded="true" aria-controls="collapseOne_2">
                                            <label id="dateheader">Collapsible Group Item #2</label>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                        non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                        single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                        helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                        Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                                        raw denim aesthetic synth nesciunt you probably haven't heard of them
                                        accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-success">
                                <div class="panel-heading" role="tab" id="headingTwo_2">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapseTwo_2" aria-expanded="false"
                                           aria-controls="collapseTwo_2">
                                            Collapsible Group Item #2
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo_2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_2">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                        non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                        single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                        helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                        Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                                        raw denim aesthetic synth nesciunt you probably haven't heard of them
                                        accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-success">
                                <div class="panel-heading" role="tab" id="headingThree_2">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapseThree_2" aria-expanded="false"
                                           aria-controls="collapseThree_2">
                                            Collapsible Group Item #3
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree_2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_2">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                        non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                        single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                        helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                        Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                                        raw denim aesthetic synth nesciunt you probably haven't heard of them
                                        accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- #END# Horizontal Layout -->
@endsection