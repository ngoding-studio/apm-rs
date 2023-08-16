<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Kode;
use App\GetAll;
use App\GetSession;
use App\GetRequest;
use App\Create;
use App\Update;
use App\Delete;
use App\System;

class CApm extends Controller
{

    public function offlinedaftar(Request $request)
    {
        if ($request->norm == null) {
            return System::gagal($data = "Nomor rekam medis tidak boleh kosong");
        }
        $pasien = GetRequest::pasien($request);
        if ($pasien) {
            $request->session()->put('session_norm', $pasien->no_rkm_medis);
            $request->session()->put('session_nama', $pasien->nm_pasien);
            $request->session()->put('session_nohp', $pasien->no_tlp);
            $request->session()->put('session_jk', $pasien->jk);
            session(['berhasil_login' => true]);
            return System::berhasil($data = "Berhasil");
        } else {
            return System::berhasil($data = "Nomor rekam medis salah");
        }
    }
    public function offlineregis(Request $request)
    {
        if ($request->kd_poli == null) {
            return System::gagal($data = "Poliklinik tidak boleh kosong");
        }
        if ($request->nm_poli == null) {
            return System::gagal($data = "Poliklinik tidak boleh kosong");
        }
        if ($request->kd_dokter == null) {
            return System::gagal($data = "Dokter tidak boleh kosong");
        }
        if ($request->nm_dokter == null) {
            return System::gagal($data = "Dokter tidak boleh kosong");
        }
        if ($request->kd_bayar == null) {
            return System::gagal($data = "Jenis bayar tidak boleh kosong");
        }
        if ($request->nm_bayar == null) {
            return System::gagal($data = "Jenis bayar tidak boleh kosong");
        }
        if ($request->tgl_lahir == null) {
            return System::gagal($data = "Tanggal lahir tidak boleh kosong");
        }
        $request->session()->put('session_kd_dokter', $request->kd_dokter);
        $request->session()->put('session_nm_dokter', $request->nm_dokter);
        $request->session()->put('session_kd_poli', $request->kd_poli);
        $request->session()->put('session_nm_poli', $request->nm_poli);
        $request->session()->put('session_kd_bayar', $request->kd_bayar);
        $request->session()->put('session_nm_bayar', $request->nm_bayar);
        $verifikasi = GetSession::verifikasi($request);
        if ($verifikasi) {
            $cek = GetSession::pengaturan($request);
            if ($cek) {
                if($cek->updatedata <= System::tanggal()){
                    return System::update($data = "Update data");
                } else {
                    return $this->registestrasi($request);
                }
            } else {
                Create::createDataUpdate($request);//membuat masa aktif update data untuk pasien offline
                return $this->registestrasi($request);
            }
        } else {
            return System::gagal($data = "Verifikasi salah");
        }
    }

    public function update(Request $request)
    {
        if ($request->kd_poli == null) {
            return System::gagal($data = "Poliklinik tidak boleh kosong");
        }
        if ($request->nm_poli == null) {
            return System::gagal($data = "Poliklinik tidak boleh kosong");
        }
        if ($request->kd_dokter == null) {
            return System::gagal($data = "Dokter tidak boleh kosong");
        }
        if ($request->nm_dokter == null) {
            return System::gagal($data = "Dokter tidak boleh kosong");
        }
        if ($request->kd_bayar == null) {
            return System::gagal($data = "Jenis bayar tidak boleh kosong");
        }
        if ($request->nm_bayar == null) {
            return System::gagal($data = "Jenis bayar tidak boleh kosong");
        }
        if ($request->pekerjaan == null) {
            return System::gagal($data = "Pekerjaan tidak boleh kosong");
        }
        if ($request->notelp == null) {
            return System::gagal($data = "Nomor telp tidak boleh kosong");
        }
        if ($request->alamat == null) {
            return System::gagal($data = "Alamat tidak boleh kosong");
        }
        Update::updatedata($request);
        Update::updatePasien($request);
        return $this->registestrasi($request);

    }

    function registestrasi($request)
    {
        $cekbayar = GetSession::cekbayar($request);
        if ($cekbayar) {
            return System::gagal($data = "Sepertinya ada data yang belum terclosing");
        } else {
            $booking = Kode::noregbooking($request);
            if ($booking) {
                $periksa = GetRequest::noregPeriksa($request, $booking);
                if ($periksa) {
                    $noreg = Kode::noregperiksa($request);
                    return $this->createperiksa($request, $noreg);
                } else {
                    $noreg = $booking;
                    return $this->createperiksa($request, $noreg);
                }
            } else {
                return System::gagal($data = "Booking error");
            }
        }
    }

