const load_employee = () => {
    $(document).gmLoadPage({
        url: baseUrl + '/employee/get_employee',
        load_on: '#load_employee',
    });
}

$(document).ready(function () {
    load_employee();
});

$(document).on('click', '#btn_register', function () {

    $.ajax({
        url: baseUrl + 'employee/service/Employee_service/register',
        type: 'POST',
        data: {
            Fname: $('#Fname').val(),
            Lname: $('#Lname').val(),
            Mname: $('#Mname').val(),
            Cnum: $('#Cnum').val(),
            Address: $('#Address').val(),
            Title: $('#Title').val(),
            Gender: $('#Gender').val(),
            Cstat: $('#Cstat').val(),
            Religion: $('#Religion').val(),
            Email: $('#Email').val(),
            Bday: $('#Bday').val(),
            City: $('#City').val(),
            Barangay: $('#Barangay').val(),
            SSS: $('#SSS').val(),
            Tin: $('#Tin').val(),
            Phil_health: $('#Phil_health').val(),
            Pag_ibig: $('#Pag_ibig').val()
        },

        // success: function(response) {
        //     var parsedResponse = JSON.parse(response);
        //     if (parsedResponse.has_error == false) {
        //         alert("Form Successfully Verified.");
        //         setTimeout(function() {
        //             window.location.reload();
        //         }, 100);
        //     } else {
        //         alert("ERROR");
        //     }
        // },
        // error: function(xhr, status, error) {
        //     console.error(error);
        // }
    });
});

$(document).on('keyup', '#search_employee', function () {
    $(document).gmLoadPage({
        url: 'employee/service/Employee_service/search_employee',
        data: {
            search_text: $('#search_employee').val()
        },
        load_on: '#load_employee'
    });
});


// $(document).on('click', '#btn_update', function () {
//     validateForm();

//     $(document).gmPostHandler({
//         url: 'employee/service/Employee_service/update',
//         selector: '.form-control',
//         data: {
//             employee_ID     : $('#employee_ID').val(),
//             Fname     : $('#Fname').val(),
//             Lname     : $('#Lname').val(),
//             Mname     : $('#Mname').val(),
//             Cnum      : $('#Cnum').val(),
//             Address   : $('#Address').val(),
//             Title     : $('#Title').val(),
//             Gender    : $('#Gender').val(),
//             Cstat     : $('#Cstat').val(),
//             Religion  : $('#Religion').val(),
//             Email     : $('#Email').val(),
//             Bday      : $('#Bday').val(),
//             City      : $('#City').val(),
//             Barangay  : $('#Barangay').val(),
//             SSS       : $('#SSS').val(),
//             Tin       : $('#Tin').val(),
//             Phil_health    : $('#Phil_health').val(),
//             Pag_ibig  : $('#Pag_ibig').val(),
//             Employee_image : $('#Employee_image')[0].files[0],


//         },
//         field: 'field',
//         function_call: true,
//         function: function (response) {
//             console.log(response);
//         },
//         parameter: true,
//         alert_on_error: false
//     });
//         //formAction('update', 'POST', data);
//     });

$(document).on('click', '#btn_update', function () {
    const data = {
        employee_ID: $('#employee_ID').val(),
        Fname: $('#Fname').val(),
        Lname: $('#Lname').val(),
        Mname: $('#Mname').val(),
        Cnum: $('#Cnum').val(),
        Address: $('#Address').val(),
        Title: $('#Title').val(),
        Gender: $('#Gender').val(),
        Cstat: $('#Cstat').val(),
        Religion: $('#Religion').val(),
        Email: $('#Email').val(),
        Bday: $('#Bday').val(),
        City: $('#City').val(),
        Barangay: $('#Barangay').val(),
        SSS: $('#SSS').val(),
        Tin: $('#Tin').val(),
        Phil_health: $('#Phil_health').val(),
        Pag_ibig: $('#Pag_ibig').val(),
        Employee_image: $('#Employee_image')[0].files[0],
    };

    $.ajax({
        url: baseUrl + 'employee/service/Employee_service/update',
        type: 'POST',
        data: data,
        success: function (response) {
            // Handle the success response (optional)
            console.log(response);
            window.location.reload();
        },
        error: function (response) {
            // Handle the error response (optional)
            console.error("Update failed!");
        }
    });
});
