@extends('layouts.layout')
@section('title', 'Program')
@section('content')

<div class="container mt-5">
        <div class="text-center mb-5">
            <h2 style="border-bottom: 1px solid #000; display: inline-block; padding-bottom: 0.3rem;">Program YPA Rumah Damai</h2>
        </div>

    @foreach($program as $item)
        <div class="modal-body">
            <h3>{{ $item->program_title }}</h3>
            <p>{!! $item->Description !!}</p>
        </div>
    @endforeach
</div>
@endsection
