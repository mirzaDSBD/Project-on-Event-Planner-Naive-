<?php
//database credentials
$host = 'localhost';
$dbname = "eventplanner";
$username = "eventplanner";
$password = "eventplanner123";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>
    <style>
        body {
            background: linear-gradient(to bottom right, #AD8CEA, #50DFB2);
        }

        .main {
            width: 100%;
            height: 1700px;
        }

        .inside-main {
            margin-top: 0px;
            width: 40%;
            height: 1550px;
            /*background: linear-gradient(to bottom, #FFFFFF, #F0F0F0);*/
            background: linear-gradient(to bottom right, #F9E7FE, #DAFCFC);
            margin-left: 500px;
            border-radius: 10px;
        }

        /* Style for the entire form */
        form {
            /*width: 60%;
            margin: 0 auto;
            font-family: Arial, sans-serif;
            font-size: 14px;*/
            padding: 20px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        /* Style for each fieldset */
        fieldset {
            border: none;
            margin-bottom: 10px;
            font-weight: bolder;
        }

        /* Style for each legend */
        legend {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
            padding: 5px 10px;
            border-radius: 5px;
        }

        /* Style for labels */
        label {
            /*display: block;
            margin-bottom: 5px;*/
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        select {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
            border: none;
            border-bottom: 1px solid #ccc;
            background-color: transparent;
            padding: 5px;
            width: 100%;
        }
        /* Style for text inputs */
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 10px;
        }

        /* Style for textarea */
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 15px;
        }

        /* Style for the Payment Info button */
        button[type="button"] {
            background-color: #007FFF;
            color: #FFFFFF;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            margin-bottom: 20px;
            width: 600px;
        }

        button[type="button"]:hover {
            background-color: #3894A3;
        }

        /* Style for the Register button */
        button[type="submit"] {
            background-color: #E15E5E;
            color: #FFFFFF;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            width: 400px;
            font-size: 20px;
            margin-left: 100px;
        }

        button[type="submit"]:hover {
            background-color: #FFA886;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="inside-main">
            <h1 style="text-align: center;color:#478A90;font-size:50px">Thanks For Trusting Us</h1>
            <form action="#" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Profile</legend>
                    <label for="profile-picture">Profile Picture:</label>
                    <input type="file" id="profile-picture" name="profile-picture"><br><br>
                </fieldset>

                <fieldset>
                    <legend>Login Information</legend>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"><br><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"><br><br>
                </fieldset>

                <fieldset>
                    <legend>Personal Information</legend>
                    <label for="full-name">Full Name:</label>
                    <input type="text" id="full-name" name="full-name" required><br><br>
                    <label for="phone-number">Phone Number:</label>
                    <input type="tel" id="phone-number" name="phone-number" required><br><br>
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required><br><br>
                </fieldset>

                <fieldset>
                    <legend>Additional Information</legend>
                    <label for="designation">Designation:</label>
                    <select id="designation" name="designation" required>
                        <option value="Birthday Planner">Birthday Planner</option>
                        <option value="Wedding Planner">Wedding Planner</option>
                        <option value="Corporate Planner">Corporate Planner</option>
                        <option value="Surprise Party Planner">Surprise Party Planner</option>
                        <option value="Home Events Planner">Home Events Planner</option>
                        <option value="Customized Planner">Customized Planner</option>
                    </select>
                    <br><br>

                    <label for="bio">Bio(100 words):</label>
                    <textarea id="bio" name="bio" required maxlength="100"></textarea><br><br>
                    <label for="experience">Experience(300 words):</label>
                    <textarea id="experience" name="experience" required maxlength="100"></textarea><br><br>
                </fieldset>

                <fieldset>
                    <legend>Payment Information</legend>
                    <button type="button" onclick="showPaymentOptions()">Add Payment Method</button>
                    <label for="otp">OTP:</label>
                    <input type="text" id="otp" name="otp"><br><br>
                </fieldset>

                <fieldset>
                    <button type="submit" onclick="submitForm()">Register</button>
                </fieldset>
            </form>

        </div>
    </div>
</body>
<script>
    function showPaymentOptions() {
        // create a div to hold payment options
        var paymentOptionsDiv = document.createElement("div");
        paymentOptionsDiv.style.position = "fixed";
        paymentOptionsDiv.style.top = "50%";
        paymentOptionsDiv.style.left = "50%";
        paymentOptionsDiv.style.transform = "translate(-50%, -50%)";
        paymentOptionsDiv.style.width = "300px";
        paymentOptionsDiv.style.height = "300px";
        paymentOptionsDiv.style.background = "#fff";
        paymentOptionsDiv.style.borderRadius = "10px";
        paymentOptionsDiv.style.boxShadow = "0px 5px 10px rgba(0, 0, 0, 0.5)";
        // create a cross icon to close payment options
        var crossIcon = document.createElement("i");
        crossIcon.classList.add("fas", "fa-times");
        crossIcon.style.position = "absolute";
        crossIcon.style.top = "10px";
        crossIcon.style.right = "10px";
        crossIcon.style.fontSize = "24px";
        crossIcon.style.cursor = "pointer";
        crossIcon.onclick = function() {
            paymentOptionsDiv.remove();
        };
        paymentOptionsDiv.appendChild(crossIcon);
        // create a heading for payment options
        var paymentOptionsHeading = document.createElement("h2");
        paymentOptionsHeading.style.textAlign = "center";
        paymentOptionsHeading.innerHTML = "Select a Payment Option:";
        paymentOptionsDiv.appendChild(paymentOptionsHeading);

        // create an unordered list to hold payment options
        var paymentOptionsList = document.createElement("ul");
        paymentOptionsList.style.listStyleType = "none";
        paymentOptionsList.style.padding = "0";
        paymentOptionsList.style.margin = "0";

        // create a list item for Visa payment option
        var visaOption = document.createElement("li");
        visaOption.style.display = "flex";
        visaOption.style.justifyContent = "center";
        var visaImage = document.createElement("img");
        visaImage.src = "Images/Logo/visa-logo.png";
        visaImage.width = 200;
        visaImage.height = 50;
        visaImage.style.cursor = "pointer";
        visaImage.onclick = function() {
            openVisaPaymentWindow();
            paymentOptionsDiv.remove();
        };
        visaOption.appendChild(visaImage);
        paymentOptionsList.appendChild(visaOption);

        // create a list item for Mastercard payment option
        var mastercardOption = document.createElement("li");
        mastercardOption.style.display = "flex";
        mastercardOption.style.justifyContent = "center";
        var mastercardImage = document.createElement("img");
        mastercardImage.src = "Images/Logo/mastercard-logo1.png";
        mastercardImage.width = 200;
        mastercardImage.height = 50;
        mastercardImage.style.cursor = "pointer";
        mastercardImage.onclick = function() {
            openMasterPaymentWindow();
            paymentOptionsDiv.remove();
        };
        mastercardOption.appendChild(mastercardImage);
        paymentOptionsList.appendChild(mastercardOption);

        // create a list item for bKash payment option
        var bkashOption = document.createElement("li");
        bkashOption.style.display = "flex";
        bkashOption.style.justifyContent = "center";
        var bkashImage = document.createElement("img");
        bkashImage.src = "Images/Logo/bkash-logo1.png";
        bkashImage.width = 200;
        bkashImage.height = 50;
        bkashImage.style.cursor = "pointer";
        bkashImage.onclick = function() {
            openBkashPaymentWindow();
            paymentOptionsDiv.remove();
        };
        bkashOption.appendChild(bkashImage);
        paymentOptionsList.appendChild(bkashOption);
        // create a list item for Nagad payment option
        var nagadOption = document.createElement("li");
        nagadOption.style.display = "flex";
        nagadOption.style.justifyContent = "center";
        var nagadImage = document.createElement("img");
        nagadImage.src = "Images/Logo/nagad-logo.png";
        nagadImage.width = 200;
        nagadImage.height = 50;
        nagadImage.style.cursor = "pointer";
        nagadImage.onclick = function() {
            openNagadPaymentWindow();
            paymentOptionsDiv.remove();
        };
        nagadOption.appendChild(nagadImage);
        paymentOptionsList.appendChild(nagadOption);

        paymentOptionsDiv.appendChild(paymentOptionsList);

        document.body.appendChild(paymentOptionsDiv);
    }

    function openVisaPaymentWindow() {
        var paymentWindow = window.open("", "", "width=400,height=400,left=40,top=15");

        paymentWindow.document.write(`
  <h2>Visa Payment</h2>
  <p>Amount to pay:</p>
  <input type="text" id="amount" value="3000" readonly><br><br>
  <label for="fullName">Enter Full Name:</label><br><br>
  <input type="text" id="fullName" name="fullName" required><br><br>
  <label for="cardNumber">Enter Visa Card Number:</label><br><br>
  <input type="text" id="cardNumber" name="cardNumber" required><br><br>
  <button id="payButton">Proceed</button>
`);

        paymentWindow.document.getElementById("payButton").addEventListener("click", function() {
            var fullName = paymentWindow.document.getElementById("fullName").value.trim();
            var cardNumber = paymentWindow.document.getElementById("cardNumber").value.trim();

            if (!fullName || !/^[a-zA-Z\s]+$/.test(fullName)) {
                alert("Please enter a valid full name.");
                return;
            }

            if (!cardNumber || !/^[0-9]{16}$/.test(cardNumber)) {
                alert("Please enter a valid Visa card number.");
                return;
            }

            var otp = Math.floor(1000 + Math.random() * 9000);
            alert(`Thank you for your payment! Your OTP is: ${otp}`);
            paymentWindow.close();
        });
    }


    function openMasterPaymentWindow() {
        var paymentWindow = window.open("", "", "width=400,height=400,left=40,top=15");

        paymentWindow.document.write(`
  <h2>Mastercard Payment</h2>
  <p>Amount to pay:</p>
  <input type="text" id="amount" value="3000" readonly><br><br>
  <label for="fullName">Enter Full Name:</label><br><br>
  <input type="text" id="fullName" name="fullName" required><br><br>
  <label for="cardNumber">Enter Master Card Number:</label><br><br>
  <input type="text" id="cardNumber" name="cardNumber" required><br><br>
  <button id="payButton">Proceed</button>
`);

        paymentWindow.document.getElementById("payButton").addEventListener("click", function() {
            var fullName = paymentWindow.document.getElementById("fullName").value.trim();
            var cardNumber = paymentWindow.document.getElementById("cardNumber").value.trim();

            if (!fullName || !/^[a-zA-Z\s]+$/.test(fullName)) {
                alert("Please enter a valid full name.");
                return;
            }

            if (!cardNumber || !/^[0-9]{16}$/.test(cardNumber)) {
                alert("Please enter a valid Master card number.");
                return;
            }

            var otp = Math.floor(1000 + Math.random() * 9000);
            alert(`Thank you for your payment! Your OTP is: ${otp}`);
            paymentWindow.close();
        });
    }

    function openNagadPaymentWindow() {
        var paymentWindow = window.open("", "", "width=400,height=400,left=40,top=15");

        paymentWindow.document.write(`
<h2>Nagad Payment</h2>
<p>Amount to pay:</p>
<input type="text" id="amount" value="3000" readonly><br><br>
<label for="bkashNumber">Enter Nagad Number:</label><br><br>
<input type="text" id="bkashNumber" name="bkashNumber" required><br><br>
<button id="payButton">Proceed</button>
`);

        paymentWindow.document.getElementById("payButton").addEventListener("click", function() {
            var bkashNumber = paymentWindow.document.getElementById("bkashNumber").value;
            if (!bkashNumber) {
                alert("Please enter your Nagad number.");
                return;
            }

            // Validate the Bangladeshi mobile number
            var bdRegex = /^(?:\+88|01)?(?:\d{11}|\d{13})$/;
            if (!bdRegex.test(bkashNumber)) {
                alert("Please enter a valid Bangladeshi mobile number.");
                return;
            }

            var otp = Math.floor(1000 + Math.random() * 9000);
            alert(`Thank you for your payment! Your OTP is: ${otp}`);
            paymentWindow.close();
        });
    }

    function openBkashPaymentWindow() {
        var paymentWindow = window.open("", "", "width=400,height=400,left=40,top=15");

        paymentWindow.document.write(`
<h2>bKash Payment</h2>
<p>Amount to pay:</p>
<input type="text" id="amount" value="3000" readonly><br><br>
<label for="bkashNumber">Enter bKash Number:</label><br><br>
<input type="text" id="bkashNumber" name="bkashNumber" required><br><br>
<button id="payButton">Proceed</button>
`);

        paymentWindow.document.getElementById("payButton").addEventListener("click", function() {
            var bkashNumber = paymentWindow.document.getElementById("bkashNumber").value;
            if (!bkashNumber) {
                alert("Please enter your bKash number.");
                return;
            }

            // Validate the Bangladeshi mobile number
            var bdRegex = /^(?:\+88|01)?(?:\d{11}|\d{13})$/;
            if (!bdRegex.test(bkashNumber)) {
                alert("Please enter a valid Bangladeshi mobile number.");
                return;
            }

            var otp = Math.floor(1000 + Math.random() * 9000);
            alert(`Thank you for your payment! Your OTP is: ${otp}`);
            paymentWindow.close();
        });
    }
</script>
<script>
    const otp = "1234"; // Define OTP
    function submitForm() {
        // Get input values
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const name = document.getElementById("full-name").value;
        const phone = document.getElementById("phone-number").value;
        const designation = document.getElementById("designation").value;
        const location = document.getElementById("location").value;
        const bio = document.getElementById("bio").value;
        const experience = document.getElementById("experience").value;
        const otp_input = document.getElementById("otp").value;

        // Validate input values
        if (!email || !password || !name || !phone || !designation || !location || !bio || !experience || !otp_input) {
            alert("Please fill in all required fields.");
            return;
        }

        // Check OTP
        /*if (otp_input !== otp) {
            alert("Incorrect OTP. Please try again.");
            return;
        }*/

        // Submit form data
        // Replace this with your own code to submit the form data to your server or API
        alert("Submitting form data...");
    }
</script>

</html>
<?php
// establish a connection to the database using PDO
try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // retrieve form data
    $profilePicture = isset($_FILES['profile-picture']['name']) ? $_FILES['profile-picture']['name'] : null;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullName = $_POST['full-name'];
    $phoneNumber = $_POST['phone-number'];
    $location = $_POST['location'];
    $designation = $_POST['designation'];
    $bio = $_POST['bio'];
    $experience = $_POST['experience'];

    // insert data into the database using prepared statements to prevent SQL injection attacks
    try {
        $stmt = $dbh->prepare("INSERT INTO `planner_list`(`planners_profile_picture`, `planners_email`, `planners_password`, `planners_name`, `planners_phone`, `planners_designation`, `planners_location`, `planners_bio`, `planners_experience`, `level`) 
            VALUES (:profilePicture, :email, :password, :fullName, :phoneNumber, :designation, :location, :bio, :experience, '1')");
        $stmt->bindParam(':profilePicture', $profilePicture);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':designation', $designation);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':experience', $experience);

        if ($stmt->execute()) {
            echo "Data inserted successfully";
        } else {
            echo "Error inserting data";
        }
    } catch (PDOException $e) {
        if ($e->errorInfo[1] === 1048 && $e->errorInfo[0] === '23000') {
            echo "<script>alert('Data inserted successfully');</script>";
        } else {
            echo "<script>alert('Error in the form');</script>";
        }
    }
}
?>