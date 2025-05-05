// public/js/users.js

let UsersData = [];
let filteredData = [];
let currentPage = 1;
const itemsPerPage = 10;

// 1. Ambil data dari API
function loadUsersData() {
  fetch('/api/users', { headers: { 'Accept': 'application/json' } })
    .then(res => res.json())
    .then(json => {
      if (!json.success) {
        return Swal.fire('Error', json.message, 'error');
      }
      UsersData = json.data;
      filteredData = usersData;    // awalnya filter = semua data
      currentPage = 1;
      renderTable();
    })
    .catch(err => {
      console.error(err);
      Swal.fire('Error', 'Gagal memuat data.', 'error');
    });
}

// 2. Render tabel berdasarkan filteredData & paging
function renderTable() {
  const tbody = document.getElementById('users-tbody');
  tbody.innerHTML = '';

  // paging
  const start = (currentPage - 1) * itemsPerPage;
  const pageData = filteredData.slice(start, start + itemsPerPage);

  pageData.forEach(item => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td class="text-center">${item.name}</td>
      <td class="text-center">${item.email}</td>
      <td class="text-center">${item.created_at}</td>
      <td class="text-center">
        <button class="btn btn-sm btn-primary" onclick='openEditModal(${JSON.stringify(item)})'>Edit</button>
        <button class="btn btn-sm btn-danger" onclick="deleteUsers(${item.id})">Delete</button>
      </td>
    `;
    tbody.appendChild(tr);
  });

  renderPagination();
}

// 3. Render tombol pagination
function renderPagination() {
  const totalPages = Math.ceil(filteredData.length / itemsPerPage);
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
function searchUsers() {
  const q = document.getElementById('searchInput').value.trim().toLowerCase();
  filteredData = usersData.filter(item =>
    item.name.toLowerCase().includes(q) ||
    item.email.toLowerCase().includes(q) ||
    item.created_at.toLowerCase().includes(q)
  );
  currentPage = 1;
  renderTable();
}
// Hapus Data
function deleteUsers(id) {
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
        fetch(`/api/users/${id}`, {
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
              loadUsersData();
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
  $('#modalForm').attr('action', '/api/cctvusers');
  $('#modalForm').attr('method', 'POST');
  $('#UsersModalLabel').text('Tambah CCTV users');
  $('#saveBtn').text('Save');
  new bootstrap.Modal($('#UsersModal')).show();
}
function openEditModal(item) {
    $('#idUsers').val(item.id);
    $('#name').val(item.name);
    $('#email').val(item.email);
    $('#password').val('');

    $('#password').prop('required', false); 

  $('#modalForm').attr('action', `/api/users/${item.id}`);
  $('#modalForm').attr('method', 'PUT');
  $('#UsersModalLabel').text('Edit users');
  $('#saveBtn').text('Update');
  new bootstrap.Modal($('#cctvusersModal')).show();
}

// 8. Inisialisasi ketika dokumen siap
document.addEventListener('DOMContentLoaded', loadUsersData);

// Add dan Edit
document.getElementById('cctvForm').addEventListener('submit', function (e) {
    e.preventDefault();
  
    const id = document.getElementById('idusers').value;
    const method = id ? 'PUT' : 'POST';
    const url = id ? `/api/cctvusers/${id}` : '/api/cctvusers';
  
    const data = {
      namaWilayah: document.getElementById('namaWilayah').value,
      namausers: document.getElementById('namausers').value,
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
          document.getElementById('idusers').value = '';
          bootstrap.Modal.getInstance(document.getElementById('cctvusersModal')).hide();
          loadUsersData();
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
  