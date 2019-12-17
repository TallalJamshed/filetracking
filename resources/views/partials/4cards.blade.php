<!-- Widgets -->
<?php 
    // $data = Helper::cardData();
    $activepercent = 0;
    $finishedpercent = 0;
    $pendingpercent = 0;
    if(!empty($data['active'])){
        $activepercent = ($data['active']/$data['total']*100);
    }
    if(!empty($data['finished'])){
        $finishedpercent = ($data['finished']/$data['total']*100);
    }
    if(!empty($data['pending'])){
        $pendingpercent = ($data['pending']/$data['total']*100);
    }
    
?>
<div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div id="activefilesbtn" class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">assignment</i>
            </div>
            <div class="content">
                <div class="text">All Active Files</div>
                <div class="number" style="display:inline-block">{{$data['active']}}</div>
                <div class="number" style="display:inline-block; float:right; margin-left:8px">{{round($activepercent,1)}}%</div>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">assignment</i>
            </div>
            <div class="content">
                <div class="text">Active Files</div>
                <div class="number count-to" style="display:inline-block" data-from="0" data-to={{$data['active']}} data-speed="500" data-fresh-interval="20"></div>
                <div class="number count-to" style="display:inline-block; float:right" data-from="0" data-to={{$data['active']}} data-speed="500" data-fresh-interval="20"></div>
            </div>
        </div>
    </div> --}}
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div id="finishedfilesbtn" class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
                <div class="text">Finished Files</div>
                <div class="number" style="display:inline-block">{{$data['finished']}}</div>
                <div class="number" style="display:inline-block; float:right">{{round($finishedpercent,1)}}%</div>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
                <div class="text">Finished Cases</div>
                <div class="number count-to" data-from="0" data-to={{$data['finished']}} data-speed="500" data-fresh-interval="20"></div>
            </div>
        </div>
    </div> --}}
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div id="pendingfilesbtn" class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">email</i>
            </div>
            <div class="content">
                <div class="text">Pending Files</div>
                <div class="number" style="display:inline-block">{{$data['pending']}}</div>
                <div class="number" style="display:inline-block; float:right">{{round($pendingpercent,1)}}%</div>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">trending_up</i>
            </div>
            <div class="content">
                <div class="text">Daily Tracks</div>
                <div class="number count-to" data-from="0" data-to="1225" data-speed="500" data-fresh-interval="20"></div>
            </div>
        </div>
    </div> --}}
</div>
<!-- #END# Widgets -->