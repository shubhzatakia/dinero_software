<?php
require_once '../models/Candidate.php';
require_once '../FileUploader.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Initialize the file uploader
        $uploader = new FileUploader($_FILES['resume']);
        $uploader->validate();
        $resume_filename = $uploader->uploads();

        // Initialize the candidate model
        $candidate = new Candidate();
        $candidate->first_name = $_POST['first_name'];
        $candidate->last_name = $_POST['last_name'];
        $candidate->email = $_POST['email'];
        $candidate->phone = $_POST['phone'];
        $candidate->position_applied = $_POST['position_applied'];
        $candidate->experience_years = (int)$_POST['experience_years'];
        $candidate->resume_filename = $resume_filename;
        $candidate->skills = $_POST['skills'];
        $candidate->training = $_POST['training'];
        $candidate->refer = $_POST['refer'];

        $birth_year = $_POST['birth_year'];
        $birth_month = $_POST['birth_month'];
        $birth_day = $_POST['birth_day'];

        // Combine year, month, and day into a single date string
        $candidate->dob  = "$birth_year-$birth_month-$birth_day";


        $address_street1 = $_POST['street_address'];
        $address_street2 = $_POST['street_address_2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zip_code'];

        //Combine address field
        $candidate->address = "$address_street1-$address_street2-$city-$state-$zipcode";

        // Save candidate to database
        if ($candidate->save()) {
            echo "Application submitted successfully.";
        } else {
            echo "Error: Could not save application.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
