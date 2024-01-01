<!DOCTYPE html>
<html>

<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Choose Plan</title>
     <style>
          * {
               margin: 0;
               padding: 0;
               box-sizing: border-box;
               font-family: 'poppins', sans-serif;
          }

          .container {
               width: 100%;
               min-height: 100vh;
               background: #5c539d;
          }

          .container h2 {
               color: #fff;
               font-size: 40px;
               font-style: italic;
               padding: 50px 0;
               text-align: center;
               font-display: inherit;
          }

          .price-row {
               width: 90%;
               max-width: 1100px;
               margin: auto;
               display: grid;
               grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
               grid-gap: 25px;
          }

          .price-col {
               background: linear-gradient(to bottom, #b65eba, #2E8DE1);
               padding: 15% 20%;
               border-radius: 10px;
               color: #fff;
               text-align: center;
          }

          .price-col h3 {
               font-size: 44px;
               margin: 20px 0 40px;
               font-weight: 500;
          }

          .price-col h3 span {
               font-size: 16px;
          }

          .price-col ul {
               text-align: left;
               margin: 20px 0;
               color: #ddd;
               list-style: none;
          }

          .price-col ul li {
               margin: 15px 0;
          }

          .price-col button {
               width: 100%;
               padding: 14px 0;
               background: transparent;
               color: #fff;
               font-size: 15px;
               border: 1px solid #e33058;
               border-radius: 6px;
               margin-top: 30px;
          }

          .price-col button:hover {
               background-color: #e33058;
          }
     </style>
</head>

<body>

     <div class="container">
          <h2>Choose The Best Plan</h2>
          <div class="price-row">
               <div class="price-col">
                    <p>STARTER</p>
                    <h3>&#2547| 3K<span> / month</span></h3>
                    <ul>
                         <li>Unlimited service</li>
                         <li>100% safe work</li>
                         <li>Email verification</li>
                         <li>Upto 3 month funding facility</li>
                    </ul>
                    <button><a href="basicSignupAsPlanner.php" style="text-decoration: none;color:white">Buy Now</a></button>
               </div>
               <div class="price-col">
                    <p>ADVANCE</p>
                    <h3>&#2547| 5K <span>/ month</span></h3>
                    <ul>
                         <li>Unlimited service</li>
                         <li>100% safe work</li>
                         <li>Email verification</li>
                         <li>Upto 3 month funding facility</li>
                    </ul>
                    <button><a href="premiumSignupAsPlanner.php" style="text-decoration: none;color:white">Buy Now</a></button>
               </div>
               <div class="price-col">
                    <p>PREMIUM</p>
                    <h3>&#2547| 10K <span>/ month</span></h3>
                    <ul>
                         <li>Unlimited service</li>
                         <li>100% safe work</li>
                         <li>email verification</li>
                         <li>Upto 3 month funding facility</li>
                    </ul>
                    <button><a href="ultimateSignupAsPlanner.php" style="text-decoration: none;color:white">Buy now</a></button>
               </div>
          </div>
     </div>

</body>

</html>