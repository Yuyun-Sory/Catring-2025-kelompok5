<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Teras Bu Rini Catering Homemade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allison&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .header-top {
            background-color: #9ef7a1;
            color: #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
        }

        .brand-text {
            font-weight: bold;
            line-height: 1.2;
        }

        .brand-text small {
            font-weight: normal;
            font-size: 14px;
        }

        .btn-auth {
            color: #000;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }

        .nav-bar {
            background-color: #fff;
            padding: 10px 50px;
            display: flex;
            align-items: center;
            border-bottom: 2px solid #9ef7a1;
            gap: 30px;
        }

        .nav-links a {
            color: #000;
            text-decoration: none;
            margin-right: 25px;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: #46d66a;
        }

        footer {
            background-color: #f8f8f8;
            padding: 20px;
            text-align: center;
            margin-top: 40px;
        }

        /* Floating Icon dengan animasi mengangguk + membesar */
        .floating-chatbot {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 100px;
            height: 100px;
            cursor: pointer;
            z-index: 9999;
            animation: nodScale 3.8s ease-in-out infinite;
            transform-origin: 50% 70%;
        }

        @keyframes nodScale {
            0% { transform: rotate(0deg) scale(1); }
            20% { transform: rotate(4deg) scale(1.05); }
            40% { transform: rotate(-3deg) scale(1.03); }
            60% { transform: rotate(2deg) scale(1.05); }
            80% { transform: rotate(-1deg) scale(1.02); }
            100% { transform: rotate(0deg) scale(1); }
        }

        /* POPUP CHATBOT */
        .chatbot-popup {
            position: fixed;
            bottom: 120px;
            right: 30px;
            width: 320px;
            height: 430px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.2);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 10000;
        }

        .chatbot-header {
            background: #9ef7a1;
            padding: 12px 15px;
            font-weight: bold;
            color: #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
        }

        .chatbot-body {
            flex: 1;
            padding: 15px;
            font-size: 14px;
            overflow-y: auto;
        }

        .bot-message {
            background: #e5ffe6;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .user-message {
            background: #d1ffd8;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            text-align: right;
        }

        .chatbot-input {
            display: flex;
            border-top: 1px solid #ddd;
        }

        .chatbot-input input {
            flex: 1;
            padding: 10px;
            border: none;
            outline: none;
        }

        .chatbot-input button {
            background: #9ef7a1;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Header Hijau -->
    <div class="header-top">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('images/BG teras.png') }}" alt="Logo" width="60" height="60">
            <div class="brand-text">
                Teras Bu Rini<br>
                <small>Catering Homemade</small>
            </div>
        </div>
        <div>
            <a href="#" class="btn-auth">Masuk</a>
            <a href="#" class="btn-auth">Daftar</a>
        </div>
    </div>

    <!-- Navbar -->
    <div class="nav-bar">
        <div class="nav-links">
            <a href="/">Home</a>
            <a href="/menu">Menu</a>
            <a href="/cara-pesan">Cara Pesan</a>
            <a href="/tentang">Tentang</a>
        </div>
    </div>

    <!-- Konten -->
    <div class="container-fluid p-0">
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} Teras Bu Rini Catering Homemade — Semua hak dilindungi.
    </footer>

    <!-- Floating Icon -->
    <img src="{{ asset('images/chatbot.png') }}" class="floating-chatbot" onclick="toggleChatbot()" alt="chat">

    <!-- POPUP CHATBOT -->
    <div id="chatbotPopup" class="chatbot-popup">
        <div class="chatbot-header">
            <span>Chatbot Teras Bu Rini</span>
            <button class="close-btn" onclick="toggleChatbot()">✕</button>
        </div>

        <div class="chatbot-body" id="chatBody">
            <div class="bot-message">
                Halo! Ada yang bisa saya bantu? 😊<br>
                • Menu<br>
                • Harga catering<br>
                • Cara pesan<br>
                • Lokasi
            </div>
        </div>

        <div class="chatbot-input">
            <input type="text" id="chatInput" placeholder="Ketik pesan...">
            <button onclick="sendChat()">Kirim</button>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        function toggleChatbot() {
            const popup = document.getElementById("chatbotPopup");
            popup.style.display = popup.style.display === "flex" ? "none" : "flex";
        }

        function sendChat() {
            const input = document.getElementById("chatInput");
            const chatBody = document.getElementById("chatBody");

            if (input.value.trim() === "") return;

            let userMsg = document.createElement("div");
            userMsg.className = "user-message";
            userMsg.innerText = input.value;
            chatBody.appendChild(userMsg);

            chatBody.scrollTop = chatBody.scrollHeight;
            input.value = "";
        }
    </script>

</body>
</html>