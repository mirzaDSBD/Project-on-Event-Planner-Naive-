<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
</head>

<body>
    <div class="header">
        <div class="header1">
            <?php
            include('header.php');
            ?>
        </div>
        <div class="header2">
            <?php
              include('header2.php')
            ?>
        </div>
        <div class="header2-1"> <?php include('search.php'); ?> </div>
        <div class="header3">
            <div class="col1-h3">
                <h2>Organizing A Party?</h2>
                <p>Forget the old ways. You can find the best people right here.</p>
                <button><a href="userSignUp.php" style="text-decoration: none;color:black">Learn More</a></button><!--sign up as user-->
            </div>
            <div class="col2-h3">
                <img src="Images/Home_Page/home4.png" alt="">
            </div>
        </div>
    </div>
    <div class="main1">
        <div class="row1-m1">
            <h1 style="text-align: center; font-size:60px; margin-bottom:2%;">They All love Our Service</h1>
            <p style="text-align: center; font-size:25px; margin-top:2%; margin-bottom:5%;">Rate our service and help us to grow further more.</p>
            <!--Animation statrts-->
            <div class="img-container">
                <img id="img" src="images/Home_Page/Review/review1.jpg">
                <div class="progress-bar">
                    <div class="circle active"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
            </div>

            <script>
                const images = ['images/Home_Page/Review/review1.jpg',
                    'images/Home_Page/Review/review2.jpg',
                    'images/Home_Page/Review/review3.jpg',
                    'images/Home_Page/Review/review4.jpg',
                    'images/Home_Page/Review/review5.jpg',
                    'images/Home_Page/Review/review6.jpg'
                ];

                const img = document.getElementById('img');
                const circles = document.querySelectorAll('.circle');

                let currentImageIndex = 0;

                function changeImage() {
                    currentImageIndex = (currentImageIndex + 1) % images.length;
                    img.style.opacity = 0;
                    setTimeout(() => {
                        img.src = images[currentImageIndex];
                        img.style.opacity = 1;
                        updateProgressBar();
                    }, 500);
                }

                function updateProgressBar() {
                    circles.forEach((circle, index) => {
                        if (index === currentImageIndex) {
                            circle.classList.add('active');
                        } else {
                            circle.classList.remove('active');
                        }
                    });
                }

                updateProgressBar();
                setInterval(changeImage, 3000);
            </script>
            <!--Animation ends-->
            <button><a href="add_yours.php" style="text-decoration: none;color:black">Add Yours</a></button>
        </div>
        <div class="row2-m1">
            <h1>Join us now, it's free.</h1>
            <ul>
                <li>No cost to join</li>
                <p>Register and browse professionals, explore reviews.</p>
                <li>Get a job or hire the best planner</li>
                <p>Finding job doesn't have to be a pain. we can search for you!</p>
                <li>Work with the best-without breaking the bank</li>
                <p>You can make affordable bills and take advantage of low transaction rates.</p>
            </ul>
            <button><a href="userSignUp.php" style="text-decoration: none;color:white">Sign up for free</a></button>
            <button><a href="choosePlan.php" style="text-decoration: none;color:white">Learn how to join</a></button><!--planner sign up-->
        </div>
    </div>
    <div class="main2">
        <h1 style="font-size: 50px;margin-bottom: 2px;color:black;margin-top:100px">Browse talents by category</h1>
        <p style="font-size: 30px;color:black;font-weight:bolder">Looking for work?
            <a href="choosePlan.php" style="text-decoration:none;font-size: 35px;color:white">Sign up</a> <!--planner sign up-->
        </p>
        <div class="row1-m2">
            <button>
                <h2 style="text-align: center;font-size:20px"><a href="birthday_party.php" style="text-decoration: none;color:black;">Birthday Party</a></h2>
                <div class="container-p">
                    <p style="text-align: left;">&#9733 4.72/5</p>
                    <p id="birthday-p">1571 Likes</p>
                </div>
            </button>
            <button>
                <h2 style="text-align: center;font-size:20px"><a href="wedding_party.php" style="text-decoration: none;color:black;">Wedding Party</a></h2>
                <div class="container-p">
                    <p style="text-align: left;">&#9733 4.83/5</p>
                    <p id="wedding-p">2318 Likes</p>
                </div>
            </button>
            <button>
            <h2 style="text-align: center;font-size:20px"><a href="corporate_party.php" style="text-decoration: none;color:black;">Corporate Party</a></h2>
                <div class="container-p">
                    <p style="text-align: left;">&#9733 4.21/5</p>
                    <p id="corporate-p">523 Likes</p>
                </div>
            </button>
        </div>
        <div class="row2-m2">
            <button>
            <h2 style="text-align: center;font-size:20px"><a href="home_party.php" style="text-decoration: none;color:black;">Home Party</a></h2>
                <div class="container-p">
                    <p style="text-align: left;">&#9733 4.56/5</p>
                    <p id="home-p">1089 Likes</p>
                </div>
            </button>
            <button>
            <h2 style="text-align: center;font-size:20px"><a href="surprise_party.php" style="text-decoration: none;color:black;">Surprise Party</a></h2>
                <div class="container-p">
                    <p style="text-align: left;">&#9733 4.42/5</p>
                    <p id="surprise-p">723 Likes</p>
                </div>
            </button>
            <button>
            <h2 style="text-align: center;font-size:20px"><a href="customized_party.php" style="text-decoration: none;color:black;">Customized Party</a></h2>
                <div class="container-p">
                    <p style="text-align: left;">&#9733 4.39/5</p>
                    <p id="customized-p">632 Likes</p>
                </div>
            </button>
        </div>
        <script>
            function countLikes(likeCount) {
                // Set the initial like count
                let count = parseInt(likeCount.innerText);

                // When the button is visible, start counting up
                let isCounting = false;
                const observer = new IntersectionObserver(entries => {
                    if (entries[0].isIntersecting) {
                        isCounting = true;
                        setInterval(() => {
                            count++;
                            likeCount.textContent = count + " Likes";
                        }, 50);
                    }
                });
                observer.observe(likeCount);

                // When the button is clicked, stop counting and display the final count
                likeCount.parentElement.parentElement.addEventListener("click", () => {
                    if (isCounting) {
                        isCounting = false;
                        likeCount.textContent = count + " Likes";
                    }
                });
            }

            const likeCounts = document.querySelectorAll(".container-p p:last-of-type");
            likeCounts.forEach(countLikes);
        </script>
    </div>
    <div class="main3">
        <div class="row1-m3">
            <h1 style="color:white;font-size:60px; margin-bottom: 1px;margin-left:20px">This Is How</h1>
            <h1 style="color:#23D1B2;font-size:70px; margin-bottom: 1px;margin-left:20px">Good Companies</h1>
            <h1 style="color:#23D1B2;font-size:80px; margin-bottom: 1px;margin-left:20px">Find Good Planner.</h1>
            <p style="color: #D6BABA;font-size:35px;margin-left:20px">Access Expert Companies To Feel Your Skill Gaps, Control Your Workflow: Hire, Classify And Pay Your Work Partner With Companies For End-To-End Support.</p>
            <button><a href="choosePlan.php" style="text-decoration: none;color:black">Learn More</a></button> <!--Sign up as planner-->
        </div>
        <div class="row2-m3">
            <img id="myImg-c3" src="Images/Home_page/Person/Person1.jpg" alt="">
            <script>
                function changeImage() {
                    const images = [
                        "Images/Home_page/Person/Person1.jpg",
                        "Images/Home_page/Person/Person2.jpg",
                        "Images/Home_page/Person/Person3.jpg",
                        "Images/Home_page/Person/Person4.jpg",
                        "Images/Home_page/Person/Person5.jpg"
                    ];
                    const imgElement = document.getElementById("myImg-c3");
                    let currentImageIndex = 0;

                    setInterval(() => {
                        currentImageIndex = (currentImageIndex + 1) % images.length;
                        imgElement.src = images[currentImageIndex];
                    }, 1500); // 1.5 seconds in milliseconds
                }

                window.onload = function() {
                    changeImage();
                };
            </script>
        </div>
    </div>
    <div class="main4"><!--Main Container4--> </div>
    <div class="main5">
        <div class="row1-m5">
            <h1>Why Businesses Turn To Event Planner</h1>
            <ul>
                <li>Proof of quality</li>
                <li>Safe and secure</li>
                <li>No cost until you hire</li>
            </ul>
        </div>
        <div class="row2-m5">
            <h1>We Are The Marketplace You Need</h1>
            <h2>&#9733 4.8/5</h2>
            <p>Clients rate on professionals</p>
        </div>
    </div>
    <div class="main6">
        <div class="row1-m6">
            <img src="Images\Home_page\Home-6.jpg" alt="">
        </div>
        <div class="row2-m6">
            <h2>For Jobs</h2>
            <h1>Find Great Work</h1>
            <h3>Meet clients you’re excited to work with and take your career or to new heights.</h3>
            <button><a href="choosePlan.php" style="text-decoration: none;font-weight:bolder">Get Opportunity</a></button>
        </div>
    </div>
    <div class="main7">
        <h1 id="myText" style="text-align: center;font-size:70px;font-style: italic;margin-top:20px">
            <span id="rotate-text">“THE BEST THINGS HAPPEN UNEXPECTEDLY”</span>
        </h1>
        <script>
            // JavaScript code to split the text into separate characters and wrap each character in a span element
            const rotateText = document.getElementById("rotate-text");
            const textContent = rotateText.textContent;
            const characters = textContent.split("");
            const wrappedCharacters = characters.map(char => `<span>${char}</span>`);
            rotateText.innerHTML = wrappedCharacters.join("");
        </script>
    </div>
    <div class="footer">
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>