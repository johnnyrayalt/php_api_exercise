<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post obejct
    $post = new Post($db);

    // Get id
    $post->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get Post
    $post->read_single();

    // Create Array
    $post_arr = array(
        'id' => $post->id,
        'title' => $post->title,
        'body' => $post->body,
        'author' => $post->author,
        'category_id' => $post->category_id,
        'category_name' => $post->category_name
    );

    // make JSON
    print_r(json_encode($post_arr));