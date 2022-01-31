<main>
    <form action="" method="post">
        <label for="email">Enter Email:</label>
        <input type="text" name="email" id="email" placeholder="please enter email" value="<?php if($this->auth) echo $this->auth['email']; else $this->value('email'); ?>" required>
        <br>
        <label for="message">Message:</label>
        &nbsp; &nbsp;<textarea name="message" id="message" placeholder="Please enter message" required><?php echo $this->value('message'); ?></textarea>
        <br>
        <?php if(!$this->auth):?>
            <label for="captcha">Captcha: <strong>(<?php echo $_SESSION['random']; ?>)</strong></label>
            <input type="text" name="captcha" id="captcha" placeholder="Enter the number above" required>
            <br>
        <?php endif;?>
        <button class="btn btn-secondary" type="submit">Send</button>
    </form>
</main>