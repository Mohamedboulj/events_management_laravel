@extends('dashboard.layouts.app')
@section('title','Coming events')
@section('content')
<div class="my-2">

@if (count($events)>0)

    @foreach ($events as $event)
<div class="card mb-3 mx-auto shadow " style="max-width: 700px;">
    <div class="row g-0">
            @if ($event->event_picture)
            <div class="col-md-4">
            <img src={{asset($event->event_picture)}} width="80%"  class="img-fluid " alt="{{$event->event_name}}"/>
            </div>
            @endif
            <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$event->event_name}}</h5>
                  <p class="card-text">{{$event->event_description}}.</p>
                  <p class="card-text">{{$event->event_place}}.</p>
                  <p class="card-text">{{$event->event_date}}.</p>
                </div>
                <button class="btn btn-primary float-end m-2">Register</button>
            </div>
    </div>
</div>
    @endforeach
@endif

</div>
@endsection









