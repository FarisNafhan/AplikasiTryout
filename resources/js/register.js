console.log("register.js aktif");
document.getElementById("form-register").addEventListener("submit", async function (e) {
    console.log("Form intercepted oleh JS!");
    e.preventDefault();

    const form = e.target;
    const name = form.name.value;
    const email = form.email.value;
    const password = form.password.value;

    console.log("Kirim ke API:", name, email, password);
    const response = await fetch("https://api-test.eksam.cloud/api/v1/auth/register", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ name, email, password })
    });

    console.log("URL:", response.url);
    const data = await response.json();
    console.log("Status:", response.status);

    if (response.ok) {
        const token = data.data.token;
        console.log("TOKEN:", data.data?.token);
        localStorage.setItem("tryout_token", token);
        console.log("Register berhasil, redirect sekarang...");
        window.location.href = "/soal";
    } else {
        alert(data.message || "Registrasi Gagal.");
    }
});