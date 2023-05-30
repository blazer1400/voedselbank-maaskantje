<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Voedselbank maaskantje</title>
    <style>
        .background {
            background: url("./img/background.jpg");
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="background">
    <div class="mt-36 text-white">
        <p class="text-3xl text-center font-bold">Voedselbank maaskantje</p>
        <p class="text-2xl text-center mt-10">Inloggen</p>

        <?php

        session_start();

        if (!empty($_SESSION['user'])) {
            header('location: ./dashboard.php');
        }

        if (!empty($_SESSION['error'])) {
            echo "<div class='bg-red-500 w-96 m-auto my-4 p-2 rounded'>
            <p>" . $_SESSION['error'] . "</p>
        </div>";
        }

        $_SESSION['error'] = null;

        ?>


        <div class="shadow rounded p-4 w-96 m-auto mt-8 bg-white text-black">
            <form class="space-y-4 flex flex-col justify-center" method="post" action="./php/loginHandler.php">
                <span class="border h-8 rounded overflow-hidden flex items-center justify-between">
                    <span class="bg-cyan-400 h-full w-[35px] flex items-center justify-center">
                        <img src="img/icons/user.png" style="width:20px" />
                    </span>
                    <input type="text" name="username" class="border-0 w-full pl-1 bg-transparent h-full"/>
                </span>
                <span class="border h-8 rounded overflow-hidden flex items-center justify-between">
                    <span class="bg-cyan-400 h-full w-[35px] flex items-center justify-center">
                        <img src="img/icons/lock.svg" style="width:20px" />
                    </span>
                    <input type="text" name="password" class="border-0 w-full pl-1 bg-transparent h-full"/>
                </span>
                <button class="m-auto rounded border p-1 w-full bg-cyan-400 hover:bg-cyan-300">Login</button>
            </form>
        </div>
    </div>
</body>
</html>