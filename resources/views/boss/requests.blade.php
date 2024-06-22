@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-4">
        <a href="#" class="breadcrumb-link">Requests</a>
    </div>

    {{-- Incoming Requests --}}
    <div class="container bg-transparent p-0 rounded container-border mb-5">
        <h3>Incoming Requests to Join Groups</h3>
        @if ($requests->isEmpty())
            <p>No incoming requests.</p>
        @else
            <div class="table-container table-border rounded mb-5">
                <table class="table table-requests m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">Description</th>
                            <th class="align-middle text-center">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td class="align-middle">{{ $request->name }}</td>
                                <td class="align-middle">{{ $request->email }}</td>
                                <td class="align-middle">{{ $request->description }}</td>
                                <td class="align-middle text-center">
                                    <div class="btn-group table-border option-btn" role="group" aria-label="Button group">
                                        <form action="{{ route('requests.approve', ['request' => $request->id]) }}" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        </form>
                                        <form action="{{ route('requests.reject', ['request' => $request->id]) }}" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
            {{-- Static Table | STARTS --}}
            <div class="table-container table-border rounded mb-5">
                <table class="table table-requests m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">Description</th>
                            <th class="align-middle text-center">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle">John Doe</td>
                            <td class="align-middle">john@example.com</td>
                            <td class="align-middle">When there is form element, the btn for some reason looks like this</td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border option-btn" role="group" aria-label="Button group">
                                    <form action="#" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                    <form action="#" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">Jane Smith</td>
                            <td class="align-middle">jane@example.com</td>
                            <td class="align-middle">Interested in joining the marketing team.</td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border option-btn" style="background-color: #303030" role="group" aria-label="Button group">
                                    <a type="submit" class="btn btn-success" style="border: none; padding: 5px;">
                                        <img class="icon mx-2" src="{{asset('assets/images/icon-checkmark.svg')}}" draggable="false" style="width: 16px; height: 16px;">
                                    </a>

                                    <a type="submit" class="btn btn-danger" style="border: none; padding: 5px;">
                                        <img class="icon mx-2" src="{{asset('assets/images/icon-cross.svg')}}" draggable="false" style="width: 16px; height: 16px;">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">Mike Johnson</td>
                            <td class="align-middle">mike@example.com</td>
                            <td class="align-middle">Seeking a role in the IT department.</td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border option-btn" style="background-color: #303030" role="group" aria-label="Button group">
                                    <a type="submit" class="btn btn-success" style="border: none; padding: 5px;">
                                        <img class="icon mx-2" src="{{asset('assets/images/icon-checkmark.svg')}}" draggable="false" style="width: 16px; height: 16px;">
                                    </a>

                                    <a type="submit" class="btn btn-danger" style="border: none; padding: 5px;">
                                        <img class="icon mx-2" src="{{asset('assets/images/icon-cross.svg')}}" draggable="false" style="width: 16px; height: 16px;">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- Static Table | ENDS --}}
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@stop
