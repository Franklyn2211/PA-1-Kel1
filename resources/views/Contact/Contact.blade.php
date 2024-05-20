@extends("layouts.layout")
@section("title", "Contact")
@section("content")

<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Hubungi Kami</h1>
                <p class="lead fw-normal text-muted mb-0"></p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ URL('/Contact') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name..." required>
                            <label for="name">Full name</label>
                            <div class="invalid-feedback">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="email" type="email" placeholder="Enter your email..." required>
                            <label for="email">Email address</label>
                            <div class="invalid-feedback">An email is required.</div>
                            <div class="invalid-feedback">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="phone_number" id="phone_number" type="tel" placeholder="Enter your phone..." required>
                            <label for="phone_number">Phone number</label>
                            <div class="invalid-feedback">A phone number is required.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="message" id="message" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback">A message is required.</div>
                        </div>
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                            </div>
                        </div>
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid mb-3">
                            <input type="submit" class="btn btn-primary btn-lg" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Contact cards-->
        <div style="width: 100%; height: 400px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.467207240221!2d99.04191739999999!3d2.3484754000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e05005ab9247d%3A0x6be48b888815ad1f!2sYayasan%20Pendidikan%20Anak%20Rumah%20Damai!5e0!3m2!1sid!2sid!4v1716043703539!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>
@endsection
