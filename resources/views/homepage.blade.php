@extends('framwork.template')
@section('content')

{{-- <div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Active %</h2>
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
            
            <div class="body" align="center">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <input type="text" class="knob" data-linecap="round" value={{round($activepercent,2)}} data-width="125" data-height="125" data-thickness="0.25" data-fgColor="#E91E63" data-bgColor="rgba(233, 30, 99, 0.3)"
                                readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Finished %</h2>
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
            <div class="body" align="center">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <input type="text" class="knob" data-linecap="round" value={{round($finishedpercent,2)}} data-width="125" data-height="125" data-thickness="0.25" data-fgColor="#00a5ba" data-bgColor="rgba(0, 188, 212, 0.3)"
                                readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Discarded %</h2>
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
            <div class="body" align="center">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <input type="text" class="knob" data-linecap="round" value={{round($discardedpercent,2)}} data-width="125" data-height="125" data-thickness="0.25" data-fgColor="#8BC34A" data-bgColor="rgba(139, 195, 74, 0.3)"
                                readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> --}}

@if (isset($filedata['activefiles']))
    <!-- ALL FIles Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 id="activefilestbl" style="font-weight:bold">
                        All Active Files
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
                <div  class="body">
                    <div class="table-responsive">
                        {{-- <div><input type="text" id="min"><input type="text" id="max"></div> --}}
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <?php $count=1; ?>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Recieved</th>
                                    <th>File Reference No</th>
                                    <th>Status</th>
                                    {{-- <th style="width:30%">Comments</th> --}}
                                    <th>Date Added</th>
                                    <th>Last Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($filedata['activefiles'] as $data)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>
                                            @if ($data->recieved_by == 0)
                                                <input type="checkbox" disabled style="position:unset; opacity:unset; left:unset;">
                                            @else
                                                <input type="checkbox" disabled checked style="position:unset; opacity:unset; left:unset;">
                                            @endif
                                        </td>
                                    <td>{{$data->reference_no}}</td>
                                    <td>{{$data->status}}</td>
                                    {{-- <td>{{$data->comments}}</td> --}}
                                    <td>{{$data->date_added}}</td>
                                    <td>{{$data->department_name}}</td>
                                    <td>
                                        <a title="Finish this file." class="red-tooltip btn btn-md btn-danger" href="{{route('changestatus' , Crypt::encrypt($data->file_id))}}"><i  class="material-icons">visibility_off</i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Table -->
@endif

@if (isset($filedata['finishedfiles']))
    <!-- ALL FIles Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 id="finishedfilestbl" style="font-weight:bold">
                        All Finished Files
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
                    <div class="table-responsive">
                        {{-- <div><input type="text" id="min"><input type="text" id="max"></div> --}}
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <?php $count=1; ?>
                                <tr>
                                    <th>Serial No</th>
                                    <th>File Reference No</th>
                                    <th>Status</th>
                                    {{-- <th style="width:30%">Comments</th> --}}
                                    <th>Date Finished</th>
                                    <th>Last Department</th>
                                    {{-- <th class="hideable">Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($filedata['finishedfiles'] as $data)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$data->reference_no}}</td>
                                    <td>{{$data->status}}</td>
                                    {{-- <td>{{$data->comments}}</td> --}}
                                    <td>{{$data->date_finished}}</td>
                                    <td>{{$data->department_name}}</td>
                                    <td>
                                        <a title="Activate this file." class="red-tooltip btn btn-md btn-success" href="{{route('changestatusact' , Crypt::encrypt($data->file_id))}}"><i  class="material-icons">assignment_turned_in</i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Table -->
@endif

