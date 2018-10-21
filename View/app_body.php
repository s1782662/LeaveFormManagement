<?php
    if($wardenAppDispp == 1){
?>

	<tr id = "<?php echo "$id"; ?>">
		<td><?php echo "$id"; ?></td><td><?php echo "$name"; ?></td><td><?php echo "$place"; ?></td><td><?php echo "$exitOn"; ?></td><td><?php echo "$entryOn"; ?></td><td><?php  echo "$purpose";  ?></td>
		
     <td><button class="btn btn-success">ACCEPTED</button></td>				
<?php }else{
?>
	<tr id = "<?php echo "$id"; ?>">
		<td><?php echo "$id"; ?></td><td><?php echo "$name"; ?></td><td><?php echo "$place"; ?></td><td><?php echo "$exitOn"; ?></td><td><?php echo "$entryOn"; ?></td><td><?php  echo "$purpose";  ?></td>
		
     <td><button class="btn btn-success">DECLINED</button></td>				
    
<?php } ?>
 </tr>
