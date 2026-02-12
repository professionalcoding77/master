<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<style>
    body {
        background-image: linear-gradient(to right, #d4fc79, #ffffff);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }
</style>

<body>
    <form method="POST" style="display: flex; justify-content: center;">
        <div class="container" Style="border-radius: 10px; margin: 10px;">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Unique Id
                </label>
                <input type="text" class="form-control" id="uid" name="id"
                    placeholder="Enter your unique id (maxlength is 4)" aria-describedby="emailHelp" maxlength="4"
                    required="required">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name
                </label>
                <input type="text" class="form-control" id="uid" name="name" placeholder="Enter your name"
                    aria-describedby="emailHelp" required="required">
            </div>
            <div>
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                    placeholder="name@example.com" required="required">
                <div id="emailHelp" class="form-text">We'll never share your
                    email with anyone else.</div>
            </div>
            <div class="mb-3 my-3">
                <label for="exampleFormControlTextarea1" class="form-label">Topic name</label>
                <textarea class="form-control" id="topicname" name="topicName" rows="3" required="required"></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
                <label class="form-check-label" for="exampleCheck1">Check me
                    out</label>
            </div>
            <button type="submit" name="sb" class="btn btn-primary"
                style="margin-top: 8px; margin-bottom: 8px; margin-left: 500px">Submit</button>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'ytassembly');

if (!$conn) {
    echo "Database not connected";
}

if (isset($_POST['sb'])) {

    $id = strtoupper($_POST['id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $topic_name = $_POST['topicName'];

    // allowed IDs
    $allowed_ids = array("A101", "L102", "P103", "M104");

    if (in_array($id, $allowed_ids)) {
        $query = "INSERT INTO YtAssemblytable(id,name,email,topic_name)
                  VALUES('$id','$name','$email','$topic_name')";

        $execute = mysqli_query($conn, $query);

        if ($execute) {
            echo "<script>alert('Data inserted successfully')</script>";
        } 
        else {
            echo "<script>alert('ID already exists (Primary Key)')</script>";
        }

    } 
    else {
        echo "<script>alert('Only particular I'd is allowed')</script>";
    }
}

?>

</html>