@extends('layouts.app')
@section('title', 'Add events')

@section('content')

<div class="card w-50 my-3 shadow mx-auto">
    <div class="card-header">
        <h3 class="text-center">Add event</h3>
    </div>
    @if (session('status'))
    <div class="alert alert-success ">
        {{ session('status') }}
    </div>
    @endif
    <div class="card-body">
        <form action="/add" enctype="multipart/form-data" method="post">
         @csrf
            <div class="form-group">
                <div form-group>
                    <label for="event_name" class="form-label">Event</label>
                    <input type="text" class="form-control @error('event_name') is-invalid @enderror" value="{{ old('event_name') }}" name="event_name">
                </div>
                @error('event_name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div form-group>
                    <label for="event_description" class="form-label">Event description</label>
                    <input type="text" class="form-control " name="event_description">
                </div>

                <div form-group>
                    <label for="event_date" class="form-label">Date</label>
                    <input type="date" class="form-control @error('event_date') is-invalid @enderror" value="{{ old('event_date') }}" name="event_date">
                </div>
                @error('event_date')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div form-group>
                    <label for="event_place" class="form-label">Location</label>
                    <input type="text" class="form-control @error('event_place') is-invalid @enderror" value="{{ old('event_place') }}" name="event_place">
                </div>
                @error('event_place')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div form-group>
                    <label for="event_picture" class="form-label">Event picture</label>
                    <input type="file" class="form-control @error('event_place') is-invalid @enderror" name="event_picture">
                </div>
                @error('event_picture')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div class="my-2">
                    <button type="btn " class="btn btn-primary float-end">Save</button>
                    <input type="Reset" class="btn btn-warning float-end mx-2">
                </div>


            </div>


        </form>

    </div>
</div>


@endsection
