<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Teras Bu Rini Catering</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MIDTRANS SNAP (HANYA SATU KALI) -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; }

        .floating-chatbot {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 90px;
            cursor: pointer;
            z-index: 9999;
        }

        .chatbot-popup {
            position: fixed;
            bottom: 130px;
            right: 30px;
            width: 380px;
            height: 520px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 18px rgba(0,0,0,.2);
            display: none;
            flex-direction: column;
            z-index: 99999;
        }

        .chatbot-header {
            background: #9ef7a1;
            padding: 12px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
        }

        .chatbot-body {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            font-size: 14px;
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
            margin-bottom: 10px;
            max-width: 80%;
            margin-left: auto;
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

        .pay-btn {
            margin-top: 8px;
        }
    </style>
</head>

<body>
@yield('content')
<!-- Floating Icon -->
<img src="{{ asset('images/chatbot.png') }}" class="floating-chatbot" onclick="toggleChatbot()">

<!-- Chatbot -->
<div id="chatbotPopup" class="chatbot-popup">
    <div class="chatbot-header">
        <span>Chatbot Teras Bu Rini</span>
        <button onclick="toggleChatbot()">✕</button>
    </div>

    <div class="chatbot-body" id="chatBody">
        <div class="bot-message">
            Halo! Ada yang bisa saya bantu? 😊<br>
            • Menu<br>
            • Cara pesan<br>
            • Lokasi
        </div>
    </div>

    <div class="chatbot-input">
        <input type="text" id="chatInput" placeholder="Ketik pesan..."
            onkeydown="if(event.key==='Enter') sendChat()">
        <button onclick="sendChat()">Kirim</button>
    </div>
</div>

<script>
    const popup = document.getElementById("chatbotPopup");
    const chatBody = document.getElementById("chatBody");

    function toggleChatbot() {
        popup.style.display = popup.style.display === "flex" ? "none" : "flex";
    }

    function escapeHtml(text) {
        const div = document.createElement("div");
        div.textContent = text;
        return div.innerHTML;
    }

    function addUserMessage(msg) {
        chatBody.innerHTML += `<div class="user-message">${escapeHtml(msg)}</div>`;
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    function addBotMessage(html) {
        chatBody.innerHTML += `<div class="bot-message">${html}</div>`;
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    function payNow(token) {
        snap.pay(token, {
            onSuccess: () => addBotMessage("✅ Pembayaran berhasil. Terima kasih 🙏"),
            onPending: () => addBotMessage("⏳ Menunggu pembayaran..."),
            onError: () => addBotMessage("❌ Pembayaran gagal."),
            onClose: () => addBotMessage("⚠️ Pembayaran ditutup.")
        });
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

            if (data.reply) {
                addBotMessage(escapeHtml(data.reply).replace(/\n/g, "<br>"));
            }

            if (data.snap_token) {
                addBotMessage(`
                    <button class="btn btn-success pay-btn"
                        onclick="payNow('${data.snap_token}')">
                        💳 Bayar Sekarang
                    </button>
                `);
            }
        })
        .catch(() => {
            typing.remove();
            addBotMessage("⚠️ Tidak dapat terhubung ke server.");
        });
    }
</script>

</body>
</html>