    function createperiksa($request, $noreg)
    {
        $periksa = Create::periksaOffline($request,$noreg);
        if ($periksa) {
            $request->session()->put('session_no_rawat', $periksa->no_rawat);
            $request->session()->put('session_tgl_registrasi', $periksa->tgl_registrasi);
            $request->session()->put('session_jam_reg', $periksa->jam_reg);
            $request->session()->put('session_umur', $periksa->umurdaftar);
            $request->session()->put('session_status_umur', $periksa->sttsumur);
            $request->session()->put('session_no_reg', $periksa->no_reg);
            $request->session()->put('session_penanggung_jawab', $periksa->p_jawab);
            $request->session()->put('session_tanggal_lengkap', System::tanggalLengkap());
            $data = $request->session()->get('session_no_rawat');
            $qrcode = QrCode::size(80)->generate($data);
            $request->session()->put('session_qrcode', $qrcode);
            return System::berhasil($data = "Registrasi berhasil");
        } else {
            return System::berhasil($data = "Registrasi gagal");
        }
    }

    function createonline($request, $noreg)
    {
        $periksa = Create::periksaOffline($request,$noreg);
        if ($periksa) {
            $request->session()->put('session_no_rawat', $periksa->no_rawat);
            $request->session()->put('session_tgl_registrasi', $periksa->tgl_registrasi);
            $request->session()->put('session_jam_reg', $periksa->jam_reg);
            $request->session()->put('session_umur', $periksa->umurdaftar);
            $request->session()->put('session_status_umur', $periksa->sttsumur);
            $request->session()->put('session_no_reg', $periksa->no_reg);
            $request->session()->put('session_penanggung_jawab', $periksa->p_jawab);
            $request->session()->put('session_tanggal_lengkap', System::tanggalLengkap());
            $data = $request->session()->get('session_no_rawat');
            $qrcode = QrCode::size(80)->generate($data);
            $request->session()->put('session_qrcode', $qrcode);
            return "berhasil";
        } else {
            return "gagal";
        }
    }

