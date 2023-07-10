const load_employees_follow_section = () => {
    $('#load_employees_follow_section').load(baseUrl + 'employer_profile/get_employees_follow_section', function () {
        $('.loading-employees').remove();
    });
}

const load_employers_follow_section = () => {
    const id = new URLSearchParams(window.location.search).get('id');

    $('#load_employers_follow_section').load(baseUrl + 'employer_profile/get_employers_follow_section?id=' + id, function () {
        $('.loading-employers').remove();
    });
}

const load_jobpostings = () => {
    const id = new URLSearchParams(window.location.search).get('id');

    $('#load_jobpostings').load(baseUrl + 'employer_profile/get_jobpostings?id=' + id, function () {
        $('.loading-jobpostings').remove();
    });
}

const load_summary = () => {
    const id = new URLSearchParams(window.location.search).get('id');

    $('#load_summary').load(baseUrl + 'employer_profile/get_summary?id=' + id);
}

$(document).ready(function () {
    //load_employees_follow_section();
    //load_employers_follow_section();
    //load_jobpostings();

    const status = document.querySelectorAll('span.status');

    status.forEach(value => {
        if (value.textContent === 'OPEN') {
            value.classList.add('badge-success');
            value.classList.remove('badge-danger');
        } else {
            value.classList.add('badge-danger');
            value.classList.remove('badge-success');
        }
    });

    // TinyMCE
    textareaEditor('#summary', 350, function (editor) {
        editor.on('input', function (event) {
            let count = editor.getContent({format: 'text'}).length;
            document.getElementById('summary_character_count').innerText = count + '/2000';

            if (count > 2000) {
                $('.summary-warning').removeAttr('hidden')
                $('#update_summary').attr('disabled', 'disabled');
            } else {
                $('.summary-warning').attr('hidden', 'hidden');
                $('#update_summary').removeAttr('disabled');
            }
        });
    });
});

$('.edit-summary').click(function () {
    const content = document.querySelector('.summary-content').innerHTML;
    tinymce.get('summary').setContent(content);

    let count = tinymce.get('summary').getContent({format: 'text'}).length;
    document.getElementById('summary_character_count').innerText = count + '/2000';
});

$(document).on('click', '#update_summary', function () {
    const id = new URLSearchParams(window.location.search).get('id');
    const summary = tinymce.activeEditor.getContent();

    formAction(baseUrl + 'employer_profile/service/Employer_profile_service/update_summary', 'POST', {
        id: id,
        summary: summary
    }, function () {
        success('SUCCESS', 'Summary successfully updated');
        load_summary();
    });
});

$(document).on('click', '#update_profile', function () {
    const isValid = validateForm('#needs-validation');

    if (isValid) {
        const formData = new FormData();

        formData.append('id', $('#id').val());
        formData.append('employer_name', $('#employer_name').val());
        formData.append('contact_number', $('#contact_number').val());
        formData.append('email', $('#email').val());
        formData.append('address', $('#address').val());
        formData.append('barangay', $('#barangay').val());
        formData.append('city', $('#city').val());
        formData.append('tradename', $('#tradename').val());
        formData.append('business_type', $('#business_type').val());
        formData.append('sss', $('#sss').val());
        formData.append('tin', $('#tin').val());
        formData.append('image', $('#image')[0].files[0]);

        formAction(baseUrl + 'employer_profile/service/Employer_profile_service/update', 'POST', formData, function () {
            success('SUCCESS', 'Profile successfully updated', 3000);
        });
    }
});


