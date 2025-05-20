// public/js/sekolah.js

let sekolahData = [];
let filteredData = [];
let currentPage = 1;
const itemsPerPage = 5;

// 1. Ambil data dari API
function loadSekolahData() {
    fetch("/api/cctvsekolah", { headers: { Accept: "application/json" } })
        .then((res) => res.json())
        .then((json) => {
            if (!json.success) {
                return Swal.fire("Error", json.message, "error");
            }
            sekolahData = json.data;
            filteredData = sekolahData; // awalnya filter = semua data
            currentPage = 1;
            renderTable();
        })
        .catch((err) => {
            console.error(err);
            Swal.fire("Error", "Gagal memuat data.", "error");
        });
}

function groupSekolahData(data) {
    const grouped = {};

    data.forEach((item) => {
        const key = `${item.namaWilayah}||${item.namaSekolah}`;
        if (!grouped[key]) {
            grouped[key] = {
                namaWilayah: item.namaWilayah,
                namaSekolah: item.namaSekolah,
                titik: [],
            };
        }
        grouped[key].titik.push(item);
    });

    // Sorting titik per grup berdasarkan namaTitik
    Object.values(grouped).forEach((group) => {
        group.titik.sort((a, b) => {
            const nameA = a.namaTitik.toLowerCase();
            const nameB = b.namaTitik.toLowerCase();
            return nameA.localeCompare(nameB);
        });
    });

    // Ubah object jadi array, lalu sorting berdasarkan namaWilayah dan namaSekolah
    const result = Object.values(grouped);

    result.sort((a, b) => {
        const wilayahCompare = a.namaWilayah
            .toLowerCase()
            .localeCompare(b.namaWilayah.toLowerCase());
        if (wilayahCompare !== 0) return wilayahCompare;

        return a.namaSekolah
            .toLowerCase()
            .localeCompare(b.namaSekolah.toLowerCase());
    });

    return result;
}

// 2. Render tabel berdasarkan filteredData & paging

function renderTable() {
    const tbody = document.getElementById("sekolah-tbody");
    tbody.innerHTML = "";

    const groupedData = groupSekolahData(filteredData);
    const start = (currentPage - 1) * itemsPerPage;
    const pageData = groupedData.slice(start, start + itemsPerPage);

    pageData.forEach((group) => {
        const rowspan = group.titik.length;

        const wilayahNama =
            group.namaWilayah === "KABUPATEN GK"
                ? "KAB GUNUNG KIDUL"
                : group.namaWilayah === "KABUPATEN KP"
                ? "KAB KULONPROGO"
                : group.namaWilayah === "KABUPATEN BANTUL"
                ? "KAB BANTUL"
                : group.namaWilayah === "KABUPATEN SLEMAN"
                ? "KAB SLEMAN"
                : group.namaWilayah;

        group.titik.forEach((item, index) => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                ${
                    index === 0
                        ? `<td class="text-center align-middle" rowspan="${rowspan}">${wilayahNama}</td>`
                        : ""
                }
                ${
                    index === 0
                        ? `<td class="text-center align-middle" rowspan="${rowspan}">${group.namaSekolah}</td>`
                        : ""
                }
                <td class="text-center align-middle">${item.namaTitik}</td>
                <td class="text-center align-middle">
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-sm btn-secondary" onclick='openEditModal(${JSON.stringify(item)})'>
                            Edit
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteSekolah(${item.id})">
                            Delete
                        </button>
                    </div>
                </td>
            `;
            tbody.appendChild(tr);
        });
    });

    renderPagination(groupedData.length);
}


// 3. Render tombol pagination
function renderPagination(totalItems = null) {
    const totalPages = Math.ceil(
        (totalItems ?? filteredData.length) / itemsPerPage
    );
    document.querySelector('button[onclick="prevPage()"]').disabled =
        currentPage === 1;
    document.querySelector('button[onclick="nextPage()"]').disabled =
        currentPage === totalPages;
}

// 4. Prev / Next
function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        renderTable();
    }
}
function nextPage() {
    const totalPages = Math.ceil(filteredData.length / itemsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        renderTable();
    }
}

// 5. Search lokal
function searchcctvsekolah() {
    const q = document.getElementById("searchInput").value.trim().toLowerCase();
    filteredData = sekolahData.filter(
        (item) =>
            item.namaWilayah.toLowerCase().includes(q) ||
            item.namaSekolah.toLowerCase().includes(q) ||
            item.namaTitik.toLowerCase().includes(q)
    );
    currentPage = 1;
    renderTable();
}
// Hapus Data
function deleteSekolah(id) {
    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/api/cctvsekolah/${id}`, {
                method: "DELETE",
                headers: {
                    Accept: "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
            })
                .then((r) => r.json())
                .then((res) => {
                    if (res.success) {
                        Swal.fire("Dihapus", res.message, "success");
                        loadSekolahData();
                    } else {
                        Swal.fire("Error", res.message, "error");
                    }
                })
                .catch((err) => {
                    console.error(err);
                    Swal.fire("Error", "Gagal menghapus.", "error");
                });
        }
    });
}

