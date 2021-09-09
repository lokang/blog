CREATE TABLE `comments` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `userId` int(10) NOT NULL,
    `postId` int(10) NOT NULL,
    `comment` text NOT NULL,
    `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pages` (
     `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `slug` varchar(150) NOT NULL,
     `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pages` (`id`, `slug`, `description`) VALUES
    (1, 'about', '<p>Blog is started on 01.01.2020.</p>');


CREATE TABLE `posts` (
    `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `userId` int(10) NOT NULL,
    `title` varchar(150) NOT NULL,
    `description` text NOT NULL,
    `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `userId`, `title`, `description`, `dateCreated`) VALUES
    (1, 1, 'blog', '<p>Donec ullamcorper nibh sit amet orci egestas, a tristique lacus vehicula. Sed ex nisl, interdum ut tortor sit amet, aliquam consectetur nulla. Morbi et mattis risus. Sed ornare ligula odio, eget auctor erat placerat elementum. Suspendisse varius hendrerit felis eu ultrices. Donec tincidunt ornare purus, a pellentesque neque iaculis eu. Nunc luctus bibendum dui, vitae volutpat tortor suscipit feugiat. Curabitur a lacus nec mauris efficitur euismod ac sit amet ante. Vivamus sagittis malesuada ligula, ut consequat turpis aliquam at. Morbi molestie nisl vitae mauris venenatis, ac fermentum dolor pharetra. Integer a vehicula tortor. Etiam est ex, congue et dui eu, finibus elementum ex. Nam suscipit magna at urna vulputate, eu feugiat nisl maximus.</p>', '2021-07-17 14:35:30'),
    (2, 1, 'about us', '<p>Aliquam tortor nisi, suscipit eu dapibus at, convallis vel dolor. Aenean lacus diam, lobortis eget iaculis sed, venenatis sed odio. Cras suscipit ex quis odio cursus, nec blandit felis pretium. Nullam sapien mi, consectetur at arcu id, feugiat vestibulum tortor. Curabitur quis augue condimentum, ornare felis at, egestas nibh. Duis nec risus quam. Ut dictum nulla vel condimentum sodales. Etiam ultrices orci diam. Praesent dapibus ante ac diam volutpat, ut elementum nulla euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sit amet cursus velit, in volutpat urna. Vivamus fringilla pretium placerat.</p>', '2021-09-09 14:11:25'),
    (3, 1, 'ipsum', '<p>Morbi auctor sollicitudin ipsum, ac tempor ex porttitor eu. Sed scelerisque consequat viverra. Vestibulum id eros eros. Sed fermentum dolor eget mattis aliquam. Suspendisse ultricies tincidunt lectus et vulputate. Sed nisi lorem, maximus vitae est sed, lobortis feugiat nisi. Nam nec ultricies nulla. Cras pulvinar nulla tortor, sit amet faucibus sem ornare ac. Etiam id lectus auctor, cursus velit ut, gravida urna. Etiam euismod at ipsum quis malesuada. Vivamus id nisl diam. Duis eget orci at nisl viverra placerat.</p>', '2021-09-09 14:27:54');


CREATE TABLE `user` (
    `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `firstName` varchar(255) NOT NULL,
    `middleName` varchar(255) NOT NULL,
    `lastName` varchar(255) NOT NULL,
    `email` varchar(150) NOT NULL,
    `password` varchar(150) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
