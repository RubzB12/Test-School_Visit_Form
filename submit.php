<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $schoolId = $_POST['school-id'];  // School ID selected
    $date = $_POST['date'];
    $district = $_POST['district'];
    $pedStatus = $_POST['ped-status'];
    $numLearners = $_POST['num-learners'];
    $numTeachingStaff = $_POST['num-teaching-staff'];
    $numAuxStaff = $_POST['num-aux-staff'];
    $positiveObservation = $_POST['positive-observation'];
    $improvementRecommendation = $_POST['improvement-recommendation'];
    $customerComplaint = $_POST['customer-complaint'];
    $schoolRating = $_POST['school-rating'];
    $additionalComments = $_POST['additional-comments'];

    // Sanitizing input
    $schoolId = htmlspecialchars($schoolId, ENT_QUOTES, 'UTF-8');
    $date = htmlspecialchars($date, ENT_QUOTES, 'UTF-8');
    $district = htmlspecialchars($district, ENT_QUOTES, 'UTF-8');
    $pedStatus = htmlspecialchars($pedStatus, ENT_QUOTES, 'UTF-8');
    $positiveObservation = htmlspecialchars($positiveObservation, ENT_QUOTES, 'UTF-8');
    $improvementRecommendation = htmlspecialchars($improvementRecommendation, ENT_QUOTES, 'UTF-8');
    $customerComplaint = htmlspecialchars($customerComplaint, ENT_QUOTES, 'UTF-8');
    $additionalComments = htmlspecialchars($additionalComments, ENT_QUOTES, 'UTF-8');

    // Update selected school’s data in the database
    $stmt = $pdo->prepare("
        UPDATE schools SET
        visit_date = ?, 
        district = ?, 
        ped_status = ?, 
        num_learners = ?, 
        num_teaching_staff = ?, 
        num_aux_staff = ?, 
        positive_observation = ?, 
        improvement_recommendation = ?, 
        customer_complaint = ?, 
        school_rating = ?, 
        additional_comments = ?
        WHERE id = ?
    ");
    $stmt->execute([
        $date, $district, $pedStatus, $numLearners, $numTeachingStaff, $numAuxStaff, 
        $positiveObservation, $improvementRecommendation, $customerComplaint, 
        $schoolRating, $additionalComments, $schoolId
    ]);

    echo "Data for school $schoolId has been successfully updated on CRM!";
}
?>
