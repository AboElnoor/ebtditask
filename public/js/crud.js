
function displayErrors(dataErrors, process = false){
	var errors = '';
	$.each(dataErrors, function(index, error) {
		errors+= '<li>';
		errors+= error;
		errors+= '</li>';
	});
	$('#errors ul').html(errors);
	if(!process)
		$('#errors').removeClass('hidden');
	else{
		$('.errors').find('#errors').removeClass('hidden');
	}
}


$(document).ready(function() {

	//Create new Item
	$('#add').on('click', function(event) {
		event.preventDefault();

		var action =  $(this).parents('form').attr('action');
		var data = new FormData($(this).parents('form')[0]);

		$.ajax({
			url: action,
			type: 'POST',
			dataType: 'json',
			data: data,
			cache: false,
	        contentType: false,
	        processData: false
		})
		.done(function(data) {
			console.log("success");
			if(data.errors){
				displayErrors(data.errors);
			}else{

				$('#errors').addClass('hidden');
				$('#errors ul').text('');
				var output = '<tr id="'+data.id+'">';                                
                                
                $.each(data, function(index, val) {

                	switch(index){
                		case 'name':
                		case 'description':
                		case 'created_at':
                			output += '<td class="table-text ';
							output += index;
							output += '"><a href="';
							output += action;
							output += '/';
							output += data.id;
							output += '"><div class="';
							output += index;
							output += '">';
							output += val;
							output += '</div></a></td>';
						break;
						case 'user_id':
							output += '<td class="table-text ';
							output += index;
							output += '"><div class="username">';
							output += val;
							output += '</div></a></td>';
						break;
						default:
							return true;
                	}
                });

                output += '<td><form method="post" action="'+action+'/'+data.id+'"><button type="submit" class="btn btn-primary edit-btn" data-id="'+data.id+'"><i class="fa fa-trash"></i> Edit </button> &nbsp; <button type="submit" class="btn btn-danger delete-btn" data-name="'+data.name+'" data-id="'+data.id+'"><i class="fa fa-trash"></i> Delete </button></td></tr>';
				$('table').append(output);

				$('#name').val('');
				$('#description').val('');
				if($('#image')){
					$('#image').val('');
				}

			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
			console.log(data);
		});
		
	});

	//Prepare delete process
	$(document).on('click', '.delete-btn', function(event) {
		event.preventDefault();
		
		$('.dname').html($(this).data('name'));
		$('.modal').modal('show');
		$('.delete').data('id', $(this).data('id'));
		$('.delete').data('action', $(this).parent().attr('action'));

	});

	//Delete an Item
	$('.modal-footer').on('click', '.delete', function() {
		var action = $(this).data('action');
		var token = $('input[name=_token]').val();
		var id = $(this).data('id');

		$.ajax({
			url: action,
			type: 'DELETE',
			data: {
				_token: token,
			},
		})
		.done(function() {
			$('#'+id).remove();	
		})
		.fail(function() {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
			console.log(data);
		});
	});

	//Prepare edit process
	$(document).on('click', '.edit-btn', function(event) {
		event.preventDefault();

		var id = $(this).data('id');
		var content = $(this).parents('#'+id);
		var name = content.find('div.name').text();
		var description = content.find('div.description').text();
		$(this).data('action', $(this).parent().attr('action'));

		content.find('div.name').addClass('hidden');
		content.find('div.description').addClass('hidden');
		content.children('.name').append('<input type="text" name="name" id="name-'+id+'" class="form-control" value="'+name+'">');
		content.children('.description').append('<input type="text" name="description" id="description-'+id+'" class="form-control" value="'+description+'">');
		$(this).html('<i class="fa fa-edit"></i> Update').removeClass('btn-primary edit-btn').addClass('btn-success update-btn');
		$(this).next().html('<i class="fa fa-times"></i> Cancel').removeClass('btn-danger delete-btn').addClass('btn-primary cancel-btn');
	});

	//Cancel edit process
	$(document).on('click', '.cancel-btn', function(event) {
		event.preventDefault();
		
		$('.errors').remove();

		var id = $(this).data('id')
		var parent = $(this).parents('#'+id);
		var action = $(this).prev().data('action');
		var name = parent.find('div.name').text();
		var description = parent.find('div.description').text();
				
		parent.children('.name').html('<a href="'+action+'"><div class="name">'+name+'</div></a>');
		parent.children('.description').html('<a href="'+action+'"><div class="description">'+description+'</div></a>');

		$(this).prev().html('<i class="fa fa-edit"></i> Edit').removeClass('btn-success update-btn').addClass('btn-primary edit-btn');
		$(this).html('<i class="fa fa-trash"></i> Delete').removeClass('btn-primary cancel-btn').addClass('btn-danger delete-btn');
	});

	//Update precess
	$(document).on('click', '.update-btn', function(event) {
		event.preventDefault();
		
		$('.errors').remove();

		var id = $(this).data('id')
		var parent = $(this).parents('#'+id);
		var name = $('#name-'+id).val();
		var description = $('#description-'+id).val();
		var action = $(this).data('action');
		var token = $('input[name=_token]').val();
		var editBtn = $(this);

		$.ajax({
			url: action,
			type: 'PUT',
			dataType: 'json',
			data: {
				_token: token,
				name: name,
				description, description
			},
		})
		.done(function(data) {
			if(data.errors){
				parent.before('<tr class="errors"><td colspan="4"></td></tr>');

				$('.errors td').html($('#errors').clone());

				displayErrors(data.errors, 'update');
			}else{
				$('.errors').remove();
				
				parent.children('.name').html('<a href="'+action+'"><div class="name">'+data.name+'</div></a>');
				parent.children('.description').html('<a href="'+action+'"><div class="description">'+data.description+'</div></a>');

				editBtn.html('<i class="fa fa-edit"></i> Edit').removeClass('btn-success update-btn').addClass('btn-primary edit-btn');
				editBtn.next().html('<i class="fa fa-trash"></i> Delete').removeClass('btn-primary cancel-btn').addClass('btn-danger delete-btn');				
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
			console.log(data);
		});
		return;
	});

});