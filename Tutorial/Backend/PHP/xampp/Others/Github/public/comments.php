<?php require 'databaseconnection.php';
require 'header.php';

$displayComments = $connectDatabase->prepare('SELECT * FROM comments WHERE user_id=:userCommentId');
$displayComments->execute($_GET);

 ?>

<main class="home">
 <h1>Comment posted by the user</h1>	

<table class="teams">
			<thead>
				<tr>
					<td>Comments</td>					
					<td>Date</td>					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($displayComments as $teamss) { ?>
							<tr>
							<td><?php echo $teamss['comment']; ?></td>
							<td><?php echo $teamss['date_of_comment']; ?></td>
							
						</tr>							
				<?php } ?>				
			</tbody>
		</table>
</main>		

<?php require 'footer.php'; ?>