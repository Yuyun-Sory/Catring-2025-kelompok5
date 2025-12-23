<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Home') | Teras Bu Rini Catering Homemade</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Midtrans Snap -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; background: #fff; }

        /* HEADER */
        .header-top { background: #9ef7a1; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; }
        .brand-text { font-weight: bold; line-height: 1.2; }

        /* NAVBAR */
        .nav-bar { padding: 12px 50px; border-bottom: 2px solid #9ef7a1; background: #fff; }
        .nav-bar a { margin-right: 25px; text-decoration: none; color: #000; font-weight: 500; }
        .nav-bar a.active { color: #46d66a; border-bottom: 2px solid #46d66a; }

        footer { margin-top: 40px; padding: 20px; background: #eee; text-align: center; }

        /* CHATBOT */
        .floating-chatbot { position: fixed; bottom: 30px; right: 30px; width: 80px; cursor: pointer; z-index: 9999; }
        .chatbot-popup { position: fixed; bottom: 120px; right: 30px; width: 380px; height: 520px; background: #fff; border-radius: 15px; box-shadow: 0 4px 18px rgba(0,0,0,.2); display: none; flex-direction: column; z-index: 99999; }
        .chatbot-header { background: #9ef7a1; padding: 12px; font-weight: bold; display: flex; justify-content: space-between; }
        .chatbot-body { flex: 1; padding: 15px; overflow-y: auto; font-size: 14px; }
        .bot-message { background: #e5ffe6; padding: 10px; border-radius: 8px; margin-bottom: 10px; max-width: 80%; }
        .user-message { background: #d1ffd8; padding: 10px; border-radius: 8px; margin-bottom: 10px; max-width: 80%; margin-left: auto; text-align: right; }
        .chatbot-input { display: flex; border-top: 1px solid #ddd; }
        .chatbot-input input { flex: 1; padding: 10px; border: none; outline: none; }
        .chatbot-input button { background: #9ef7a1; border: none; padding: 10px 15px; }
        .order-form { background: #f8f9fa; padding: 10px; border-radius: 10px; }
        .pay-btn { margin-top: 8px; }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="header-top">
    <div class="d-flex align-items-center gap-3">
        <img src="{{ asset('images/BG teras.png') }}" width="60">
        <div class="brand-text">
            Teras Bu Rini <br>
            <small>Catering Homemade</small>
        </div>
    </div>
    <a href="/login" class="text-dark text-decoration-none fw-semibold">Login</a>
</div>

<!-- NAVBAR -->
<div class="nav-bar">
    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
    <a href="{{ route('menu-user') }}" class="{{ request()->is('menu-user') ? 'active' : '' }}">Menu</a>
    <a href="/cara-pesan" class="{{ request()->is('cara-pesan') ? 'active' : '' }}">Cara Pesan</a>
    <a href="/tentang" class="{{ request()->is('tentang') ? 'active' : '' }}">Tentang</a>
</div>

<!-- CONTENT -->
@yield('content')

<footer>&copy; {{ date('Y') }} Teras Bu Rini Catering Homemade</footer>

<!-- FLOATING CHAT -->
<img src="{{ asset('images/chatbot.png') }}" class="floating-chatbot" onclick="toggleChatbot()">

<!-- CHATBOT -->
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
            • Lokasi<br>
            • Cek Tanggal Teras<br>
        </div>
    </div>

    <!-- FORM PEMESANAN -->
<div id="orderForm"
     class="order-form m-2 p-2 rounded-3 shadow-sm bg-white"
     style="display:none">

    <div class="text-center fw-semibold mb-2" style="font-size:13px">
        📝 Pemesanan
    </div>

    <!-- MENU -->
    <div class="mb-1">
        <label class="form-label form-label-sm mb-0">Menu</label>
        <select id="id_menu" class="form-select form-select-sm"></select>
    </div>

    <!-- JUMLAH & TANGGAL (SEJAJAR) -->
    <div class="row g-1 mb-1">
        <div class="col-6">
            <label class="form-label form-label-sm mb-0">Jumlah</label>
            <input type="number" id="jumlah"
                   class="form-control form-control-sm"
                   min="1">
        </div>
        <div class="col-6">
            <label class="form-label form-label-sm mb-0">Produksi</label>
            <input type="date" id="tanggal_produksi"
                   class="form-control form-control-sm">
        </div>
    </div>

    <!-- NAMA -->
    <div class="mb-1">
        <label class="form-label form-label-sm mb-0">Nama</label>
        <input id="nama"
               class="form-control form-control-sm"
               placeholder="Nama pemesan">
    </div>

    <!-- WA -->
    <div class="mb-1">
        <label class="form-label form-label-sm mb-0">WhatsApp</label>
        <input id="telepon"
               class="form-control form-control-sm"
               placeholder="08xxxx">
    </div>

    <!-- ALAMAT (SINGKAT) -->
    <div class="mb-2">
        <label class="form-label form-label-sm mb-0">Alamat</label>
        <textarea id="alamat"
                  class="form-control form-control-sm"
                  rows="1"
                  placeholder="Alamat Detail"></textarea>
    </div>

    <button class="btn btn-success btn-sm w-100 fw-semibold"
            onclick="submitOrder()">
        Kirim Pesanan
    </button>
</div>




    <div class="chatbot-input">
        <input id="chatInput" placeholder="Ketik pesan..." onkeydown="if(event.key==='Enter') sendChat()">
        <button onclick="sendChat()">Kirim</button>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
/* ================== GLOBAL ================== */
const chatBody  = document.getElementById("chatBody");
const popup     = document.getElementById("chatbotPopup");
const orderForm = document.getElementById("orderForm");

let blockedDates = [];

/* ================== CHAT UI ================== */
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

/* ================== SEND CHAT ================== */
function sendChat() {
    const input = document.getElementById("chatInput");
    const message = input.value.trim();
    if (!message) return;

    addUserMessage(message);
    input.value = "";

    const typing = document.createElement("div");
    typing.className = "bot-message";
    typing.id = "typing-indicator";
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
        document.getElementById("typing-indicator")?.remove();

        if (data.reply) {
            addBotMessage(data.reply.replace(/\n/g, "<br>"));
        }

        /* TAMPILKAN FORM */
        if (data.show_form) {
            renderOrderForm(data);
        }

        /* SNAP */
        if (data.snap_token) {
            addBotMessage(`
                <button class="btn btn-success mt-2 w-100"
                    onclick="payNow('${data.snap_token}')">
                    💳 Bayar Sekarang
                </button>
            `);
        }

        /* JADWAL TERAS */
        if (data.available_dates) {
            let html = "<b>📅 Jadwal Teras</b><br>";
            Object.keys(data.available_dates).forEach(tgl => {
                const info = data.available_dates[tgl];
                html += `- ${tgl} → ${info.status}<br>`;
                info.items.forEach(i => {
                    html += `• ${i.jam} | ${i.menu}<br>`;
                });
            });
            addBotMessage(html);
        }
    })
    .catch(() => {
        document.getElementById("typing-indicator")?.remove();
        addBotMessage("❌ Terjadi kesalahan, silakan coba lagi.");
    });
}

/* ================== FORM RENDER ================== */
function renderOrderForm(data) {
    orderForm.style.display = "block";

    id_menu.innerHTML = "";
    (data.menus || []).forEach(m => {
        id_menu.innerHTML += `
            <option value="${m.id_menu}">
                ${m.nama_menu} - Rp${m.harga}
            </option>
        `;
    });

    blockedDates = data.blocked_dates || [];
    disableBlockedDates(document.getElementById("tanggal_produksi"));
}

/* ================== SUBMIT ORDER ================== */
function submitOrder() {
    fetch("/chatbot/send", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            form_order: true,
            id_menu: id_menu.value,
            jumlah: jumlah.value,
            tanggal_produksi: tanggal_produksi.value,
            nama: nama.value,
            telepon: telepon.value,
            alamat: alamat.value
        })
    })
    .then(res => res.json())
    .then(data => {

        /* 🚫 JADWAL BENTROK */
        if (data.show_form && data.reply.includes('Tanggal produksi')) {

            Swal.fire({
                icon: 'warning',
                title: 'Jadwal Tidak Tersedia',
                html: `
                    <b>${tanggal_produksi.value}</b><br>
                    sudah penuh atau libur 😔<br><br>
                    <small>Silakan pilih tanggal lain.</small>
                `,
                confirmButtonText: 'Pilih Tanggal Lain',
                confirmButtonColor: '#28a745'
            }).then(() => {
                renderOrderForm(data);
                tanggal_produksi.value = '';
                tanggal_produksi.focus();
                tanggal_produksi.classList.add('border-danger');
                setTimeout(() => {
                    tanggal_produksi.classList.remove('border-danger');
                }, 2000);
            });

            addBotMessage(data.reply.replace(/\n/g, "<br>"));
            return;
        }

        /* ✅ BERHASIL */
        orderForm.style.display = "none";
        addBotMessage(data.reply.replace(/\n/g, "<br>"));

        if (data.order_detail) {
            addBotMessage(`
                <div class="order-detail mt-2 p-2 rounded bg-light">
                    <strong>🧾 Detail Pesanan</strong><br>
                    No Order: <b>${data.order_detail.no_order}</b><br>
                    Nama: ${data.order_detail.nama}<br>
                    Menu: ${data.order_detail.menu}<br>
                    Jumlah: ${data.order_detail.jumlah}<br>
                    Tanggal: ${data.order_detail.tanggal_produksi}<br>
                    <b>Total: Rp${data.order_detail.total_harga.toLocaleString()}</b>
                </div>
            `);
        }

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

/* ================== PAYMENT ================== */
function payNow(token) {
    snap.pay(token, {
        onSuccess: () => {
            addBotMessage(`
                Terima kasih 🙏<br>
                Beri rating ya:<br>
                ${[1,2,3,4,5].map(i =>
                    `<span onclick="sendRating(${i})" style="cursor:pointer">⭐</span>`
                ).join('')}
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

/* ================== RATING ================== */
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

/* ================== DISABLE DATE ================== */
function disableBlockedDates(input) {
    input.onchange = function () {
        if (blockedDates.includes(this.value)) {
            Swal.fire({
                icon: 'error',
                title: 'Tanggal Tidak Tersedia',
                text: 'Silakan pilih tanggal lain yang tersedia.'
            });
            this.value = '';
        }
    };
}
</script>

<script>
let blockedDates = [];

function disableBlockedDates(input) {
    input.addEventListener('input', function () {
        if (blockedDates.includes(this.value)) {
            alert("❌ Tanggal ini tidak tersedia (Libur / Sudah terjadwal)");
            this.value = '';
        }
    });
}
</script>

</body>
</html>
