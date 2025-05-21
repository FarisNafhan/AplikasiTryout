document.getElementById("form-login").addEventListener("submit", async function (e){
    e.preventDefault();

    const form = e.target;
    const email = form.email.value;
    const password = form.password.value;

    const response = await fetch("https://api-test.eksam.cloud/api/v1/auth/login", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            email: "Sebas231@gmail.com",
            password: "Sebastino0732#",
        })
    });

    const data = await response.json();

    if(response.ok) {
        const token = data.data.token;
        localStorage.setItem("tryout_token", token);
        window.location.href = "/soal"
    } else {
        document.getElementById("login-error").classList.remove("hidden");
        document.getElementById("login-error").textContent = data.message || "login gagal";
    }
});