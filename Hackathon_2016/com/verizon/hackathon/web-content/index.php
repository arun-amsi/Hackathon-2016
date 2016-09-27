<?php 
include('header.php');
include('database.php');

$query	=	"SELECT DISTINCT TicketType FROM etms_data_pack order by TicketType";

$result_x = $conn->query($query);
$x_data	=	[];
while ($row = $result_x->fetch_assoc()) 
{
	$x_data[]	=	$row['TicketType'];
}

$query1	=	"SELECT count(TicketType) as position FROM etms_data_pack group by TicketType order by TicketType";
$result_y = $conn->query($query1);
$y_data	=	[];

while ($row = $result_y->fetch_assoc()) 
{
	$y_data[]	=	$row['position'];
}
?>
<script>
var x_data	=	<?php echo json_encode($x_data)?>;
var y_data	=	<?php echo json_encode($y_data)?>;
</script>	
	<!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
				
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Bar Chart ( X - Ticket type, Y - Resolution type)</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row" style="display:none;">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Line Chart</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
											
	</div>	<!--/.main-->
	<script src="js/bar-data.js"></script>
<?php include('footer.php');?>
	
