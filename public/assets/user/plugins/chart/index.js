am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv", am4charts.XYChart);

chart.data = [{
	"country": "Jan",
	"visits": 100
}, {
	"country": "Feb",
	"visits": -82
}, {
	"country": "Mar",
	"visits": 20
}, {
	"country": "Apr",
	"visits": 22
}, {
	"country": "May",
	"visits": 11
}, {
	"country": "Jun",
	"visits": 14
}, {
	"country": "Jul",
	"visits": -84
}, {
	"country": "Aug",
	"visits": 11
}, {
	"country": "Sep",
	"visits": 65
}, {
	"country": "Oct",
	"visits": 80
}, {
	"country": "Nov",
	"visits": 43
}, {
	"country": "Dec",
	"visits": 41
}];

chart.padding(40, 40, 40, 40);

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.minGridDistance = 60;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryX = "country";
series.dataFields.valueY = "visits";
series.tooltipText = "{valueY.value}"
series.columns.template.strokeOpacity = 0;

chart.cursor = new am4charts.XYCursor();

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function (fill, target) {
	return chart.colors.getIndex(target.dataItem.index);
});


//feed chart

am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv7", am4charts.XYChart);

chart.data = [{
	"country": "Jan",
	"visits": 500
}, {
	"country": "Feb",
	"visits": 82
}, {
	"country": "Mar",
	"visits": 20
}, {
	"country": "Apr",
	"visits": 22
}, {
	"country": "May",
	"visits": 11
}, {
	"country": "Jun",
	"visits": 14
}, {
	"country": "Jul",
	"visits": -84
}, {
	"country": "Aug",
	"visits": 11
}, {
	"country": "Sep",
	"visits": 65
}, {
	"country": "Oct",
	"visits": 80
}, {
	"country": "Nov",
	"visits": 43
}, {
	"country": "Dec",
	"visits": 41
}];

chart.padding(40, 40, 40, 40);

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.minGridDistance = 60;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryX = "country";
series.dataFields.valueY = "visits";
series.tooltipText = "{valueY.value}"
series.columns.template.strokeOpacity = 0;

chart.cursor = new am4charts.XYCursor();

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function (fill, target) {
	return chart.colors.getIndex(target.dataItem.index);
});


//feed chart end

// chart  tab



am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv3", am4charts.XYChart);
chart.paddingRight = 20;

var data = [];
var visits = 10;
for (var i = 1; i < 366; i++) {
  visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
  data.push({ date: new Date(2021, 0, i), value: visits });
}

chart.data = data;

var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.grid.template.location = 0;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.renderer.minWidth = 35;

var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.dateX = "date";
series.dataFields.valueY = "value";
series.tooltipText = "{valueY}";
series.tooltip.pointerOrientation = "vertical";
series.tooltip.background.fillOpacity = 0.5;

chart.cursor = new am4charts.XYCursor();
chart.cursor.snapToSeries = series;
chart.cursor.xAxis = dateAxis;

var scrollbarX = new am4charts.XYChartScrollbar();
scrollbarX.series.push(series);
chart.scrollbarX = scrollbarX;

// end chart tab////////

//chart Average Risk Score of the Last 7 Days ///////

am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv4", am4charts.XYChart);

chart.data = [{
	"country": "Jan",
	"visits": 100
}, {
	"country": "Feb",
	"visits": 82
}, {
	"country": "Mar",
	"visits": 20
}, {
	"country": "Apr",
	"visits": 22
}, {
	"country": "May",
	"visits": 11
}, {
	"country": "Jun",
	"visits": 14
}, {
	"country": "Jul",
	"visits": 84
}];

chart.padding(40, 40, 40, 40);

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.minGridDistance = 60;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryX = "country";
series.dataFields.valueY = "visits";
series.tooltipText = "{valueY.value}"
series.columns.template.strokeOpacity = 0;

chart.cursor = new am4charts.XYCursor();

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function (fill, target) {
	return chart.colors.getIndex(target.dataItem.index);
});

// End chart Average Risk Score of the Last 7 Days ///////

//chart Copiers//////
am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv5", am4charts.XYChart);
chart.paddingRight = 20;

var data = [];
var visits = 10;
var previousValue;

for (var i = 0; i < 100; i++) {
    visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);

    if(i > 0){
        // add color to previous data item depending on whether current value is less or more than previous value
        if(previousValue <= visits){
            data[i - 1].color = chart.colors.getIndex(0);
        }
        else{
            data[i - 1].color = chart.colors.getIndex(5);
        }
    }    
    
    data.push({ date: new Date(2021, 0, i + 1), value: visits });
    previousValue = visits;
}

chart.data = data;

var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.grid.template.location = 0;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.renderer.minWidth = 35;

var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.dateX = "date";
series.dataFields.valueY = "value";
series.strokeWidth = 2;
series.tooltipText = "{valueY} {valueY.change}";

// set stroke property field
series.propertyFields.stroke = "color";

chart.cursor = new am4charts.XYCursor();

var scrollbarX = new am4core.Scrollbar();
chart.scrollbarX = scrollbarX;

////chart End Copiers////////