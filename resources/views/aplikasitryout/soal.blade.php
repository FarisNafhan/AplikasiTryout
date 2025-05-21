<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/soaltryout.js')
    <title>Soal</title>

</head>

<body class="bg-gray-100 flex justify-center min-h-screen">

    <div class="bg-white p-6 rounded-xl shadow-lg max-w-full">
        <h1 class="text-2xl font-semibold mb-4 text-center">Pengerjaan Soal</h1>

        <div id="soal-container" class="mb-6">
            <p id="soal-teks" class="mb-4 font-medium">Memuat soal...</p>

            <div id="opsi-jawaban" class="space-y-4">
                {{-- opsi jawaban --}}
            </div>
        </div>

        <div>
            <button id="btn-report" class="text-red-600 underline mt-2 mb-6">report soal</button>
        </div>

        <div>
            <button id="btn-back" class="bg-gray-300 px-4 py-2 rounded">back</button>
            <button id="btn-next" class="bg-blue-600 text-white px-4 py-2 rounded">next</button>    
            <button id="btn-selesai" class="bg-blue-600 text-white px-4 py-2 rounded">Kirim</button>
        </div>
    </div>

    <div id="report-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-xl w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Report Soal</h2>
            <label class="block mb-2">Alasan: </label>
            <select id="report-soal" class="w-full border rounded mb-3 p-2">
                <option value="">-- Pilih Alasan</option>
                <option value="Typo / Salah ketik"> Typo / Salah ketik </option>
                <option value="Gambar Tidak muncul"> Gambar Tidak muncul </option>
                <option value="Soal Tidak Dimengerti"> Soal Tidak Dimengerti </option>
                <option value="Opsi Tidak Relevan"> Opsi Tidak Relevan </option>
                <option value="Lainnya"> Lainnya </option>
            </select>

            <label class="block mb-2"> Keterangan tambahan(opsional): </label>
            <textarea id="report-keterangan" class="w-full border rounded p-2 mb-4" rows="3" placeholder="Tulis jika ada tambahan..."></textarea>

            <div>
                <button class="px-4 py-2 bg-gray-300 rounded" id="btn-batal-kirim">Batal</button>
                <button class="px-4 py-2 bg-red-600 text-white rounded" id="btn-kirim-laporan">Kirim</button>
            </div>
        </div>
    </div>
</body>

</html>
