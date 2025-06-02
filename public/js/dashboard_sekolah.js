console.log('=== Slugified CCTV Data ===');
cctvData.forEach(item => {
    const slug = slugify(item.namaSekolah + '-' + item.namaTitik);
    // generate checkbox dengan id "checkbox-" + slug
    const checkbox = document.createElement('input');
    checkbox.type = "checkbox";
    checkbox.id = "checkbox-" + slug;
    checkbox.dataset.slug = slug;
    checkbox.dataset.sekolah = item.namaSekolah;
    // append checkbox ke DOM dst
});


function filterSidebar() {
    const input = document.getElementById("searchSekolahSidebar");
    const filter = input.value.toLowerCase();

    const wilayahItems = document.querySelectorAll(".menu > .item");

    wilayahItems.forEach((wilayahItem) => {
        const sekolahItems = wilayahItem.querySelectorAll(".item-sekolah");
        let adaYangCocok = false;

        sekolahItems.forEach((sekolahItem) => {
            const namaSekolah = sekolahItem
                .querySelector("a")
                .innerText.toLowerCase();
            if (namaSekolah.includes(filter)) {
                sekolahItem.style.display = "";
                adaYangCocok = true;
            } else {
                sekolahItem.style.display = "none";
            }
        });

        // tampilkan wilayah jika ada sekolah yg cocok
        wilayahItem.style.display = adaYangCocok ? "" : "none";
    });
}

function toggleDaerah(id) {
    const subMenu = document.getElementById(id);
    const icon = document.getElementById("icon-" + id); // ID harus match

    const isVisible = subMenu.style.display === "block";

    subMenu.style.display = isVisible ? "none" : "block";
    icon.classList.toggle("fa-angle-right");
    icon.classList.toggle("fa-angle-down");
}


function slugify(str) {
    return str.toString().toLowerCase().trim()
        .replace(/[\s\W-]+/g, '-')
        .replace(/^-+|-+$/g, '');
}

function toggleCCTV(id, checkbox) {
    console.log('toggleCCTV called for:', id, 'checked:', checkbox.checked);
    const container = document.getElementById('cctv-container');
    const existing = document.getElementById('cctv-' + id);
    

    if (checkbox.checked) {
        if (!existing) {
            const item = cctvData.find(item =>
                slugify(item.namaSekolah + '-' + item.namaTitik) === id
            );
            if (!item) {
                console.warn("CCTV data tidak ditemukan untuk id:", id);
                return; // Stop di sini jika tidak ditemukan
            }
            console.log('Found item:', item);
            if (item) {
                console.log('iframe src:', item.link);
                const kata = item.namaTitik.split(' ');
                const singkatan = kata.length > 3
                    ? kata.map(k => k[0].toUpperCase()).join('')
                    : item.namaTitik;

                const col = document.createElement('div');
                col.className = 'col-md-3 col-sm-6 col-xs-12 cctv-view';
                col.id = 'cctv-' + id;
                col.innerHTML = `
                    <div class="card" style="margin-bottom: 5px; padding: 10px; width: 100%; max-height: 285px;">
                        <a style="font-size: 12pt; font-weight: bold;" class="card-title text-center mb-1">
                            ${item.namaSekolah}
                        </a>
                        <a style="font-size: 10pt; margin-top: -4px;" class="card-title text-center mb-3">
                            ${singkatan}
                        </a>
                        <div class="iframe-container" style="margin: -10px 10px 10px 10px;">
                            <iframe loading="lazy" src="${item.link}" data-src="${item.link}" frameborder="0" allowfullscreen></iframe>
                            </div>
                    </div>
                `;
                container.appendChild(col);
            }
        } else {
            existing.style.display = 'block';
            console.warn('No matching CCTV data found for ID:', id);
        }
    } else {
        if (existing) existing.style.display = 'none';
    }
}


