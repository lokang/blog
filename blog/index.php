<?php
if($_SERVER['SERVER_NAME'] == 'blog') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

session_start();

if(!empty($_GET)){
    foreach($_GET as $key=>$value){
        $_GET[$key] = htmlspecialchars($value);
    }
}

// if index.php?url is absent or empty go to default home index page
if(empty($_GET['url']) or $_GET['url'] == '/'){
    $_GET['url'] = 'home/index/';
}

// removes slash from the end of the url
$_GET['url'] = rtrim($_GET['url'], '/');

// if it's not empty, it means, it should be for e.g. like this
// index.php?url=home/index or index.php?url=post/create

// here we create an array out of the string, separating by "/" using php function explode
$url = explode('/', $_GET['url']);

// now we should have an array("home", "index")
// therefore, to get "home" part, you would use $url[0], to get "index" part you would use $url[1]

// this function takes care of including files, so we no longer have to manually
// include each class file
// this function first checks if files exists in controller folder, if no,
// then model folder, and includes it, if not, redirects to default page
spl_autoload_register(function ($class) { // include physical files of the class.
    if(file_exists(__DIR__.'/controller/' . $class . '.php')){
        include __DIR__.'/controller/' . $class . '.php';
    }elseif(file_exists(__DIR__.'/model/' . $class . '.php')){
        include __DIR__.'/model/' . $class . '.php';
    }else{
        header('Location: /home/error/');
    }
});
// here we make the first letter of $url[0] (home) capital and add the word "Controller"
// because that's how are classes files are called in "controller" folder
$controller = !empty($url[0]) ? $url[0] : 'home';


$controller = ucwords($controller).'Controller';
$_controller = new $controller(); // initiates class(LokangBlogController) using spl_autoload_register function above.
unset($url[0]); //after we initiated our controller, unset $url[0] - it's not needed anymore
$method = !empty($url[1]) ? $url[1] : 'index';// save the name of the method (index) into another variable
unset($url[1]);// unset the $url[1] (index)

// this function calls method within controller/class and passes parameters (if any)
// note: it accepts two arrays are two params
// first array is your object(controller you initiated earlier) and the method name (index)
// second array are the params if any, for e.g. if you had url like post/edit/2, then 2 would be left over params
call_user_func_array([$_controller, $method], array_values($url));