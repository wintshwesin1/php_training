$(document).ready(function () {

    //show student lists
    $.ajax({
        url: 'http://localhost:8000/api/students',
        success: function (data) {
            
            for (let i = 0; i < data[0].length; i++) {
                var row = $('<tr/>');
                $.each(data, function (key, value) {
                    var markup = '<tr> <td>' + (i + 1) + '</td> <td>'
                                    + value[i].name + '</td> <td>'
                                    + value[i].major + '</td> <td>'
                                    + value[i].email + '</td> <td>'
                                    + value[i].phone + '</td> <td>'
                                    + (value[i].address==null ? '' : value[i].address) + '</td> <td>'
                                    + '<button class="btn btn-primary editStudent" type="button" data-id="'+value[i].id+'">Edit</button> <button class="btn btn-danger deleteStudent" type="button" id="deleteStudent" data-id="'+value[i].id+'">Delete</button>' + '</td> </tr>';
                    $('table[id="studentsData"]').append(markup);
                });
            }
        }
    });

    //create student
    $('#createStudent').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }
        });
        $.ajax({
            url: 'http://localhost:8000/api/student/create',
            method: 'post',
            data: {
                name: $('#name').val(),
                major: $('#major').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                address: $('#address').val(),
            },
            success: function (data) {
                window.location = '/ajax/students';
                alert(data.success);
            },
            error: function (xhr, status, error) {
                    alert(xhr.responseText);
            }
        });
    });

    //edit student
    $('#studentsData').on('click', '.editStudent', function () {
        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }
        });
        
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'http://localhost:8000/api/student/'+id,
            method: 'get',
            success: function (data) {
                window.location.href = '/ajax/student/create?id=' + data[0].id +
                                                            '&name=' + data[0].name +
                                                            '&major_id=' + data[0].major_id +
                                                            '&email=' + data[0].email +
                                                            '&phone=' + data[0].phone +
                                                            '&address=' + data[0].address;
                
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    });

    //update student
    $('#updateStudent').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }
        });

        var id = $(this).attr('data-id');

        $.ajax({
            url: 'http://localhost:8000/api/student/update/'+id,
            method: 'post',
            data: {
                name: $('#name').val(),
                major: $('#major').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                address: $('#address').val(),
            },
            success: function (data) {
                window.location.href = '/ajax/students';
                alert(data.success);
            },
            error: function(xhr, status, error) {
                    alert(xhr.responseText);
            }
        });
    });

    //delete student
    $('#studentsData').on('click', '.deleteStudent', function() {
        var id = $(this).attr('data-id');
        confirm("Are you sure want to delete !");
        $.ajax({
            url: 'http://localhost:8000/api/student/delete/'+id,
            method: 'delete',
            success: function (data) {
                location.reload();
                alert(data);
            },
        });
    
    });
    
});