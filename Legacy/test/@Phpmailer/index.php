<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Form</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }
        body{
            background: linear-gradient(rgba(44, 76,121, 0.8), rgba(116, 140, 175, 0.5));
            background-attachment: fixed;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <div>
        <div><h1>Contact Us Form Live in a effect</h1></div>
        <div>
            <form action="index.php" method="POST">
               <div> <input type="text" name="name" placeholder="Full Name" value=""></div>
                <div><input type="text" name="email" placeholder="Email" value=""></div>
                <div><textarea name="mesg" cols="30" rows="10" placeholder="Message...."></textarea></div>
                <div><input type="submit" name="submit" value="Send Message" /></div>
            </form>
        </div>
    </div>
</body>
</html>