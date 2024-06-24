@extends('adminlayout.master')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Task Table</h3>
                <!-- Search and other card tools -->
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task Title</th>
                            <th>Assigned to</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Progress</th>
                            <th>Due Date</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $index => $task)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->user->name ?? 'N/A' }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->priority }}</td>
                                <td>{{ $task->progress }}</td>
                                <td>{{ $task->due_date}}</td>
                                <!-- Task Action Buttons (Edit/Delete) -->
                                <td>
                                    <button class="btn btn-link" data-toggle="modal" data-target="#}">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    <form id="delete-task-form-{{ $task->id }}"
                                        action="{{ route('task.delete', $task->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="button" class="btn btn-link text-danger p-0 "
                                        onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-task-form-{{ $task->id }}').submit();">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path ath fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
        </div>
    </div>
</section>
@stop