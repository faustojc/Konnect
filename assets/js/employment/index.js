let isValid = false;
let validateForm = () => {
    const form = $('#needs-validation');

    form.each(function (event) {
        $(this).on('submit', function (event) {
            isValid = this.checkValidity();

            event.preventDefault();
            event.stopPropagation();

            $(this).addClass('was-validated');
        });
    });

    form.trigger('submit');
}

const load_employment = () => {
    $(document).gmLoadPage({
        url: baseUrl + 'employment/get_all_employments',
        load_on: '#load_employment',
    });
}

$(document).ready(function () {
    load_employment();
});

$(document).on('click', '#btn_submit_employment', function () {
    $.ajax({
        url: baseUrl + 'employment/service/Employment_service/save',
        type: 'POST',
        data: {
            employee_id: $('#employee_id').val(),
            employer_id: $('#employer_id').val(),
            position: $('#position').val(),
            start_date: $('#start_date').val(),
            end_date: $('#end_date').val(),
            status: $('#status').val(),
            show_status: $('#show_status').val(),
            rating: $('#rating').val(),
            job_description: $('#job_description').val()
        },
    });
});

$(document).on('click', '#edit_employment', function () {
    validateForm();

    if (isValid) {
        formAction('edit', 'POST', {
            employment_id: $('#ID').val(),
            employee_id: $('#employee_id').val(),
            employer_id: $('#employer_id').val(),
            position: $('#position').val(),
            start_date: $('#start_date').val(),
            end_date: $('#end_date').val(),
            status: $('#status').val(),
            show_status: $('#show_status').val(),
            rating: $('#rating').val(),
            job_description: $('#job_description').val()
        }, function (data) {
            success('SUCCESS', 'Employment successfully updated');
        });
    }
});

$(document).on('click', '#delete_employment', function () {
    formAction(baseUrl + 'employment/service/Employment_service/delete', 'POST', {employment_id: $(this).data('id')}, function (data) {
        load_employment();
        success('SUCCESS', 'Employment successfully deleted');
    });
});
