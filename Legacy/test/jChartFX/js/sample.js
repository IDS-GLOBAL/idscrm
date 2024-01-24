window.onload = function () {	
var chart_SideBySideBars = new cfx.Chart();
	SideBySideBars(chart_SideBySideBars);	
	chart_SideBySideBars.create(document.getElementById("container_SideBySideBars"));
	$("#container_SideBySideBars").data("function",SideBySideBars);
	if ($("#container_SideBySideBars").parent().attr("thumb_type") == "crop") {
		Positioning(chart_SideBySideBars,"","",$("#container_SideBySideBars"),$("#container_SideBySideBars").parent());
	}
	else {
		fix_thumb(chart_SideBySideBars);	
	}
	var chart_GanttBars = new cfx.Chart();
	GanttBars(chart_GanttBars);	
	chart_GanttBars.create(document.getElementById("container_GanttBars"));
	$("#container_GanttBars").data("function",GanttBars);
	if ($("#container_GanttBars").parent().attr("thumb_type") == "crop") {
		Positioning(chart_GanttBars,"","",$("#container_GanttBars"),$("#container_GanttBars").parent());
	}
	else {
		fix_thumb(chart_GanttBars);	
	}
	var chart_BarWithNegativeValues = new cfx.Chart();
	BarWithNegativeValues(chart_BarWithNegativeValues);	
	chart_BarWithNegativeValues.create(document.getElementById("container_BarWithNegativeValues"));
	$("#container_BarWithNegativeValues").data("function",BarWithNegativeValues);
	if ($("#container_BarWithNegativeValues").parent().attr("thumb_type") == "crop") {
		Positioning(chart_BarWithNegativeValues,"","",$("#container_BarWithNegativeValues"),$("#container_BarWithNegativeValues").parent());
	}
	else {
		fix_thumb(chart_BarWithNegativeValues);	
	}
	var chart_GanttWithNegativeValues = new cfx.Chart();
	GanttWithNegativeValues(chart_GanttWithNegativeValues);	
	chart_GanttWithNegativeValues.create(document.getElementById("container_GanttWithNegativeValues"));
	$("#container_GanttWithNegativeValues").data("function",GanttWithNegativeValues);
	if ($("#container_GanttWithNegativeValues").parent().attr("thumb_type") == "crop") {
		Positioning(chart_GanttWithNegativeValues,"","",$("#container_GanttWithNegativeValues"),$("#container_GanttWithNegativeValues").parent());
	}
	else {
		fix_thumb(chart_GanttWithNegativeValues);	
	}
	var chart_BarSeparation = new cfx.Chart();
	BarSeparation(chart_BarSeparation);	
	chart_BarSeparation.create(document.getElementById("container_BarSeparation"));
	$("#container_BarSeparation").data("function",BarSeparation);
	if ($("#container_BarSeparation").parent().attr("thumb_type") == "crop") {
		Positioning(chart_BarSeparation,"","",$("#container_BarSeparation"),$("#container_BarSeparation").parent());
	}
	else {
		fix_thumb(chart_BarSeparation);	
	}
	var chart_OverlappingBars = new cfx.Chart();
	OverlappingBars(chart_OverlappingBars);	
	chart_OverlappingBars.create(document.getElementById("container_OverlappingBars"));
	$("#container_OverlappingBars").data("function",OverlappingBars);
	if ($("#container_OverlappingBars").parent().attr("thumb_type") == "crop") {
		Positioning(chart_OverlappingBars,"","",$("#container_OverlappingBars"),$("#container_OverlappingBars").parent());
	}
	else {
		fix_thumb(chart_OverlappingBars);	
	}
	var chart_BarStacked = new cfx.Chart();
	BarStacked(chart_BarStacked);	
	chart_BarStacked.create(document.getElementById("container_BarStacked"));
	$("#container_BarStacked").data("function",BarStacked);
	if ($("#container_BarStacked").parent().attr("thumb_type") == "crop") {
		Positioning(chart_BarStacked,"","",$("#container_BarStacked"),$("#container_BarStacked").parent());
	}
	else {
		fix_thumb(chart_BarStacked);	
	}
	var chart_GanttStacked = new cfx.Chart();
	GanttStacked(chart_GanttStacked);	
	chart_GanttStacked.create(document.getElementById("container_GanttStacked"));
	$("#container_GanttStacked").data("function",GanttStacked);
	if ($("#container_GanttStacked").parent().attr("thumb_type") == "crop") {
		Positioning(chart_GanttStacked,"","",$("#container_GanttStacked"),$("#container_GanttStacked").parent());
	}
	else {
		fix_thumb(chart_GanttStacked);	
	}
	var chart_BarStacked100Percent = new cfx.Chart();
	BarStacked100Percent(chart_BarStacked100Percent);	
	chart_BarStacked100Percent.create(document.getElementById("container_BarStacked100Percent"));
	$("#container_BarStacked100Percent").data("function",BarStacked100Percent);
	if ($("#container_BarStacked100Percent").parent().attr("thumb_type") == "crop") {
		Positioning(chart_BarStacked100Percent,"","",$("#container_BarStacked100Percent"),$("#container_BarStacked100Percent").parent());
	}
	else {
		fix_thumb(chart_BarStacked100Percent);	
	}
	var chart_InitialValues = new cfx.Chart();
	InitialValues(chart_InitialValues);	
	chart_InitialValues.create(document.getElementById("container_InitialValues"));
	$("#container_InitialValues").data("function",InitialValues);
	if ($("#container_InitialValues").parent().attr("thumb_type") == "crop") {
		Positioning(chart_InitialValues,"","",$("#container_InitialValues"),$("#container_InitialValues").parent());
	}
	else {
		fix_thumb(chart_InitialValues);	
	}
	var chart_Bar3DStacked = new cfx.Chart();
	Bar3DStacked(chart_Bar3DStacked);	
	chart_Bar3DStacked.create(document.getElementById("container_Bar3DStacked"));
	$("#container_Bar3DStacked").data("function",Bar3DStacked);
	if ($("#container_Bar3DStacked").parent().attr("thumb_type") == "crop") {
		Positioning(chart_Bar3DStacked,"","",$("#container_Bar3DStacked"),$("#container_Bar3DStacked").parent());
	}
	else {
		fix_thumb(chart_Bar3DStacked);	
	}
	var chart_Bar3DOblique = new cfx.Chart();
	Bar3DOblique(chart_Bar3DOblique);	
	chart_Bar3DOblique.create(document.getElementById("container_Bar3DOblique"));
	$("#container_Bar3DOblique").data("function",Bar3DOblique);
	if ($("#container_Bar3DOblique").parent().attr("thumb_type") == "crop") {
		Positioning(chart_Bar3DOblique,"","",$("#container_Bar3DOblique"),$("#container_Bar3DOblique").parent());
	}
	else {
		fix_thumb(chart_Bar3DOblique);	
	}
	var chart_Cylinder3DClustered = new cfx.Chart();
	Cylinder3DClustered(chart_Cylinder3DClustered);	
	chart_Cylinder3DClustered.create(document.getElementById("container_Cylinder3DClustered"));
	$("#container_Cylinder3DClustered").data("function",Cylinder3DClustered);
	if ($("#container_Cylinder3DClustered").parent().attr("thumb_type") == "crop") {
		Positioning(chart_Cylinder3DClustered,"","",$("#container_Cylinder3DClustered"),$("#container_Cylinder3DClustered").parent());
	}
	else {
		fix_thumb(chart_Cylinder3DClustered);	
	}
	var chart_Cylinder3DAngled = new cfx.Chart();
	Cylinder3DAngled(chart_Cylinder3DAngled);	
	chart_Cylinder3DAngled.create(document.getElementById("container_Cylinder3DAngled"));
	$("#container_Cylinder3DAngled").data("function",Cylinder3DAngled);
	if ($("#container_Cylinder3DAngled").parent().attr("thumb_type") == "crop") {
		Positioning(chart_Cylinder3DAngled,"","",$("#container_Cylinder3DAngled"),$("#container_Cylinder3DAngled").parent());
	}
	else {
		fix_thumb(chart_Cylinder3DAngled);	
	}
	var chart_StackedCylinder = new cfx.Chart();
	StackedCylinder(chart_StackedCylinder);	
	chart_StackedCylinder.create(document.getElementById("container_StackedCylinder"));
	$("#container_StackedCylinder").data("function",StackedCylinder);
	if ($("#container_StackedCylinder").parent().attr("thumb_type") == "crop") {
		Positioning(chart_StackedCylinder,"","",$("#container_StackedCylinder"),$("#container_StackedCylinder").parent());
	}
	else {
		fix_thumb(chart_StackedCylinder);	
	}
	var chart_Cube = new cfx.Chart();
	Cube(chart_Cube);	
	chart_Cube.create(document.getElementById("container_Cube"));
	$("#container_Cube").data("function",Cube);
	if ($("#container_Cube").parent().attr("thumb_type") == "crop") {
		Positioning(chart_Cube,"","",$("#container_Cube"),$("#container_Cube").parent());
	}
	else {
		fix_thumb(chart_Cube);	
	}	

	$("#main a").click(function(){
		var chart_container = $(this).find(".chart_container");
		var html = chart_container.data("chart");
		if (typeof(html)  === "undefined") {
			$("#currentChart").html("");
			var chart = new cfx.Chart();
			var f = chart_container.data("function");
			f(chart);
			chart.create("currentChart");
			chart_container.data("chart",$("#currentChart").html());
		}				
		else {
			$("#currentChart").html(html);
		}	
	});
}

