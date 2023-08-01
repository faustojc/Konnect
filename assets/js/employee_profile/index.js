const load_skill = () => {
    fetch(baseUrl + 'employee_profile/getSkills')
        .then(response => response.text())
        .then(data => document.querySelector('#load_skill').innerHTML = data)
        .catch(() => error('ERROR!', 'Something went wrong'));
}

const load_education = () => {
    fetch(baseUrl + 'employee_profile/getEducations')
        .then(response => response.text())
        .then(data => {
            document.querySelector('#load_educations').innerHTML = data;

            tinymce.remove('textarea');
            textareaEditor('textarea', 400);
        })
        .catch(() => error('ERROR!', 'Something went wrong'));
}

const load_training = () => {
    $('#load_training').load(baseUrl + 'employee_profile/get_training/' + $('#emp_id').val(), function () {

        tinymce.remove('textarea');
        textareaEditor('textarea', 400);
    });
}

const load_employment = () => {
    fetch(baseUrl + 'employee_profile/getEmployments')
        .then(response => response.text())
        .then(data => document.querySelector('#load_employments').innerHTML = data);
}

document.addEventListener('DOMContentLoaded', function () {
    // TinyMCE
    textareaEditor('textarea', 400);

    const update_profile = document.querySelector('#update_profile');
    if (update_profile) {
        update_profile.addEventListener('click', function () {
            const form = update_profile.closest('#form_content').querySelector('.active.show form');
            const isValid = validateForm(form);

            if (isValid) {
                formAction(baseUrl + 'employee_profile/service/employee_profile_service/update_profile', 'POST', new FormData(form), function (response) {
                    success('SUCCESS', 'Profile successfully updated');
                });
            }
        });
    }

    const education_level = document.querySelectorAll('form.education-form select[name="level"]');
    if (education_level) {
        education_level.forEach(level => {
            const options = level.querySelectorAll("option");
            options.forEach(option => {
                if (option.textContent.toUpperCase().includes(level.value.toUpperCase())) {
                    option.setAttribute("selected", "selected");
                }
            });
        });
    }
});

const add_employment = document.querySelector('#btn_save_employment');
if (add_employment) {
    add_employment.addEventListener('click', () => {
        const form = add_employment.closest('.modal-content').querySelector('form');
        const formData = new FormData(form);

        const show_status = (form.querySelector('#show_status').checked === true) ? 1 : 0;
        const description = tinymce.activeEditor.getContent();

        formData.set('job_description', description);
        formData.set('show_status', show_status.toString());

        formAction(baseUrl + 'employee_profile/service/Employee_profile_service/set_employment', 'POST', formData, () => {
            load_employment();
            success('SUCCESS', 'Employment successfully added');
        });
    });
}

const add_education = document.querySelector('#btn_add_educ');
if (add_education) {
    add_education.addEventListener('click', () => {
        const form = add_education.closest('.modal-content').querySelector('form');
        const formData = new FormData(form);

        const description = tinymce.activeEditor.getContent();
        formData.set('description', description);

        formAction(baseUrl + 'education/add', 'POST', formData, () => {
            load_education();
            success('SUCCESS', 'Education successfully added');
        });
    });
}

const update_education = document.querySelectorAll('#btn_edit_educ');
if (update_education) {
    update_education.forEach(btn => {
        btn.addEventListener('click', () => {
            const form = btn.closest('.modal-content').querySelector('form');
            const formData = new FormData(form);

            const description = tinymce.activeEditor.getContent();
            formData.set('description', description);

            formAction(baseUrl + 'education/update', 'POST', formData, () => {
                load_education();
                success('SUCCESS', 'Education successfully updated');
            });
        });
    });
}

const delete_education = document.querySelectorAll('#delete_educ');
if (delete_education) {
    delete_education.forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-id');

            formAction(baseUrl + 'education/delete', 'POST', {id: id}, () => {
                load_education();
                success('SUCCESS', 'Education successfully deleted');
            });
        });
    });
}

$(document).on('click', '#btn_save_training', function () {
    const form = this.closest('.modal-content').querySelector('form');
    const isValid = validateForm(form);

    if (isValid) {
        const formData = new FormData(form);
        const training_description = tinymce.activeEditor.getContent();

        formData.append('training_description', training_description);

        let data = {};
        for (const [key, value] in formData.entries()) {
            data[key] = value;
        }

        formAction(baseUrl + 'employee_profile/service/employee_profile_service/save_training', 'POST', formData, function (response) {
            success('SUCCESS', 'Training successfully added');
            load_training();
        });
    }
});

$('#btn_save').click(function () {
    setTimeout(function () {
        // Dismiss the modal after a delay of 2 seconds (2000 milliseconds)
        $('#ModalEduc').modal('hide');
    }, 1000);
});

$('#btn_save_training').click(function () {
    setTimeout(function () {
        // Dismiss the modal after a delay of 2 seconds (2000 milliseconds)
        $('#ModalTrain').modal('hide');
    }, 1000);
});

