<?php require 'databaseconnection.php';
 require 'admin_header.php'; 

 	if(!isset($_SESSION['ADMINID'])){	
	header('Location:index.php');
}



$approveComments = $connectDatabase->prepare("SELECT *,users.user_firstname,users.user_surname FROM comments INNER JOIN users ON comments.user_id=users.user_id WHERE Status='F' ");
$approveComments->execute();


if(isset($_GET['cmtID'])){

	$approve =$connectDatabase->prepare("UPDATE comments SET Status='T' WHERE comment_id=:cmtID");
	$approve->execute($_GET);
}

if(isset($_GET['cmtDel'])){

	$delteComment = $connectDatabase->prepare("DELETE FROM comments WHERE comment_id=:cmtDel");
	$delteComment->execute($_GET);
}

 ?>

			<div class="admin-main">
				<h1 class="admin-welcome">Welcome, Admin name</h1>
				<div class="admin-main-content">			
						<main class="home">
							<h1>Comment List</h1>

				<table class="teams">
					<thead>
						<tr>
							<td>Comment</td>
							<td>User</td>
							<td>Approve</td>
							<td>Delete</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($approveComments as $comments) { ?>
							<tr>
							<td><?php echo $comments['comment']; ?></td>
							<td><?php echo $comments['user_firstname']; ?></td>
							<td><a href="admin_comment.php?cmtID=<?php echo $comments['comment_id'] ?>">Approve</a></td>
							<td><a href="admin_comment.php?cmtDel=<?php echo $comments['comment_id'] ?>">Delete</td>
						</tr>
							
						<?php } ?>
											
					</tbody>
				</table>

				<hr />
						</main>					
				</div>
			</div>
		</div>
<?php require'footer.php'; ?>
