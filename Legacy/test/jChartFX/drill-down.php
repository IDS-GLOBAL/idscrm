<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>

<script language="javascript" src="../../js/jquery-ui-1.10.3/jquery-1.9.1.js"></script>

	<link rel="stylesheet" type="text/css" href="css/chartfx.css" />
   <script type="text/javascript" src="js/jchartfx.system.js"></script>
   <script type="text/javascript" src="js/jchartfx.coreBasic.js"></script>  
   
   

</head>

<body onload="loadChart()"> 

<div id="ChartDiv" style="width:600px;height:400px"></div>
<script type="text/javascript" language="javascript">
    var chart1;
    function loadChart()
      {        
           chart1 = new cfx.Chart();
            chart1.getData().setSeries(2);
            chart1.getAxisY().setMin(500);
            chart1.getAxisY().setMax(2000);
            var series1 = chart1.getSeries().getItem(0);
            var series2 = chart1.getSeries().getItem(1);
            series1.setGallery(cfx.Gallery.Lines);
            series2.setGallery(cfx.Gallery.Bar);
            var data = [
            { "Month": "Jan", "Bikes": 1800, "Parts": 1300 },
            { "Month": "Feb", "Bikes": 1760, "Parts": 900 },
            { "Month": "Mar", "Bikes": 1740, "Parts": 970 },
            { "Month": "Apr", "Bikes": 1750, "Parts": 1010},
            { "Month": "May", "Bikes": 1810, "Parts": 1070 },
            { "Month": "Jun", "Bikes": 1920, "Parts": 1180 }
            ];
            chart1.setDataSource(data);
			
            var divHolder = document.getElementById('ChartDiv');
			
        	chart1.create(divHolder);            
      }
</script>
</body>
</html>