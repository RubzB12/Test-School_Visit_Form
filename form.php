<? session_start(); ?>

<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>School Visit Form</title>
        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script>
    </head>
    <body>
    <form action="submit.php" method="POST" id="form-style">
        <!-- Hidden field to store the selected school ID -->
        <input type="hidden" name="school-id" id="school-id">

        <!-- School Name selection -->
        <label for="school-search">School Selection:</label>
        <input type="search" id="school-search" name="query" placeholder="Enter school name" onkeyup="searchSchools()" required>
        <!-- This div will display the search results dynamically -->
        <div id="school-results"></div>

        <!-- Rest of the form fields -->
        <label for="date">Date of Visit:</label>
        <input type="date" name="date" id="date" required><br>

        <!-- District input -->
        <label for="district">District / Town:</label>
        <input type="text" name="district" placeholder="Enter district or town name" required><br>

        <!-- Ped Registration Status -->
        <label>Ped Registration Status:</label>
        <div class="ped-status-radio">
            <input type="radio" name="ped-status" id="registered" value="Registered">
            <label for="registered">Registered</label>

            <input type="radio" name="ped-status" id="not-registered" value="Not Registered">
            <label for="not-registered">Not Registered</label>

            <input type="radio" name="ped-status" id="pending" value="Pending">
            <label for="pending">Pending</label>
        </div><br>

        <!-- Student numbers input -->
        <label for="num-learners">Number of Learners:</label>
        <input type="number" name="num-learners" required><br>

        <!-- Staff numbers input -->
        <label for="num-teaching-staff">Number of Teaching Staff:</label>
        <input type="number" name="num-teaching-staff" required><br>

        <!-- Aux Staff numbers input -->
        <label for="num-aux-staff">Number of Auxiliary Staff:</label>
        <input type="number" name="num-aux-staff" required><br>

        <!-- Positive observations input -->
        <label for="positive-observation">Positive Observation:</label>
        <textarea name="positive-observation" max="300" required></textarea><br>

        <!-- Improvement recommendation input -->
        <label for="improvement-recommendation">Areas for Improvement & Recommendations:</label>
        <textarea name="improvement-recommendation" max="300" required></textarea><br>

        <!-- Customer complaint input -->
        <label for="customer-complaint">Customer Complaints:</label>
        <textarea name="customer-complaint" max="300" required></textarea><br>

        <!-- School rating slider -->
        <label for="school-rating">School Rating: </label>
        <output id="rating-output">0</output> <!-- Output to display the school rating -->
        <input type="range" id="school-rating" name="school-rating" min="0" max="10" value="0" required oninput="document.getElementById('rating-output').value = this.value">

        <!-- Additional comments -->
        <label for="additional-comments">Additional Comments:</label>
        <textarea name="additional-comments" max="300" required></textarea><br>

        <!-- Submit button -->
        <button type="submit">Submit</button>

        </form>
        
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedSchool = $_POST['query'];
        // Perform actions like saving the school name to the database or processing the form data.
        echo "Selected School: " . htmlspecialchars($selectedSchool, ENT_QUOTES, 'UTF-8');
    }
    ?>

    </body>
</html>
