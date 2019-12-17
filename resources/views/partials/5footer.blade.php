<!-- Jquery Core Js -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
{{-- <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script> --}}

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{ asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('plugins/node-waves/waves.js')}}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
{{-- <script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script> --}}
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Autosize Plugin Js -->
<script src="{{ asset('plugins/autosize/autosize.js')}}"></script>

<!-- Moment Plugin Js -->
<script src="{{ asset('plugins/momentjs/moment.js')}}"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>

<!-- Jquery Validation Plugin Css -->
<script src="{{ asset('plugins/jquery-validation/jquery.validate.js')}}"></script>

<!-- Jquery Knob Plugin Js -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<!-- JQuery Steps Plugin Js -->
<script src="{{ asset('plugins/jquery-steps/jquery.steps.js')}}"></script>

<!-- Sweet Alert Plugin Js -->
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Morris Plugin Js -->
<script src="{{ asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('plugins/morrisjs/morris.js')}}"></script>

<!-- ChartJs -->
<script src="{{ asset('plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Select2 Js-->
<script src="{{ asset('plugins/select2/js/select2.min.js')}}"></script>



{{-- <!-- Flot Charts Plugin Js -->
<script src="{{ asset('plugins/flot-charts/jquery.flot.js')}}"></script>
<script src="{{ asset('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
<script src="{{ asset('plugins/flot-charts/jquery.flot.time.js')}}"></script> --}}

<!-- Sparkline Chart Plugin Js -->
<script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

<!-- Custom Js -->
<script src="{{ asset('js/admin.js')}}"></script>
<script src="{{ asset('js/pages/charts/jquery-knob.js')}}"></script>
{{-- <script src="{{ asset('js/pages/index.js')}}"></script> --}}
<script src="{{ asset('js/pages/tables/jquery-datatable.js')}}"></script>

{{-- <script src="{{ asset('js/pages/index.js')}}"></script> --}}
<script src="{{ asset('js/pages/forms/form-wizard.js')}}"></script>
<script src="{{ asset('js/pages/forms/basic-form-elements.js')}}"></script>


<!-- Demo Js -->
<script src="{{ asset('js/demo.js')}}"></script>

<script>
$(document).ready(function() {
    $('.addfileselect2').select2({
        placeholder:"please select an option",
    });
});
</script>

<script>
    $('.count-to').countTo();
</script>

<script>
    setTimeout(function() {
        $('#message').fadeOut('slow');
    }, 3000); 
</script>

<script>
    $('#file_id').on('change',function(){
        $('#completeref_no').val($('#file_id').find(':selected').data('ref_no'));
        $('#track_id').val($('#file_id').find(':selected').data('track_id'));
    });
</script>

<script>
    $('#fk_faculty_id').on('change',function(){
        var id = $('#fk_faculty_id').val();
        $.ajax({
            type:'POST',
            url:'/getdepartajax',
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{faculty_id:id , _token: '{{csrf_token()}}'},
            success:function(data){
                $('#fk_department_id').prop('disabled',false)
                $('#fk_department_id').children('option:not(:first)').remove();
                data.forEach(element => {
                    var a = new Option(element.department_name , element.department_id);
                    a.setAttribute("data-shortcode",element.short_code);
                    $('#fk_department_id').append(a);
                });
            }
        })
    });
