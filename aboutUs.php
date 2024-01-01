<!DOCTYPE>
<html lang="en">

<head>
    <title>About Us</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background-color: white;
        }

        .about-1 {
            margin: 30px;
            padding: 5px;
        }

        .about-1 h1 {
            text-align: center;
            color: black;
            font-weight: bold;
        }

        .about-1 p {
            text-align: center;
            padding: 3px;
            color: #fff;
        }

        .about-item {
            margin-bottom: 20px;
            margin-top: 20px;
            background-color: teal;
            padding: 80px, 30px;
            box-shadow: 0 0 9px rgba(0, 0, 0 .6);
            height: 170px;
            width: 93%;
            margin-left: 50px;
            border-radius: 20px;
            border-color: pink;
        }

        .about-item i {
            font-size: 43px;
            margin: 0;
        }

        .about-item h3 {
            text-align: center;
            font-size: 25px;
            margin-bottom: 10px;
        }

        .about-item hr {
            width: 200px;
            height: 3px;
            background-color: indigo;
            margin: 0 auto;
            border: none;
        }

        .about-item p {
            text-align: center;
            margin-top: 20px;
            padding-bottom: 35px;

        }

        .about-item:hover {
            background-color: lightseagreen;
        }

        .about-item:hover i,
        .about-item:hover h3,
        .about-item:hover p {
            color: #fff;
        }

        .about-item:hover hr {
            background-color: #fff;
        }

        .about-item:hover i {
            transform: translateY(-20px);
        }

        .about-item:hover i,
        .about-item:hover h3,
        .about-item:hover hr {
            transition: all 400ms ease-in-out;
        }

        footer {
            padding: 20px;
            height: 130px;
            width: 100%;
        }
    </style>
</head>

<body>
    <section id="about">
        <div class="about-1">
            <h1>ABOUT US</h1>
            <p style="color:#212226">Welcome to our website. Here you can organize any event easily with our experienced
                event planners.</p>
        </div>
        <div id="about-2">
            <div class="content-box-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="about-item text-center">
                                <i class="fa fa-book"></i>
                                <h3>MISSION</h3>
                                <hr>
                                <p>
                                    Our mission is to provide a user-friendly and reliable platform for event planners and customers, enabling them to connect and collaborate to create unforgettable events. We aim to empower event planners to showcase their skills, expand their customer base, and achieve their business goals, while providing customers with a seamless, stress-free, and enjoyable event planning experience.
                                </p>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="about-item text-center">
                                <i class="fa fa-globe"></i>
                                <h3>VISION</h3>
                                <hr>
                                <p>To be the leading online platform connecting event planners with customers globally, offering personalized and exceptional event planning services.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="about-item text-center">
                                <i class="fa fa-pencil"></i>
                                <h3>GOALS</h3>
                                <hr>
                                <p>Improve customer service,Increase operational efficiency,
                                    grow revenue,optimize facility utilization,increase safety,saving
                                    time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <?php
        include('footer.php');
        ?>
    </footer>
</body>

</html>