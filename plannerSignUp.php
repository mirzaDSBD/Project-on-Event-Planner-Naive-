<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planner Signup Page</title>
    <link rel="stylesheet" href="plannerSignUp.css">
    <script src="plannerSignUp.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2 style="color: #996F1D;">&#9733Event Planner</h2>
            <form enctype="multipart/form-data" method="post" action="upload.php">
                <div class="profile-pic">
                    <img id="preview" src="default-profile-pic.jpg" alt="Profile Picture">
                    <input id="file-upload" type="file" name="profile-pic" onchange="previewImage()">
                </div>
                <input type="submit" value="Upload">
            </form>

        </div>
        <div class="main">
            <div class="column">
                <form id="myForm" method="post" action="submit-form.php">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" class="input-text" required><br>

                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" class="input-text" required><br>

                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" class="input-text" required><br>

                    <label for="phone">Phone:</label><br>
                    <input type="tel" id="phone" name="phone" class="input-text" required><br>

                    <label for="designation">Designation:</label><br>
                    <input type="text" id="designation" name="designation" class="input-text" required><br>

                    <label for="location">Location:</label><br>
                    <input type="text" id="location" name="location" class="input-text" required><br>

                    <label for="bio">Bio (max 100 words):</label><br>
                    <textarea id="bio" name="bio" class="input-text" required maxlength="100"></textarea>
                </form>
            </div>
            <div class="column">
                <h1 class="text-size">Add your experience/previous works(max 300 words)</h1>
                <textarea name="experience" id="experience" cols="60" rows="22" required maxlength="300"></textarea>
            </div>
            <div class="column">
                <h2>Select Payment Method</h2><br>
                <div class="payment-buttons">
                    <button onclick="openVisaPaymentWindow()" id="visa" class="payment-button">
                        <img src="Images/Logo/visa-logo.png" alt="Visa">
                    </button><br>
                    <button onclick="openMasterPaymentWindow()" id="mastercard" class="payment-button">
                        <img src="Images\Logo\mastercard-logo1.png" alt="Mastercard">
                    </button><br>
                    <button onclick="openNagadPaymentWindow()" id="nagad" class="payment-button">
                        <img src="Images\Logo\Nagad-logo.png" alt="Nagad">
                    </button><br>
                    <button onclick="openBkashPaymentWindow()" id="bkash" class="payment-button">
                        <img src="Images\Logo\bkash-logo1.png" alt="bKash">
                    </button>
                </div>
                <div class="otp-input">
                    <label for="otp">Enter OTP:</label>
                    <input type="text" id="otp" name="otp" required>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="register-button">
                <button onclick="submitForm()">Register Yourself</button>
            </div>
        </div>
    </div>
</body>

</html>