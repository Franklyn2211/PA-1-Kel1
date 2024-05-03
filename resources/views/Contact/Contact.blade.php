@extends("layouts.layout")
@section("title", "Contact")
@section("content")

<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Get in touch</h1>
                <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ URL('/Contact') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="nama" id="nama" type="text" placeholder="Enter your name..." required>
                            <label for="nama">Full name</label>
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
                            <input class="form-control" name="phone" id="phone" type="tel" placeholder="Enter your phone..." required>
                            <label for="phone">Phone number</label>
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3167.4246115458776!2dYOUR_LONGITUDE!3dYOUR_LATITUDE!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3AYOUR_LOCATION!2sYOUR_LOCATION_NAME!5e0!3m2!1sen!2sus!4v1626734624991!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>
@endsection
