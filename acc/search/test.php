<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
    <title>Auto-Suggest Search</title>
</head>
<body>

<div class="container">
    <h2>Auto-Suggest Search</h2>
    <form>
        <input type="text" name="search" id="search" placeholder="Search...">
    </form>

    <div class="results" id="search-results"></div>
</div>

<script>
$(document).ready(function() {
    $('#search').on('input', function() {
        var query = $(this).val();

        if (query != '') {
            $.ajax({
                url: 'demo-search.php',
                method: 'GET',
                data: { search: query },
                success: function(data) {
                    $('#search-results').html(data);
                }
            });
        } else {
            $('#search-results').html('');
        }
    });
});

</script>
</body>
</html>
