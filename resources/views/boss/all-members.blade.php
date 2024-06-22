@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-4">
        <a href="#" class="breadcrumb-link">All Members</a>
    </div>

    {{-- Incoming Requests --}}
    <div class="container bg-transparent p-0 rounded container-border mb-5">
        <h3>Incoming Requests <span class="count">3</span></h3>
        @if ($requests->isEmpty())
            <p>No incoming requests</p>
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
                                            <button type="submit" class="btn btn-success mx-auto rounded-0">Approve</button>
                                        </form>
                                        <form action="{{ route('requests.reject', ['request' => $request->id]) }}" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-auto rounded-0">Reject</button>
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
                            <td class="align-middle">As an aspiring professional, I am driven by a deep passion for technology and its transformative potential within organizations. The IT department stands as the nerve center of modern enterprises, where innovation meets operational efficiency.</td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border option-btn" role="group" aria-label="Button group">
                                    <form action="#" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success mx-auto rounded-0">Approve</button>
                                    </form>
                                    <form action="#" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-auto rounded-0">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">Jane Smith</td>
                            <td class="align-middle">jane@example.com</td>
                            <td class="align-middle">Joining your esteemed IT department represents an opportunity to align my career aspirations with a forward-thinking organization dedicated to leveraging technology for strategic advantage. I am excited about the prospect of contributing my skills and insights to your team, making meaningful contributions to both immediate projects and long-term strategic initiatives.</td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border option-btn" role="group" aria-label="Button group">
                                    <a class="btn btn-success" href="#" role="button">
                                        <img class="icon mx-auto" src="{{ asset('assets/images/icon-checkmark.svg') }}"
                                            draggable="false">
                                    </a>
                                    <a class="btn btn-danger" href="#" role="button">
                                        <img class="icon mx-auto" src="{{ asset('assets/images/icon-cross.svg') }}"
                                            draggable="false">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">Mike Johnson</td>
                            <td class="align-middle">mike@example.com</td>
                            <td class="align-middle">Seeking a role in the IT department.</td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border option-btn" role="group" aria-label="Button group">
                                    <a class="btn btn-success" href="#" role="button">
                                        <img class="icon mx-auto" src="{{ asset('assets/images/icon-checkmark.svg') }}"
                                            draggable="false">
                                    </a>
                                    <a class="btn btn-danger" href="#" role="button">
                                        <img class="icon mx-auto" src="{{ asset('assets/images/icon-cross.svg') }}"
                                            draggable="false">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- Static Table | ENDS --}}
    </div>


    {{-- Current Members --}}
    <div class="container bg-transparent p-0 rounded container-border mb-5">
        <h3>Current Members <span class="count">2</span></h3>

            <p>No members</p>

        {{-- Static Table | STARTS --}}
        <div class="table-container table-border rounded mb-5">
            <table class="table table-requests m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">Name</th>
                        <th class="align-middle">Email</th>
                        <th class="align-middle">Company</th>
                        <th class="align-middle text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle">John Doe</td>
                        <td class="align-middle">john.doe@example.com</td>
                        <td class="align-middle">Company A</td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border option-btn" style="background-color: #303030"
                                role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="mailto:example@mail.com" role="button">
                                    <!-- Replace 'email' with the actual field name for the user email in your database -->
                                    <img class="icon mx-auto" src="{{ asset('assets/images/icon-mail.svg') }}"
                                        draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon mx-auto" src="{{ asset('assets/images/nav-logout.svg') }}"
                                        draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jane Smith</td>
                        <td class="align-middle">jane.smith@example.com</td>
                        <td class="align-middle">Company B</td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border option-btn" style="background-color: #303030"
                                role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="mailto:jane.smith@example.com" role="button">
                                    <img class="icon mx-auto" src="{{ asset('assets/images/icon-mail.svg') }}"
                                        draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon mx-auto" src="{{ asset('assets/images/nav-logout.svg') }}"
                                        draggable="false">
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