function toggleIcon(event, namaSekolah) {
    event.stopPropagation();
    event.preventDefault();

    const icon = event.target;
    const cctvToShow = document.querySelectorAll(
        `.cctv-view[data-sekolah="${namaSekolah}"]`
    );
    const checkboxes = document.querySelectorAll(
        `input[data-sekolah="${namaSekolah}"]`
    );

    let activeSchools = JSON.parse(localStorage.getItem("activeSchools")) || [];

    // Toggle visibility berdasarkan status ikon
    if (icon.classList.contains("fa-eye")) {
        // Tampilkan CCTV untuk sekolah yang dipilih
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");

        cctvToShow.forEach((cctv) => {
            cctv.style.display = "block";
            const iframe = cctv.querySelector("iframe");
            if (iframe) {
                iframe.src = iframe.getAttribute("data-src");
            }
        });

        // Tambahkan sekolah ke daftar aktif jika belum ada
        if (!activeSchools.includes(namaSekolah)) {
            activeSchools.push(namaSekolah);
        }

        // Centang semua checkbox yang terkait dengan sekolah yang dipilih dan tampilkan CCTV-nya
        checkboxes.forEach((checkbox) => {
            checkbox.checked = true;
            const cctvId = checkbox.id.replace("checkbox-", "");
            toggleCCTV(cctvId, checkbox);
        });
    } else {
        // Sembunyikan CCTV untuk sekolah yang dipilih
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");

        cctvToShow.forEach((cctv) => {
            cctv.style.display = "none";
        });

        // Hapus sekolah dari daftar aktif
        activeSchools = activeSchools.filter(
            (school) => school !== namaSekolah
        );

        // Hapus centang pada semua checkbox yang terkait dengan sekolah yang dipilih dan sembunyikan CCTV-nya
        checkboxes.forEach((checkbox) => {
            checkbox.checked = false;
            const cctvId = checkbox.id.replace("checkbox-", "");
            toggleCCTV(cctvId, checkbox);
        });
    }

    // Simpan atau hapus daftar sekolah aktif dari localStorage
    if (activeSchools.length === 0) {
        localStorage.removeItem("activeSchools");
    } else {
        localStorage.setItem("activeSchools", JSON.stringify(activeSchools));
    }
}

window.onload = function () {
    const stored = localStorage.getItem("activeCCTVs");
    if (stored) {
        const cctvList = JSON.parse(stored);
        cctvList.forEach((id) => {
            const checkbox = document.querySelector(`#checkbox-${id}`);
            if (checkbox) {
                checkbox.checked = true;
                toggleCCTV(id, checkbox);
            }
        });
    }
};

function toggleSidebar() {
    const sidebar = document.querySelector(".side-bar");
    const pageCard = document.querySelector("#pagecard");
    const btnSidebar = document.querySelector(".btn-sidebar"); // Ambil tombol
    const btnMobile = document.querySelector(".btn-mobile"); // Ambil tombol

    sidebar.classList.toggle("active");
    pageCard.classList.toggle("col-md-9");
    pageCard.classList.toggle("col-md-12");

    // Sembunyikan/tampilkan tombol berdasarkan status sidebar
    if (sidebar.classList.contains("active")) {
        btnSidebar.style.display = "none";
        btnMobile.style.display = "none";
    } else {
        btnSidebar.style.display = "block";
        btnMobile.style.display = "block"; // Sesuaikan dengan kebutuhan tampilan mobile
    }
}

// Automatically hide sidebar on mobile when clicking outside
document.addEventListener("click", function (event) {
    const sidebar = document.querySelector(".side-bar");
    const toggleButton = document.querySelector(".btn-sidebar");
    const btnMobile = document.querySelector(".btn-mobile");
    const pageCard = document.querySelector("#pagecard");

    const isClickInside =
        sidebar.contains(event.target) ||
        toggleButton.contains(event.target) ||
        btnMobile.contains(event.target);

    if (!isClickInside && window.innerWidth <= 767.98) {
        sidebar.classList.remove("active");
        pageCard.classList.add("col-md-12");
        pageCard.classList.remove("col-md-9");
        toggleButton.style.display = "block";
        btnMobile.style.display = "block"; // Pastikan tombol mobile tetap terlihat
    }
});

