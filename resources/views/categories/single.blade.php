@extends('layouts.app')

@section('content')

	@if ($category)
		@section('title', '- '.$category->name)

        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ url('/category/'.$category->id) }}">{{ $category->name }}</a>
            </div>

            <div class="panel-body">
                <table class="table table-striped product-table">

                    <thead>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Author</th>
                        <th>Created At</th>
                        @if(Auth::user())
	                        <th>Actions</th>
                        @endif
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr id="{{ $product->id }}">
                                <td class="table-text name">
                                    <a href="{{ url('product/'.$product->id) }}">
                                        <div class="name">{{ $product->name }}</div>
                                    </a>
                                </td>
                                <td class="table-text description">
	                                <a href="{{ url('product/'.$product->id) }}">
	                                    <div class="description">{{ $product->description }}</div>
	                                </a>
                                </td>
                                <td class="table-text username">
                                    <div class="username">{{ $product->user->name }}</div>
                                </td>
                                <td class="table-text created_at">
                                    <a href="{{ url('category/'.$category->id) }}">
                                        <div>{{ $category->created_at }}</div>
                                    </a>
                                </td>
                                @if(Auth::user())
                                <td class="table-text">
                                    <form method="post" action="{{ url('product/'.$product->id) }}">
                                        <button type="submit" class="btn btn-primary edit-btn" data-id="{{ $product->id }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        &nbsp;
                                        <button type="submit" class="btn btn-danger delete-btn" data-name="{{ $product->name }}" data-id="{{ $product->id }}">

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
	
    	@if(Auth::user())
    	@include('products.create')
    	@endif
    @endif
@endsection

