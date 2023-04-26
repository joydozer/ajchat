emails = ["goldenlamatwelu@gmail.com", "yumicopapona@gmail.com", "andrekaramoy@gmail.com", "wuntujoy@gmail.com"]
fullnames = ["Golden Lamatwelu", "Yumico Papona", "Andre Karamoy", "Jonathan Wuntu"];
function checkAccount() {
    email = document.getElementById("email").value;
    password = document.getElementById("password").value;
    if(email == "admin" && password == "12345") {
        localStorage.setItem("email", "admin");
        window.location.href = "chatlist.html";
    } else if (email == emails[0] && password == "12345") {
        localStorage.setItem("email", emails[0]);
        window.location.href = "chatlist.html";
    } else if (email == emails[1] && password == "12345") {
        localStorage.setItem("email", emails[1]);
        window.location.href = "chatlist.html";
    } else if (email == emails[2] && password == "12345") {
        localStorage.setItem("email", emails[2]);
        window.location.href = "chatlist.html";
    } else if (email == emails[3] && password == "12345") {
        localStorage.setItem("email", emails[3]);
        window.location.href = "chatlist.html";
    } else {
        alert("Wrong email or password!");
    }
}

