<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Halaman extends BaseController
{
    protected $MahasiswaModel;
    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
    }
    public function index()
    {
        $mhs = $this->MahasiswaModel->findAll();
        $data = [
            'title' => 'Home',
            'mahasiswa' => $mhs
        ];
        return view('home', $data);
    }

    public function pendaftaran()
    {
        $data = [
            'title' => 'Form Pendaftaran'
        ];
        return view('pendaftaran', $data);
    }

    public function save()
    {
        // mengambil gambar
        $filefoto = $this->request->getFile('foto_mahasiswa');
        $filektp = $this->request->getFile('foto_ktp');
        // kondisi
        if ($filefoto->getError() == 4) {
            $namaFoto = 'default.jpg';
        } else {
            $namaFoto = $filefoto->getName();
            $filefoto->move('img/foto');
        }

        if ($filektp->getError() == 4) {
            $namaKtp = 'default.jpg';
        } else {
            $namaKtp = $filektp->getName();
            $filektp->move('img/ktp');
        }

        $this->MahasiswaModel->save([
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'foto_mahasiswa' => $namaFoto,
            'foto_ktp' => $namaKtp
        ]);
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $this->MahasiswaModel->delete($id);
        return redirect()->to('/');
    }

    public function edit($id)
    {
        $mhs = $this->MahasiswaModel->find($id);
        // dd($mhs);
        $data = [
            'title' => 'Form Edit',
            'mhs' => $mhs
        ];
        return view('edit', $data);
    }

    public function update($id)
    {
        // mengambil gambar
        $filefoto = $this->request->getFile('foto_mahasiswa');
        $filektp = $this->request->getFile('foto_ktp');
        $fotoLama = $this->request->getVar('foto_mahasiswa_lama');
        $ktpLama = $this->request->getVar('foto_ktp_lama');
        // kondisi
        if ($filefoto->getError() == 4) {
            $namaFoto = $fotoLama;
        } else {
            $namaFoto = $filefoto->getName();
            $filefoto->move('img/foto');
            unlink('img/foto/' . $fotoLama);
        }

        if ($filektp->getError() == 4) {
            $namaKtp = $ktpLama;
        } else {
            $namaKtp = $filektp->getName();
            $filektp->move('img/ktp');
            unlink('img/ktp/' . $ktpLama);
        }

        $this->MahasiswaModel->save([
            'id' => $id,
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'foto_mahasiswa' => $namaFoto,
            'foto_ktp' => $namaKtp
        ]);
        return redirect()->to('/');
    }
}