function Positioning(chart,x,y,chartDiv,thmbDiv) {
        var topPos = 0, leftPos = 0;
        var maxWidth = chartDiv.width();
        var maxHeight = chartDiv.height();
        var viewBoxY = parseInt(thmbDiv.height());
        var viewBoxX = parseInt(thmbDiv.width());
        if (parseInt(y) >= 0) {
            topPos = (parseInt(y) - viewBoxY / 2) * -1;
            leftPos = (parseInt(x) - viewBoxX / 2) * -1;
        }
        if (topPos > 0) topPos = 0;
        if (topPos < (maxHeight - viewBoxY) * -1) topPos = (maxHeight - viewBoxY) * -1;
        if (leftPos > 0) leftPos = 0;
        if (leftPos < (maxWidth - viewBoxX) * -1) leftPos = (maxWidth - viewBoxX) * -1;
        var styleStr = "margin-top:" + topPos + "px; margin-left:" + leftPos + "px;";
        chartDiv.find("svg").attr('style', styleStr);
		chart.getToolTips().setEnabled(false);		
}

function fix_thumb(chart){
    chart.getAllSeries().setMarkerSize(2);
    chart.setBorder(null);
    chart.getPlotAreaMargin().setTop(5);
    chart.getPlotAreaMargin().setBottom(1);
    chart.getPlotAreaMargin().setRight(1);
    chart.getPlotAreaMargin().setLeft(1);
    chart.getAxisY().setVisible(false);
    chart.getAxisX().setVisible(false);
    chart.setAxesStyle(cfx.AxesStyle.None);
    chart.setBackground(null);
    chart.getToolTips().setEnabled(false);
	chart.getLegendBox().setVisible(false);
	chart.setExtraStyle(((chart.getExtraStyle()) | (cfx.ChartStyles.HideZLabels)));
}

