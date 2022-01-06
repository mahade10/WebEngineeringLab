
<?php
//if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //echo $id;
    $books = '';
    if (file_exists('books.json')) {
        $booksJson = file_get_contents('books.json');
        $books = json_decode($booksJson, true);
    } else {
        $books = array();
    }
    foreach($books as $key => $book){
        if($book['id'] == $id){
           // echo "fgghjkjg";
           // $xy = $book['id'];
           //echo $xy;
           //$key = array_search($xy,$book);
           // echo $key;
            $ss =1;
            break;
        }
    }
    if($ss == 1){
        array_splice($books, $key, 1);
        $str = json_encode($books);
        file_put_contents('books.json', $str);
       // header('Location: index.php'); 
       echo "<script>window.location.href='index.php';</script>";
    }else{
        echo "id not found!";
    }
?>