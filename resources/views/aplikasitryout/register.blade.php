<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tryout</title>
    @vite('resources/css/app.css')
    @vite('resources/js/register.js')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-md p-8 max-w-96 h-auto rounded-2xl w-full">

        <form id="form-register" action="javascript:void(0);">
            <div>
                <h1 class="mb-7 text-center text-3xl font-semibold">Register</h1>
            </div>
            <div class="flex flex-col mb-3">
                <label for="name" class="mb-1">Nama Lengkap</label>
                <input class="border rounded-md mb-3 h-8" type="text" name="name" id="name">
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
                <label for="confirm_password" class="mb-1">Konfirmasi Password</label>
                <input class="border rounded-md mb-3 h-8" type="password" name="confirm_password" id="confirm_password">
            </div>
            <div class="mb-3">
                <label for="">
                    sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-600">Login</a>
                </label>
            </div>
            <div class="mb-3">
                <button class="bg-blue-600 text-white rounded-md p-1 w-full" type="submit" id="btn-daftar">
                    daftar
                </button>
            </div>
        </form>
        <p id="register-error" class="text-red-500 mt-2 text-sm hidden"></p>
    </div>
</body>

</html>
