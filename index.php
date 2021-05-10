<?php
session_start();
if (isset($_SESSION['fname']) && isset($_SESSION['fname'])) {
    header("Location:mysql.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <title>lab-1 IT301 </title>
</head>

<body>
    <div class="container px-5">

        <!-- // ? FORM => БҮРТГҮҮЛЭХ -->
        <form action="mysql.php" method="post">

            <!-- //TODO) ROW-TITLE -->
            <div class="row mt-4">
                <div class="col-6">
                    <h4 class="ml-5">Бүртгүүлэх</h4>
                </div>
            </div>
            <hr />

            <!-- //TODO) ROW-INPUTS -->
            <div class="row mt-4 mb-5">
                <div class="col-sm-6 mt-4">
                    <label>Нэр:</label>
                    <input type="text" name="fName" class="form-control h-75" />
                </div>
                <div class="col-sm-6 mt-4">
                    <label>Овог:</label>
                    <input type="text" name="lName" class="form-control h-75" />
                </div>
            </div>
            <hr />

            <!-- //TODO) ROW-BUTTONS -->
            <div class="row mt-4">
                <div class="col-12">
                    <button type="submit" value="Save" class="mx-2">Бүртгүүлэх</button>
                    <button type="reset" value="reset">Цэвэрлэх</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
