<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $books = '';
    if (file_exists('books.json')) {
        $booksJson = file_get_contents('books.json');
        $books = json_decode($booksJson, true);
    } else {
        $books = array();
    }
  //  print_r($books);
   // print($id);
   //$q = count($books);
  // print($q);
    if ((int)$id-1 < count($books)) {
        array_splice($books, $id-1, 1);
        $str = json_encode($books);
        file_put_contents('books.json', $str);
        header('Location: create.php');
    } else {
        echo 'books id not found';
    }
} else {
    echo 'book id has not be set.';
}

?>