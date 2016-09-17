@extends('layouts.app')

@section('title', '- Categories')

@section('content')

    @if (count($categories) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Categories
            </div>

            <div class="panel-body">
                <table class="table table-striped category-table">

                    <thead>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Created At</th>
                        @if(Auth::user())
                        <th>Actions</th>
                        @endif
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                            <tr id="{{ $category->id }}">
                                <td class="table-text name">
                                    <a href="{{ url('category/'.$category->id) }}">
                                        <div class="name">{{ $category->name }}</div>
                                    </a>
                                </td>

                                <td class="table-text description">
                                    <a href="{{ url('category/'.$category->id) }}">
                                        <div class="description">{{ $category->description }}</div>
                                    </a>
                                </td>
                                <td class="table-text created_at">
                                    <a href="{{ url('category/'.$category->id) }}">
                                        <div>{{ $category->created_at }}</div>
                                    </a>
                                </td>
                            @if(Auth::user())
                                <td class="table-text">
                                    <form method="post" action="{{ url('category/'.$category->id) }}">
                                        <button type="submit" class="btn btn-primary edit-btn" data-id="{{ $category->id }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        &nbsp;
                                        <button type="submit" class="btn btn-danger delete-btn" data-name="{{ $category->name }}" data-id="{{ $category->id }}">

                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            Are you Sure you want to delete <span class="dname"></span> ? 
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn actionBtn btn-danger delete" data-dismiss="modal">
                                <span id="footer_action_button" class='glyphicon glyphicon-trash'>Delete</span>
                            </button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="panel panel-default">
        <div class="panel-heading">
            No categories found
        </div>

        <div class="panel-body">
            No categories found please add new one
        </div>
    </div>
    @endif

    @if(Auth::user())
    @include('categories.create')
    @else
    <div class="panel panel-default">
        <div class="panel-heading">
            Not autherized
        </div>

        <div class="panel-body">
            You should <a href="{{ url('/login') }}">Login</a> or <a href="{{ url('/register') }}">Register</a> to be able to add new category
        </div>
    </div>
    @endif
@endsection