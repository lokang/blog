<main>
    <form action="" method="post">
        <label for="title">Title:</label>
        <input class="form-control" type="text" name="title" value="<?php echo $postData['title'];?>">
        <br>
        <label for="description">Description:</label>
        <textarea class="form-control editor" name="description"><?php echo $postData['description']; ?></textarea>
        <br>
        <button class="btn btn-secondary" type="submit">Submit</button>
    </form>
</main>
