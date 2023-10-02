@extends('master')

@section('content')
<div class="container text-center">
    <h1>Songs Database</h1>
    <div class="d-grid gap-2 ">
        <a class="btn btn-primary" href="/form" role="button">Add Song</a>
    </div>
    @if ($songs->isEmpty()) 
        <h4 class="mt-4">No Songs Uploaded, upload now!</h4>
    @else
    <div class="row g-2">
        @foreach ($songs as $i)
        <div class="col-6">
            <div class="p-3">
                <div class="card" style="width: 18rem;">
                    @if ($i->thumbnail_path)
                        <img src="{{ asset('storage/thumbnails/' . $i->thumbnail_path) }}" class="card-img-top" alt="Thumbnail not uploaded">
                    @else
                        <img src="{{ asset('default_thumbnail.jpeg') }}" class="card-img-top">
                    @endif
                    <div class="card-body">
                    <h5 class="card-title">{{ $i->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $i->artist }}, {{ $i->release_date }}</h6>
                    
                    <audio controls style="width: 100%; max-width: 600px">
                        <source src="{{ asset('storage/songs/'. $i->file_audio_path)}}" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
                    <p class="card-text">{{ $i->tags }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection