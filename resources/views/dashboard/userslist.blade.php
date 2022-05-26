@extends('dashboard.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">

        <x-sidebar/>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2  border-bottom">

                    <h1 class="h2">Manage users</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="/register" type="button" class="btn btn-sm btn-outline-secondary"><i
                                    class="bi bi-plus-lg"></i>Add user</a>
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
                    @if (count($users) > 0)
                        <table class="table table-responsive table-bordered table-sm  ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @foreach ($users as $user)
                                <tbody class="table-group-divider">
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td >{{ $user->name }}</td>
                                        <td >{{ $user->email }}</td>
                                        <td class="p-2  ">
                                            <a href="{{ route('user.delete',$user->id) }}"
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
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </main>
        </div>

    </div>

@endsection
