<?php

// assign value

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = Filter_var($_POST["name"],FILTER_SANITIZE_STRING);
    $email = Filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
    $phone = Filter_var($_POST["phone"] , FILTER_SANITIZE_NUMBER_INT);
    $message =  Filter_var($_POST["message"],FILTER_SANITIZE_STRING);
    $errors = array();

    if (strlen($name) < 4) {
        $errors[] = "your name most be longest than 3 char";
    }
    if (strlen($message) < 10) {
        $errors[] = "your message most be longest than 10 char";
    }

    if (empty($errors)){
        $ourMail = "mds.sc8@gmail.com";
        $subject = "contact me";

        mail($ourMail,$subject,$message);
    }
}

?>


<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="custom.css" rel="stylesheet">
    <script src="app.js" defer></script>

    <title>Ahmed Algowaihi Contact form</title>
</head>


<body class="flex justify-center h-screen bg-gradient-to-r from-gray-100 to-gray-300">
<script>
    function closeAlert(event) {
        let element = event.target;
        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }
        element.parentNode.parentNode.removeChild(element.parentNode);
    }
</script>
<div class="container flex justify-center content-center mt-8">

    <div class="w-full max-w-xl">
        <div class="bg-gradient-to-r from-purple-800 via-violet-900 to-purple-800 p-2 text-center">
            <h1 class="text-3xl font-bold  text-pink-600">Quick Contact</h1>
            <p class="text-white">Contact us today, and get reply with in 24 hours!
            </p>
        </div>
        <form class="bg-white shadow-xl rounded px-8 pt-6 pb-8 mb-10 " method="POST"
              action="<?php echo $_SERVER ["PHP_SELF"] ?>">

            <?php
            if (isset($errors) && !empty($errors)) {
                ?>
                <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
                  <span class="text-xl inline-block mr-5 align-middle">
                    <i class="fas fa-bell"></i>
                  </span>
                    <span class="inline-block align-middle mr-8">
                    <b class="capitalize">Error !</b>
            <?php
            foreach ($errors as $error) {
                ?>
                <?php echo "<p class=text-red-50 font-bold>$error</p>"; ?>


            <?php } ?>
                </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
                            onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
            <?php } ?>


            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Full Name
                </label>
                <input
                        class="shadow appearance-none border focus:border-b-4 focus:border-b-purple-600 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline font-bold mb-2"
                        id="name" name="name" value="<?= isset($name)?$name:""?>" type="text" placeholder="full name..." required>
                <div id="name-error" class="error-alert flex items-center bg-red-500 text-white text-sm font-bold px-4 py-2 rounded" role="alert">
                    <p>your name should be more than 3 char </p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2 " for="email">
                        Email
                    </label>
                    <input
                            class="shadow appearance-none border focus:border-b-4 focus:border-b-purple-600 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline font-bold"
                            id="email" type="email" name="email" value="<?= isset($email)?$email:""?>"  placeholder="eg:XXX@gmail.com" required>
                    <div id="email-error" class="error-alert flex items-center bg-red-500 text-white text-sm font-bold px-4 py-2 rounded" role="alert">
                        <p>email is required </p>
                    </div>

                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        Phone Number
                    </label>
                    <input
                            class="shadow appearance-none border focus:border-b-4 focus:border-b-purple-600 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline font-bold"
                            id="phone" type="text" name="phone" value="<?= isset($phone)?$phone:""?>"  placeholder="eg:053488****" required>
                    <div id="phone-error" class="error-alert flex items-center bg-red-500 text-white text-sm font-bold px-4 py-2 rounded" role="alert">
                        <p>your number should be saudi namber and not empty</p>
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                    Message
                </label>
                <textarea
                        class="shadow appearance-none border focus:border-b-4 focus:border-b-purple-600 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline h-28 font-bold"
                        id="message" name="message" placeholder="write your message here ...."></textarea>
                <div id="msg-error" class="error-alert flex items-center bg-red-500 text-white text-sm font-bold px-4 py-2 rounded" role="alert">
                    <p>Message should be more than 10 char</p>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button
                        class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <i class="fa-regular fa-paper-plane"></i>
                    Send
                </button>
                <div class="w-32 flex items-center justify-between">
                    <a class="inline-block align-baseline font-bold text-2xl  text-pink-700 hover:text-pink-800"
                       href="#">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a class="inline-block align-baseline font-bold text-2xl text-pink-700 hover:text-pink-800"
                       href="#">
                        <i class="fa-brands fa-github"></i>
                    </a>
                    <a class="inline-block align-baseline font-bold text-2xl text-pink-700 hover:text-pink-800"
                       href="#">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                </div>

            </div>
        </form>
    </div>


</div>
</body>

</html>