<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<?php

    include_once '../terrorism/controller/pieChart.php';
    $controller = new PieChart();
    $json = $controller->getJson();
?>  

<script>

chartType.onchange = function () {
    if (this.value.localeCompare("pie") === 0){
        am4core.ready(function() {

        am4core.useTheme(am4themes_animated);

        var chart = am4core.create("chartdiv", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.legend = new am4charts.Legend();
        
        chart.data = <?php echo $json ?>;


        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "value";
        series.dataFields.category = "to_graph";

        }); // end am4core.ready()
    }
    else if (this.value.localeCompare("bar") === 0){
        am4core.ready(function() {

// Themes begin
            am4core.useTheme(am4themes_dataviz);
            am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
            var chart = am4core.create("chartdiv", am4charts.XYChart3D);

// Add data
            chart.data =  <?php echo $json ?>;

// Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "to_graph";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.rotation = 270;
            categoryAxis.tooltip.label.horizontalCenter = "right";
            categoryAxis.tooltip.label.verticalCenter = "middle";

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Value";
            valueAxis.title.fontWeight = "bold";

// Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "value";
            series.dataFields.categoryX = "to_graph";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;

            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;
            columnTemplate.stroke = am4core.color("#FFFFFF");

            columnTemplate.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            columnTemplate.adapter.add("stroke", function(stroke, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

        }); // end am4core.ready()
    }
    else{
        am4core.ready(function() {

// Themes begin
            am4core.useTheme(am4themes_dataviz);
            am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
            var chart = am4core.create("chartdiv", am4charts.XYChart);


// Add data
            chart.data = <?php echo $json ?>

// Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "to_graph";

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "value";
            series.dataFields.categoryX = "to_graph";
            series.strokeDasharray = 3;
            series.strokeWidth = 3
            series.strokeOpacity = 1;
            series.strokeDasharray = "3,3"

            var bullet = series.bullets.push(new am4charts.CircleBullet());
            bullet.strokeWidth = 2;
            bullet.stroke = am4core.color("#fff");
            bullet.setStateOnChildren = true;
            bullet.propertyFields.fillOpacity = "opacity";
            bullet.propertyFields.strokeOpacity = "opacity";

            var hoverState = bullet.states.create("hover");
            hoverState.properties.scale = 1.7;

          

        }); // end am4core.ready()
    }
}
</script>