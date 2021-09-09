<main>
    <form action="" method="post">
        <label for="slug">Slug:</label>
        <input type="text" name="slug" value="<?php echo $edit['slug'];?>" placeholder="">
        <br>
        <label for="description">Description:</label>
        <textarea rows = "7" name="description" placeholder=""><?php echo $edit['description'];?></textarea>
        <button type="submit">Submit</button>
    </form>
</main>
