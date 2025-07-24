
<div class="modal-header">
    <h5 class="modal-title">Input Hasil Konsultasi</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="patient-info mb-4">
        <div class="info-row">
            <span class="info-label">Nama Pasien:</span>
            <span>{{ $konsultasi->pasien->nama }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Tanggal Konsultasi:</span>
            <span>{{ $konsultasi->tanggal_konsultasi }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Keluhan:</span>
            <span>{{ $konsultasi->keluhan }}</span>
        </div>
    </div>

    <form id="formInputHasil">
        @csrf
        <input type="hidden" name="konsultasi_id" value="{{ $konsultasi->id }}">
        
        <div class="form-group">
            <label for="hasil_konsultasi">Diagnosa / Hasil Konsultasi</label>
            <textarea name="hasil_konsultasi" id="hasil_konsultasi" class="form-control" required rows="4"></textarea>
        </div>
        
        <div class="form-group">
            <label for="rekomendasi">Rekomendasi Diet / Gizi</label>
            <textarea name="rekomendasi" id="rekomendasi" class="form-control" required rows="4"></textarea>
        </div>
        
        <div class="form-group">
            <label for="catatan_tambahan">Catatan Tambahan</label>
            <textarea name="catatan_tambahan" id="catatan_tambahan" class="form-control" rows="3"></textarea>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    <button type="button" class="btn btn-primary" id="btnSimpanHasil">Simpan</button>
</div>