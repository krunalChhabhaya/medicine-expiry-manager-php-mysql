<?php
include('../database/conn.php');
// $user_id = $_SESSION['user_id'];
// $us = "SELECT * FROM `final_reg` WHERE `user_id`='$user_id'";
// $result = $conn->query($us);
// $row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $sql = "UPDATE `final_reg` SET `password1`='$password1',`password2`='$password2' WHERE `user_id`= $user_id";

    if ($conn->query($sql) === TRUE) {
        echo '';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if ($_POST["password1"] !== $_POST["password2"]) { ?>
        <script>
            alert("error : Password and Confirm password should match!")
        </script>
<?php
    }
}
?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
                        </div>
                        <form class="user" method="post" action="">

                            <div class="form-group">
                                <label>Username</label>
                                <input type="username" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Username" name="username" placeholder="Username" value="<?php echo $_SESSION['username']  ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Password" name="password1" placeholder="Password" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Confirm Password" name="password2" placeholder="Confirm Password" required>
                            </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Change Password"><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>