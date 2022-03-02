<?php 

include('config/db_connect.php');

//write query for all books
$sql ="SELECT id,title,numberofpages,author FROM books";
//execute the query 
$result = mysqli_query($conn,$sql);

//fetch the resulting records as an array 
$books = mysqli_fetch_all($result,MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection to db 
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Books!</h4>
	<div class="container">
		<div class="row">
			<?php foreach($books as $book){ ?>
				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($book['title'])?></h6>
							<div><?php echo htmlspecialchars($book['author'])?> </div>
							<div><?php echo htmlspecialchars($book['numberofpages'])?> </div>
							<div>
								<div class="row">
									<div class="col s6">
										<form action="delete.php" method="POST" >
											<input type="hidden" name="id_to_delete" value="<?php echo $book['id']?>">
											<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
										</form>	
									</div>
									<div class="col s6">
										<form action="edit.php" method="GET" >
											<input type="hidden" name="id_to_edit" value="<?php echo $book['id']?>">
											<input type="submit" name="edit" value="Edit" class="btn brand z-depth-0">
										</form>	
									</div>
									
								</div>
															
							</div>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
	<?php include('templates/footer.php'); ?>

</html>