</script>
{{-- <script>
    $('#update_reference_no').on('focusout',function(){
        var ref_no = $('#update_reference_no').val();
        // $('#fk_department_id').html('<option value="' + id+ '">' + id + '</option>') ;
        $.ajax({
            type:'POST',
            url:'/getdataajax',
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{reference_no:ref_no , _token: '{{csrf_token()}}'},
            success:function(data){
                // alert(data.file_id);
                $('#fk_department_id').prop('disabled',false)
                $('#fk_department_id').children('option:not(:first)').remove();
                $('#subject').val(data.subject);
                $('#fk_faculty_id').val(data.fk_faculty_id).attr('selected' , 'selected').change();
                $('#fk_department_id').val(data.fk_department_id).attr('selected' , 'selected').change();
                $('#fk_position_id').val(data.fk_position_id).attr('selected' , 'selected').change();
                $('#name').val(data.name);
                $('#comments').val(data.comments);

                // data.forEach(element => {
                //     $('#fk_department_id').append(new Option(element.department_name , element.department_id));
                // });
            }
        })
    });
</script> --}}
<script>
    $('#trackfile').on('click',function(){
        var fileno = $('#referencehistory').find(':selected').val();
        $('.panel-success').remove();
        $.ajax({
            type:'POST',
            url:'/gethistoryajax',
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{file_no:fileno , _token: '{{csrf_token()}}'},
            success:function(data){
                var dateAr = data[0].date_added.split('-');
                var newDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
                $('#dateheader').text(newDate);
                $('#subject').text(data[0].subject);

                for(var i=0; i<data.length; i++){
                $('#accordion_2').append('<div class="panel panel-success"> <div class="panel-heading" role="tab" id="headingOne_2"><div class="col-md-6 panel-title" align="center"><h4 class="panel-title"><a><label id="refheader" name="trackref[]"></label></a></h4></div><div class="col-md-6 panel-title" align="center"><h4 class="panel-title"><a><label id="dateheader" name="trackdate[]"></label></a></h4></div></div><div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2"><div class="panel-body"><div class="row"><div class="col-md-2" align="center"><label>Faculty: </label></div><div class="col-md-4"><label name="faculty[]" style="font-weight:unset; "></label></div><div class="col-md-2" align="center"><label>Department: </label></div><div class="col-md-4"><label name="department[]" style="font-weight:unset; "></label></div></div><div class="row"><div class="col-md-2" align="center"><label>Post: </label></div><div class="col-md-4"><label name="position[]" style="font-weight:unset; "></label></div><div class="col-md-2" align="center"><label>Name: </label></div><div class="col-md-4"><label name="name[]" style="font-weight:unset; "></label></div></div><div class="row"><div class="col-md-2" align="center"><label>Added By: </label></div><div class="col-md-4"><label name="user[]" style="font-weight:unset; "></label></div><div class="col-md-2" align="center"><label>Recieved On: </label></div><div class="col-md-4"><label name="recieved_on[]" style="font-weight:unset; "></label></div></div></div></div></div>');
                var dateAr = data[i].track_date.split('-');
                var newDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
                $('label[name="trackref[]"]').eq(i).text(data[i].reference_no);
                $('label[name="trackdate[]"]').eq(i).text(newDate);
                $('label[name="faculty[]"]').eq(i).text(data[i].faculty_name);
                $('label[name="department[]"]').eq(i).text(data[i].department_name);
                $('label[name="position[]"]').eq(i).text(data[i].pos_name);
                $('label[name="name[]"]').eq(i).text(data[i].track_name);
                $('label[name="user[]"]').eq(i).text(data[i].name);
                $('label[name="recieved_on[]"]').eq(i).text(data[i].date_recieved);
                }
            }
        })
    });
</script>
{{-- <script>
    // $('#fk_faculty_id').on('change',function(){
    //     $('#ref_initial').val('');
    // });
    $('#fk_department_id').on('change',function(){
        var code = $(this).find('option:selected').data('shortcode')
        $('#ref_initial').val('PMAS/AAUR/' + code);
    });
</script> --}}

<script>
    $("#activefilesbtn").click(function() {
        // alert('helloo');
        document.location.href = "/#activefilestbl";
    // $('html,body').animate({
    //     scrollTop: $("#activefilestbl").offset().top - 100},
    //     'slow');
});
$("#finishedfilesbtn").click(function() {
        // alert('helloo');
        document.location.href = "/#finishedfilestbl";
    // $('html,body').animate({
    //     scrollTop: $("#finishedfilestbl").offset().top - 100},
    //     'slow');
});
$("#pendingfilesbtn").click(function() {
        // alert('helloo');
        document.location.href = "/#pendingfilestbl";
    // $('html,body').animate({
    //     scrollTop: $("#pendingfilestbl").offset().top - 100},
    //     'slow');
});
$("#referedfilesbtn").click(function() {
        // alert('helloo');
        document.location.href = "/#referedfilestbl";
    // $('html,body').animate({
    //     scrollTop: $("#referedfilestbl").offset().top - 100},
    //     'slow');
});
</script>