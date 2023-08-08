const spinner = document.createElement('span');
spinner.classList.add('spinner-border', 'spinner-border-sm', 'mx-2');

const load_intro = () => {
    fetch(baseUrl + 'employee_profile/getIntro')
        .then(response => response.text())
        .then(data => {
            document.querySelector('#load_intro').innerHTML = data;

            tinymce.remove('textarea');
            textareaEditor('textarea', 400);
        })
        .catch(() => error('ERROR!', 'Something went wrong'));
}

const load_resume = () => {
    fetch(baseUrl + 'employee_profile/getResume')
        .then(response => response.text())
        .then(data => {
            document.querySelector('#load_resume').innerHTML = data;
            fileUploadFunc();
        })
        .catch(() => error('ERROR!', 'Something went wrong'));
}

const load_skill = () => {
    fetch(baseUrl + 'employee_profile/getSkills')
        .then(response => response.text())
        .then(data => {
            document.querySelector('#load_skill').innerHTML = data;
            skillFunc();
        })
        .catch(() => error('ERROR!', 'Something went wrong'));
}

const load_education = () => {
    fetch(baseUrl + 'employee_profile/getEducations')
        .then(response => response.text())
        .then(data => {
            document.querySelector('#load_educations').innerHTML = data;

            tinymce.remove('textarea');
            textareaEditor('textarea', 400);
            educationFunc();
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
    let address;
    let region;
    let province;
    let city;
    let barangay;

    const account_info = document.querySelector('#account-info');
    if (account_info) {
        const observer = new MutationObserver(() => {
            // check if the account info class name contains .active.show
            if (account_info.classList.contains('active') && account_info.classList.contains('show')) {
                address = document.querySelector('#Address');
                region = document.querySelector('#Region');
                province = document.querySelector('#Province');
                city = document.querySelector('#City');
                barangay = document.querySelector('#Barangay');

                if (address && region && province && city && barangay) {
                    locationDropdown(region, province, city, barangay);
                }
            }
        });

        observer.observe(account_info, {attributes: true, childList: true, characterData: true});
    }

    const update_profile = document.querySelector('#update_profile');
    if (update_profile) {
        update_profile.addEventListener('click', function () {
            const form = update_profile.closest('#form_content').querySelector('.active.show form');
            const formData = new FormData(form);
            const isValid = validateForm(form);

            if (formData.has('Region') && formData.has('Province') && formData.has('City') && formData.has('Barangay')) {
                formData.set('Address', address.value.trim());
                formData.set('Region', region.options[region.selectedIndex].text.trim());
                formData.set('Province', province.options[province.selectedIndex].text.trim());
                formData.set('City', city.options[city.selectedIndex].text.trim());
                formData.set('Barangay', barangay.options[barangay.selectedIndex].text.trim());
            }

            if (isValid) {
                formAction(baseUrl + 'employee_profile/service/employee_profile_service/update_profile', 'POST', formData, function (response) {
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

// ------------------- FOR INTRODUCTION -------------------

const update_intro = document.querySelector('#update_introduction');
if (update_intro) {
    update_intro.addEventListener('click', () => {
        const form = update_intro.closest('.modal-content').querySelector('form');
        const textarea = form.querySelector('textarea');

        const data = {
            Introduction: tinymce.get(textarea.id).getContent(),
        }

        formAction(baseUrl + 'employee_profile/service/employee_profile_service/update_introduction', 'POST', data, () => {
            load_intro();
            success('SUCCESS', 'Introduction successfully updated');
        });
    });
}

// ------------------- FOR EMPLOYMENT -------------------

const add_employment = document.querySelector('#btn_save_employment');
if (add_employment) {
    add_employment.addEventListener('click', () => {
        const form = add_employment.closest('.modal-content').querySelector('form');
        const formData = new FormData(form);
        const description = tinymce.get(form.querySelector('textarea').id).getContent();

        formData.set('job_description', description);

        formAction(baseUrl + 'employee_profile/service/Employee_profile_service/set_employment', 'POST', formData, () => {
            load_employment();
            success('SUCCESS', 'Employment successfully added');
        });
    });
}

// ------------------- FOR SKILLS -------------------

const skillFunc = () => {
    const modal_footer = document.querySelectorAll('.modal-footer');
    if (modal_footer) {
        modal_footer.forEach(footer => {
            footer.addEventListener('click', (event) => {
                if (event.target.matches('#btn_skill, .update-skill')) {
                    const form = footer.closest('.modal-content').querySelector('form');
                    const formData = new FormData(form);
                    const isValid = validateForm(form);

                    let url = (event.target.matches('#btn_skill')) ?
                        baseUrl + 'employeeskills/EmployeeSkills/saveSkill' :
                        baseUrl + 'employeeskills/EmployeeSkills/editSkill';

                    let message = (event.target.matches('#btn_skill')) ?
                        'Skill successfully added' :
                        'Skill successfully updated';

                    if (isValid) {
                        formAction(url, 'POST', formData, () => {
                            load_skill();
                            success('SUCCESS', message);
                        });
                    }
                }

                if (event.target.matches('.delete-skill')) {
                    const id = event.target.getAttribute('data-id');

                    formAction(baseUrl + 'employeeskills/EmployeeSkills/deleteSkill', 'POST', {id: id}, () => {
                        load_skill();
                        success('SUCCESS', 'Skill successfully deleted');
                    });
                }
            });
        });
    }

    // const save_skill = document.querySelector('#btn_skill');
    // if (save_skill) {
    //     save_skill.addEventListener('click', (event) => {
    //         const form = save_skill.closest('.modal-content').querySelector('form');
    //         const formData = new FormData(form);
    //         const isValid = validateForm(form);
    //
    //         if (isValid) {
    //             formAction(baseUrl + 'employeeskills/EmployeeSkills/saveSkill', 'POST', formData, () => {
    //                 load_skill();
    //                 success('SUCCESS', 'Skill successfully added');
    //             });
    //         }
    //     });
    // }
    //
    // const update_skill = document.querySelectorAll('.update-skill');
    // if (update_skill) {
    //     update_skill.forEach(btn => {
    //         btn.addEventListener('click', (event) => {
    //             const form = btn.closest('.modal-content').querySelector('form');
    //             const formData = new FormData(form);
    //             const isValid = validateForm(form);
    //
    //             if (isValid) {
    //                 formAction(baseUrl + 'employeeskills/EmployeeSkills/editSkill', 'POST', formData, () => {
    //                     load_skill();
    //                     success('SUCCESS', 'Skill successfully updated');
    //                 });
    //             }
    //         });
    //     });
    // }
    //
    // const delete_skill = document.querySelectorAll('.delete-skill');
    // if (delete_skill) {
    //     delete_skill.forEach(btn => {
    //         btn.addEventListener('click', () => {
    //             const id = btn.getAttribute('data-id');
    //
    //             formAction(baseUrl + 'employeeskills/EmployeeSkills/deleteSkill', 'POST', {id: id}, () => {
    //                 load_skill();
    //                 success('SUCCESS', 'Skill successfully deleted');
    //             });
    //         });
    //     });
    // }
}
skillFunc();

// ------------------- FILE UPLOAD RESUME -------------------
const fileUploadFunc = () => {
    const file_input = document.querySelector('.file-input');
    if (file_input) {
        file_input.addEventListener('change', () => {
            const filesCount = file_input.files.length;
            const textbox = document.querySelector('.file-message');

            if (filesCount === 1) {
                textbox.textContent = file_input.value.split('\\').pop();
            } else {
                textbox.textContent = filesCount + ' file(s) selected';
            }
        });
    }

    const upload_resume = document.querySelector('#upload_resume');
    if (upload_resume) {
        upload_resume.addEventListener('click', () => {
            const form = upload_resume.closest('.modal-content').querySelector('form');
            const formData = new FormData(form);

            formAction(baseUrl + 'employee_profile/service/employee_profile_service/uploadResume', 'POST', formData, () => {
                load_resume();
                success('SUCCESS', 'Resume/CV uploaded successfully');
            });
        });
    }

    const delete_resume = document.querySelector('#delete_resume');
    if (delete_resume) {
        delete_resume.addEventListener('click', () => {
            const id = delete_resume.getAttribute('data-id');

            formAction(baseUrl + 'employee_profile/service/employee_profile_service/deleteResume', 'POST', {id: id}, () => {
                load_resume();
                success('SUCCESS', 'Resume/CV deleted successfully');
            });
        });
    }
}

fileUploadFunc();

// ---------- FOR EDUCATION ---------- //

const educationFunc = () => {
    const save_education = document.querySelector('#save_education');
    if (save_education) {
        save_education.addEventListener('click', () => {
            const form = save_education.closest('.modal-content').querySelector('form');
            const formData = new FormData(form);
            const description = tinymce.get(form.querySelector('textarea').id).getContent();

            formData.set('description', description);

            const isValid = validateForm(form);
            if (isValid) {
                formAction(baseUrl + 'education/add', 'POST', formData, () => {
                    load_education();
                    success('SUCCESS', 'Education successfully added');
                });
            }
        });
    }

    const update_education = document.querySelectorAll('.edit-education');
    if (update_education) {
        update_education.forEach(btn => {
            btn.addEventListener('click', () => {
                const form = btn.closest('.modal-content').querySelector('form');
                const formData = new FormData(form);
                const description = tinymce.get(form.querySelector('textarea').id).getContent();

                formData.set('description', description);

                const isValid = validateForm(form);
                if (isValid) {
                    formAction(baseUrl + 'education/update', 'POST', formData, () => {
                        load_education();
                        success('SUCCESS', 'Education successfully updated');
                    });
                }
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
}

educationFunc();

// ------------------ LEGACY CODES ------------------

$(document).on('click', '#btn_save_training', function () {
    const form = this.closest('.modal-content').querySelector('form');
    const isValid = validateForm(form);

    if (isValid) {
        const formData = new FormData(form);
        const training_description = tinymce.get(form.querySelector('textarea').id).getContent();

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

$('#btn_save_training').click(function () {
    setTimeout(function () {
        // Dismiss the modal after a delay of 2 seconds (2000 milliseconds)
        $('#ModalTrain').modal('hide');
    }, 1000);
});

$(document).on('click', '#btn_edit_train', function () {
    const form = this.closest('.modal-content').querySelector('form');
    const training_description = tinymce.get(form.querySelector('textarea').id).getContent();

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

$(document).on('click', '#delete_train', function () {
    formAction(baseUrl + 'employee_profile/service/employee_profile_service/delete_training', 'POST', {ID: $(this).data('id')}, function () {
        load_training();
        success('SUCCESS', 'Training successfully deleted');
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
