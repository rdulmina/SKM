  <div style="padding: 7px;">
  <section class="content-header">
   <h1>Dashbord</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
         <li class="active"><a href="#"><i class="fa"></i>Dashboard</a></li>
      </ol>
    </section>
     <div class="box">
      	</div>
   
<!--main menu item goes here-->    
   <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 dashbordsection">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
            
              <span class="info-box-text">Order</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <button class="form-control dashbordbtn" onClick="dashbordcontrol('neworder');">New order</button>
		<button class="form-control dashbordbtn" onClick="dashbordcontrol('findorder');" >Find order</button>
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12 dashbordsection">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-table"></i></span>

            <div class="info-box-content">
        
              <span class="info-box-text">Invoice</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <button class="form-control dashbordbtn" onClick="dashbordcontrol('newinvoice');">New Invoice</button>
		<button class="form-control dashbordbtn" onClick="dashbordcontrol('findinvoice');">Find Invoice</button>
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12 dashbordsection">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-text">Quotation Requests</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <button class="form-control dashbordbtn" name="neworder" onClick="dashbordcontrol('quotationrequests');">New Quotation Requests</button>
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12 dashbordsection">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bar-chart"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-text">Reports</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <button class="form-control dashbordbtn" name="charts" onClick="dashbordcontrol('charts');">Sales Progress</button>
		<button class="form-control dashbordbtn" name="neworder">Outstandings Report</button>
        </div>
        <!-- /.col -->
      </div>
<!--main menu item concludes here-->  
<div class="row">
	<!-- Area CHART -->
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title">Sales Progress Area Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div>
           
          </div>
	</div>
<!-- BAR CHART -->
         <div class="col-md-6 col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Sales Progress Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
         
          </div>
          </div>
         
</div>
	
</div>
<script src="../../js/Chart.min.js"></script>	
<script>
  $(function () {
      //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: ["June","July","Auguest", "September", "October", "November", "December"],
      datasets: [
        {
          label: "Kaizen",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: <?php require_once('../../charts/monthlysales.php');  
			getreport("Kaizen");?>
        },
        {
          label: "Dunlop",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: <?php require_once('../../charts/monthlysales.php');  
			getreport("Dunlop");?>
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);


	  

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>