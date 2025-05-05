// public/js/sekolah.js

let sekolahData = [];
let filteredData = [];
let currentPage = 1;
const itemsPerPage = 10;

// 1. Ambil data dari API
function loadSekolahData() {
  fetch('/api/cctvsekolah', { headers: { 'Accept': 'application/json' } })
    .then(res => res.json())
    .then(json => {
      if (!json.success) {
        return Swal.fire('Error', json.message, 'error');
      }
      sekolahData = json.data;
      filteredData = sekolahData;    // awalnya filter = semua data
      currentPage = 1;
      renderTable();
    })
    .catch(err => {
      console.error(err);
      Swal.fire('Error', 'Gagal memuat data.', 'error');
    });
}

function groupSekolahData(data) {
  const grouped = {};

  data.forEach(item => {
    const key = `${item.namaWilayah}||${item.namaSekolah}`;
    if (!grouped[key]) {
      grouped[key] = {
        namaWilayah: item.namaWilayah,
        namaSekolah: item.namaSekolah,
        titik: []
      };
    }
    grouped[key].titik.push(item);
  });

  return Object.values(grouped);
}

// 2. Render tabel berdasarkan filteredData & paging
function renderTable() {
  const tbody = document.getElementById('sekolah-tbody');
  tbody.innerHTML = '';

  const groupedData = groupSekolahData(filteredData);

  // paging (berdasarkan group, bukan item per titik)
  const start = (currentPage - 1) * itemsPerPage;
  const pageData = groupedData.slice(start, start + itemsPerPage);

  pageData.forEach(group => {
    const rowspan = group.titik.length;
    group.titik.forEach((item, index) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        ${index === 0 ? `<td class="text-center" rowspan="${rowspan}">${group.namaWilayah}</td>` : ''}
        ${index === 0 ? `<td class="text-center" rowspan="${rowspan}">${group.namaSekolah}</td>` : ''}
        <td class="text-center">${item.namaTitik}</td>
        <td class="text-center">
          <button class="btn btn-sm btn-primary" onclick='openEditModal(${JSON.stringify(item)})'>Edit</button>
          <button class="btn btn-sm btn-danger" onclick="deleteSekolah(${item.id})">Delete</button>
        </td>
      `;
      tbody.appendChild(tr);
    });
  });

  renderPagination(groupedData.length);
}


// 3. Render tombol pagination
function renderPagination(totalItems = null) {
  const totalPages = Math.ceil((totalItems ?? filteredData.length) / itemsPerPage);
  document.querySelector('button[onclick="prevPage()"]').disabled = currentPage === 1;
  document.querySelector('button[onclick="nextPage()"]').disabled = currentPage === totalPages;
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
  const q = document.getElementById('searchInput').value.trim().toLowerCase();
  filteredData = sekolahData.filter(item =>
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
      title: 'Yakin ingin menghapus?',
      text: 'Data yang dihapus tidak bisa dikembalikan!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        fetch(`/api/cctvsekolah/${id}`, {
          method: 'DELETE',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken
          }
        })
          .then(r => r.json())
          .then(res => {
            if (res.success) {
              Swal.fire('Dihapus', res.message, 'success');
              loadSekolahData();
            } else {
              Swal.fire('Error', res.message, 'error');
            }
          })
          .catch(err => {
            console.error(err);
            Swal.fire('Error', 'Gagal menghapus.', 'error');
          });
      }
    });
  }
  

// 7. Open modal edit/ add (contoh)
function openAddModal() {
  $('#modalForm')[0].reset();
  $('#modalForm').attr('action', '/api/cctvsekolah');
  $('#modalForm').attr('method', 'POST');
  $('#cctvsekolahModalLabel').text('Tambah CCTV Sekolah');
  $('#saveBtn').text('Save');
  new bootstrap.Modal($('#cctvsekolahModal')).show();
}
function openEditModal(item) {
    $('#idSekolah').val(item.id);
    $('#namaWilayah').val(item.namaWilayah);
    $('#namaSekolah').val(item.namaSekolah);
    $('#namaTitik').val(item.namaTitik);
    $('#link').val(item.link);

  $('#modalForm').attr('action', `/api/cctvsekolah/${item.id}`);
  $('#modalForm').attr('method', 'PUT');
  $('#cctvsekolahModalLabel').text('Edit CCTV Sekolah');
  $('#saveBtn').text('Update');
  new bootstrap.Modal($('#cctvsekolahModal')).show();
}

// 8. Inisialisasi ketika dokumen siap
document.addEventListener('DOMContentLoaded', loadSekolahData);

// Add dan Edit
document.getElementById('cctvForm').addEventListener('submit', function (e) {
    e.preventDefault();
  
    const id = document.getElementById('idSekolah').value;
    const method = id ? 'PUT' : 'POST';
    const url = id ? `/api/cctvsekolah/${id}` : '/api/cctvsekolah';
  
    const data = {
      namaWilayah: document.getElementById('namaWilayah').value,
      namaSekolah: document.getElementById('namaSekolah').value,
      namaTitik: document.getElementById('namaTitik').value,
      link: document.getElementById('link').value,
    };
  
    fetch(url, {
      method: method,
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': csrfToken
      },
      body: JSON.stringify(data)
    })
      .then(res => res.json())
      .then(res => {
        if (res.success) {
          Swal.fire('Berhasil', res.message, 'success');
          document.getElementById('cctvForm').reset();
          document.getElementById('idSekolah').value = '';
          bootstrap.Modal.getInstance(document.getElementById('cctvsekolahModal')).hide();
          loadSekolahData();
        } else {
          let errorText = '';
          if (res.data && typeof res.data === 'object') {
            for (const key in res.data) {
              errorText += `${key}: ${res.data[key].join(', ')}\n`;
            }
          } else {
            errorText = res.message;
          }
          Swal.fire('Gagal', errorText, 'error');
        }
      })
      .catch(err => {
        console.error(err);
        Swal.fire('Error', 'Terjadi kesalahan saat menyimpan data.', 'error');
      });
  });
  