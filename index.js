// api url
const moneygo = "https://moneygo-api.herokuapp.com/api/";
const ecia = "https://api-ecia.herokuapp.com/";

//get
fetch(moneygo)
.then((response)=>response.json())
.then((json)=>console.log(json))

//get
fetch(ecia)
.then((response)=>response.json())
.then((json)=>console.log(json))

