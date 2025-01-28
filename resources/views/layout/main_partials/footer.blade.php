<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> ©  {{$general_settings->site_title ?? "no title"}}.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by <a href={{$general_settings->footer_link}} class="external text-decoration-underline">{{$general_settings->footer}}</a> || Version - {{env('VERSION')}}
                    <!-- <a href="#!" class="text-decoration-underline">Themesbrand</a> -->
                </div>
            </div>
        </div>
    </div>
</footer>