<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ PAGE</title>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Work Sans', sans-serif;
        }

        .faq-heading {
            border-bottom: #777;
            padding: 20px 60px;
        }

        .faq-container {
            display: flex;
            justify-content: center;
            flex-direction: column;

        }

        .hr-line {
            width: 60%;
            margin: auto;
        }

        /* Style the buttons that are used to open and close the faq-page body */
        .faq-page {
            /* background-color: #eee; */
            color: #444;
            cursor: pointer;
            padding: 30px 20px;
            width: 60%;
            border: none;
            outline: none;
            transition: 0.4s;
            margin: auto;

        }

        .faq-body {
            margin: auto;
            /* text-align: center; */
            width: 50%;
            padding: auto;

        }


        /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
        .active,
        .faq-page:hover {
            background-color: #F9F9F9;
        }

        /* Style the faq-page panel. Note: hidden by default */
        .faq-body {
            padding: 0 18px;
            background-color: white;
            display: none;
            overflow: hidden;
        }

        .faq-page:after {
            content: '\02795';
            /* Unicode character for "plus" sign (+) */
            font-size: 13px;
            color: #777;
            float: right;
            margin-left: 5px;
        }

        .active:after {
            content: "\2796";
            /* Unicode character for "minus" sign (-) */
        }
    </style>

</head>

<body>
    <main>

        <h1 class="faq-heading">FAQ'S</h1>
        <section class="faq-container">
            <div class="faq-one">

                <!-- faq question -->
                <h1 class="faq-page">Why do I need an event planner??</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>To organize a birthday,surprise party,corporate event and wedding easily.</p>
                </div>
            </div>
            <hr class="hr-line">

            <div class="faq-two">

                <!-- faq question -->
                <h1 class="faq-page">How do you charge for services??</h1>

                <!-- faq answer -->

                <div class="faq-body">
                    <p>We have basic,montly and premium services.You can choose any of them.</p>
                </div>
            </div>
            <hr class="hr-line">

            <div class="faq-three">

                <!-- faq question -->
                <h1 class="faq-page">Are deposits refundable?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>Yes,If customers are in difficulty deposits are refundable.</p>
                </div>
            </div>
            <hr class="hr-line">

            <div class="faq-four">

                <!-- faq question -->
                <h1 class="faq-page">What kind of events do you plan?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>We organize birthday,surprise party,corporate event and wedding.</p>
                </div>
            </div>
            <hr class="hr-line">

            <div class="faq-five">

                <!-- faq question -->
                <h1 class="faq-page">What if there’s an emergency? Can we change the date or details without additional fees?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>If there is an emergency you can change the date but you have to give additional fees.</p>
                </div>
            </div>
            <hr class="hr-line">

            <div class="faq-six">

                <!-- faq question -->
                <h1 class="faq-page">What is included in event planning services?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>We include a customize service for customer.If they need any changes we can modify services.</p>
                </div>
            </div>
            <hr class="hr-line">

            <div class="faq-seven">

                <!-- faq question -->
                <h1 class="faq-page">How much time do you need to plan?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>We need minimum one week to plan a party.</p>
                </div>
            </div>
            <hr class="hr-line">

            <div class="faq-eight">

                <!-- faq question -->
                <h1 class="faq-page">Do you have a photographer reference or partnership?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>Yes,we have our own photographer.</p>
                </div>
            </div>
            <hr class="hr-line">

            <div class="faq-nine">

                <!-- faq question -->
                <h1 class="faq-page">How much experience do you have?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>We are working ten years in this site and assure you that we are trustworthy.</p>
                </div>
            </div>
            <hr class="hr-line">


            <div class="faq-ten">

                <!-- faq question -->
                <h1 class="faq-page">What’s it like to work with an event planner?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>We are happy to work as an event planner and we make our customer happy.</p>
                </div>
            </div>

        </section>
    </main>
    <script>
        var faq = document.getElementsByClassName("faq-page");
        var i;

        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var body = this.nextElementSibling;
                if (body.style.display === "block") {
                    body.style.display = "none";
                } else {
                    body.style.display = "block";
                }
            });
        }
    </script>
</body>


</html>