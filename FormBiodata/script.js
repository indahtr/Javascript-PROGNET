document.getElementById("biodataForm").addEventListener("submit", function(event) {
    event.preventDefault();
    validateForm();
});

function validateForm() {
    const email = document.getElementById("email").value;
    const name = document.getElementById("name").value;
    const univ = document.getElementById("univ").value;
    const fakultas = document.getElementById("fakultas").value;
    const prodi = document.getElementById("prodi").value;
    const nim = document.getElementById("nim").value;
    const gender = document.getElementById("gender").value;
    const age = document.getElementById("age").value;
    const birthplace = document.getElementById("birthplace").value;
    const tglLahir = document.getElementById("tglLahir").value;
    const agama = document.querySelectorAll('input[name="agama"]:checked').value;

    if (email === "" || name === "" || nim === "" || gender === "" || age === "" || birthplace === "" || tglLahir === "" || univ === "" || fakultas ===  "" || prodi === "" || agama === "") {
        displayMessage("Semua kolom harus diisi.");
    } else {
        displayMessage(`Email: ${email}<br>
        Nama: ${name}<br>
        Universitas: ${univ}<br>
        Fakultas: ${fakultas}<br>
        Prodi: ${prodi}<br>
        NIM: ${nim}<br>
        Jenis Kelamin: ${gender}<br>
        Umur: ${age} tahun<br>
        Tempat Lahir: ${birthplace}<br>
        Tanggal Lahir: ${tglLahir}<br>
        Agama: ${agama}<br>`
        );
    }
}

function displayMessage(message) {
    document.getElementById("result").innerHTML = message;
}
