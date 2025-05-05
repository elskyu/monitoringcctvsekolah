<!-- Modal Add/Edit -->
<div class="modal fade" id="cctvsekolahModal" tabindex="-1" aria-labelledby="cctvsekolahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cctvsekolahModalLabel">Tambah CCTV Sekolah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="cctvForm" method="POST">
                    @csrf
                    <input type="hidden" id="idSekolah">
                    <div class="mb-3">
                        <label for="namaWilayah" class="form-label">Nama Wilayah</label>
                        <input type="text" class="form-control" id="namaWilayah" name="namaWilayah" required>
                    </div>
                    <div class="mb-3">
                        <label for="namaTitik" class="form-label">Titik Wilayah</label>
                        <input type="text" class="form-control" id="namaTitik" name="namaTitik" required>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control" id="link" name="link" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>