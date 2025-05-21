const token = "689|eMxaodsFkQS0Wo8Vpy6wdRwzW9GsZ8LTUL8eHDOV7795408e";
let currentId = 1;
let jawabanUser = {};
let totalSoal = 5;
let bankSoal = {};

function loadSoal(id) {
    fetch(`https://api-test.eksam.cloud/api/v1/tryout/question/${id}`, {
        method: 'GET',
        headers: {
            'accept': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    })

        .then(res => res.json())
        .then(data => {
            console.log("respon", data);

            const soal = data.data;
            if (!soal) {
                document.getElementById("soal-teks").textContent = "Jumlah Soal Sudah habis";
                document.getElementById("opsi-jawaban").innerHTML = "";
                return;
            }

            bankSoal[soal.id] = {
                soal: soal.soal,
                opsi: soal.tryout_question_option
            };

            document.getElementById('soal-teks').innerHTML = soal.soal;
            const opsiContainer = document.getElementById('opsi-jawaban');
            opsiContainer.innerHTML = "";

            soal.tryout_question_option.forEach((opsi, index) => {
                const opsiEl = document.createElement('label');
                opsiEl.classList.add('block');
                opsiEl.innerHTML = `
                    <input type="radio" name="jawaban" id="opsi-${opsi.id}" class="mr-2" value="${opsi.id}">
                    ${opsi.inisial}. ${opsi.jawaban}
                `;

                const inputRadio = opsiEl.querySelector("input");
                inputRadio.addEventListener('change', () => {
                    jawabanUser[soal.id] = opsi.id;
                    console.log("jawaban disimpan", jawabanUser);
                });

                const jawabanSebelumnya = jawabanUser[soal.id];
                if (jawabanSebelumnya === opsi.id) {
                    inputRadio.checked = true;
                }

                opsiContainer.appendChild(opsiEl);
            });

            if (currentId === totalSoal) {
                document.getElementById("btn-selesai").classList.remove("hidden");
                document.getElementById("btn-next").classList.add("hidden");

            } else {
                document.getElementById("btn-selesai").classList.add("hidden");
                document.getElementById("btn-next").classList.remove("hidden");
            }
        })
        .catch(error => {
            document.getElementById("soal-teks").textContent = "Gagal Memuat soal.";
            console.error(error);
        });

}

document.getElementById("btn-next").addEventListener("click", () => {
    currentId++;
    loadSoal(currentId);
});

document.getElementById("btn-back").addEventListener("click", () => {
    if (currentId > 1) {
        currentId--;
        loadSoal(currentId);
    }
});


document.getElementById("btn-selesai").addEventListener("click", () => {
    console.log('jawaban akhir:', jawabanUser);

    let totalNilai = 0;

    for (const [soalId, jawabanId] of Object.entries(jawabanUser)) {
        const soal = bankSoal[soalId];
        if (!soal) continue;

        const opsiDipilih = soal.opsi.find(o => o.id === jawabanId);
        const nilai = opsiDipilih?.nilai ?? 0;
        totalNilai += nilai;
        localStorage.setItem("skor ", totalNilai);
    }
    alert(`!\Skor akhir : ${totalNilai}`);

});

loadSoal(currentId);

const modal = document.getElementById("report-modal");
const btnLapor = document.getElementById("btn-report");
const btnBatal = document.getElementById("btn-batal-kirim");
const btnKirim = document.getElementById("btn-kirim-laporan");

btnLapor.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

btnBatal.addEventListener("click", () => {
    modal.classList.add("hidden");
})

btnKirim.addEventListener("click", () => {
    const alasan = document.getElementById("report-soal").value;
    const keterangan = document.getElementById("report-keterangan").value;

    if (!alasan) {
        alert("Silahkan Pilih alasan terlebih dahulu");
        return;
    }
    const laporan = {
        soal_id: currentId,
        alasan: alasan,
        keterangan: keterangan,
    };

    console.log("laporan soal terikirm", laporan)

    fetch ("https://api-test.eksam.cloud/api/v1/tryout/lapor-soal/create", {
        method: "POST",
        headers: {
            "Authorization": "Bearer " + token,
            "Accept": "application/json",
            "Content-Type": "application/json",
        },

        body: JSON.stringify(laporan)
    })

    .then(res => res.json())
    .then(data => {
        alert("Report berhasil dikirim")
    });

    modal.classList.add("hidden");
    alert("Terima Kasih atas laporan mu!")
});