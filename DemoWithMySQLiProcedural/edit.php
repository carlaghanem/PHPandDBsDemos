<?php 
	include('config/db_connect.php');
	$errors = array('author' => '', 'title' => '', 'pages' => '');
	if(isset($_GET['edit'])){
		$id = $_GET['id_to_edit'];
		$sql = "SELECT id,title,author,numberofpages FROM books WHERE id ='$id'";

		//get result of query 
		$result = mysqli_query($conn, $sql);
		//fetch the resulting records as an array 
		$book = mysqli_fetch_assoc($result);
		$author = $book['author'];
		$title  = $book['title'];
		$pages =$book['numberofpages'];
		//free result from memory
		mysqli_free_result($result);

		mysqli_close($conn);

	}
	if(isset($_POST['submit'])){
		
		// check email
		if(empty($_POST['author'])){
			$errors['author'] = 'An author is required';
		} else{
			$author = $_POST['author'];
		}

		// check title
		if(empty($_POST['title'])){
			$errors['title'] = 'A title is required';
		} else{
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Title must be letters and spaces only';
			}
		}

		// check ingredients
		if(empty($_POST['pages'])){
			$errors['pages'] = 'At least one page is required';
		} else{
			$pages = $_POST['pages'];
		}
		print_r("working here");
		if(array_filter($errors)){
			print_r( 'errors in form');
		} else {
			$id = $_POST['id_to_edit'];
			//create update query 
			$sql = "UPDATE books set title = '$title', numberofpages = $pages, author = '$author' WHERE id = '$id'";

			//save to db query 
			if(mysqli_query($conn,$sql)){
				//success: returns a true
				header('Location: index.php');
			}else{
				echo 'query error' . mysqli_error($conn);
			}
		}
		
	} // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Edit Book</h4>
		<form class="white" action="edit.php" method="POST">
			<label>Author</label>
			<input type="text" name="author" value="<?php echo htmlspecialchars($author) ?>">
			<div class="red-text"><?php echo $errors['author']; ?></div>
			<label>Book Title</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
			<div class="red-text"><?php echo $errors['title']; ?></div>
			<label>Number of pages</label>
			<input type="number" name="pages" value="<?php echo $pages ?>">
			<div class="red-text"><?php echo $errors['pages']; ?></div>
			<div class="center">
				<input type="hidden" name="id_to_edit" value="<?php echo $id ?>">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>