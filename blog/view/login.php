<main>
    <?php echo $this->errors() ?>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input class="form-control" name="email" type="email">
        <br>
        <label for="password">Password:</label>
        <input class="form-control" name="password" type="password">
        <br>
        <button class="btn btn-secondary" type="submit">Login</button> <a href="/home/passwordRecovery/">Forgot Password?</a>
    </form>
</main>
