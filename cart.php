<?php $transaksi=$_SESSION['transaksi'];?>
<div id="content" style="min-height: 400px;">
    <div id="content_center">
            <h3><img src="icon/icon-cart.png" width="60px;"></h3>
			<div  style="text-align:center;padding:5px;">
			<a class="btn-send" href="index.php?page=magazine">CONTINUE SHOPPING</a> &nbsp; 
			<span>CURRENCY 
				<select class="show-me-select-dropdown"  onchange="javascript:location.href = this.value;">
                    <option>IDR</option>         
                </select>
			</span>
			</div>
			<br/>
			<?php if(isset($transaksi)){ ?>
            <table cellspacing="0" width="100%" colspan="5" id="cart-table">
                <thead>
                    <tr class="thead-cart">
                        <th width="30%">PRODUCT</th>
                        <th width="20%">DESCRIPTION</th>
                        <th width="15%">UNIT PRICE</th>
                        <th width="15%">QTY</th>
                        <th width="15%">PRICE</th>
                        <th width="5%"></th>
                    </tr>
                </thead>
			<tbody>
			<tr><td colspan="6">&nbsp;</td></tr>
            <?php
            $i=0;
			$total=0;

				foreach($transaksi as $c){
				?>
					<tr valign="top">
						<td valign="top"><img src="<?php echo @$c['image'];?>" width="100%"/></td>
						<td valign="top" align="center"><?php echo @$c['description'];?></td>
						<td valign="top" align="center"><?php echo @$c['price'];?></td>
						<td valign="top" align="center"><input type="number" data-id="<?php echo $c['id'];?>" id="qty" value="<?php echo @$c['qty'];?>"></td>
						<td valign="top" align="center"><?php echo @$c['subtotal'];?></td>
						<td valign="top" align="center"><a href="index.php?page=remove-cart&id=<?php echo $c['id'];?>">x</a></td>
					</tr>
				<?php 
				$i++;
				$total=$total+$c['subtotal'];
				} 
			?>
			<tr><td colspan="6">&nbsp;</td></tr>
			</tbody>
			<tfoot class="tfoot">
			
			<?php if($_SESSION['login'] == false) { ?>
				<tr valign="top" class="tfoot-first">
					<td style="padding-left: 25px;padding-top: 5px;" valign="top">GLOBETROTTER MEMBER</td>
					<td valign="top"></td>
					<td valign="top">NOT A MEMBER</td>
					<td valign="top">TOTAL</td>
					<td valign="top"  align="center"><?php echo @$total;?></td>
					<td></td>
				</tr>
				<form action="signincheckcart.php" method="post" id="signupmember">
				<tr valign="top">
					<td style="padding-left: 25px;" valign="top">
					
						Email<br/>
                        <input type="text" name="email" placeholder="Email Address"  /><br />
						Password
						<br/>
                        <input type="password" name="password" placeholder="Password"  /><br />
                        
                    
					</td>
					<td valign="top"></td>
					<td valign="top" colspan="2">Complete your purchase as a guest and register your email address where we'll send your order confirmation</td>
					<td valign="top" colspan="2"></td>
				</tr>
				<tr valign="top">
					<td style="padding-left: 25px;padding-bottom: 10px;" valign="top"><input type="submit" class="btn-send"  value="SIGN IN" /></td>
					<td valign="top"></td>
					<td valign="top"><a class="btn-send" href="index.php?page=checkout">CONTINUE</a></td>
					<td valign="top" colspan="3"></td>
				</tr>
				</form>
			<?php } else { ?>
				<tr valign="top" class="tfoot-first">
					<td valign="top" colspan="3"></td>
					<td valign="top">TOTAL</td>
					<td valign="top"  align="center"><?php echo @$total;?></td>
					<td></td>
				</tr>
				<tr valign="top">
					<td valign="top" colspan="2"></td>
					<td valign="top"><a class="btn-send" href="addcart.php?id=<?php echo $mag['MagazineID'];?>&price=<?php echo $mag['Price'];?>&qty=1">CONTINUE</a></td>
					<td valign="top" colspan="3"></td>
				</tr>
			<?php } ?>
			</tfoot>
            </table>
			<?php } else { ?>
			Please make shop first
			<?php } ?>
    </div>
</div>