// 7. Open modal edit/ add (contoh)
function openAddModal() {
    $("#cctvForm")[0].reset();
    $("#cctvForm").attr("action", "/api/cctvsekolah");
    $("#cctvForm").attr("method", "POST");
    $("#cctvsekolahModalLabel").text("Tambah CCTV Sekolah");
    $("#saveBtn").text("Save");
    new bootstrap.Modal($("#cctvsekolahModal")).show();
}
function openEditModal(item) {
    $("#idSekolah").val(item.id);
    $("#namaWilayah").val(item.namaWilayah);
    $("#namaSekolah").val(item.namaSekolah);
    $("#namaTitik").val(item.namaTitik);
    $("#link").val(item.link);

    $("#cctvForm").attr("action", `/api/cctvsekolah/${item.id}`);
    $("#cctvForm").attr("method", "PUT");
    $("#cctvsekolahModalLabel").text("Edit CCTV Sekolah");
    $("#saveBtn").text("Update");
    new bootstrap.Modal($("#cctvsekolahModal")).show();
}

// 8. Inisialisasi ketika dokumen siap
document.addEventListener("DOMContentLoaded", loadSekolahData);

// Add dan Edit
document.getElementById("cctvForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const id = document.getElementById("idSekolah").value;
    const method = id ? "PUT" : "POST";
    const url = id ? `/api/cctvsekolah/${id}` : "/api/cctvsekolah";

    const data = {
        namaWilayah: document.getElementById("namaWilayah").value,
        namaSekolah: document.getElementById("namaSekolah").value,
        namaTitik: document.getElementById("namaTitik").value,
        link: document.getElementById("link").value,
    };

    fetch(url, {
        method: method,
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify(data),
    })
        .then((res) => res.json())
        .then((res) => {
            if (res.success) {
                Swal.fire("Berhasil", res.message, "success");
                document.getElementById("cctvForm").reset();
                document.getElementById("idSekolah").value = "";

                const modalElement =
                    document.getElementById("cctvsekolahModal");
                const modalInstance =
                    bootstrap.Modal.getInstance(modalElement) ||
                    new bootstrap.Modal(modalElement);

                // Fix overlay modal backdrop
                document
                    .querySelectorAll(".modal-backdrop")
                    .forEach((el) => el.remove());
                document.body.classList.remove("modal-open");
                document.body.style.overflow = "";
                document.body.style.paddingRight = "";
                modalInstance.hide();

                loadSekolahData();
            } else {
                let errorText = "";
                if (res.data && typeof res.data === "object") {
                    for (const key in res.data) {
                        errorText += `${key}: ${res.data[key].join(", ")}\n`;
                    }
                } else {
                    errorText = res.message;
                }
                Swal.fire("Gagal", errorText, "error");
            }
        })
        .catch((err) => {
            console.error(err);
            Swal.fire(
                "Error",
                "Terjadi kesalahan saat menyimpan data.",
                "error"
            );
        });
});
