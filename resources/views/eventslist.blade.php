@extends('layouts.app')
@section('title','Manage events')
@section('content')
<div class="my-2  ">

@if (count($events)>0)
<table class="table rounded table-bordered shadow mx-auto " >
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Location</th>
        <th scope="col">Time</th>
        <th scope="col">Picture</th> 
        <th scope="col">Action</th>
    </tr>
    </thead>
    @foreach ($events as $event)
    <tbody class="table-group-divider">
        <tr>
            <th scope="row">{{$event->id}}</th>
            <td>{{$event->event_name}}</td>
            <td>{{$event->event_description}}</td>
            <td>{{$event->event_place}}</td>
            <td>{{$event->event_date}}</td>
            <td> @if ($event->event_picture)<img src={{asset($event->event_picture)}} width="20%"   alt="{{$event->event_name}}"/>@endif</td>
            <td class="p-2  "><button class="text-center btn btn-info btn-sm mx-1"><i class="bi bi-pencil-square"></i></button><button class="text-center btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></td>
        </tr>
    </tbody>
    @endforeach
</table>
@endif
</div>

@endsection
















