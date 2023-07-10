// Load all employers
const load_employers = () => {
    $(document).gmLoadPage({
        url: baseUrl + '/employer/get_employers',
        load_on: '#employer_list',
    });
}

$(document).ready(function () {
    load_employers();
});

$(document).on('input', '#search_employer', function () {
    $(document).gmLoadPage({
        url: 'employer/service/Employer_service/search_employers',
        data: {
            search_text: $('#search_employer').val()
        },
        load_on: '#employer_list'
    });
});

// Register employer
$(document).on('click', '#register_employer', function () {
    const isValid = validateForm('#needs-validation');

    if (isValid) {
        formAction(baseUrl + 'employer/service/Employer_service/save', 'POST', {
            employer_name: $('#fname').val() + ' ' + $('#mname').val() + '. ' + $('#lname').val(),
            tradename: $('#tradename').val(),
            city: $('#city').val(),
            barangay: $('#barangay').val(),
            address: $('#address').val(),
            business_type: $('#business_type').val(),
            contact_number: $('#contact_number').val(),
            email: $('#email').val(),
            sss: $('#sss').val(),
            tin: $('#tin').val()
        });
    }
});

$(document).on('click', '#update_employer', function () {
    const isValid = validateForm('#needs-validation');

    if (isValid) {
        formAction(baseUrl + 'employer/service/Employer_service/update', 'POST', {
            id: $('#ID').val(),
            employer_name: $('#employer_name').val(),
            tradename: $('#tradename').val(),
            city: $('#city').val(),
            barangay: $('#barangay').val(),
            address: $('#address').val(),
            business_type: $('#business_type').val(),
            contact_number: $('#contact_number').val(),
            email: $('#email').val(),
            sss: $('#sss').val(),
            tin: $('#tin').val()
        });
    }
});

$(document).on('click', '#delete_employer', function () {
    formAction(baseUrl + 'employer/service/Employer_service/delete', 'POST', {id: $(this).data('id')});
    load_employers();
});

