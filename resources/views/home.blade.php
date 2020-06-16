<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
<section class="content-header">
<div class="navbar">
    <div class="navbar-inner">
        <a id="logo" href="/"></a>
        <ol class="breadcrumb">
            <li><a href="/">Dashboard</a></li>
            <li><a href="/viewstudent">View Student</a></li>
            <li><a href="/event">Add Events</a></li>
        </ol>
    </div>
</div>
<div class="col-md-12">
<div class="col-md-6">
    <div class="card">
        <div class="header">
            <h4 class="title">Number of active and inactive user</h4>
        </div>
        <div class="content-graph">
            <div id="piechart"></div><hr/>
                <div class="footer">
                <div class="stats">
                    <i class="ti-reload"></i> Updated 3 minutes ago
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card">
        <div class="header">
            <h4 class="title">Number of active and inactive user</h4>
        </div>
        <div class="content-graph">
            <div id="linechart"></div><hr/>
                <div class="footer">
                <div class="stats">
                    <i class="ti-reload"></i> 
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<script>
google.charts.load("current", {"packages":["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(linedrawChart);
      function drawChart() { 
		 var jsonData = $.ajax({
          url: "piechart",
          dataType: "json",
          async: false
          }).responseText;
      var data = new google.visualization.DataTable(jsonData);
     
        var options = {
          title: "",	  
		  width: 400,
		  height: 300,
		  is3D: true
        };
			var chart = new google.visualization.PieChart(document.getElementById("piechart"));
			chart.draw(data, options);
		}

    function linedrawChart() { 
		 var jsonData = $.ajax({
          url: "piechart",
          dataType: "json",
          async: false
          }).responseText;
      var data = new google.visualization.DataTable(jsonData);
     
        var options = {
          title: "",	  
		  width: 400,
		  height: 300,
		  is3D: true
        };
			var chart = new google.visualization.LineChart(document.getElementById("linechart"));
			chart.draw(data, options);
		}

        
</script>