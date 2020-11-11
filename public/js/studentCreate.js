$(document).ready(function($){
    $("#val").hide();
    $('#spanFirstName').hide();
    $('#spanLastName').hide();
    $('#spanAge').hide();
    $('#spanEmail').hide();
    $('#spanPhone').hide();
    $('#spanCity').hide();
    $('#spanSchool').hide();

    //----- Open model CREATE -----//
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    });

    // CREATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();

        var formData = {
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            age: $('#age').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            school_id: $('#sel_schools').val(),
        };

        var state = $('#btn-save').val();
        var type = 'POST';
        var todo_id = $('#todo_id').val();
        var ajaxurl = 'students';
        
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var todo = '<tr id="todo' + data.id + '"><td>' + '<p  style="color: green">New!</p>' + '</td><td>' + data.first_name + '</td><td>'  + data.last_name + '</td><td>' + data.age + '</td><td>' + data.email + '</td><td>' + data.phone + '</td>';
                todo += '<td><button class="btn btn-danger delete-todo" value="' + data.id + '">Изтрии</button></td>';
                todo += '<td><button class="btn btn-primary edit-modal" value="' + data.id + '">Актуализирай</button>&nbsp;</td>';
                
                if (state == "add") {
                    $('#todos-list').append(todo);
                } else {
                    $("#todo" + todo_id).replaceWith(todo);
                }

                $('#myForm').trigger("reset");
                $('#formModal').modal('hide')
            },
            error: function (data) {
                if($('#first_name').val() == '')
                {
                    $('#spanFirstName').show().fadeOut(5000);
                }

                if($('#last_name').val() == '')
                {
                    $('#spanLastName').show().fadeOut(5000);
                }

                if($('#age').val() == '')
                {
                    $('#spanAge').show().fadeOut(5000);
                }

                if($('#email').val() == '')
                {
                    $('#spanEmail').show().fadeOut(5000);
                }

                if($('#phone').val() == '')
                {
                    $('#spanPhone').show().fadeOut(5000);
                }

                if(!$('#sel_city').val() == 0)
                {
                    $('#spanCity').show().fadeOut(5000);
                }

                if(!$('#sel_schools').val() == 0)
                {
                    $('#spanSchool').show().fadeOut(5000);
                }
            }
        });
    });
});