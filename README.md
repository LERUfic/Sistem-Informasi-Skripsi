FEATURES:

=========================
Create User:
=========================
1. Form:
	- NRP
	- email
	- password
	- nama
	- role (mahasiswa, dosen, baak, rmk, kaprodi)

note:
1 mahasiswa punya 2 dosen pembimbing
1 dosen pembimbing punya banyak mahasiswa

scheme:
	tb_users:
	- id int
	- nrp varchar
	- pass bcrypt
	- role int

	dosbing:
	- nrpmhs varchar
	- nrpdosen varchar
	- rank int

	role:
	- idrole
	- role


=========================
Pengajuan Judul Skripsi:
=========================
1. Form:
	- Judul skripsi
	- RMK
	- Upload proposal

note:
status mahasiswa sudah masukan skripsi dan belum

scheme:
	skripsi:
	- id int
	- nrp varchar
	- judulskripsi varchar
	- rmk varchar
	- fileloc varchar

	status mahasiswa:
	- nrp varchar
