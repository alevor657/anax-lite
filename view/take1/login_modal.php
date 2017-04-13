<!-- The Modal -->
<div id="modal" class="modal">

    <span id="close_modal" class="close" title="Close Modal">&times;</span>

    <!-- Modal Content -->
    <form class="modal-content animate" action="/action_page.php">

        <div class="container" id='login-container'>
            <p><b>Username</b></p>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <p><b>Password</b></p>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
        </div>

        <p id='reg-text'>
            Or <a id="register" class="register_activator">register&nbsp;&darr;</a>
        </p>

        <div class="container container-register" id="container-register">
            <p>register</p>

        </div>
    </form>
</div>
