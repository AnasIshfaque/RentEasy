<dialog class="login_modal">
  <button class="close_modal"><i class="fa-solid fa-xmark"></i></button>
  <h2>Login</h2>
  <form class="login_form" method="POST" action="../loginPage/loginProcess.php">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" placeholder="Name">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" placeholder="Password">
    <button class="modal_login_btn" type="submit">Login</button>
  </form>
</dialog>