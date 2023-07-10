const load_employee = () => {
    $(document).gmLoadPage({
        url: baseUrl + '/employee_educ/get_employee2',
        load_on: '#load_employee',
    });
}


const load_education = () => {
    $('#load_educations').load(baseUrl + '/employee_educ/get_educations');
}

const education_edit = () => {
    $(document).gmLoadPage({
        url: baseUrl + '/employee_educ/education_edit',

    });
}

// const load_employees = () => {
//     $(document).gmLoadPage({
//         url: baseUrl + '/employee_educ/employee_profile',

//     });
// }

$(document).ready(function () {
    load_education();
});


$(document).on('click', '#btn_submit', function () {
    $(document).gmPostHandler({
        url: 'employee_educ/service/employee_educ_service/save',
        selector: '.form-control',
        data: {
            Employee_id: $('#employee_id').val(),
            Level: $('#Level').val(),
            Title: $('#Title').val(),
            Institution: $('#Institution').val(),
            Description: $('#Description').val(),
            Start_date: $('#Start_date').val(),
            End_date: $('#End_date').val(),
            Hours: $('#Hours').val()
        },
    });
});

$(document).on('click', '#btn_edit', function () {


    $(document).gmPostHandler({
        url: 'employee_educ/service/employee_educ_service/edit',
        selector: '.form-control',
        data: {
            // ID     : $('#ID').val(),
            Employee_id: $('#Employee_id').val(),
            Level: $('#Level').val(),
            Title: $('#Title').val(),
            Institution: $('#Institution').val(),
            Description: $('#Description').val(),
            Start_date: $('#Start_date').val(),
            End_date: $('#End_date').val(),
            Hours: $('#Hours').val()
        },
    });
});

// Delay Function!
function delayNavigation(event, url) {
    event.preventDefault(); // Prevent the default navigation behavior
    setTimeout(function () {
        window.location.href = url; // Redirect to the specified URL after the delay
    }, 1000); // Delay in milliseconds (here, 2000 milliseconds or 2 seconds)
}


$(document).on('click', '#delete_educ', function () {
    formAction(baseUrl + 'employee_educ/service/Employee_educ_service/delete', 'POST', {ID: $(this).data('id')}, function (data) {
        load_education();
        success('SUCCESS', 'Education successfully deleted');
    });
});
