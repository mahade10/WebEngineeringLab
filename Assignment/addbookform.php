<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $books = '';
	if (file_exists('books.json')) {
       	$booksJson = file_get_contents('books.json');
		$books = json_decode($booksJson, true);
    } else {
        $books = array();
    }

    $data = array(
    	'id' => $_POST['id'],
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'pages' => $_POST['pages'],
        'available' => $_POST['available'],
        'isbn' => $_POST['isbn']
    );
    array_push($books, $data);
    $db_string = json_encode($books);
    file_put_contents('books.json', $db_string);
    header('Location: index.php');
}
?>



<!DOCTYPE html>
<html>
    <body  style="margin-left: 150px;background-color: burlywood;">
        <h3>For adding touple: </h3>
        <form style="background-color: blanchedalmond; margin-bottom: 20px;" action="" method="post">
        <label  for="">Id:</label>
        <input style="margin-bottom: 20px; margin-left: 55px;"  type="text" name="id" required>
        <br>
        <label  for="">Title:</label>
        <input style="margin-bottom: 20px; margin-left: 40px;" type="text" name="title" required>
        <br>
        <label  for="">Author:</label>
        <input style="margin-bottom: 20px;margin-left: 25px;" type="text" name="author" required>
        <br>
        <label  for="">Available:</label>
        <input style="margin-bottom: 20px;margin-left: 10px;" type="text" name="available" required>
        <br>
        <label for="">Pages:</label>
        <input style="margin-bottom: 20px;margin-left: 30px;" type="text" name="pages" required>
        <br>
        <label for="">ISBN:</label>
        <input style="margin-bottom: 20px;margin-left: 30px;" type="text" name="isbn" required>
        
        <input style="margin-bottom: 10px;" style="width: 100px;margin-top: 10px;" type="submit" value="Submit" required>
        </form>
    </body>
</html>