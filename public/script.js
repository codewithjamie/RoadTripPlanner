const accessToken = env('MAPBOX_ACCESS_TOKEN');
const proximity = '-73.990593,40.740121'; // Set proximity as desired (longitude, latitude)

$('#city-search').on('input', function () {
    const query = $(this).val();
    if (query.length < 3) return; // Start searching after 3 characters

    const sessionToken = Math.random().toString(36).substring(2); // Unique session token for each search

    fetch(`https://api.mapbox.com/search/searchbox/v1/suggest?q=${query}&language=en&proximity=${proximity}&session_token=${sessionToken}&access_token=${accessToken}`)
        .then(response => response.json())
        .then(data => {
            // Clear previous suggestions
            $('#suggestions').empty();

            // Populate suggestions
            data.suggestions.forEach(suggestion => {
                $('#suggestions').append(`<li>${suggestion.name}</li>`);
            });
        })
        .catch(error => console.error('Error:', error));
});
