@extends('dashboard.layouts.app')
@section('title', 'Manage events')
@section('content')
    <div class="container-fluid">
        <div class="row">

            <nav id="sidebarMenu" class="shadow col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Events
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Integrations
                            </a>
                        </li>
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Saved reports</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle" class="align-text-bottom"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Year-end sale
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>


            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Manage events</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="/add" type="button" class="btn btn-sm btn-outline-secondary"><i
                                    class="bi bi-plus-lg"></i>Add
                                event</a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-calendar align-text-bottom" aria-hidden="true">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            This week
                        </button>
                    </div>
                </div>
                <div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <h6>{{ session()->get('success') }}</h6>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            <h6>{{ session()->get('error') }}</h6>
                        </div>
                    @endif
                    @if (count($events) > 0)
                        <table class="table table-responsive table-bordered table-sm shadow mx-auto ">
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
                                        <td>{{ $event->event_name }}</td>
                                        <td>{{ $event->event_description }}</td>
                                        <td>{{ $event->event_place }}</td>
                                        <td>{{ $event->event_date }}</td>
                                        <td>
                                            @if ($event->event_picture)
                                                <img src={{ asset($event->event_picture) }} width="20%"
                                                    alt="{{ $event->event_name }}" />
                                            @endif
                                        </td>
                                        <td class="p-2  ">

                                            <a href="{{ route('events.update', $event->id) }}" class="text-center btn btn-info btn-sm mx-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('events.delete', $event->id) }}"
                                                class="text-center btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash"></i>
                                            </a>


                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    @endif
                </div>
            </main>
        </div>

    </div>

@endsection
