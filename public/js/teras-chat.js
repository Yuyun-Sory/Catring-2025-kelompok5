document.addEventListener("DOMContentLoaded", () => {

    const liburData = JSON.parse(document.getElementById("liburData").value);

    const calendarBody = document.getElementById("calendarBody");
    const monthLabel = document.getElementById("monthLabel");

    let today = new Date();

    let currentMonth = localStorage.getItem("cal_month")
        ? parseInt(localStorage.getItem("cal_month"))
        : today.getMonth();

    let currentYear = localStorage.getItem("cal_year")
        ? parseInt(localStorage.getItem("cal_year"))
        : today.getFullYear();

    const monthNames = [
        "Januari","Februari","Maret","April","Mei","Juni",
        "Juli","Agustus","September","Oktober","November","Desember"
    ];

    function saveState() {
        localStorage.setItem("cal_month", currentMonth);
        localStorage.setItem("cal_year", currentYear);
    }

    function renderCalendar() {
        saveState();
        calendarBody.innerHTML = "";
        monthLabel.innerText = `${monthNames[currentMonth]} ${currentYear}`;

        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const lastDate = new Date(currentYear, currentMonth + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            calendarBody.innerHTML += `<div></div>`;
        }

        for (let d = 1; d <= lastDate; d++) {
            const dateStr = `${currentYear}-${String(currentMonth+1).padStart(2,"0")}-${String(d).padStart(2,"0")}`;
            const isPast = new Date(dateStr) < new Date().setHours(0,0,0,0);
            
            // cari data libur / penuh
            const libur = liburData.find(l => l.tanggal === dateStr);
            let cls = "date-box";

            if (libur) {
                cls += libur.status === "full" ? " date-full" : " date-libur";
            }

            if (!libur) cls += ""; // default tersedia = 78F38F
            if (isPast) cls += " date-disabled";

            calendarBody.innerHTML += `<div class="${cls}" title="${libur ? libur.keterangan || 'Terisi' : 'Tersedia'}">${d}</div>`;
        }

        filterTable();
    }

    function filterTable() {
        document.querySelectorAll("#liburTable tr").forEach(row => {
            const d = new Date(row.dataset.tanggal);
            row.style.display =
                d.getMonth() === currentMonth &&
                d.getFullYear() === currentYear ? "" : "none";
        });
    }

    window.prevMonth = () => {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar();
    };

    window.nextMonth = () => {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar();
    };

    renderCalendar();
});

/* MODAL */
window.openCreateModal = () =>
    document.getElementById("createModal").style.display = "flex";

window.openEditModal = (id, tgl, ket) => {
    document.getElementById("editModal").style.display = "flex";
    document.getElementById("editTanggal").value = tgl;
    document.getElementById("editKeterangan").value = ket;
    document.getElementById("editForm").action = `/libur/${id}`;
};

window.closeModal = () => {
    document.getElementById("createModal").style.display = "none";
    document.getElementById("editModal").style.display = "none";
};
