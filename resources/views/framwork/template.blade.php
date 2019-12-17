<!DOCTYPE html>
<html>
    @include('partials.1header')
    <body class="theme-red">
        <?php $data = Helper::navbarData();?>
        
        @include('partials.2navbar' , ['data'=>$data])

        <section>
            @include('partials.3sidebar')
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2>DASHBOARD</h2>
                </div>
                <?php $data = Helper::cardData();?>
                @include('partials.4cards' , ['data' => $data])
                {{-- <div class="row clearfix"> --}}
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> --}}
                        @if(Session::has('message'))
                            <p id="message" style="color:black" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        @yield('content')
                    {{-- </div> --}}
                {{-- </div> --}}
            </div>
        </section>

        

        @include('partials.5footer')
    </body>
</html>