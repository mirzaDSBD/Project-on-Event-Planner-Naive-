function previewImage() {
    var preview = document.querySelector('#preview');
    var file = document.querySelector('#file-upload').files[0];
    var reader = new FileReader();

    reader.addEventListener("load", function () {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

function openVisaPaymentWindow() {
    var paymentWindow = window.open("", "", "width=400,height=400,left=40,top=15");

    paymentWindow.document.write(`
  <h2>Visa Payment</h2>
  <p>Amount to pay:</p>
  <input type="text" id="amount" value="10000" readonly><br><br>
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
  <input type="text" id="amount" value="10000" readonly><br><br>
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
            alert("Please enter a valid Visa card number.");
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
<input type="text" id="amount" value="10000" readonly><br><br>
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
<input type="text" id="amount" value="10000" readonly><br><br>
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
function submitForm() {
    // Get input values
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const name = document.getElementById("name").value;
    const phone = document.getElementById("phone").value;
    const designation = document.getElementById("designation").value;
    const location = document.getElementById("location").value;
    const bio = document.getElementById("bio").value;
    const otp_input = document.getElementById("otp").value;

    // Validate input values
    if (!email || !password || !name || !phone || !designation || !location || !bio || !otp) {
        alert("Please fill in all required fields.");
        return;
    }

    // Check OTP
    if (otp_input !== otp) {
        alert("Incorrect OTP. Please try again.");
        return;
    }

    // Submit form data
    // Replace this with your own code to submit the form data to your server or API
    alert("Submitting form data...");
}