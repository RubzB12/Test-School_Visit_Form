let searchTimeout; // Declare a variable for debounce timeout

function searchSchools() {
    clearTimeout(searchTimeout); // Clear the previous timeout
    const query = document.getElementById('school-search').value;

    // Set a timeout to wait for the user to stop typing
    searchTimeout = setTimeout(function() {
        if (query.length > 0) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'search_schools.php?query=' + encodeURIComponent(query), true);
            xhr.onload = function () {
                if (this.status === 200) {
                    document.getElementById('school-results').innerHTML = this.responseText;
                } else {
                    // Handle errors if the request fails
                    document.getElementById('school-results').innerHTML = '<p>Error fetching results. Please try again later.</p>';
                }
            };
            xhr.onerror = function () {
                // Handle network errors
                document.getElementById('school-results').innerHTML = '<p>Network error. Please check your connection.</p>';
            };
            xhr.send();
        } else {
            document.getElementById('school-results').innerHTML = ''; // Clear results if input is empty
        }
    }, 300); // Wait 300ms after the user stops typing before sending the request
}

function selectSchool(schoolId, schoolName) {
    document.getElementById('school-search').value = schoolName;
    document.getElementById('school-id').value = schoolId;
    document.getElementById('school-results').innerHTML = ''; // Clear the results after selection
}