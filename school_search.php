<!-- search_schools.php -->
<?php
require 'db/connect.php'; // Include your database connection script

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Fetch matching schools based on the search query
    $stmt = $pdo->prepare("SELECT id, schoolName FROM schools WHERE schoolName LIKE ?");
    $stmt->execute(['%' . $query . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        foreach ($results as $school) {
            // Display each school as a clickable item
            echo '<p onclick="selectSchool(\'' . $school['id'] . '\', \'' . htmlspecialchars($school['schoolName'], ENT_QUOTES, 'UTF-8') . '\')">'
                . htmlspecialchars($school['schoolName'], ENT_QUOTES, 'UTF-8') . '</p>';
        }
    } else {
        echo '<p>No schools found.</p>';
    }
}
?>