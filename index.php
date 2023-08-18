<?php
include_once "./functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate randome passwords</title>
    <link rel="shortcut icon" href="./A-logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>generate random password</h1>
        <div class="password-wrapper">
            <code class="password"><?php
                                    if (isset($_GET['generate'])) {
                                        $pass_include = [];
                                        $length = 8;
                                        if (isset($_GET['length']) && $_GET['length'] !== '') {
                                            $length = $_GET['length'];
                                        }
                                        if (isset($_GET['num'])) {
                                            $pass_include[] = "num";
                                        }
                                        if (isset($_GET['lltr'])) {
                                            $pass_include[] = "lltr";
                                        }
                                        if (isset($_GET['ultr'])) {
                                            $pass_include[] = "ultr";
                                        }
                                        if (isset($_GET['symbol'])) {
                                            $pass_include[] = "symbol";
                                        }
                                        if ($pass_include === []) {
                                            $pass_include = ["lltr", "num"];
                                        }
                                        $password = new Password($length, $pass_include);
                                        $current_pass = $password->generate();
                                        echo $current_pass;
                                    } else {
                                        echo "your password";
                                    } ?></code>
            <div class="popup">
                passwod copied
            </div>
        </div>
        <form action="">
            <label for="length">lenght : </label>
            <div class="length">
                <input type="text" name="length" id="length" autocomplete="off" <?php if (isset($_GET['length'])) {
                                                                                    $value = $_GET['length'];
                                                                                    echo "value=$value";
                                                                                } ?>>
            </div>
            <div class="seperated">
                <label for="num">numbers : </label>
                <input type="checkbox" name="num" id="num" <?php if (isset($_GET['num'])) {
                                                                echo "checked";
                                                            } ?>>
                <label for="lltr">lowercase letters : </label>
                <input type="checkbox" name="lltr" id="lltr" <?php if (isset($_GET['lltr'])) {
                                                                    echo "checked";
                                                                } ?>>
                <label for="ultr">uppercase letters : </label>
                <input type="checkbox" name="ultr" id="ultr" <?php if (isset($_GET['ultr'])) {
                                                                    echo "checked";
                                                                } ?>>
                <label for="symbol">symbols : </label>
                <input type="checkbox" name="symbol" id="symbol" <?php if (isset($_GET['symbol'])) {
                                                                        echo "checked";
                                                                    } ?>>
            </div>
            <input type="submit" value="generate" name="generate">

        </form>
        <p class="checker">
            <?php
            if (isset($_GET['generate'])) {
                $checker = new Password_Checker($current_pass);
                $checker->check();
            } else {
                echo "Generate password to see it's strength";
            }

            ?>
        </p>
    </div>
    <script src="index.js"></script>
</body>

</html>
<?php
