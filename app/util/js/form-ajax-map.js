let submitBtn1 = document.getElementById("fetchBtnMap");
//let graphMeThis = document.getElementById("graph-me-this");
let year_l1 = document.getElementById("year_l1");
let year_h1 = document.getElementById("year_h1");
let month1 = document.getElementById("month1");
let day1 = document.getElementById("day1");
let country1 = document.getElementById("country1");
let city1 = document.getElementById("city1");
//let success = document.getElementById("success");
//let suicide = document.getElementById("suicide");
//let attacktype1_txt = document.getElementById("attacktype1_txt");
//let targtype1_txt = document.getElementById("targtype1_txt"); 
//let weaptype1_txt = document.getElementById("weaptype1_txt");
let mapdata;
let fetched1=false;
//let chartType = document.getElementById("chartType");
let map;

submitBtn1.addEventListener("click", onClick);

function onClick(){
    // LOADING STATE
    submitBtn1.setAttribute("disabled", true);
    submitBtn1.textContent = "...";
    // CALL

   
    var payload = {
       // column : graphMeThis.value,
        iyear_l : year_l1.value,
        iyear_h : year_h1.value,
        imonth : month1.value,
        iday : day1.value,
        country_txt : country1.value,
        city : city1.value,
        //success : success.value,
        //suicide : suicide.value,
        //attacktype1_txt : attacktype1_txt.value,
        //targtype1_txt : targtype1_txt.value,
        //weaptype1_txt : weaptype1_txt.value
        
    
    };
    
    var data = new FormData();
    data.append( "json", JSON.stringify( payload ) );

    
    fetch("api/map",{ method:"POST", body: JSON.stringify(payload)})
        .then(function (resp) {
            
            return resp.json();
        })
        .then(function (jsonResp) {
           console.log(jsonResp);
            mapData = jsonResp;
            fetched1 = true;
            // REMOVE LOADING STATE
            submitBtn1.removeAttribute("disabled");
            submitBtn1.textContent = 'Set';
        })
        .then(function() {
            loadMap();
        })
        .catch(function (err) {
            console.log(err);
        })
    
   
    
}
var previous = "";

chartType.addEventListener("click", function () {
    if (previous.localeCompare(chartType.value) != 0 && fetched1){
       loadMap();  
}
previous = chartType.value;

}
);

function animateBullet(circle) {
    var animation = circle.animate([{ property: "scale", from: 1, to: 5 }, { property: "opacity", from: 1, to: 0 }], 1000, am4core.ease.circleOut);
    animation.events.on("animationended", function(event){
      animateBullet(event.target.object);
    })
}

function loadMap(){
    loadLineMap(mapData);
}


function loadLineMap(mapData){
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_frozen);
        am4core.useTheme(am4themes_animated);
        // Themes end
    
       // Create map instance
        var map = am4core.create("mapdiv", am4maps.MapChart);
    

        
// Set map definition
map.geodata = am4geodata_worldLow;

// Set projection
map.projection = new am4maps.projections.Miller();

// Create map polygon series
var polygonSeries = map.series.push(new am4maps.MapPolygonSeries());

// Exclude Antartica
polygonSeries.exclude = ["AQ"];

// Make map load polygon (like country names) data from GeoJSON
polygonSeries.useGeodata = true;

// Configure series
var polygonTemplate = polygonSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name}";
polygonTemplate.polygon.fillOpacity = 0.6;


// Create hover state and set alternative fill color
var hs = polygonTemplate.states.create("hover");
hs.properties.fill = map.colors.getIndex(0);

// Add image series
var imageSeries = map.series.push(new am4maps.MapImageSeries());
imageSeries.mapImages.template.propertyFields.longitude = "longitude";
imageSeries.mapImages.template.propertyFields.latitude = "latitude";
imageSeries.mapImages.template.tooltipText = "{title}";
imageSeries.mapImages.template.propertyFields.url = "url";

var circle = imageSeries.mapImages.template.createChild(am4core.Circle);
circle.radius = 3;
circle.propertyFields.fill = "color";

var circle2 = imageSeries.mapImages.template.createChild(am4core.Circle);
circle2.radius = 3;
circle2.propertyFields.fill = "color";


circle2.events.on("inited", function(event){
  animateBullet(event.target);
})

var colorSet = new am4core.ColorSet();

//imageSeries.data =mapData;
imageSeries.data =mapData;
 }); // end am4core.ready()
}