<main>
    <div class="title">
        <?php echo $postData['title'] ?> <?php echo date('d-m-Y h:i:s a', strtotime($postData['dateCreated'])) ?> By <?php echo $postData['firstName'] ?> <?php echo $postData['lastName'] ?>
    </div>

    <p><?php echo $postData['description']; ?></p>

    <p>
        <?php if($this->auth) : ?>
            <form action="" method="post">
                <label for="comment">Comment:</label>
                <textarea class="form-control" name="comment"></textarea>
                <button class="btn btn-secondary mt-2" type="submit">Submit</button>
            </form>
        <?php else : ?>
            <p>Please <a href="/home/login/">login</a> or <a href="/home/register/"> sign up</a> to add comment</p>
        <?php endif;?>
        <span id="comment"></span>
        <?php if($comments) : ?>
            <?php foreach($comments as $comment) :?>
                <div class="title mt-2"><?php echo $comment['comment'] ?> <?php echo date('d-m-Y h:i:s a', strtotime($comment['dateCreated'])) ?></div>
                <br>
                <?php echo $comment['comment'] ?>
                <?php if($this->auth['id'] == $comment['userId']): ?>
                    <br>
                    <a class="btn btn-secondary mt-2" href="/post/update/<?=$comment['id']?>">Update</a> <a class="btn btn-danger mt-2" href="/comment/destroy/<?=$comment['id']?>" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</a>
                <?php endif ?>
            <?php endforeach; ?>
        <?php else :?>
            <p>There are currently no comments.</p>
        <?php endif; ?>
    </p>
</main>


