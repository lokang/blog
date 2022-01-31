<script>
    function loadMore(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let posts = JSON.parse(this.responseText);

                for(let i = 0; i < posts.length; i++){
                    let postsEl = document.getElementById('posts');

                    var header = document.createElement('p');
                    header.className = 'title postItem';

                    var link = document.createElement('a');
                    link.href = '/post/get/'+posts[i]['id'];
                    link.innerText = posts[i]['title'];
                    header.appendChild(link);

                    header.append(' ');
                    header.append(posts[i]['dateCreated']);
                    header.append(' ');
                    header.append(posts[i]['firstName']);
                    header.append(' ');
                    header.append(posts[i]['lastName']);
                    postsEl.appendChild(header);

                    let cardBody = document.createElement('div');
                    cardBody.className = 'p';

                    let par = document.createElement('p');
                    par.innerHTML = posts[i]['description'];
                    cardBody.appendChild(par);

                    postsEl.appendChild(cardBody);
                }
            }
        };
        xhttp.open("GET", "/post/ajaxPosts/"+document.getElementsByClassName('postItem').length, true);
        xhttp.send();
    }
</script>

<main>
    <p id="posts">
        <?php foreach ($posts as $post):?>
        <p class="title" class="postItem">
            <a href="/post/get/<?php echo $post['id'];?>"><?php echo $post['title'] ?></a> <?php echo date('d.m.Y h:i a', strtotime($post['dateCreated'])) ?> <?php echo $post['firstName'] ?> <?php echo $post['lastName'] ?>
        </p>

        <p><?php echo $post['description'];?></p>

        <p>
            <?php if($this->auth && $this->auth['id'] == 1):?>
                <a href="/post/update/<?php echo $post['id'];?>">Edit</a>
                <a href="/post/create/<?php echo $post['id'];?>">Create</a>
                <a href="/post/destroy/<?php echo $post['id'];?>">Delete</a>
            <?php endif;?>
        </p>
        <?php endforeach;?>
    </p>
</main>

<p>
    <?php if($postTotal > 2):?>
        <button class="text-center" type="submit" onclick="loadMore()">Load More</button>
    <?php endif;?>
</p>