function SideBySideBars(chart1)
{
	chart1.setGallery(cfx.Gallery.Bar);
	var data = chart1.getData();
	data.setSeries(3);
	data.setPoints(3);
	chart1.getLegendBox().setVisible(false);
	/*
	chart1.setGallery(cfx.Gallery.Bar);
	PopulateCarProduction(chart1);
	var titles = chart1.getTitles();
	var title = new cfx.TitleDockable();
	title.setText("Vehicles Production by Month");
	titles.add(title);
	*/
	
}
function GanttBars(chart1)
{
	chart1.setGallery(cfx.Gallery.Gantt);
	PopulateCarProduction(chart1);
}
function BarWithNegativeValues(chart1)
{
	chart1.setGallery(cfx.Gallery.Bar);
	var data = chart1.getData();
	data.setSeries(2);
	data.setPoints(6);
	data.getY().setItem(0, 0, (-20));
	data.getY().setItem(1, 0, (38));
	data.getY().setItem(0, 1, (40));
	data.getY().setItem(1, 1, (55));
	data.getY().setItem(0, 2, (97));
	data.getY().setItem(1, 2, (40));
	data.getY().setItem(0, 3, (-100));
	data.getY().setItem(1, 3, (-42));
	data.getY().setItem(0, 4, (18));
	data.getY().setItem(1, 4, (-18));
	data.getY().setItem(0, 5, (38));
	data.getY().setItem(1, 5, (61));
	chart1.getLegendBox().setVisible(false);
	
}
function GanttWithNegativeValues(chart1)
{
	chart1.setGallery(cfx.Gallery.Gantt);
	var data = chart1.getData();
	data.setSeries(2);
	data.setPoints(6);
	data.getY().setItem(0, 0, (-20));
	data.getY().setItem(1, 0, (38));
	data.getY().setItem(0, 1, (40));
	data.getY().setItem(1, 1, (55));
	data.getY().setItem(0, 2, (97));
	data.getY().setItem(1, 2, (40));
	data.getY().setItem(0, 3, (-100));
	data.getY().setItem(1, 3, (-42));
	data.getY().setItem(0, 4, (18));
	data.getY().setItem(1, 4, (-18));
	data.getY().setItem(0, 5, (38));
	data.getY().setItem(1, 5, (61));
	chart1.getLegendBox().setVisible(false);
}
function BarSeparation(chart1)
{
	chart1.setGallery(cfx.Gallery.Bar);
	chart1.getAllSeries().setVolume(100);
	chart1.getLegendBox().setVisible(false);
	var bar;
	bar = (chart1.getGalleryAttributes());
	bar.setIntraSeriesGap(0);
	
	
}
function OverlappingBars(chart1)
{
	chart1.setGallery(cfx.Gallery.Bar);
	var data = chart1.getData();
	data.setSeries(3);
	chart1.getSeries().getItem(0).setVolume(20);
	chart1.getSeries().getItem(1).setVolume(50);
	chart1.getSeries().getItem(2).setVolume(80);
	var bar = chart1.getGalleryAttributes();
	bar.setOverlap(true);
	chart1.getLegendBox().setVisible(false);
}
function BarStacked(chart1)
{
	chart1.setGallery(cfx.Gallery.Bar);
	var data = chart1.getData();
	data.setSeries(3);
	data.setPoints(10);
	chart1.getAllSeries().setStacked(cfx.Stacked.Normal);
	chart1.getLegendBox().setVisible(false);
	
}
function GanttStacked(chart1)
{
	chart1.setGallery(cfx.Gallery.Gantt);
	var data = chart1.getData();
	data.setSeries(5);
	data.setPoints(5);
	chart1.getAllSeries().setStacked(cfx.Stacked.Normal);
	chart1.getSeries().getItem(3).setStacked(false);
	chart1.getLegendBox().setVisible(false);
	
}
function BarStacked100Percent(chart1)
{
	chart1.setGallery(cfx.Gallery.Bar);
	var data = chart1.getData();
	data.setSeries(3);
	data.setPoints(10);
	chart1.getAllSeries().setStackedStyle(cfx.Stacked.Stacked100);
	chart1.getLegendBox().setVisible(false);
	
}
function InitialValues(chart1)
{
	chart1.setGallery(cfx.Gallery.Gantt);
	var data = chart1.getData();
	data.setSeries(1);
	data.setPoints(6);
	data.getYFrom().setItem(0, 0, 7);
	data.getY().setItem(0, 0, 27);
	data.getYFrom().setItem(0, 1, 28);
	data.getY().setItem(0, 1, 43);
	data.getYFrom().setItem(0, 2, 16);
	data.getY().setItem(0, 2, 65);
	data.getYFrom().setItem(0, 3, 36);
	data.getY().setItem(0, 3, 59);
	data.getYFrom().setItem(0, 4, 33);
	data.getY().setItem(0, 4, 62);
	data.getYFrom().setItem(0, 5, 14);
	data.getY().setItem(0, 5, 50);
	chart1.getAllSeries().setMultipleColors(true);
	chart1.getLegendBox().setVisible(false);
	
}
function Bar3DStacked(chart1)
{
	chart1.setGallery(cfx.Gallery.Bar);
	var data = chart1.getData();
	data.setSeries(3);
	data.setPoints(10);
	chart1.getAllSeries().setStacked(cfx.Stacked.Normal);
	chart1.getView3D().setEnabled(true);
	chart1.getLegendBox().setVisible(false);
}
function Bar3DOblique(chart1)
{
	chart1.setGallery(cfx.Gallery.Bar);
	var data = chart1.getData();
	data.setSeries(3);
	data.setPoints(10);
	chart1.getView3D().setEnabled(true);
	chart1.getView3D().setAngleX(45);
	chart1.getView3D().setCluster(true);
	chart1.getLegendBox().setVisible(false);
	
}
function Cylinder3DClustered(chart1)
{
	chart1.setGallery(cfx.Gallery.Bar);
	chart1.getAllSeries().setBarShape(cfx.BarShape.Cylinder);
	var data = chart1.getData();
	data.setSeries(2);
	data.setPoints(10);
	chart1.getView3D().setEnabled(true);
	chart1.getView3D().setCluster(true);
	chart1.getSeries().getItem(0).setText("Value 1");
	chart1.getSeries().getItem(1).setText("Value 2");
	chart1.getLegendBox().setVisible(false);
	chart1.getPlotAreaMargin().setRight(50);
	
}
function Cylinder3DAngled(chart1)
{
	chart1.setGallery(cfx.Gallery.Bar);
	chart1.getAllSeries().setBarShape(cfx.BarShape.Cylinder);
	var data = chart1.getData();
	data.setSeries(3);
	data.setPoints(10);
	chart1.getView3D().setEnabled(true);
	chart1.getView3D().setCluster(true);
	chart1.getView3D().setAngleX(30);
	chart1.getView3D().setAngleY(30);
	chart1.getSeries().getItem(0).setText("Value 1");
	chart1.getSeries().getItem(1).setText("Value 2");
	chart1.getSeries().getItem(2).setText("Value 3");
	chart1.getLegendBox().setVisible(false);
	chart1.getPlotAreaMargin().setRight(50);
	
}
function StackedCylinder(chart1)
{
	chart1.setGallery(cfx.Gallery.Bar);
	chart1.getAllSeries().setBarShape(cfx.BarShape.Cylinder);
	chart1.getAllSeries().setStacked(cfx.Stacked.Normal);
	var data = chart1.getData();
	data.setSeries(3);
	data.setPoints(10);
	chart1.getLegendBox().setVisible(false);
	
}
function Cube(chart1)
{
	chart1.setGallery(cfx.Gallery.Cube);
	var data = chart1.getData();
	data.setSeries(3);
	data.setPoints(10);
	chart1.getLegendBox().setVisible(false);
	
}

