@extends("layouts.layout")
@section("title", "Sponsors")
@section("content")
<div class="container mt-5 text-center ">
    <h2>Thank you to our generous sponsors!</h2>
    <p>Look at these amazing sponsors!</p>
    <div class="row" >
        @foreach($sponsor as $sponsors)
            <div class="col-md-6 col-lg-4 mt-4">
                <div class="px-3 py-4 px-lg-4 " style="background-color:rgb(236, 234, 234);">
                    <div class="overflow-hidden">
                        <img src="{{ asset('potosponsor/' . $sponsors->poto) }}" alt="" style="width: 150px; height: 130px;">
                    </div>
                    <div class="overflow-hidden">
                        <h5 class="mt-3 text-black" style="border-bottom: 1px solid black;">{{ $sponsors->Name }}</h5>
                    </div>
                    <div class="overflow-hidden">
                        <p class="mb-0">{{ $sponsors->Description }}</p>
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