$(document).on('click', '#btn_edit_train', function () {
    const form = this.closest('.modal-content').querySelector('form');
    const training_description = tinymce.activeEditor.getContent();

    const data = {
        ID: form.querySelector('#ID').value,
        Employee_id: form.querySelector('#Employee_id').value,
        title: form.querySelector('#title').value,
        training_description: training_description,
        venue: form.querySelector('#venue').value,
        city: form.querySelector('#city').value,
        s_date: form.querySelector('#s_date').value,
        e_date: form.querySelector('#e_date').value,
        hours: form.querySelector('#hours').value
    };

    $.ajax({
        url: baseUrl + 'employee_profile/service/employee_profile_service/update_train',
        type: 'POST',
        data: data,
        success: function (response) {
            // Handle the success response (optional)
            success('SUCCESS', 'Training successfully updated');
            load_training();
        },
        error: function (response) {
            const data = JSON.parse(response.responseText);
            error('ERROR', data.message);
        }
    });
});

$(document).on('click', '#update_introduction', function () {
    const intro = tinymce.activeEditor.getContent();

    const data = {
        ID: $('#emp_id').val(),
        Introduction: intro,
    };

    $.ajax({
        url: baseUrl + 'employee_profile/service/employee_profile_service/update_introduction',
        type: 'POST',
        data: data,
        success: function (response) {
            // Handle the success response (optional)
            success('SUCCESS', 'Introduction successfully updated');
        },
        error: function (response) {
            const data = JSON.parse(response.responseText);
            error('ERROR', data.message);
        }
    });
});

$(document).on('click', '#delete_educ', function () {
    formAction(baseUrl + 'employee_profile/service/employee_profile_service/delete_education', 'POST', {ID: $(this).data('id')}, function () {
        load_education();
        success('SUCCESS', 'Education successfully deleted');
    });
});

$(document).on('click', '#delete_train', function () {
    formAction(baseUrl + 'employee_profile/service/employee_profile_service/delete_training', 'POST', {ID: $(this).data('id')}, function () {
        load_training();
        success('SUCCESS', 'Training successfully deleted');
    });
});

$(document).on('click', '#edit_employment', function () {
    const form = this.closest('.modal-content').querySelector('form');
    const formData = new FormData(form);
    const url = baseUrl + 'employment/service/Employment_service/edit';

    const show_status = form.querySelector('#show_status').checked === true ? 1 : 0;
    formData.set('show_status', show_status.toString());

    formAction(url, 'POST', formData, function () {
        load_employment();
        success('SUCCESS', 'Employment successfully updated');
    });
});

$(document).on('click', '#delete_employment', function () {
    formAction(baseUrl + 'employee_profile/service/employee_profile_service/delete_employment', 'POST', {employment_id: $(this).data('id')}, function (data) {
        load_employment();
        success('SUCCESS', 'Employment successfully deleted');
    });
});

$(document).on('click', '#btn_skill', function () {
    const currentElem = this.closest('.modal-content').querySelector('form');
    const id = document.querySelector('#emp_id').value;

    const data = {
        employee_id: id,
        skill: currentElem.querySelector('#skill').value,
        proficiency: currentElem.querySelector('#proficiency').value,
        years_exp: currentElem.querySelector('#years_exp').value,
    }

    $.ajax({
        url: baseUrl + 'employee_profile/service/employee_profile_service/save_skill',
        type: 'POST',
        data: data,
        success: function () {
            success('SUCCESS', 'Skill successfully added');
            load_skill();
        },
        error: function () {
            error('ERROR', 'Failed to add skill');
        }
    });
});

$(document).on('click', '#btn_update_skill', function () {
    const form = this.closest('.modal-content').querySelector('form');
    const id = document.querySelector('#emp_id').value;

    const data = {
        skill_id: form.querySelector('#skill_id').value,
        employee_id: id,
        skill: form.querySelector('#skill').value,
        proficiency: form.querySelector('#proficiency').value,
        years_exp: form.querySelector('#years_exp').value
    };

    $.ajax({
        url: baseUrl + 'employee_profile/service/employee_profile_service/edit_skill',
        type: 'POST',
        data: data,
        success: function () {
            success('SUCCESS', 'Skill successfully updated');
            load_skill();
        },
        error: function () {
            // Handle the error response (optional)
            error("ERROR", "Update failed!");
        }
    });
});

$(document).on('click', '#delete_skill', function () {
    const id = this.getAttribute('data-id');

    formAction(baseUrl + 'employee_profile/service/employee_profile_service/delete_skill', 'POST', {id: id}, function (data) {
        load_skill();
        success('SUCCESS', 'Skill successfully deleted');
    });
});


// Filter the dropdown list of Level element
$(document).on('input', '#Level2', function () {
    const value = $(this).val().toLowerCase();
    const options = $('.level-content').children();

    options.each(function () {
        const option = $(this);
        const text = option.text();
        const isMatch = text.toLowerCase().indexOf(value) > -1;
        option.toggle(isMatch);
    });
});

// Change the #Level input value when the children of .level-content is clicked
$(document).on('click', '.level-content > *', function () {
    const value = this.value();
    $('#Level2').val(value);
});

$(document).on('click', '#update_profile', function () {
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
        url: baseUrl + 'employee_profile/service/employee_profile_service/update_profile',
        type: 'POST',
        data: data,
        success: function (response) {
            // Handle the success response (optional)
            console.log(response);
            // window.location.reload();
        },
        error: function (response) {
            // Handle the error response (optional)
            console.error("Update failed!");
        }
    });
});
