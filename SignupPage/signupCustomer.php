<?php
include '../partials/header.php';
?>

<div class="signupSection">
    <form action="createCustomer.php" method="post" class="signupcard">
        <div class="profileImg">
            <img src="../assets/images/" alt="profile photo">
            <p>profile image upload</p>
        </div>
        <div class="signupInfo">
            <h1>Sign up</h1>
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" placeholder="Name"><br>
            <label for="email">E-mail:</label><br>
            <input type="text" name="email" id="email" placeholder="Email"><br>
            <label for="DOB">Date of birth:</label><br>
            <input type="date" name="DOB" id="DOB" placeholder="DOB"><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Password"><br>
            <input type="submit" value="Sign Up" class="signupBtn finalsignupBtn">
        </div>
    </form>

</div>

<?php
include '../partials/footer.php';
?>