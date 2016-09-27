<?php 
include('database.php');

$query	=	"SELECT id,TicketType,ProductType,Product FROM etms_data_pack order by TicketType";

$result_x = $conn->query($query);
$data	=	[];
while ($row = $result_x->fetch_assoc()) 
{
	$data[]	=	$row;
}
echo json_encode($data);
?>