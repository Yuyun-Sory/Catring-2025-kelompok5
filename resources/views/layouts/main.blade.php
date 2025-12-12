<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        /* HEADER */
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
            font-weight: 500;
        }

        /* NAVBAR */
        .nav-bar {
            background: #fff;
            padding: 12px 50px;
            display: flex;
            align-items: center;
            border-bottom: 2px solid #9ef7a1;
            gap: 30px;
        }

        .nav-bar a {
            color: #000;
            font-weight: 500;
            text-decoration: none;
            margin-right: 25px;
        }

        .nav-bar a:hover {
            color: #46d66a;
        }

        .active-link {
            color: #46d66a !important;
            font-weight: 700;
            border-bottom: 2px solid #46d66a;
            padding-bottom: 2px;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            background: #eee;
        }

        /* Floating Icon */
        .floating-chatbot {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 100px;
            height: 100px;
            cursor: pointer;
            z-index: 9999;
        }

        /* Chatbot Popup */
        .chatbot-popup {
            position: fixed;
            bottom: 140px;
            right: 30px;
            width: 380px;
            height: 520px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.2);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 99999;
        }

        .chatbot-header {
            background: #9ef7a1;
            padding: 12px 15px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chatbot-body {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
        }

        .bot-message {
            background: #e5ffe6;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 80%;
        }

        .user-message {
            background: #d1ffd8;
            padding: 10px;
            border-radius: 8px;
            text-align: right;
            margin-bottom: 10px;
            max-width: 80%;
            margin-left: auto;
        }

        .chatbot-input {
            display: flex;
            border-top: 1px solid #ddd;
        }

        .chatbot-input input {
            flex: 1;
            padding: 10px;
            border: none;
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

    <!-- HEADER BRAND -->
    <div class="header-top">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('images/BG teras.png') }}" width="60" height="60">
            <div class="brand-text">
                Teras Bu Rini <br>
                <small>Catering Homemade</small>
            </div>
        </div>

        <a href="/login" class="btn-auth">Login</a>
    </div>

    <!-- NAVBAR -->
    <div class="nav-bar">
        <a href="/" class="{{ request()->is('/') ? 'active-link' : '' }}">Home</a>
        <a href="/menu" class="{{ request()->is('menu*') ? 'active-link' : '' }}">Menu</a>
        <a href="/cara-pesan" class="{{ request()->is('cara-pesan') ? 'active-link' : '' }}">Cara Pesan</a>
        <a href="/tentang" class="{{ request()->is('tentang') ? 'active-link' : '' }}">Tentang</a>
    </div>

    <!-- MAIN CONTENT -->
    @yield('content')

    <footer>&copy; {{ date('Y') }} Teras Bu Rini Catering Homemade</footer>

    <!-- Floating Icon -->
    <img src="{{ asset('images/chatbot.png') }}" class="floating-chatbot" onclick="toggleChatbot()" alt="chat">

    <!-- Chatbot Popup -->
    <div id="chatbotPopup" class="chatbot-popup">
        <div class="chatbot-header">
            Chatbot Teras Bu Rini
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
            <input type="text" id="chatInput" placeholder="Ketik pesan..." onkeydown="if(event.key==='Enter') sendChat()">
            <button onclick="sendChat()">Kirim</button>
        </div>
    </div>

    <script>
        const popup = document.getElementById("chatbotPopup");
        const chatBody = document.getElementById("chatBody");

        function toggleChatbot() {
            popup.style.display = popup.style.display === "flex" ? "none" : "flex";
        }

        function addUserMessage(msg) {
            chatBody.innerHTML += `<div class="user-message">${escapeHtml(msg)}</div>`;
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        function addBotMessage(msg) {
            chatBody.innerHTML += `<div class="bot-message">${escapeHtml(msg)}</div>`;
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        function escapeHtml(text) {
            const div = document.createElement("div");
            div.textContent = text;
            return div.innerHTML;
        }

        function sendChat() {
            const input = document.getElementById("chatInput");
            const message = input.value.trim();
            if (!message) return;

            addUserMessage(message);
            input.value = "";

            let typing = document.createElement("div");
            typing.className = "bot-message";
            typing.innerText = "Sedang mengetik...";
            chatBody.appendChild(typing);

            fetch("/chatbot/send", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ message })
            })
            .then(res => res.json())
            .then(data => {
                typing.remove();
                addBotMessage(data.reply ?? "Maaf, terjadi kesalahan server.");
            })
            .catch(() => {
                typing.remove();
                addBotMessage("⚠ Tidak dapat terhubung ke server.");
            });
        }
    </script>

</body>

</html>
