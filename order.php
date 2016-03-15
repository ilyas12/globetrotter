<?php
@session_start();
$message = 'Dear GLOBETROTTER,<br />';
$message .= 'You Have New Order<br/>';
$message .= 'Customer Detail : <br/>';
$message .= 'Name : '.$_POST['name'].' <br />';
$message .= 'Email : '.$_POST['email'].' <br />';
$message .= 'Phone : '.$_POST['phone'].' <br />';
$message .= 'Address : '.$_POST['address'].' <br />';
$message .= 'Delivery Address : '.$_POST['delivery'].' <br />';
$message .= 'Notes : '.$_POST['notes'].' <br />';
$message .= 'Product Detail : <br/>';
$message .= "<table cellspacing='0' width='100%' colspan='5'>
                <thead>
                    <tr style='height:25px;background:#000;color:#9e7a2d;padding-top: 10px;' >
                        <th width='30%'>PRODUCT</th>
                        <th width='20%'>DESCRIPTION</th>
                        <th width='15%'>UNIT PRICE</th>
                        <th width='15%'>QTY</th>
                        <th width='15%'>PRICE</th>
                    </tr>
                </thead>
			<tbody>";
$i=0;
$total=0;
$transaksi=$_SESSION['transaksi'];
foreach($transaksi as $c){

$message .="<tr valign='top' style='padding-top: 10px;' >
		<td valign='top' width='30%'><img src='http://www.globetrottermag.com/unpublished/".$c['image']."' width='100%'/></td>
		<td valign='top'>".$c['description']."</td>
		<td valign='top' align='center'>".$c['price']."</td>
		<td valign='top' align='center'>".$c['qty']."</td>
		<td valign='top' align='center'>".$c['subtotal']."</td>
	</tr>";
	$i++;
	$total=$total+$c['subtotal'];
}
$message .="<tr style='height:25px;background:#000;color:#9e7a2d;padding-top: 10px;'>
		<td valign='top' align='right' colspan='4'>TOTAL</td>
		<td valign='top' align='center'>".$total."</td>
	</tr>";			
$message .= '</tbody></table>';		

$to = "GLOBETROTTER <info@globetrotter.com>";
$subject = 'Order';
			
$headers = "From: GLOBETROTTER <info@globetrotter.com>\r\n";
$headers .= "Reply-To: ".$_POST['name']." <".$_POST['email'].">\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
if($mail_sent){
	$message1 =  "Dear ".$_POST['name'].",<br />";
	$message1 .= 'Thanks for your order<br/>';
	$message1 .= 'Information Detail : <br/>';
	$message1 .= 'Name : '.$_POST['name'].' <br />';
	$message1 .= 'Email : '.$_POST['email'].' <br />';
	$message1 .= 'Phone : '.$_POST['phone'].' <br />';
	$message1 .= 'Address : '.$_POST['address'].' <br />';
	$message1 .= 'Delivery Address : '.$_POST['delivery'].' <br />';
	$message1 .= 'Notes : '.$_POST['notes'].' <br />';
	$message1 .= 'Product Detail : <br/>';
	$message1 .= "<table cellspacing='0' width='100%' colspan='5'>
                <thead>
                    <tr style='height:25px;background:#000;color:#9e7a2d;padding-top: 10px;' >
                        <th width='30%'>PRODUCT</th>
                        <th width='20%'>DESCRIPTION</th>
                        <th width='15%'>UNIT PRICE</th>
                        <th width='15%'>QTY</th>
                        <th width='15%'>PRICE</th>
                    </tr>
                </thead>
			<tbody>";
	$i=0;
	$total=0;
	$transaksi=$_SESSION['transaksi'];
	foreach($transaksi as $c){

	$message1 .="<tr valign='top' style='padding-top: 10px;' >
			<td valign='top' width='30%'><img src='http://www.globetrottermag.com/unpublished/".$c['image']."' width='100%'/></td>
			<td valign='top'>".$c['description']."</td>
			<td valign='top' align='center'>".$c['price']."</td>
			<td valign='top' align='center'>".$c['qty']."</td>
			<td valign='top' align='center'>".$c['subtotal']."</td>
		</tr>";
		$i++;
		$total=$total+$c['subtotal'];
	}
	$message1 .="<tr style='height:25px;background:#000;color:#9e7a2d;padding-top: 10px;'>
			<td valign='top' align='right' colspan='4'>TOTAL</td>
			<td valign='top' align='center'>".$total."</td>
		</tr>";			
	$message1 .= '</tbody></table>';	
	$to = "GLOBETROTTER <dantemustday19@gmail.com>";
	$subject = 'Order';
				
	$headers = "From: GLOBETROTTER <info@globetrotter.com>\r\n";
	$headers .= "Reply-To: ".$_POST['name']." <".$_POST['email'].">\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				
	//send the email
	$mail_sent = @mail( $to, $subject, $message1, $headers );
unset($_SESSION['transaksi']);
header("Location: index.php?page=thank-you");
	exit;
}else{
	print_r(error_get_last());
}
?>