@extends('framwork.template')
@section('content')
<!-- Horizontal Layout -->

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Add New File
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
                <form class="form-horizontal" method="POST" action="{{route('addfilesindb')}}">
                    @csrf
                    <div class="row clearfix farowtopmargin">
                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 form-control-label">
                            <label for="reference_no">File Reference No</label>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="ref_initial" name="ref_initial" value="PMAS/AAUR/{{Helper::getDepShortCode()}}" readonly/>
                                    @error('ref_initial')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="text" id="reference_no" name="ref_no" class="form-control" value="{{ old('ref_no') }}" autocomplete="ref_no" autofocus placeholder="Enter file reference number">
                                </div>
                                @error('ref_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 form-control-label">
                            <label for="status">Subject</label>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}" autocomplete="subject" autofocus placeholder="Enter Subject">
                                </div>
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix farowtopmargin">
                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 form-control-label">
                            <label for="faculty">Faculty</label>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <select name="fk_faculty_id" id="fk_faculty_id" autofocus  class="form-control addfileselect2"  style="">
                                    <option value=""></option>

                                    @foreach ($faculties as $faculty)
                                        <option value={{$faculty->faculty_id}}>{{$faculty->faculty_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            @error('fk_faculty_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 form-control-label">
                            <label for="fk_department_id">Department</label>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <select name="fk_department_id" id="fk_department_id" autofocus class="form-control addfileselect2"  disabled>
                                    <option value="">-- Please select department --</option>
                                    
                                </select>
                            </div>
                            @error('fk_department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    
                    <div class="row clearfix farowtopmargin">
                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 form-control-label">
                            <label for="fk_position_id">Post</label>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <select name="fk_position_id" id="fk_position_id" autofocus class="form-control addfileselect2" >
                                    <option value="">-- Please select post--</option>

                                    @foreach ($positions as $post)
                                        <option value={{$post->pos_id}}>{{$post->pos_name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            @error('fk_position_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 form-control-label">
                            <label for="name_of_recv">Name</label>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="track_name" name="track_name" value="{{ old('track_name') }}" autocomplete="track_name" autofocus class="form-control" placeholder="Enter name">
                                </div>
                                @error('track_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row clearfix farowtopmargin">
                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 form-control-label">
                            <label for="reference_no">Comments</label>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="comments"  id="comments" cols="40" rows="3"></textarea>
                                </div>
                                @error('comments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="status">Comments</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="comments" name="comments" class="form-control" placeholder="Enter Comments">
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="row clearfix farowtopmargin" align="center">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Horizontal Layout -->
@endsection