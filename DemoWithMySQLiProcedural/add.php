<?php 
	include('config/db_connect.php');

	$author = $title  = '';
	$pages =0;
	$errors = array('author' => '', 'title' => '', 'pages' => '');

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

		// check pages
		if(empty($_POST['pages'])){
			$errors['pages'] = 'At least one page is required';
		} else{
			$pages = $_POST['pages'];
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			
			//create insert query 
			$sql = "INSERT INTO books(title,numberofpages,author) values ('$title',$pages,'$author')";

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
		<h4 class="center">Add a Book</h4>
		<form class="white" action="add.php" method="POST">
			<label>Author</label>
			<input type="text" name="author" value="<?php echo htmlspecialchars($author) ?>">
			<div class="red-text"><?php echo $errors['author']; ?></div>
			<label>Book Title</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
			<div class="red-text"><?php echo $errors['title']; ?></div>
			<label>Number of pages</label>
			<input type="number" name="pages" value="<?php echo htmlspecialchars($pages) ?>">
			<div class="red-text"><?php echo $errors['pages']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>