function PopulateCarProduction(chart1) {
        var items = [{
            "Sedan": 1760,
            "Coupe": 535,
            "SUV": 695,
            "Month": "Jan"
        }, {
            "Sedan": 1849,
            "Coupe": 395,
            "SUV": 688,
            "Month": "Feb"
        }, {
            "Sedan": 2831,
            "Coupe": 685,
            "SUV": 1047,
            "Month": "Mar"
        }, {
            "Sedan": 2851,
            "Coupe": 984,
            "SUV": 1652,
            "Month": "Apr"
        }, {
            "Sedan": 2961,
            "Coupe": 1579,
            "SUV": 1889,
            "Month": "May"
        }, {
            "Sedan": 1519,
            "Coupe": 1539,
            "SUV": 1766,
            "Month": "Jun"
        }, {
            "Sedan": 2633,
            "Coupe": 1489,
            "SUV": 1361,
            "Month": "Jul"
        }, {
            "Sedan": 1140,
            "Coupe": 650,
            "SUV": 874,
            "Month": "Aug"
        }, {
            "Sedan": 1626,
            "Coupe": 653,
            "SUV": 693,
            "Month": "Sep"
        }, {
            "Sedan": 1478,
            "Coupe": 2236,
            "SUV": 786,
            "Month": "Oct"
        }, {
            "Sedan": 1306,
            "Coupe": 1937,
            "SUV": 599,
            "Month": "Nov"
        }, {
            "Sedan": 1607,
            "Coupe": 2138,
            "SUV": 678,
            "Month": "Dec"
        }];
    
        chart1.setDataSource(items);
    }