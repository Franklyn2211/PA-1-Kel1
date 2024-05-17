@extends("layouts.layout")
@section("title", "Sponsors")
@section("content")
<div class="container mt-5 text-center ">
    <h2>Thank you to our generous sponsors!</h2>
    <p>Look at these amazing sponsors!</p>
    <div class="row" >
        @foreach($sponsor as $sponsors)
            <div class="col-md-6 col-lg-4 mt-4">
                <div class="px-3 py-4 px-lg-4 " style="background-color:rgb(16, 44, 87); border-radius: 30px;">
                    <div class="overflow-hidden">
                        <img src="{{ asset('potosponsor/' . $sponsors->photo) }}" alt="" style="width: 150px; height: 140px;">
                    </div>
                    <div class="overflow-hidden">
                        <h5 class="mt-3 text-white" style="border-bottom: 1px solid white;">{{ $sponsors->Name }}</h5>
                    </div>
                    <div class="overflow-hidden">
                        <p class="mb-0 ">{!! $sponsors->Description !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end mt-3">
        {{ $sponsor->links('pagination::simple-bootstrap-5') }}
    </div>
</div>
@endsection
