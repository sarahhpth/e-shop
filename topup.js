//ambil token dari local.Storage. local storage ada di page source >> application
const moneygo = JSON.stringify(localStorage.getItem('moneygo'));
const ecia = JSON.stringify(localStorage.getItem('ecia'));
const harpay = JSON.stringify(localStorage.getItem('harpay'));
const coinless = JSON.stringify(localStorage.getItem('coinless'));

const balance = document.querySelector("#nominal");
const emoney = document.querySelector("#emoney"); 
const buttonSubmit = document.querySelector("#submit");

buttonSubmit.addEventListener("click", (e) => {
    e.preventDefault(); 

    var selected = emoney.options[emoney.selectedIndex].value; //selected value from the drop down
  
    if(selected == "Moneygo"){
        var api_topup = "https://moneygo-api.herokuapp.com/api/topup";
        var token = ("Bearer " + moneygo).replace(/\"/g, ""); //variable untuk nyimpen token. ini yg dikirim ke api
        var method = "PUT";

    }
    if(selected == "Coinless"){
        var api_topup = "https://api-ecia.herokuapp.com/api/transfer/";
        var token = ("Bearer " + ecia).replace(/\"/g, ""); //variable untuk nyimpen token. ini yg dikirim ke api
        var method = "POST";
        
    }
    if(selected == "Harpay"){
        var api_topup = "https://harpay-api.herokuapp.com/transaksi/topup";
        var token = ("Bearer " + harpay).replace(/\"/g, ""); //variable untuk nyimpen token. ini yg dikirim ke api
        var method = "POST";
        
    }

    var myHeaders = new Headers();
    myHeaders.append("Authorization", token);
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
        balance: balance.value,
        nominal: balance.value
    });

    var requestOptions = {
        method: method,
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };

    async function getResponse(){
        try {
            let res = await fetch(api_topup, requestOptions)
            console.log("Fetch berhasil");
            return await (res.text());
        } catch(error) {
            console.log('error', error)
        };
    }

    async function getData(){

        //response masih dalam bentuk string
        let data_api = await getResponse();
        // let data_coinless = await getResponse(coinless_login);
        // let data_harpay = await getResponse(harpay_login);
        // let data_ecia = await getResponse(ecia_login);
        console.log(data_api)
        
        //response string dijadiin json
        var resp_api = JSON.parse(data_api);
        // var resp_coinless= JSON.parse(data_coinless);
        // var resp_harpay= JSON.parse(data_harpay);
        // var resp_ecia= JSON.parse(data_ecia);

        //kalo success
        if(resp_api.status == 200 || resp_api.message == "Topup successfully!"){
            
            window.location.href = "home.php";
        }else{
            alert(resp_api.message);
        }
        
        // if(resp_moneygo.error == true && resp_coinless.jwt ){
            
        // }
    };

    getData();
})



