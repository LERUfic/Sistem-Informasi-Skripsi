# Pengajuan Skripsi
Aplikasi yang mempermudah mahasiswa dan dosen dalam kegiatan pengajuan Tugas Akhir di departemen Informatika ITS.

Status:
===
- [x] 10 = Pengajuan Oleh Mahasiswa
- [x] 11 = Disetujui Dosen Pembimbing 1
- [x] 12 = Disetujui Dosen Pembimbing 2
- [x] 13 = Disetujui Oleh Semua Dosen Pembimbing
- [x] 14 = Disetujui Oleh Tim RMK
- [x] 15 = Disetujui Oleh Kaprodi
- [x] 16 = Proses Melakukan Seminar
- [x] 110 = Ditolak Dosen Pembimbing 1
- [x] 120 = Ditolak Dosen Pembimbing 2
- [x] 130 = Ditolak Oleh Semua Dosen Pembimbing
- [x] 140 = Ditolak Oleh Tim RMK
- [x] 150 = Ditolak Oleh Kaprodi
- [x] 20 = Pengajuan Jadwal Seminar Proposal Tugas Akhir Oleh Mahasiswa
- [x] 21 = Menyetujui Jadwal Seminar Proposal Tugas Akhir Oleh Dosen Pembimbing 1
- [x] 22 = Menyetujui Jadwal Seminar Proposal Tugas Akhir Oleh Dosen Pembimbing 2
- [x] 23 = Menyetujui Jadwal Seminar Proposal Tugas Akhir Oleh Semua Dosen Pembimbing
- [x] 24 = Menyetujui Hasil Akhir Seminar Proposal Tugas Akhir Oleh Kaprodi
- [x] 30 = Menunggu Sidang Tugas Akhir (otomatis kalau seminar stat 24)
- [x] 31 = Selesai Sidang Tugas Akhir (oleh verifikator rmk)
- [x] 32 = Mahasiswa Dinyatakan Lulus (oleh kaprodi) 

Target:
===
- ~~Kamis selesai ubah status proposal oleh dosen pembimbing~~
- ~~Jumat selesai ubah status proposal rmk dan kaprodi~~
- ~~Sabtu Buat form mahasiswa dan penyetujuan oleh desen pembimbing~~
- ~~Minggu sisanya~~

Alur:
===
Mahasiswa mendaftar -> mahasiswa mengajukan proposal TA -> dosbing 1 dan 2 mengkonfirmasi proposal -> tim rmk mengkonfirmasi proposal -> kaprodi mengkonfirmasi proposal -> mahasiswa melakukan seminar (mahasiswa mengajukan jadwal seminar -> dosbing 1 dan 2 mengkonfirmasi jadwal -> mahasiswa melakukan seminar -> kaprodi menyetujui bahwa mahasiswa sudah melakukan seminar) -> Mahasiswa menunggu sidang tugas akhir -> mahasiswa melakukan sidang ta -> mahasiswa selesai sidang TA -> verifikator rmk menyatakan mahasiswa telah melakukan sidang TA -> kaprodi menyatakan mahasiswa lulus

Tambahan:
===
1. tambah reject
2. kaprodi insert jadwal sidang
3. kaprodi insert nilai