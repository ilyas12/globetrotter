<?php $transaksi=$_SESSION['transaksi'];?>
<div id="content" style="min-height: 400px;font-size:14px">
	<div id="content_center">
		<img src="icon/icon-cart.png" width="60px;">
		<br/>
		<?php if(isset($transaksi)){?>
		<div class="left50">
        <h3>YOUR DETAIL</h3> 
		
			<form action="order.php" name="form1" method="POST" id="checkoutform">
				NAME<br/>
				<input type="text" name="name" placeholder="Name"  /><br />
				EMAIL<br/> 
				<input type="text" name="email" placeholder="Email Address"  /><br />
				PHONE NUMBER<br/>
				<input type="text" name="phone" placeholder="Phone Number"  /><br />
				ADDRESS<br/>								
				<input type="text" name="address" placeholder="Address"  /><br />
				DELIVERY ADDRESS<br/>
				<input type="text" name="delivery" placeholder="Delivery Address"  /><br />
				NOTES<br/>
				<input type="text" name="notes" placeholder="Notes"  /><br />
											   
				<input type="submit" class="btn-send" value="COMPLETE ORDER" /><br />
			</form>
		</div>
		<div class="left50">
			<h3>YOUR ORDER</h3>
			<table width="100%">
			<?php
            
            $i=0;
			$total=0;
				foreach($transaksi as $c){
				?>
					<tr valign="top">
						<td valign="top" width="30%"><img src="<?php echo @$c['image'];?>" width="100%"/></td>
						<td valign="top"  width="30%"><?php echo @$c['description'];?></td>
						<td valign="top"  width="15%" align="center"><?php echo @$c['price'];?></td>
						<td valign="top"  width="10%"align="center"><?php echo $c['qty'];?></td>
						<td valign="top"  width="15%" align="center"><?php echo @$c['subtotal'];?></td>
					</tr>
				<?php 
				$i++;
				$total=$total+$c['subtotal'];
				} 
			?>
			</table>
		</div>
		<?php } else{ ?>
		Please make shop first
		<?php } ?>
	</div>
</div>