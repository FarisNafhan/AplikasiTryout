<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tryout</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-md p-8 max-w-96 h-auto rounded-2xl w-full">
        <form action="" method="post">
            <div>
                <h1 class="mb-7 text-center text-3xl font-semibold">Register</h1>
            </div>
            <div class="flex flex-col mb-3">
                <label for="nama" class="mb-1">Nama Lengkap</label>
                <input class="border rounded-md mb-3 h-8" type="name" name="nama" id="nama">
            </div>
            <div class="flex flex-col mb-3">
                <label for="email" class="mb-1">Email</label>
                <input class="border rounded-md mb-3 h-8" type="email" name="email" id="email">
            </div>
            <div class="flex flex-col mb-3">
                <label for="password" class="mb-1">Password</label>
                <input class="border rounded-md mb-3 h-8" type="password" name="password" id="password">
            </div>
            <div class="flex flex-col mb-6">
                <label for="password" class="mb-1">Konfirmasi Password</label>
                <input class="border rounded-md mb-3 h-8" type="password" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="">
                    sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-600">Login</a>
                </label>
            </div>
            <div class="mb-3">
                <button class="bg-blue-600 text-white rounded-md p-1 w-full" type="submit">
                    daftar
                </button>
            </div>
        </form>
    </div>
</body>

</html>
