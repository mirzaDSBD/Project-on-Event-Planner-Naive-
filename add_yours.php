<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(to bottom right, #42a5f5, #9c27b0);
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        form div {
            display: flex;
            flex-direction: column;
            margin-bottom: 30px;
        }

        label {
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: bold;
            display: block;
        }


        input[type="text"],
        textarea {
            padding: 10px;
            border: none;
            border-radius: 3px;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0062cc;
        }

        .photo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .photo-container label {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .photo-container label i {
            font-size: 24px;
            color: #42a5f5;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form>
            <div class="photo-container">
                <input type="file" id="photo" name="photo" hidden>
                <label for="photo">Photo
                    <i class="fas fa-camera"></i>
                </label>
            </div>
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    </div>
    <script>
        const form = document.querySelector('form');
        const nameInput = document.querySelector('#name');
        const commentInput = document.querySelector('#comment');
        const photoInput = document.querySelector('#photo');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            if (nameInput.value && commentInput.value && photoInput.value) {
                alert('Thank you for submitting your information!');
                window.location.href = 'index.php';
            } else {
                alert('Please fill in all required fields.');
            }
        });
    </script>

</body>

</html>