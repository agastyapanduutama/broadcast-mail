<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_login/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['admin/login/aksi'] = 'C_login/aksi';
$route['admin/login'] = 'C_login/login';
$route['admin/login/keluar'] = 'C_login/logout';
$route['admin/dashboard'] = 'C_home/dashboard';



//anggota
$route['admin/anggota'] = 'admin/C_anggota/list';
$route['admin/anggota/data'] = 'admin/C_anggota/data/$1';
$route['admin/anggota/getPangkat'] = 'admin/C_anggota/getPangkat';
$route['admin/anggota/getJabatan'] = 'admin/C_anggota/getJabatan';
$route['admin/anggota/getKategori'] = 'admin/C_anggota/getKategori';
$route['admin/anggota/get/(:any)'] = 'admin/C_anggota/get/$1';
$route['admin/anggota/insert'] = 'admin/C_anggota/insert';
$route['admin/anggota/update'] = 'admin/C_anggota/update';
$route['admin/anggota/update/anggota/(:any)'] = 'admin/C_anggota/updateanggota/$1';
$route['admin/anggota/delete/(:any)'] = 'admin/C_anggota/delete/$1';
$route['admin/anggota/set/(:any)/(:any)'] = 'admin/C_anggota/set/$1/$2';

//jabatan
$route['admin/jabatan'] = 'admin/C_jabatan/list';
$route['admin/jabatan/data'] = 'admin/C_jabatan/data/$1';
$route['admin/jabatan/getjabatan'] = 'admin/C_jabatan/getjabatan';
$route['admin/jabatan/get/(:any)'] = 'admin/C_jabatan/get/$1';
$route['admin/jabatan/insert'] = 'admin/C_jabatan/insert';
$route['admin/jabatan/update'] = 'admin/C_jabatan/update';
$route['admin/jabatan/update/jabatan/(:any)'] = 'admin/C_jabatan/updatejabatan/$1';
$route['admin/jabatan/delete/(:any)'] = 'admin/C_jabatan/delete/$1';
$route['admin/jabatan/set/(:any)/(:any)'] = 'admin/C_jabatan/set/$1/$2';

//pangkat
$route['admin/pangkat'] = 'admin/C_pangkat/list';
$route['admin/pangkat/data'] = 'admin/C_pangkat/data/$1';
$route['admin/pangkat/getpangkat'] = 'admin/C_pangkat/getpangkat';
$route['admin/pangkat/get/(:any)'] = 'admin/C_pangkat/get/$1';
$route['admin/pangkat/insert'] = 'admin/C_pangkat/insert';
$route['admin/pangkat/update'] = 'admin/C_pangkat/update';
$route['admin/pangkat/update/pangkat/(:any)'] = 'admin/C_pangkat/updatepangkat/$1';
$route['admin/pangkat/delete/(:any)'] = 'admin/C_pangkat/delete/$1';
$route['admin/pangkat/set/(:any)/(:any)'] = 'admin/C_pangkat/set/$1/$2';

//kategori
$route['admin/kategori'] = 'admin/C_kategori/list';
$route['admin/kategori/data'] = 'admin/C_kategori/data/$1';
$route['admin/kategori/getkategori'] = 'admin/C_kategori/getkategori';
$route['admin/kategori/get/(:any)'] = 'admin/C_kategori/get/$1';
$route['admin/kategori/insert'] = 'admin/C_kategori/insert';
$route['admin/kategori/update'] = 'admin/C_kategori/update';
$route['admin/kategori/update/kategori/(:any)'] = 'admin/C_kategori/updatekategori/$1';
$route['admin/kategori/delete/(:any)'] = 'admin/C_kategori/delete/$1';
$route['admin/kategori/set/(:any)/(:any)'] = 'admin/C_kategori/set/$1/$2';

//user
$route['admin/user'] = 'admin/C_user/list';
$route['admin/user/data'] = 'admin/C_user/data/$1';
$route['admin/user/getuser'] = 'admin/C_user/getuser';
$route['admin/user/get/(:any)'] = 'admin/C_user/get/$1';
$route['admin/user/insert'] = 'admin/C_user/insert';
$route['admin/user/update'] = 'admin/C_user/update';
$route['admin/user/update/user/(:any)'] = 'admin/C_user/updateuser/$1';
$route['admin/user/delete/(:any)'] = 'admin/C_user/delete/$1';
$route['admin/user/set/(:any)/(:any)'] = 'admin/C_user/set/$1/$2';


//konfigurasi
$route['admin/konfigurasi'] = 'admin/C_konfigurasi/list';
$route['admin/konfigurasi/data'] = 'admin/C_konfigurasi/data/$1';
$route['admin/konfigurasi/getkonfigurasi'] = 'admin/C_konfigurasi/getkonfigurasi';
$route['admin/konfigurasi/get/(:any)'] = 'admin/C_konfigurasi/get/$1';
$route['admin/konfigurasi/insert'] = 'admin/C_konfigurasi/insert';
$route['admin/konfigurasi/update'] = 'admin/C_konfigurasi/update';
$route['admin/konfigurasi/update/konfigurasi/(:any)'] = 'admin/C_konfigurasi/updatekonfigurasi/$1';
$route['admin/konfigurasi/delete/(:any)'] = 'admin/C_konfigurasi/delete/$1';
$route['admin/konfigurasi/set/(:any)/(:any)'] = 'admin/C_konfigurasi/set/$1/$2';



//mail
$route['admin/mail'] = 'admin/C_mail';
$route['admin/mail/pilih'] = 'admin/C_mail/pilihkategori';

$route['admin/mail/kirim'] = 'admin/C_mail/sendMail';
$route['admin/mail/riwayat'] = 'admin/C_mail/riwayatMail';
$route['admin/mail/riwayat/data'] = 'admin/C_mail/dataRiwayat';
$route['admin/mail/riwayat/detail/(:any)'] = 'admin/C_mail/detailRiwayat/$1';
$route['admin/mail/riwayat/detail/data/(:any)'] = 'admin/C_mail/dataDetailRiwayat/$1';

$route['admin/mail/test'] = 'admin/C_mail/Testing';