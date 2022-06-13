var moneygo_transfer = "https://moneygo-api.herokuapp.com/api/transfer";

//ambil token dari local.Storage. local storage ada di page source >> application
const moneygo = JSON.stringify(localStorage.getItem('moneygo'));
const ecia = JSON.stringify(localStorage.getItem('ecia'));
const harpay = JSON.stringify(localStorage.getItem('harpay'));

var myHeaders = new Headers();
var token_moneygo = ("Bearer " + moneygo).replace(/\"/g, ""); //variable untuk nyimpen token. ini yg dikirim ke api
myHeaders.append("Authorization", token_moneygo);
myHeaders.append("Content-Type", "application/json");

const email = document.querySelector("#email"); //receiver's
const balance = document.querySelector("#nominal");
// const emoney = document.querySelector("#moneygo"); //radio button
const buttonSubmit = document.querySelector("#submit");

buttonSubmit.addEventListener("click", (e) => {
    e.preventDefault(); // mencegah refresh

    var raw = JSON.stringify({
        email: email.value,
        balance: balance.value
    });

    var requestOptions = {
        method: 'PUT',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };

    async function getResponse(url){
        try {
            let res = await fetch(url, requestOptions)
            console.log("Fetch berhasil");
            return await (res.text());
        } catch(error) {
            console.log('error', error)
        };
    }

    async function getData(){

        //response masih dalam bentuk string
        let data_moneygo = await getResponse(moneygo_transfer);
        // let data_coinless = await getResponse(coinless_login);
        // let data_harpay = await getResponse(harpay_login);
        // let data_ecia = await getResponse(ecia_login);
        
        //response string dijadiin json
        var resp_moneygo = JSON.parse(data_moneygo);
        // var resp_coinless= JSON.parse(data_coinless);
        // var resp_harpay= JSON.parse(data_harpay);
        // var resp_ecia= JSON.parse(data_ecia);

        //kalo success
        if(resp_moneygo.status == 200){
            
            window.location.href = "index2.php";
        }else{
            alert("try again");
        }
        
        // if(resp_moneygo.error == true && resp_coinless.jwt ){
            
        // }
    };

    getData();
})



