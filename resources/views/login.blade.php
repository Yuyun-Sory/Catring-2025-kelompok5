<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        /* HEADER */
        .header {
            width: 100%;
            background-color: #A8F4A1;
            padding: 20px 40px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
        }

        /* LOGIN BOX */
        .login-container {
            width: 100%;
            max-width: 380px;
            margin: 80px auto;
            padding: 35px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 24px;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #444;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            background-color: #6BCF63;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-login:hover {
            background-color: #57b751;
        }

        /* ALERT MESSAGE */
        .alert {
            background-color: #ffdddd;
            color: #c0392b;
            padding: 12px;
            border-left: 5px solid #c0392b;
            margin-bottom: 15px;
            border-radius: 6px;
            display: none;
        }

        .alert-success {
            background-color: #d4f8d4;
            color: #2d862d;
            border-left: 5px solid #2d862d;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        Login
    </div>

    <!-- LOGIN FORM -->
    <div class="login-container">
        <h2>Masuk</h2>

        <div class="alert" id="alertMsg"></div>

        <form id="loginForm">
            <div class="form-group">
                <label>Email</label>
                <input id="email" type="email" placeholder="Masukkan email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input id="password" type="password" placeholder="Masukkan password" required>
            </div>

            <button class="btn-login" type="submit">Login</button>
        </form>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(e){
            e.preventDefault();

            let email = document.getElementById("email").value;
            let pass = document.getElementById("password").value;
            let alertMsg = document.getElementById("alertMsg");

            if(email === "teras@gmail.com" && pass === "12345678"){
                alertMsg.style.display = "block";
                alertMsg.className = "alert alert-success";
                alertMsg.innerHTML = "Login berhasil! Selamat datang.";

                // Redirect setelah berhasil
                setTimeout(() => {
                     window.location.href = "/dashboard"; // ganti sesuai halamanmu
                }, 1200);

            } else {
                alertMsg.style.display = "block";
                alertMsg.className = "alert";
                alertMsg.innerHTML = "Email atau password salah!";
            }
        });
    </script>

</body>
</html>