// Mencegah label memicu fungsi toggleCCTV
document.querySelectorAll(".form-check-label").forEach((label) => {
    label.addEventListener("click", function (event) {
        event.preventDefault();
        const checkbox = document.querySelector(
            "#" + label.getAttribute("for")
        );
        checkbox.checked = !checkbox.checked;

        const id = checkbox.id.replace("checkbox-", "");
        toggleCCTV(id, checkbox);
    });
});

function escapeSelector(sel) {
    return CSS.escape ? CSS.escape(sel) : sel.replace(/[ !"#$%&'()*+,.\/:;<=>?@[\\\]^`{|}~]/g, '\\$&');
}
// Fungsi untuk menyembunyikan semua CCTV
function hideAllCCTV() {
    // Hentikan semua streaming dan sembunyikan CCTV
    document.querySelectorAll(".cctv-view").forEach((element) => {
        const iframe = element.querySelector("iframe");
        if (iframe) iframe.src = "";
        element.style.display = "none";
    });

    // Reset UI
    document.querySelectorAll(".icon-toggle.fa-eye-slash").forEach((icon) => {
        icon.classList.replace("fa-eye-slash", "fa-eye");
    });

    // Reset semua checkbox dan hapus statusnya dari localStorage
    document.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
        checkbox.checked = false;
        localStorage.removeItem(checkbox.id); // Hapus status per checkbox
    });

    // Reset dropdown
    const dropdown = document.getElementById("school-dropdown");
    if (dropdown) dropdown.value = "";

    // Hapus SEMUA data terkait CCTV dari localStorage
    localStorage.removeItem("activeSchools");
    localStorage.removeItem("activeCCTVs");
    localStorage.removeItem("selectedSchool");

    // Hapus hash URL
    window.location.hash = "";
}

function removeCCTVFromHash(id) {
    const currentHash = window.location.hash.replace("#", "");
    const cctvList = currentHash ? decodeHash(currentHash).split(",") : [];
    const updatedList = cctvList.filter((cctv) => cctv !== id);
    window.location.hash = encodeHash(updatedList.join(",")); // Update URL hash dengan hash yang di-encode
}

// Ambil pilihan terakhir dari localStorage saat halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
    loadActiveSchoolsFromLocalStorage();


    // 1. Pulihkan status checkbox dari localStorage
    document
        .querySelectorAll('input[type="checkbox"][id^="checkbox-"]')
        .forEach((checkbox) => {
            const savedState = localStorage.getItem(checkbox.id);
            if (savedState !== null) {
                checkbox.checked = savedState === "true";
                const containerId = checkbox.id.replace("checkbox-", "");
                toggleCCTV(containerId, checkbox);
            }
        });

    // 2. Restore dropdown sekolah
    const selectedSchool = localStorage.getItem("selectedSchool");
    if (selectedSchool) {
        document.getElementById("school-dropdown").value = selectedSchool;
        filterCCTVBySchool(selectedSchool);
    }
});

function loadActiveSchoolsFromLocalStorage() {
    const activeSchools =
        JSON.parse(localStorage.getItem("activeSchools")) || [];
    setTimeout(() => {
        activeSchools.forEach((namaSekolah) => {
            const cctvToShow = document.querySelectorAll(
                `.cctv-view[data-sekolah="${namaSekolah}"]`
            );

            cctvToShow.forEach((cctv) => {
                cctv.style.display = "block";
                const iframe = cctv.querySelector("iframe");
                if (iframe) {
                    iframe.src = iframe.getAttribute("data-src");
                }
            });

            const icon = document.querySelector(
                `.icon-toggle[onclick*="${escapeSelector(namaSekolah)}"]`
            );

            if (icon) {
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }

            const checkboxes = document.querySelectorAll(
                `input[data-sekolah="${namaSekolah}"]`
            );
            checkboxes.forEach((checkbox) => {
                checkbox.checked = true;
                toggleCCTV(checkbox.id.replace("checkbox-", ""), checkbox);
            });
        });
    }, 300); // Delay 300ms untuk memastikan semua checkbox udah ada
}

