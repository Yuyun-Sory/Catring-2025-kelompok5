<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Teras Bu Rini Catering</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Midtrans -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

    <style>
        body { font-family: Poppins, sans-serif; }

        .floating-chatbot {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 80px;
            cursor: pointer;
            z-index: 9999;
        }

        .chatbot-popup {
            position: fixed;
            bottom: 120px;
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
        }

        .order-form {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 10px;
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
            Halo 👋<br>
            Saya bisa membantu:<br>
            • Menu<br>
            • Cara Pesan<br>
            • Pesan<br>
            • Lokasi <br>

        </div>
    </div>

    <!-- FORM PEMESANAN -->
    <div id="orderForm" class="order-form m-2" style="display:none">
        <select id="menu_id" class="form-control mb-2"></select>
        <input id="jumlah" class="form-control mb-2" placeholder="Jumlah porsi">
        <input id="nama" class="form-control mb-2" placeholder="Nama pemesan">
        <input id="telepon" class="form-control mb-2" placeholder="No HP">
        <textarea id="alamat" class="form-control mb-2" placeholder="Alamat lengkap"></textarea>

        <button class="btn btn-success w-100" onclick="submitOrder()">
            Kirim Pesanan
        </button>
    </div>

    <div class="chatbot-input">
        <input id="chatInput" placeholder="Ketik pesan..."
            onkeydown="if(event.key==='Enter') sendChat()">
        <button onclick="sendChat()">Kirim</button>
    </div>
</div>

<script>
const chatBody = document.getElementById("chatBody");
const popup = document.getElementById("chatbotPopup");
const orderForm = document.getElementById("orderForm");

function toggleChatbot() {
    popup.style.display = popup.style.display === "flex" ? "none" : "flex";
}

function addUserMessage(msg) {
    chatBody.innerHTML += `<div class="user-message">${msg}</div>`;
    chatBody.scrollTop = chatBody.scrollHeight;
}

function addBotMessage(html) {
    chatBody.innerHTML += `<div class="bot-message">${html}</div>`;
    chatBody.scrollTop = chatBody.scrollHeight;
}

function sendChat() {
    const input = document.getElementById("chatInput");
    const message = input.value.trim();
    if (!message) return;

    addUserMessage(message);
    input.value = "";

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

        if (data.reply) {
            addBotMessage(data.reply.replace(/\n/g,"<br>"));
        }

        if (data.show_form) {
            orderForm.style.display = "block";
            document.getElementById("menu_id").innerHTML = "";
            data.menus.forEach(m => {
                menu_id.innerHTML += `<option value="${m.id}">
                    ${m.nama_menu} - Rp${m.harga}
                </option>`;
            });
        }

        if (data.snap_token) {
            addBotMessage(`
                <button class="btn btn-success mt-2"
                    onclick="payNow('${data.snap_token}')">
                    💳 Bayar Sekarang
                </button>
            `);
        }
    });
}

function submitOrder() {
    fetch("/chatbot/send", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            form_order: true,
            menu_id: menu_id.value,
            jumlah: jumlah.value,
            nama: nama.value,
            telepon: telepon.value,
            alamat: alamat.value
        })
    })
    .then(res => res.json())
    .then(data => {
    orderForm.style.display = "none";

    // Pesan sukses
    addBotMessage(data.reply);

    // 🔥 TAMPILKAN DETAIL PESANAN
    if (data.order_detail) {
        addBotMessage(`
            <div class="order-detail mt-2 p-2" style="background:#f8f9fa;border-radius:8px">
                <strong>🧾 Detail Pesanan</strong><br>
                No Order: <b>${data.order_detail.no_order}</b><br>
                Nama: ${data.order_detail.nama}<br>
                Menu: ${data.order_detail.menu}<br>
                Jumlah: ${data.order_detail.jumlah}<br>
                Harga: Rp${data.order_detail.harga_satuan.toLocaleString()}<br>
                <hr style="margin:6px 0">
                <b>Total: Rp${data.order_detail.total_harga.toLocaleString()}</b><br>
                Alamat: ${data.order_detail.alamat}
            </div>
        `);
    }

    // Tombol bayar SETELAH detail
    if (data.snap_token) {
        addBotMessage(`
            <button class="btn btn-success mt-2 w-100"
                onclick="payNow('${data.snap_token}')">
                💳 Bayar Sekarang
            </button>
        `);
    }
});

}

function payNow(token) {
    snap.pay(token, {
        onSuccess: function () {
            addBotMessage(`
                Terima kasih 🙏<br>
                Silakan beri rating:<br><br>
                <span onclick="sendRating(1)" style="cursor:pointer">⭐</span>
                <span onclick="sendRating(2)" style="cursor:pointer">⭐</span>
                <span onclick="sendRating(3)" style="cursor:pointer">⭐</span>
                <span onclick="sendRating(4)" style="cursor:pointer">⭐</span>
                <span onclick="sendRating(5)" style="cursor:pointer">⭐</span>
            `);

            fetch("/chatbot/review", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            });
        }
    });
}

function sendRating(star) {
    addUserMessage(star.toString());
    fetch("/chatbot/send", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ message: star.toString() })
    })
    .then(res => res.json())
    .then(data => addBotMessage(data.reply));
}
</script>

</body>
</html>