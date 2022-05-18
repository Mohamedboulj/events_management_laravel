@extends('layouts.app')
@section('title', 'Add events')

@section('content')

<div class="card w-50 my-3 shadow mx-auto">
    <div class="card-header">
        <h3 class="text-center">Add event</h3>
    </div>
    <div class="card-body">
        <form action="" method="get">
            <div class="form-group">
                <div form-group>
                    <label for="event_name" class="form-label">Event name</label>
                    <input type="text" class="form-control" name="event_name">
                </div>
                <div form-group>
                    <label for="event_description" class="form-label">Event description</label>
                    <input type="text" class="form-control" name="event_description">
                </div>
                <div form-group>
                    <label for="event_date" class="form-label">Event date</label>
                    <input type="date" class="form-control" name="event_date">
                </div>
                <div form-group>
                    <label for="event_place" class="form-label">Event place</label>
                    <input type="text" class="form-control" name="event_place">
                </div>
                <div form-group>
                    <label for="event_picture" class="form-label">Event picture</label>
                    <input type="file" class="form-control" name="event_picture">
                </div>
                <div class="my-2">
                    <button type="btn " class="btn btn-primary float-end">Save</button>
                    <input type="Reset" class="btn btn-warning float-end mx-2">
                </div>


            </div>


        </form>

    </div>
</div>


@endsection
