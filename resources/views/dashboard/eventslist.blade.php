@extends('dashboard.layouts.app')
@section('title', 'Manage events')
@section('content')
    <div class="container-fluid">
        <div class="row">

        <x-sidebar/>


            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2  border-bottom">

                    <h1 class="h2">Manage events</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="/add" type="button" class="btn btn-sm btn-outline-secondary"><i
                                    class="bi bi-plus-lg"></i>Add
                                event</a>
                        </div>
                    </div>
                </div>
                <div>

                    <div class="my-2">
                        <form class="d-flex justify-content-end" method="get" action="{{ url('search') }}">
                            <input class="form-control w-25 me-2" name="query" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        @isset($success)
                            <div class="alert alert-success my-1">
                                <h6>{{ $success }}</h6>
                            </div>
                        @endisset

                        @isset($error)
                            <div class="alert alert-danger my-1">
                                <h6>{{ $error }}</h6>
                            </div>
                        @endisset
                    </div>
                    @if (count($events) > 0)
                        <table class="table table-responsive table-bordered table-sm  ">
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
                                        <th scope="row">{{ $event->id }}</th>
                                        <td width="150px">{{ $event->event_name }}</td>
                                        <td width="250px"> {{ str_limit($event->event_description, 100) }}</td>
                                        <td width="100px">{{ $event->event_place }}</td>
                                        <td>{{ $event->event_date }}</td>
                                        <td width="200px">
                                            @if ($event->event_picture)
                                                <img src={{ asset($event->event_picture) }}
                                                    alt="{{ $event->event_name }}" />
                                            @endif
                                        </td>
                                        <td class="p-2  ">

                                            <a href="{{ route('events.edit', $event->id) }}"
                                                class="text-center btn btn-info btn-sm mx-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{route('eventdelete', $event->id)}}"
                                                class="text-center btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash"></i>
                                            </a>


                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $events->links() }}
                        </div>
                    @endif
                </div>
            </main>
        </div>

    </div>

@endsection