@if (isset($filedata['pendingfiles']))
    <!-- Referred Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 id="pendingfilestbl" style="font-weight:bold">
                    All Pending Files
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
                <div class="table-responsive">
                    {{-- <div><input type="text" id="min"><input type="text" id="max"></div> --}}
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <?php $count=1; ?>
                            <tr>
                                <th>Serial No</th>
                                <th>File Reference No</th>
                                <th>Status</th>
                                {{-- <th style="width:30%">Comments</th> --}}
                                <th>Date Added</th>
                                <th>Date Finished</th>
                                <th>Last Department</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filedata['pendingfiles'] as $data)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$data->reference_no}}</td>
                                <td>{{$data->status}}</td>
                                {{-- <td>{{$data->comments}}</td> --}}
                                <td>{{$data->date_added}}</td>
                                <td><?php echo ($data->date_finished != null) ? $data->date_finished : "NA" ?></td>
                                <td>{{$data->department_name}}</td>
                                {{-- <td class="hideable"> --}}
                                    {{-- @include('partials.6buttons') --}}
                                    {{-- <button class="btn ptn primary"><i class="material-icons">delete_forever</i></button> --}}
                                {{-- </td> --}}
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Table -->
@endif

@if (isset($filedata['useraddedfiles']))
    <!-- User Added Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="font-weight:bold">
                    User Added Files
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
                <div class="table-responsive">
                    {{-- <div><input type="text" id="min"><input type="text" id="max"></div> --}}
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <?php $count=1; ?>
                            <tr>
                                <th>Serial No</th>
                                <th>Recieved</th>
                                <th>File Reference No</th>
                                <th>Status</th>
                                {{-- <th style="width:30%">Comments</th> --}}
                                <th>Date Added</th>
                                <th>Date Finished</th>
                                <th>Last Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filedata['useraddedfiles'] as $data)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>
                                    @if ($data->recieved_by == 0)
                                        <input type="checkbox" disabled style="position:unset; opacity:unset; left:unset;">
                                    @else
                                        <input type="checkbox" disabled checked style="position:unset; opacity:unset; left:unset;">
                                    @endif
                                </td>
                                <td>{{$data->reference_no}}</td>
                                <td>{{$data->status}}</td>
                                {{-- <td>{{$data->comments}}</td> --}}
                                <td>{{$data->date_added}}</td>
                                <td><?php echo ($data->date_finished != null) ? $data->date_finished : "NA" ?></td>
                                <td>{{$data->department_name}}</td>
                                <td>
                                    @if ($data->date_finished == null)
                                    <a title="Finish this file." class="red-tooltip btn btn-md {{$data->date_finished != null ? 'btn-default' : 'btn-danger'}}" href="{{route('changestatus' , Crypt::encrypt($data->file_id))}}"><i  class="material-icons">visibility_off</i></a>                                        
                                    @endif
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Table -->
@endif

@if (isset($filedata['referredfiles']))
    <!-- Referred Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 id="referedfilestbl" style="font-weight:bold">
                    Referred Files
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
                <div class="table-responsive">
                    {{-- <div><input type="text" id="min"><input type="text" id="max"></div> --}}
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <?php $count=1; ?>
                            <tr>
                                <th>Serial No</th>
                                <th>File Reference No</th>
                                <th>Status</th>
                                {{-- <th style="width:30%">Comments</th> --}}
                                <th>Date Added</th>
                                <th>Date Finished</th>
                                <th>Last Department</th>
                                <th>Mark seen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filedata['referredfiles'] as $data)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$data->reference_no}}</td>
                                <td>{{$data->status}}</td>
                                {{-- <td>{{$data->comments}}</td> --}}
                                <td>{{$data->date_added}}</td>
                                <td><?php echo ($data->date_finished != null) ? $data->date_finished : "NA" ?></td>
                                <td>{{$data->department_name}}</td>
                                <td>
                                    @if($data->date_recieved)
                                        <button title="Mark as Seen." class="red-tooltip btn btn-md btn-default"><i  class="material-icons">visibility_off</i></button>
                                    @else
                                        <a title="Mark as Seen." class="red-tooltip btn btn-md btn-success" href="{{route('changevisible' , Crypt::encrypt($data->track_id))}}"><i  class="material-icons">visibility</i></a>
                                    @endif

                                    {{-- <a title="Mark as Seen." class="red-tooltip btn btn-md" href="{{route('changevisible' , Crypt::encrypt($data->track_id))}}"><i  class="material-icons">visibility</i></a> --}}
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Table -->
@endif





@endsection