    public function listDokter(Request $request)
    {
        return GetRequest::khanzaJadwal($request);
    }
    public function cetak(Request $request)
    {
        return view('apm.cetak');
    }
    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }


    public function onlinedaftar(Request $request)
    {
        if ($request->kodetiket == null) {
            return System::berhasil($data = "Kode tiket tidak boleh kosong");
        }
        $request->session()->put('session_kodetiket', "RSBB-".$request->kodetiket);
        $session = $request->session()->get('session_kodetiket');
        if ($session) {
            $tiket = GetSession::tiket($request);
            if ($tiket) {
                if ($tiket->status == "Belum") {
                    if ($tiket->tanggal_periksa < System::tanggal()) {
                        Delete::tiket($request);
                        return System::gagal($data = "Kode tiket ini sudah expired");
                    } else if ($tiket->tanggal_periksa > System::tanggal()) {
                        return System::gagal($data = "Kode tiket dapat dilakukan pada tanggal ".$tiket->tanggal_periksa);
                    } else {
                        $request->session()->put('session_userid', $tiket->userid);
                        $request->session()->put('session_norm', $tiket->no_rkm_medis);
                        $request->session()->put('session_nama', $tiket->nm_pasien);
                        $request->session()->put('session_kd_dokter', $tiket->kd_dokter);
                        $request->session()->put('session_nm_dokter', $tiket->nm_dokter);
                        $request->session()->put('session_kd_poli', $tiket->kd_poli);
                        $request->session()->put('session_nm_poli', $tiket->nm_poli);
                        $request->session()->put('session_no_reg', $tiket->no_reg);
                        $request->session()->put('session_nm_bayar', $tiket->jenis_pembayaran);
                        if ($tiket->jenis_pembayaran == "BPJS") {
                            $request->session()->put('session_kd_bayar', "BPJ");
                        } else {
                            $request->session()->put('session_kd_bayar', "UMU");
                        }
                        session(['berhasil_login' => true]);
                        return System::berhasil($data = "Barhasil");
                    }
                } else if ($tiket->status == "Terdaftar") {
                    return System::gagal($data = "Kode tiket ini sudah digunakan");
                } else {
                    return System::gagal($data = "Kode tiket ini sudah expired");
                }
            } else {
                return System::gagal($data = "Kode tiket salah");
            }
        } else {
            return System::gagal($data = "Permintaan gagal");
        }
    }
    public function onlineregis(Request $request)
    {
        if ($request->tgl_lahir == null) {
            return System::gagal($data = "Tanggal lahir tidak boleh kosong");
        }
        $verifikasi = GetSession::verifikasi($request);
        if ($verifikasi) {
            $cekbayar = GetSession::cekbayar($request);
            if ($cekbayar) {
                return System::gagal($data = "Sepertinya ada data yang belum terclosing");
            } else {
                $noreg = $request->session()->get('session_no_reg');
                $periksa = $this->createonline($request, $noreg);
                if ($periksa == "berhasil") {
                    Update::tiket($request);
                    $cek = GetSession::pengaturanKartu($request);
                    if ($cek) {
                        if ($cek->updateskrining == null) {
                            $skrining = Create::skrining($request);
                            if ($skrining) {
                                Update::pengaturanKartu($request);
                                return System::berhasil($data = "Registrasi berhasil");
                            } else {
                                return System::gagal($data = "Registrasi gagal");
                            }
                        } else if ($cek->updateskrining <= System::tanggal()) {
                            $skrining = Create::skrining($request);
                            if ($skrining) {
                                Update::pengaturanKartu($request);
                                return System::berhasil($data = "Registrasi berhasil");
                            } else {
                                return System::gagal($data = "Registrasi gagal");
                            }
                        } else {
                            $cek = GetSession::skrining($request);
                            if ($cek) {
                                return System::berhasil($data = "Lanjut");
                            } else {
                                $skrining = Create::skrining($request);
                                if ($skrining) {
                                    Update::pengaturanKartu($request);
                                    return System::berhasil($data = "Registrasi berhasil");
                                } else {
                                    return System::gagal($data = "Registrasi gagal");
                                }
                            }
                        }
                    } else {
                        return System::gagal($data = "Sistem pengaturan error");
                    }
                }
                else {
                    return System::gagal($data = "Registrasi gagal");
                }
            }
        } else {
            return System::gagal($data = "Verifikasi salah");
        }
    }
    public function verifikasicetak(Request $request)
    {
        if ($request->tgl_lahir == null) {
            return System::gagal($data = "Tanggal lahir tidak boleh kosong");
        }
        $verifikasi = GetSession::verifikasi($request);
        if ($verifikasi) {
            return System::berhasil($data = "Verifikasi berhasil");
        } else {
            return System::gagal($data = "Verifikasi salah");
        }
    }
    public function masuk(Request $request)
    {
        if ($request->norm == null) {
            return System::gagal($data = "Nomor rekam medis tidak boleh kosong");
        }
        $pasien = GetRequest::bukti($request);
        if ($pasien) {
            $request->session()->put('session_norm', $pasien->no_rkm_medis);
            $request->session()->put('session_nama', $pasien->nm_pasien);
            $request->session()->put('session_nohp', $pasien->no_tlp);
            $request->session()->put('session_jk', $pasien->jk);
            $request->session()->put('session_nm_dokter', $pasien->nm_dokter);
            $request->session()->put('session_nm_poli', $pasien->nm_poli);
            $request->session()->put('session_no_reg', $pasien->no_reg);
            $request->session()->put('session_no_rawat', $pasien->no_rawat);
            $request->session()->put('session_tgl_registrasi', $pasien->tgl_registrasi);
            $request->session()->put('session_jam_reg', $pasien->jam_reg);
            $request->session()->put('session_umur', $pasien->umurdaftar);
            $request->session()->put('session_status_umur', $pasien->sttsumur);
            $request->session()->put('session_penanggung_jawab', $pasien->p_jawab);
            $request->session()->put('session_tanggal_lengkap', System::tanggalLengkap());
            if ($pasien->kd_pj == "BPJ") {
                $request->session()->put('session_nm_bayar', "BPJS");
            } else {
                $request->session()->put('session_nm_bayar', "UMUM");
            }
            $data = $request->session()->get('session_no_rawat');
            $qrcode = QrCode::size(80)->generate($data);
            $request->session()->put('session_qrcode', $qrcode);
            session(['berhasil_login' => true]);
            return System::berhasil($data = "Cetak berhasil");
        } else {
            return System::berhasil($data = "Nomor rekam medis salah");
        }
    }
}
