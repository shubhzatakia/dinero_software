<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Application Form</title>
</head>
<body>
    <h2>Employment Application Form</h2>
    <form action="submit_application.php" method="post" enctype="multipart/form-data">
        <div> 
        <label for="first_name">First Name: <span style="color: red;">*</span></label>
        <input type="text" id="first_name" name="first_name" required><br><br>
        
        <label for="last_name">Last Name: <span style="color: red;">*</span></label>
        <input type="text" id="last_name" name="last_name" required><br><br>

         <!-- Birthdate Section -->
         <label for="birthdate">Birthdate:</label>
        
        <!-- Year Dropdown -->
        <select id="birth_year" name="birth_year" required>
            <option value="">Year</option>
            <?php
            $currentYear = date("Y");
            for ($year = 1950; $year <= $currentYear; $year++) {
                echo "<option value=\"$year\">$year</option>";
            }
            ?>
        </select>

        <!-- Month Dropdown -->
        <select id="birth_month" name="birth_month" required>
            <option value="">Month</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>

        <!-- Day Dropdown -->
        <select id="birth_day" name="birth_day" required>
            <option value="">Day</option>
            <?php
            for ($day = 1; $day <= 31; $day++) {
                echo "<option value=\"$day\">$day</option>";
            }
            ?>
        </select>
        <br><br>

        <label for="email">Email: <span style="color: red;">*</span></label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone: <span style="color: red;">*</span></label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="position_applied">Position Applied For: <span style="color: red;">*</span></label>
        <input type="text" id="position_applied" name="position_applied" required><br><br>

        <label for="resume">Upload Resume (PDF, max 2MB): <span style="color: red;">*</span></label>
        <input type="file" id="resume" name="resume" accept=".pdf" required><br><br>

        <label for="experience_years">Years of Experience: <span style="color: red;">*</span></label>
        <input type="number" id="experience_years" name="experience_years" min="0" required><br><br>

        
        </div>

        <div>
        <h2> Address Section <span style="color: red;">*</span></h2>
        <label for="street_address">Street Address:</label>
        <input type="text" id="street_address" name="street_address" required><br><br>

        <label for="street_address_2">Street Address Line 2:</label>
        <input type="text" id="street_address_2" name="street_address_2"><br><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br><br>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br><br>

        <label for="zip_code">Zip Code:</label>
        <input type="text" id="zip_code" name="zip_code" required><br><br>
        </div>

        <div>
            <h2> Job Skills & Training </h2>
            <label for="skills">Describe your skills: <span style="color: red;">*</span></label>
            <textarea id="skills" name="skills" required> </textarea><br><br>

            <label for="training">Traning or Certifications: <span style="color: red;">*</span></label>
            <textarea id="training" name="training"> </textarea><br><br>

            <!-- Referral Source Section -->
        <div>
            <h2>How Were You Referred to Us?</h2>
            <label><input type="radio" id="refer" name="refer" value="LinkedIn" required> LinkedIn</label><br>
            <label><input type="radio" id="refer" name="refer" value="Naukri" required> Naukri</label><br>
            <label><input type="radio" id="refer"name="refer" value="Other" required> Other</label><br><br>
        </div>
            
        </div>

        <input type="submit" value="Submit">
        
    </form>

</body>
</html>
