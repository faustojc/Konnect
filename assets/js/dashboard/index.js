document.addEventListener("DOMContentLoaded", function() {

    
});

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

