// Restore the search input value on page load
const searchInput = document.getElementById('searchInput');
const mobileSearchInput = document.getElementById('mobileSearchInput');
const savedSearchTerm = localStorage.getItem('searchTerm');

if (savedSearchTerm) {
    searchInput.value = savedSearchTerm;
    mobileSearchInput.value = savedSearchTerm;
}

document.addEventListener("DOMContentLoaded", function () {
    textareaEditor('textarea', 400);

    setJobStatus();

    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            handleSearch();
        }
    });

    const mobileSearchInput = document.getElementById('mobileSearchInput');
    mobileSearchInput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            handleSearch();
        }
    });
});


// Function to handle the search on Enter key press
function handleSearch() {
    const searchInput = document.getElementById('searchInput');
    const mobileSearchInput = document.getElementById('mobileSearchInput');
    const searchTerm = searchInput.value || mobileSearchInput.value;

    localStorage.setItem('searchTerm', searchTerm);

    window.location.href = baseUrl + 'search?query=' + encodeURIComponent(searchTerm);

    // const url = window.location.href;
    // if (url.includes('search')) {
    //     const query = searchInput.value;
    //
    //     // check if the query is empty
    //     if (query !== '') {
    //         fetch(baseUrl + 'search?query=' + query, {
    //             headers: {
    //                 'X-Requested-With': 'XMLHttpRequest'
    //             }
    //         })
    //             .then(response => response.text())
    //             .then(data => {
    //                 const search_result_content = document.querySelector('#search_result_content');
    //                 // Display the search result and search time in the search page
    //                 search_result_content.innerHTML = data;
    //             });
    //
    //     }
    // } else if (searchTerm.trim() !== '') {
    //     window.location.href = baseUrl + 'search?query=' + encodeURIComponent(searchTerm);
    // }
}
