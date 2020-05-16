
var chartOption = document.getElementById("chartType");

chartOption.onchange = function () {
    if (this.value.localeCompare("pie") === 0){
        am4core.ready(function() {

// Themes begin
            am4core.useTheme(am4themes_dataviz);
            am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
            var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";

// Let's cut a hole in our Pie chart the size of 30% the radius
            chart.innerRadius = am4core.percent(30);

// Put a thick white border around each Slice
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;
            pieSeries.slices.template
                // change the cursor on hover to make it apparent the object can be interacted with
                .cursorOverStyle = [
                {
                    "property": "cursor",
                    "value": "pointer"
                }
            ];

            pieSeries.alignLabels = false;
            pieSeries.labels.template.bent = true;
            pieSeries.labels.template.radius = 3;
            pieSeries.labels.template.padding(0,0,0,0);

            pieSeries.ticks.template.disabled = true;

// Create a base filter effect (as if it's not there) for the hover to return to
            var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
            shadow.opacity = 0;

// Create hover state
            var hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists

// Slightly shift the shadow and make it more prominent on hover
            var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
            hoverShadow.opacity = 0.7;
            hoverShadow.blur = 5;

// Add a legend
            chart.legend = new am4charts.Legend();

            chart.data = [{
                "country": "Lithuania",
                "litres": 501.9
            },{
                "country": "Germany",
                "litres": 165.8
            }, {
                "country": "Australia",
                "litres": 139.9
            }, {
                "country": "Austria",
                "litres": 128.3
            }, {
                "country": "UK",
                "litres": 99
            }, {
                "country": "Belgium",
                "litres": 60
            }];

        }); // end am4core.ready()
    }

    else if(chartOption.value.localeCompare("bar") === 0){
        am4core.ready(function() {

// Themes begin
            am4core.useTheme(am4themes_dataviz);
            am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
            var chart = am4core.create("chartdiv", am4charts.XYChart3D);

// Add data
            chart.data = [{
                "country": "USA",
                "visits": 4025
            }, {
                "country": "China",
                "visits": 1882
            }, {
                "country": "Japan",
                "visits": 1809
            }, {
                "country": "Germany",
                "visits": 1322
            }, {
                "country": "UK",
                "visits": 1122
            }, {
                "country": "France",
                "visits": 1114
            }, {
                "country": "India",
                "visits": 984
            }, {
                "country": "Spain",
                "visits": 711
            }, {
                "country": "Netherlands",
                "visits": 665
            }, {
                "country": "Russia",
                "visits": 580
            }, {
                "country": "South Korea",
                "visits": 443
            }, {
                "country": "Canada",
                "visits": 441
            }, {
                "country": "Brazil",
                "visits": 395
            }, {
                "country": "Italy",
                "visits": 386
            }, {
                "country": "Australia",
                "visits": 384
            }, {
                "country": "Taiwan",
                "visits": 338
            }, {
                "country": "Poland",
                "visits": 328
            }];

// Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.rotation = 270;
            categoryAxis.tooltip.label.horizontalCenter = "right";
            categoryAxis.tooltip.label.verticalCenter = "middle";

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Countries";
            valueAxis.title.fontWeight = "bold";

// Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
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

// Enable chart cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.disabled = true;
            chart.cursor.lineY.disabled = true;

// Enable scrollbar
            chart.scrollbarX = new am4core.Scrollbar();

// Add data
            chart.data = [{
                "date": "2012-01-01",
                "value": 8
            }, {
                "date": "2012-01-02",
                "value": 10
            }, {
                "date": "2012-01-03",
                "value": 12
            }, {
                "date": "2012-01-04",
                "value": 14
            }, {
                "date": "2012-01-05",
                "value": 11
            }, {
                "date": "2012-01-06",
                "value": 6
            }, {
                "date": "2012-01-07",
                "value": 7
            }, {
                "date": "2012-01-08",
                "value": 9
            }, {
                "date": "2012-01-09",
                "value": 13
            }, {
                "date": "2012-01-10",
                "value": 15
            }, {
                "date": "2012-01-11",
                "value": 19
            }, {
                "date": "2012-01-12",
                "value": 21
            }, {
                "date": "2012-01-13",
                "value": 22
            }, {
                "date": "2012-01-14",
                "value": 20
            }, {
                "date": "2012-01-15",
                "value": 18
            }, {
                "date": "2012-01-16",
                "value": 14
            }, {
                "date": "2012-01-17",
                "value": 16,
                "opacity": 0
            }, {
                "date": "2012-01-18",
                "value": 18
            }, {
                "date": "2012-01-19",
                "value": 17
            }, {
                "date": "2012-01-20",
                "value": 15
            }, {
                "date": "2012-01-21",
                "value": 12
            }, {
                "date": "2012-01-22",
                "value": 10
            }, {
                "date": "2012-01-23",
                "value": 8
            }];

// Create axes
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.dataFields.category = "Date";
            dateAxis.renderer.grid.template.location = 0.5;
            dateAxis.dateFormatter.inputDateFormat = "yyyy-MM-dd";
            dateAxis.renderer.minGridDistance = 40;
            dateAxis.tooltipDateFormat = "MMM dd, yyyy";
            dateAxis.dateFormats.setKey("day", "dd");

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
            var series = chart.series.push(new am4charts.LineSeries());
            series.tooltipText = "{date}\n[bold font-size: 17px]value: {valueY}[/]";
            series.dataFields.valueY = "value";
            series.dataFields.dateX = "date";
            series.strokeDasharray = 3;
            series.strokeWidth = 2
            series.strokeOpacity = 0.3;
            series.strokeDasharray = "3,3"

            var bullet = series.bullets.push(new am4charts.CircleBullet());
            bullet.strokeWidth = 2;
            bullet.stroke = am4core.color("#fff");
            bullet.setStateOnChildren = true;
            bullet.propertyFields.fillOpacity = "opacity";
            bullet.propertyFields.strokeOpacity = "opacity";

            var hoverState = bullet.states.create("hover");
            hoverState.properties.scale = 1.7;

            function createTrendLine(data) {
                var trend = chart.series.push(new am4charts.LineSeries());
                trend.dataFields.valueY = "value";
                trend.dataFields.dateX = "date";
                trend.strokeWidth = 2
                trend.stroke = trend.fill = am4core.color("#c00");
                trend.data = data;

                var bullet = trend.bullets.push(new am4charts.CircleBullet());
                bullet.tooltipText = "{date}\n[bold font-size: 17px]value: {valueY}[/]";
                bullet.strokeWidth = 2;
                bullet.stroke = am4core.color("#fff")
                bullet.circle.fill = trend.stroke;

                var hoverState = bullet.states.create("hover");
                hoverState.properties.scale = 1.7;

                return trend;
            };

            createTrendLine([
                { "date": "2012-01-02", "value": 10 },
                { "date": "2012-01-11", "value": 19 }
            ]);

            var lastTrend = createTrendLine([
                { "date": "2012-01-17", "value": 16 },
                { "date": "2012-01-22", "value": 10 }
            ]);

// Initial zoom once chart is ready
            lastTrend.events.once("datavalidated", function(){
                series.xAxis.zoomToDates(new Date(2012, 0, 2), new Date(2012, 0, 13));
            });

        }); // end am4core.ready()
    }

};


