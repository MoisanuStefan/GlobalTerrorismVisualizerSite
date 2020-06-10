let year = document.getElementById("iyear");
let month = document.getElementById("imonth");
let day = document.getElementById("iday");
let country = document.getElementById("country_txt");
let city = document.getElementById("city");
let latitude = document.getElementById("latitude");
let longitude = document.getElementById("longitude");
let success = document.getElementById("success");
let suicide = document.getElementById("suicide");
let attacktype1_txt = document.getElementById("attacktype1_txt");
let targtype1_txt = document.getElementById("targtype1_txt");
let weaptype1_txt = document.getElementById("weaptype1_txt");

let id = document.getElementById("id");
let username = document.getElementById("user");

//attacks pannel
let insertAttack = document.getElementById("insert-attack");
let deleteAttack = document.getElementById("delete-attack");
insertAttack.addEventListener("click", insertAtt);
deleteAttack.addEventListener("click", deleteAtt);

//users pannel
let dUser = document.getElementById("del-user");
let mAdmin = document.getElementById("make-admin");
let rAdmin = document.getElementById("unmake-admin");
dUser.addEventListener("click", deleteUser);
mAdmin.addEventListener("click", makeAdmin);
rAdmin.addEventListener("click", removeAdmin);

function clearInsertFields(){
    year.value = "";
    month.value = "";
    day.value = "";
    country.value = "";
    city.value = "";
    latitude.value = "";
    longitude.value = "";
    success.value = "";
    suicide.value = "";
    attacktype1_txt.value = "";
    targtype1_txt.value = "";
    weaptype1_txt.value = "";

}
//user functions
function deleteUser(){

    //endp?
    let getEndPoint="../../api/users/";
    getEndPoint = getEndPoint.concat(username.value);
    console.log(getEndPoint);
    fetch(getEndPoint,{ method:"DELETE"})
    .then(function (resp) {
     return resp.text();
    })
    .then(function(resp){
        console.log(resp);
    })
}

function makeAdmin(){
    operateAdmin(1);
}

function removeAdmin(){
    operateAdmin(0);
}

function operateAdmin(control){

    var payload = {
        isAdmin : control,
        user : username.value
    };

    var data = new FormData();
    data.append( "json", JSON.stringify( payload ) );
    
    fetch("../../api/users",{ method:"PUT", body: JSON.stringify(payload)})
         .then(function (resp) {
             username.value = '';
            return resp.text();
         })
         .then(function(resp){
            console.log(resp);
         })
}


//attacks functions
function insertAtt(){

    var payload = {

        iyear : year.value,
        imonth : month.value,
        iday : day.value,
        country_txt : country.value,
        city : city.value,
        latitude : latitude.value,
        longitude : longitude.value,
        success : success.value,
        suicide : suicide.value,
        attacktype1_txt : attacktype1_txt.value,
        targtype1_txt : targtype1_txt.value,
        weaptype1_txt : weaptype1_txt.value
    
    };

   
    var data = new FormData();
    data.append( "json", JSON.stringify( payload ) );

    fetch("../../api/attacks",{ method:"POST", body: JSON.stringify(payload)})
         .then(function (resp) {
            clearInsertFields();
          return resp.text();
         })
         
    
}

function deleteAtt()
{

    let getEndPoint="../../api/attacks/";
    getEndPoint = getEndPoint.concat(id.value);
    fetch(getEndPoint,{ method:"DELETE"})
    .then(function (resp) {
        id.value='';
     return resp.json();
    })
    .then(function(resp){
        console.log(resp);
    })

}


