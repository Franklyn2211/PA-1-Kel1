
<footer id="footer" class="footer position-relative pt-5" style="margin-top: 20px;">
    <div class="container">
        <div class="row justify-content-between align-items-start">
            @if ($footer)
            <div class="col-md-4">
                <!-- About Us -->
                <h5 class="fw-bold mb-2">About Us</h5>
                <h5 class="fw-bold mb-3">Yayasan Pendidikan Anak Rumah Damai</h6>
                    <ul class="nav flex-column text-muted">
                        <li class="nav-item mb-2">
                            {!! $footer->about!!}
                        </li>
                    </ul>
            </div>

            <div class="col-md-3">
                <!-- Contact Us -->
                <h5 class="fw-bold mb-3">Contact Us</h5>
                <ul class="nav flex-column text-muted">
                    <li class="nav-item mb-2">No.Hp: {{$footer->phone_number}}
                    </li>
                    <li class="nav-item mb-2">Email: {{$footer->email}}
                    </li>
                </ul>
            </div>

            <div class="col-md-4">
                <!-- Find Us On -->
                <h5 class="fw-bold mb-3">Find Us On</h5>
                <div class="social-links d-flex">
                    <a href="{{$footer->facebook_url}}"><i class="bi bi-facebook"></i></a>
                    <a href="{{$footer->instagram_url}}"><i class="bi bi-instagram"></i></a>
                    <a href="{{$footer->youtube_url}}"><i class="bi bi-youtube"></i></a>
                    <a href="{{$footer->tiktok_url}}"><i class="bi bi-tiktok"></i></a>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="container text-center footer-bottom">
        <hr>
        <p>© <span>2024</span> <strong class="px-1">YPARUMAHDAMAI</strong> <span>All Rights Reserved</span></p>
           <p> Designed by <a href="">Kel01-PA12024</a></p>
    </div>
</footer>
