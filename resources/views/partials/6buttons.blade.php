{{-- <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
        <i class="material-icons">delete_forever</i>
    </button> --}}
    {{-- <button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float">
        <i class="material-icons">update</i>
    </button>
    <button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
        <i class="material-icons">youtube_searched_for</i>
    </button>
    <button type="button" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float">
        <i class="material-icons">exit_to_app</i>
    </button> --}}
    <a title="Finish this file." class="red-tooltip btn btn-md btn-warning" href="{{route('changestatus' , Crypt::encrypt($data->file_id))}}"><i  class="material-icons">delete_forever</i></a>