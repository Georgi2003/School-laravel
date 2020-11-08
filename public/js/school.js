$(document).ready(function($){
    $("#val").hide();
    $('#spanName').hide();
    $('#spanCityId').hide();

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
            name: $('#name').val(),
            city_id: $('#city_id').val(),
        };
        
        var state = $('#btn-save').val();
        var type = 'POST';
        var todo_id = $('#todo_id').val();
        var ajaxurl = 'schools';
        
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var todo = '<tr id="todo' + data.id + '"><td>' + '<p  style="color: green">New!</p>' + '</td><td>' + data.name + '</td><td>'  + data.city_id + '</td>';
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
                if($('#name').val() == '')
                {
                    $('#spanName').show().fadeOut(5000);
                }

                if($('#city_id').val() == '')
                {
                    $('#spanCityId').show().fadeOut(5000);
                }
                console.log(data);
            }
        });
    });
});