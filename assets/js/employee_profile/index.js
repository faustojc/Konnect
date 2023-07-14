const load_employee = () => {
    $('#load_employee').load(baseUrl + '/employee/get_employee');
}

const load_skill = () => {
    $('#load_skill').load(baseUrl + '/employee_profile/get_skill/' + $('#emp_id').val());
}

const load_education = () => {
    $('#load_educations').load(baseUrl + '/employee_profile/get_educations/' + $('#emp_id').val());
}

const load_training = () => {
    $('#load_training').load(baseUrl + '/employee_profile/get_training/' + $('#emp_id').val(), function () {
        console.log('Loaded successfully');
        tinymce.remove('textarea');
        textareaEditor('textarea', 400);
    });
}

const education_edit = () => {
    $(document).gmLoadPage({
        url: baseUrl + '/employee_profile/education_edit/' + $('#emp_id').val(),
    });
}

const load_employment = () => {
    $('#load_employments').load(baseUrl + '/employee_profile/get_all_employments/' + $('#emp_id').val());
}

$(document).ready(function () {
    load_employee();

    // TinyMCE
    textareaEditor('textarea', 400);
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


$(document).on('click', '#save_education', function () {
    const data = {
        Employee_id: document.querySelector('#Employee_id').value,
        Level: document.querySelector('#Level').value,
        Title: document.querySelector('#Title').value,
        Institution: document.querySelector('#Institution').value,
        Description: document.querySelector('#Description').value,
        Start_date: document.querySelector('#Start_date').value,
        End_date: document.querySelector('#End_date').value,
        Hours: document.querySelector('#Hours').value
    }

    $.ajax({
        url: baseUrl + 'employee_profile/service/employee_profile_service/save_education',
        type: 'POST',
        data: data,
        success: function () {
            load_education();
            success('SUCCESS', 'Education successfully added');
        },
        error: function (response) {
            error('ERROR', 'Education failed to add');
        }
    });
});
$(document).on('click', '#btn_save_training', function () {
    const isValid = validateForm('#needs-validation');

    if (isValid) {
        const id = document.querySelector('#Employee_id').value;
        const training_description = tinymce.activeEditor.getContent();

        const data = {
            Employee_id: id,
            title: document.querySelector('#title').value,
            training_description: training_description,
            venue: document.querySelector('#venue').value,
            t_city: document.querySelector('#t_city').value,
            s_date: document.querySelector('#s_date').value,
            e_date: document.querySelector('#e_date').value,
            hours: document.querySelector('#hours').value
        }

        $.ajax({
            url: baseUrl + 'employee_profile/service/employee_profile_service/save_training',
            type: 'POST',
            data: data,
            success: function () {
                // Handle the success response (optional)
                success('SUCCESS', 'Training successfully added');
                load_training();
            },
            error: function (response) {
                const data = JSON.parse(response.responseText);
                error('ERROR', data.message);
            }
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

$(document).on('click', '#btn_edit_educ', function () {
    const currentContainer = $(this).closest('.modal-content').find('form');

    const data = {
        ID: currentContainer.find('#ID2').val(),
        Employee_id: currentContainer.find('#Employee_id2').val(),
        Level: currentContainer.find('#Level2').val(),
        Title: currentContainer.find('#Title2').val(),
        Institution: currentContainer.find('#Institution2').val(),
        Description: currentContainer.find('#Description2').val(),
        Start_date: currentContainer.find('#Start_date2').val(),
        End_date: currentContainer.find('#End_date2').val(),
        Hours: currentContainer.find('#Hours2').val()
    }

    $.ajax({
        url: baseUrl + 'employee_educ/service/employee_educ_service/edit',
        type: 'POST',
        data: data,
        success: function (response) {
            success('SUCCESS', 'Education successfully updated');
            load_education();
        },
        error: function (response) {
            error('ERROR', 'Education failed to update');
        }
    });
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


$(document).on('click', '#update_address', function () {
    const data = {
        ID: $('#ID').val(),
        Address: $('#Address').val(),
        Barangay: $('#Barangay').val(),
        City: $('#City').val()
    };

    $.ajax({
        url: baseUrl + 'employee_profile/service/employee_profile_service/update_address',
        type: 'POST',
        data: data,
        success: function (response) {
            success('SUCCESS', 'Address successfully updated');
            window.location.reload();
        },
        error: function (response) {
            error('ERROR', 'Address failed to update');
        }
    });
});

$(document).on('click', '#update_id', function () {
    const data = {
        ID: $('#ID').val(),
        SSS: $('#SSS').val(),
        Tin: $('#Tin').val(),
        Phil_health: $('#Phil_health').val(),
        Pag_ibig: $('#Pag_ibig').val()
    };

    $.ajax({
        url: baseUrl + 'employee_profile/service/employee_profile_service/update_id',
        type: 'POST',
        data: data,
        success: function (response) {
            // Handle the success response (optional)
            success('SUCCESS', 'Details successfully updated');
            window.location.reload();
        },
        error: function (response) {
            // Handle the error response (optional)
            error('ERROR', 'Update failed');
        }
    });
});

$(document).on('click', '#btn_submit_employment', function () {
    const isValid = validateForm('#needs-validation');

    if (isValid) {
        const show_status = (document.querySelector('#show_status').checked === true) ? 1 : 0;

        $.ajax({
            url: baseUrl + 'employee_profile/service/employee_profile_service/save_employment',
            type: 'POST',
            data: {
                employee_id: $('#employee_id').val(),
                employer_id: $('#employer_id').val(),
                position: $('#position').val(),
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
                status: $('#status').val(),
                show_status: show_status,
                rating: $('#rating').val(),
                // job_description    : $('#job_description').val()
            },
            success: function (response) {
                load_employment();
                success('SUCCESS', 'Employment successfully added');
            },
            error: function (response) {
                error('ERROR', 'Failed to add employment');
            }
        });
    }
});

$(document).on('click', '#edit_employment', function () {
    const currentElem = $(this).closest('form');
    const show_status = currentElem.find('#show_status').is(':checked') ? 1 : 0;

    const data = {
        ID: currentElem.find('#employmentID').val(),
        employee_id: currentElem.find('#employeeID').val(),
        employer_id: currentElem.find('#employerID').val(),
        position: currentElem.find('#positionEmp').val(),
        start_date: currentElem.find('#startDate').val(),
        end_date: currentElem.find('#endDate').val(),
        status: currentElem.find('#statusEmp').val(),
        show_status: show_status,
        rating: currentElem.find('#ratingEmp').val(),
    };

    $.ajax({
        url: baseUrl + 'employment/service/Employment_service/edit',
        type: 'POST',
        data: data,
        success: function (response) {
            success('SUCCESS', 'Employment successfully updated');
            load_employment();
        },
        error: function (response) {
            error('ERROR', 'Employment update failed');
        }
    });
});

$(document).on('click', '#delete_employment', function () {
    formAction(baseUrl + 'employee_profile/service/employee_profile_service/delete_employment', 'POST', {employment_id: $(this).data('id')}, function (data) {
        load_employment();
        success('SUCCESS', 'Employment successfully deleted');
    });
});

$(document).on('click', '#btn_skill', function () {
    const currentElem = $(this).closest('.modal-content').find('form');
    const id = $('#emp_id').val();

    const data = {
        employee_id: id,
        skill: currentElem.find('#skill').val(),
        proficiency: currentElem.find('#proficiency').val(),
        years_exp: currentElem.find('#years_exp').val()
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
    const currentElem = $(this).closest('.modal-content').find('form');
    const id = $('#emp_id').val();

    const data = {
        employee_id: id,
        skill_id: currentElem.find('#skill_id').val(),
        skill: currentElem.find('#skill').val(),
        proficiency: currentElem.find('#proficiency').val(),
        years_exp: currentElem.find('#years_exp').val()
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
    const id = $('#emp_id').val();

    formAction(baseUrl + 'employee_profile/service/employee_profile_service/delete_skill', 'POST', {
        skill_id: $(this).data('id'),
        employee_id: id
    }, function (data) {
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
