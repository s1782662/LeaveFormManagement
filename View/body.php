<tr id = "<?php echo "$id"; ?>">
  <td><?php echo "$id"; ?></td><td><?php echo "$name"; ?></td><td><?php echo "$place"; ?></td><td><?php echo "$exitOn"; ?></td><td><?php echo "$entryOn"; ?></td><td><?php  echo "$purpose";  ?></td>
	<?php
        if($proctorPermission == 1){
            if($proctorStatus == 0){?>
            		<td colspan='2'><label>PROCTOR APPROVAL PENDING</label></td>
          <?php  }else if($proctorStatus == 1 && $proctorAppDispp == 0) { ?>
                    <td colspan='2'><label>PROCTOR DECLINED</label></td>
           <?php  }else if($proctorStatus == 1 && $proctorAppDispp == 1){ ?>                           
                
                <td><button class="btn btn-success"   value="<?php echo $id ;?>" onclick="approve('<?php echo $id ; ?>');">APPROVE</button></td>
		        <td><button class="btn btn-danger"   value="<?php echo $id ;?>" onclick="disapprove('<?php echo $id ; ?>');">DECLINE</button></td>
            <?php 
                 }else{} 
        }else{
            ?>    
                <td><button class="btn btn-success"   value="<?php echo $id ;?>" onclick="approve('<?php echo $id ; ?>');">APPROVE</button></td>
		        <td><button class="btn btn-danger"   value="<?php echo $id ;?>" onclick="disapprove('<?php echo $id ; ?>');">DECLINE</button></td>
            <?php  
            }
            ?>
				
 </tr>
	
