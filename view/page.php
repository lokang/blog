<main
    <?php if($this->auth && $this->auth['id'] == 1): ?>
    <?php endIf ?>
    <?php echo $page['description']; ?>
    <?php if($this->auth && $this->auth['id'] == 1) : ?>
        <br>
    <a href="/page/edit/<?php echo $page['slug'];?>"> Edit</a> <a href="/page/create/">Create</a> <a href="/page/destroy/<?php echo $page['id'];?>" onclick="return confirm('Are you sure you want to delete?')"> Delete</a>
    <?php endif ?>
</main>
