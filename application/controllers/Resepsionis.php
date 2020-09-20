<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Resepsionis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_app');
        $this->load->model('model_main');
        cek_session_resepsionis();
    }

    function index()
    {

        if ($this->session->level == 3) {
            redirect('resepsionis/pengunjung');
        } else {
            redirect('error404');
        }
    }

    function faq()
    {
        if (!empty($this->session->userdata())) {
            $data['title'] = 'F.A.Q - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['record'] = $this->db->query("SELECT * FROM tb_faq")->result_array();
            $this->template->load('template/template', 'resepsionis/faq/view_faq', $data);
        } else {
            redirect('resepsionis');
        }
    }

    function edit_faq()
    {
        $id = decrypt_url($this->uri->segment(3));

        if (isset($_POST['submit'])) {
            $nama = strip_tags($this->input->post('nama'));
            $email = strip_tags($this->input->post('email'));
            $tanya = strip_tags($this->input->post('tanya'));
            $jawab = strip_tags($this->input->post('jawab'));
            $data = array(
                'nama' => $this->db->escape_str($nama),
                'email' => $this->db->escape_str($email),
                'pertanyaan' => $this->db->escape_str($tanya),
                'jawaban' => $this->db->escape_str($jawab)
            );
            $where = array('id_faq' =>  decrypt_url($this->input->post('id')));
            $this->model_app->update('tb_faq', $data, $where);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Data berhasil diperbaharui</center>
          		</div>');
            redirect('resepsionis/faq');
        } else {
            $data['title'] = 'Ubah F.A.Q - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['record'] = $this->model_app->edit('tb_faq', array('id_faq' => $id))->row_array();
            $this->template->load('template/template', 'resepsionis/faq/view_faq_edit', $data);
        }
    }

    function detail_faq()
    {
        $id = decrypt_url($this->uri->segment(3));
        $data['title'] = 'Detail F.A.Q - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_app->edit('tb_faq', array('id_faq' => $id))->row_array();
        $this->template->load('template/template', 'resepsionis/faq/view_faq_detail', $data);
    }

    function delete_faq($id)
    {
        $where = array('id_faq' => $id);
        $this->model_app->delete('tb_faq', $where);
        echo json_encode(array("status" => TRUE));
    }

    function tambah_faq()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('tanya', 'Tanya', 'required|trim', [
                'required' => 'Pertanyaan wajib diisi'
            ]);
            $this->form_validation->set_rules('jawab', 'Jawab', 'required|trim', [
                'required' => 'Jawaban wajib diisi'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Tambah Faq - Museum Monumen Perjuangan Rakyat Jawa Barat';
                $this->template->load('template/template', 'resepsionis/faq/view_tambah_faq', $data);
            } else {
                $data = [
                    'nama'             => htmlspecialchars($this->input->post('nama', true)),
                    'email'            => htmlspecialchars($this->input->post('email', true)),
                    'pertanyaan'       => htmlspecialchars($this->input->post('tanya', true)),
                    'jawaban'          => htmlspecialchars($this->input->post('jawab', true)),
                ];

                $this->model_app->insert('tb_faq', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success col-sm-12" role="alert">
            <center>Data berhasil ditambahkan</center>
          </div>');
                redirect(base_url('resepsionis/tambah_faq'));
            }
        } else {
            $data['row'] = $this->db->get_where('tb_pengguna', array('id_pengguna' => $this->session->id_pengguna))->row_array();
            $data['title'] = 'Tambah Faq - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $this->template->load('template/template', 'resepsionis/faq/view_tambah_faq', $data);
        }
    }

    function pengunjung()
    {
        if (!empty($this->session->userdata())) {
            $data['title'] = 'Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['kt'] = $this->db->query("SELECT * FROM tb_kategori_pengunjung")->result_array();
            $data['negara'] = $this->db->query("SELECT * FROM tb_negara")->result_array();
            $data['provinsi'] = $this->db->query("SELECT * FROM tb_provinsi")->result_array();
            $data['kota'] = $this->db->query("SELECT * FROM tb_kota")->result_array();
            $data['record'] = $this->db->query("SELECT * FROM tb_pengunjung ORDER BY id_pengunjung DESC")->result_array();
            $this->template->load('template/template', 'resepsionis/pengunjung/view_pengunjung', $data);
        } else {
            redirect('resepsionis', 'refresh');
        }
    }
    function tambah_pengunjung()
    {
        if (isset($_POST['submit'])) {
            $petugas = $this->session->username;
            $data = [
                'tanggal'       => date('Y-m-d'),
                'waktu'         => date('H:i:s'),
                'kategori'      => htmlspecialchars($this->input->post('kategori', true)),
                'jumlah'        => htmlspecialchars($this->input->post('jumlah', true)),
                'nama'          => htmlspecialchars($this->input->post('nama', true)),
                'id_card'       => htmlspecialchars($this->input->post('id_card', true)),
                'no_id'         => htmlspecialchars($this->input->post('no_id', true)),
                'negara'        => htmlspecialchars($this->input->post('negara', true)),
                'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),
                'kota'          => htmlspecialchars($this->input->post('kota', true)),
                'alamat'        => htmlspecialchars($this->input->post('alamat', true)),
                'kode_pos'      => htmlspecialchars($this->input->post('kode_pos', true)),
                'petugas'       => $petugas
            ];

            $this->model_app->insert('tb_pengunjung', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success col-sm-12" role="alert">
            <center>Data pengunjung baru berhasil ditambahkan</center>
          </div>');
            redirect('resepsionis/pengunjung', 'refresh');
        } else {
            $data['title'] = 'Tambah Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['row'] = $this->db->get_where('tb_pengguna', array('id_pengguna' => $this->session->id_pengguna))->row_array();
            $this->template->load('template/template', 'resepsionis/pengunjung/view_tambah_pengunjung', $data);
        }
    }

    function edit_pengunjung()
    {
        $id = decrypt_url($this->uri->segment(3));
        if (isset($_POST['submit'])) {
            $petugas = $this->session->username;
            $data = [
                'tanggal'       => date('Y-m-d'),
                'waktu'         => date('H:i:s'),
                'kategori'      => htmlspecialchars($this->input->post('kategori', true)),
                'jumlah'        => htmlspecialchars($this->input->post('jumlah', true)),
                'nama'          => htmlspecialchars($this->input->post('nama', true)),
                'id_card'       => htmlspecialchars($this->input->post('id_card', true)),
                'no_id'         => htmlspecialchars($this->input->post('no_id', true)),
                'negara'        => htmlspecialchars($this->input->post('negara', true)),
                'provinsi'      => htmlspecialchars($this->input->post('provinsi', true)),
                'kota'          => htmlspecialchars($this->input->post('kota', true)),
                'alamat'        => htmlspecialchars($this->input->post('alamat', true)),
                'kode_pos'      => htmlspecialchars($this->input->post('kode_pos', true)),
                'petugas'       => $petugas
            ];

            $where = array('id_pengunjung' =>  $this->input->post('id'));
            $this->model_app->update('tb_pengunjung', $data, $where);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Data berhasil diperbaharui</center>
          		</div>');
            redirect('resepsionis/pengunjung', 'refresh');
        } else {
            $data['title'] = 'Edit Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['record'] = $this->model_app->view_ordering('tb_kategori_pengunjung', 'id_kategori_pengunjung', 'DESC');
            $data['negara'] = $this->model_app->view_ordering('tb_negara', 'id_negara',  'DESC');
            $data['provinsi'] = $this->db->query("SELECT * FROM tb_provinsi")->result_array();
            $data['kota'] = $this->db->query("SELECT * FROM tb_kota")->result_array();
            $data['rows'] = $this->model_app->edit('tb_pengunjung', array('id_pengunjung' => $id))->row_array();
            $this->template->load('template/template', 'resepsionis/pengunjung/view_edit_pengunjung', $data);
        }
    }

    function detail_pengunjung()
    {
        $id = decrypt_url($this->uri->segment(3));
        $data['title'] = 'Detail Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['kt'] = $this->db->query("SELECT * FROM tb_kategori_pengunjung")->result_array();
        $data['negara'] = $this->db->query("SELECT * FROM tb_negara")->result_array();
        $data['provinsi'] = $this->db->query("SELECT * FROM tb_provinsi")->result_array();
        $data['kota'] = $this->db->query("SELECT * FROM tb_kota")->result_array();
        $data['rows'] = $this->model_app->edit('tb_pengunjung', array('id_pengunjung' => $id))->row_array();
        $this->template->load('template/template', 'resepsionis/pengunjung/view_detail_pengunjung', $data);
    }

    function delete_pengunjung($id)
    {
        $where = array('id_pengunjung' => $id);
        $this->model_app->delete('tb_pengunjung', $where);
        echo json_encode(array("status" => TRUE));
    }

    function reservasi()
    {
        if (!empty($this->session->userdata())) {
            $data['title'] = 'Reservasi Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
            // $data['record'] = $this->db->query("SELECT * FROM `tb_reservasi` WHERE status= 1 GROUP BY id_reservasi ASC ")->result_array();
            $data['record'] = $this->db->get_where('tb_reservasi', 'status = 1')->result_array();
            $data['identitas'] = $this->db->get_where('tb_web_identitas', 'id_identitas=1')->row_array();
            $this->template->load('template/template', 'resepsionis/reservasi/view_reservasi', $data);
        } else {
            redirect('resepsionis');
        }
    }

    function reservasi_diterima()
    {
        if (!empty($this->session->userdata())) {
            $data['title'] = 'Reservasi Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
            // $data['record'] = $this->db->query("SELECT * FROM tb_reservasi WHERE status='2' OR status='4' GROUP BY id_reservasi ASC")->result_array();
            $data['record'] = $this->db->get_where('tb_reservasi', 'status = 2')->result_array();
            $this->template->load('template/template', 'resepsionis/reservasi/view_reservasi_diterima', $data);
        } else {
            redirect('resepsionis');
        }
    }
    function reservasi_ditolak()
    {
        if (!empty($this->session->userdata())) {
            $data['title'] = 'Reservasi Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['record'] = $this->db->get_where('tb_reservasi', 'status = 3')->result_array();
            $data['identitas'] = $this->db->get_where('tb_web_identitas', 'id_identitas=1')->row_array();
            $this->template->load('template/template', 'resepsionis/reservasi/view_reservasi_ditolak', $data);
        } else {
            redirect('resepsionis');
        }
    }

    function reservasi_kirim()
    {
        if (isset($_POST['submit'])) {
            $petugas = $this->session->username;
            $id_reservasi = htmlspecialchars($this->input->post('id'));
            $status = htmlspecialchars($this->input->post('status'));
            if ($status != 4) {
                $data = [
                    'tanggal'       => date('Y-m-d'),
                    'waktu'         => date('H:i:s'),
                    'kategori'      => htmlspecialchars($this->input->post('kategori', true)),
                    'jumlah'        => htmlspecialchars($this->input->post('jumlah', true)),
                    'nama'          => htmlspecialchars($this->input->post('nama', true)),
                    'id_card'       => htmlspecialchars($this->input->post('id_card', true)),
                    'no_id'         => htmlspecialchars($this->input->post('no_id', true)),
                    'negara'        => htmlspecialchars($this->input->post('negara', true)),
                    'provinsi'      => htmlspecialchars($this->input->post('provinsi', true)),
                    'kota'          => htmlspecialchars($this->input->post('kota', true)),
                    'alamat'        => htmlspecialchars($this->input->post('alamat', true)),
                    'kode_pos'      => htmlspecialchars($this->input->post('kode_pos', true)),
                    'petugas'       => $petugas
                ];
                $reservasi = [
                    'status'    => 4
                ];
                $this->model_app->insert('tb_pengunjung', $data);

                $where = array('id_reservasi' =>  $id_reservasi);
                $this->model_app->update('tb_reservasi', $reservasi, $where);

                $this->model_app->delete('tb_jadwal', $where);
                $this->session->set_flashdata('message', '<div class="alert alert-success col-sm-12" role="alert">
                <center>Data pengunjung baru berhasil ditambahkan</center>
                </div>');
                redirect('resepsionis/pengunjung', 'refresh');
            } else {
                $this->session->set_flashdata('message', '
            <div class="alert alert-warning col-sm-12" role="alert">
            <center>Opps! Reservasi sudah selesai</center>
              </div>');
                redirect('resepsionis/reservasi_diterima', 'refresh');
            }
        }
    }

    function edit_reservasi()
    {
        $id = decrypt_url($this->uri->segment(3));
        if (isset($_POST['submit'])) {

            $id = htmlspecialchars($this->input->post('id'));
            $tanggal    = htmlspecialchars($this->input->post('tanggal'));
            $waktu      = htmlspecialchars($this->input->post('waktu'));
            $jumlah      = htmlspecialchars($this->input->post('jumlah'));

            $data = [
                'tanggal'   => $tanggal,
                'waktu'     => $waktu,
                'jumlah'    => $jumlah
            ];
            $where = array('id_reservasi' =>  $id);
            $this->model_app->update('tb_reservasi', $data, $where);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Data berhasil diperbaharui</center>
          		</div>');
            redirect('resepsionis/reservasi_diterima', 'refresh');
        } else {
            $data['title'] = 'Edit Reservasi - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['rows'] = $this->model_app->edit('tb_reservasi', array('id_reservasi' => $id))->row_array();
            $this->template->load('template/template', 'resepsionis/reservasi/view_edit_reservasi', $data);
        }
    }

    function edit_reservasi_ditolak()
    {
        $id = decrypt_url($this->uri->segment(3));
        if (isset($_POST['submit'])) {

            $id = htmlspecialchars($this->input->post('id'));
            $tanggal    = htmlspecialchars($this->input->post('tanggal'));
            $waktu      = htmlspecialchars($this->input->post('waktu'));
            $jumlah      = htmlspecialchars($this->input->post('jumlah'));

            $data = [
                'tanggal'   => $tanggal,
                'waktu'     => $waktu,
                'jumlah'    => $jumlah
            ];
            $where = array('id_reservasi' =>  $id);
            $this->model_app->update('tb_reservasi', $data, $where);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Data berhasil diperbaharui</center>
          		</div>');
            redirect('resepsionis/reservasi_ditolak', 'refresh');
        } else {
            $data['title'] = 'Edit Reservasi - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['rows'] = $this->model_app->edit('tb_reservasi', array('id_reservasi' => $id))->row_array();
            $this->template->load('template/template', 'resepsionis/reservasi/view_edit_reservasi_ditolak', $data);
        }
    }

    function detail_reservasi()
    {
        $id = decrypt_url($this->uri->segment(3));
        $data['title'] = 'Detail Reservasi - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['rows'] = $this->model_app->edit('tb_reservasi', array('id_reservasi' => $id))->row_array();
        $this->template->load('template/template', 'resepsionis/reservasi/view_detail_reservasi', $data);
    }
    function delete_reservasi($id)
    {
        $query = $this->db->get_where('tb_reservasi', array('id_reservasi' => $id));
        $row = $query->row();
        $gambar = $row->foto;
        $path = "assets/images/reservasi/";
        unlink($path . $gambar);

        $this->db->query("DELETE FROM tb_reservasi where id_reservasi='$id'");

        echo json_encode(array("status" => TRUE));
    }

    function tolak_reservasi()
    {
        if (isset($_POST['submit'])) {
            $id = htmlspecialchars($this->input->post('id'));
            $tanggal = htmlspecialchars($this->input->post('tanggal'));
            $waktu = htmlspecialchars($this->input->post('waktu'));
            $nama = htmlspecialchars($this->input->post('nama'));
            $email = htmlspecialchars($this->input->post('email'));
            $no_telp = htmlspecialchars($this->input->post('no_telp'));
            $status = htmlspecialchars($this->input->post('status'));
            $kontak = htmlspecialchars($this->input->post('kontak'));
            $ket = htmlspecialchars($this->input->post('keterangan'));
            if ($status != 3) {
                $data = [
                    'status'     => 3,
                    'keterangan' => $ket
                ];
                $where = array('id_reservasi' => $id);
                $this->model_app->update('tb_reservasi', $data, $where);

                // email 
                $code = "https://ronisky.com/";
                $subject = "Penolakan Reservasi";
                $message = "
                            <h2>Mohon maaf pengajuan reservasi kunjungan anda di tolak.</h2>
                            <p>Detail Data Reservasi:</p>
                            
                            <p>Nama: " . $nama . "</p>
                            <p>email: " . $email . "</p>
                            <p>No Telepon: " . $no_telp . "</p>
                            <p>Tanggal kunjungan: " . $tanggal . ", Jam " . $waktu . "</p>
                            <p>Status reservasi : <b> Ditolak</b></p>
                            <p>Alasan Penolakan : <b> $ket</b></p><br>
                            <p>Silahkan hubungi petugas untuk solusi lebih lanjut!</p>
                            <p>Kontak :$kontak </p>
                            <p>Salam Hangat. <a href=' $code '>Museum Dihatiku</a></p>
                        ";

                kirim_email($email, $subject, $message);

                $this->session->set_flashdata('message', '
                <div class="alert alert-success col-sm-12" role="alert">
                <center>Penolakan reservasi berhasil dikirim</center>
                  </div>');
                redirect('resepsionis/reservasi', 'refresh');
            } else {
                $this->session->set_flashdata('message', '
                <div class="alert alert-warning col-sm-12" role="alert">
                <center>Opps! Maaf data reservasi sudah ditolak</center>
                  </div>');
                redirect('resepsionis/reservasi', 'refresh');
            }
        }
    }
    function terima_reservasi()
    {

        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {

            $id         = htmlspecialchars($this->input->post('id'));
            $tanggal    = htmlspecialchars($this->input->post('tanggal'));
            $waktustart = htmlspecialchars($this->input->post('waktu'));
            $waktuend   = htmlspecialchars($this->input->post('waktuakhir'));
            $nama       = $this->input->post('nama');
            $kategori   = $this->input->post('kategori');
            $jumlah     = $this->input->post('jumlah');
            $alamat     = $this->input->post('alamat');
            $email      = $this->input->post('email');
            $timestart  = "$tanggal $waktustart";
            $timeend    = "$tanggal $waktuend";
            $data = [
                'status'   => 2
            ];

            $jadwal = [
                'id_reservasi'  => $id,
                'start_time'    => $timestart,
                'end_time'      => $timeend,
                'kategori'      => $kategori,
                'jumlah'        => $jumlah,
                'nama'          => $nama,
                'alamat'        => $alamat
            ];

            $where = array('id_reservasi' =>  $id);
            $this->model_app->update('tb_reservasi', $data, $where);

            $this->db->insert('tb_jadwal', $jadwal);
            $code = "https://ronisky.com/";
            $subject = "Reservasi Kunjungan Diterima";
            $message = "
                                <h2>Selamat pengajuan reservasi kunjungan anda telah disetujui.</h2><br>
                                <p><b>Dimohon untuk datang tepat waktu, terima kasih</b></p>
                                <p>Detail Data Reservasi:</p>
    
                                <p>Nama: " . $nama . "</p>
                                <p>email: " . $email . "</p>
                                <p>Tanggal kunjungan: " . $tanggal . ", Jam " . $waktustart . "</p><br>
                                <p>Status reservasi :<b> Diterima</b></p><br>
                                <p>Kode Reservasi : <b> $id</b></p><br>
                                <br>
                                <p>Tunjukan kode reservasi kepada petugas ketika melakukan pendaftaran ulang!</p><br>
                                <p>Salam Hangat. <a href=' $code '>Museum Dihatiku</a></p>
                            ";

            kirim_email($email, $subject, $message);

            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Data berhasil ditambahakan pada jadwal kalender</center>
          		</div>');
            redirect('resepsionis/reservasi', 'refresh');
        } else {
            $data['title'] = 'Reservasi Kunjungan - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['rows'] = $this->model_app->edit('tb_reservasi', array('id_reservasi' => $id))->row_array();
            $this->template->load('template/template', 'resepsionis/reservasi/view_terima_reservasi', $data);
        }
    }

    function terima_reservasi_ditolak()
    {

        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {

            $id         = htmlspecialchars($this->input->post('id'));
            $tanggal    = htmlspecialchars($this->input->post('tanggal'));
            $waktustart = htmlspecialchars($this->input->post('waktu'));
            $waktuend   = htmlspecialchars($this->input->post('waktuakhir'));
            $nama       = $this->input->post('nama');
            $kategori   = $this->input->post('kategori');
            $jumlah     = $this->input->post('jumlah');
            $alamat     = $this->input->post('alamat');
            $email      = $this->input->post('email');
            $timestart  = "$tanggal $waktustart";
            $timeend    = "$tanggal $waktuend";
            $data = [
                'status'   => 2
            ];

            $jadwal = [
                'id_reservasi'  => $id,
                'start_time'    => $timestart,
                'end_time'      => $timeend,
                'kategori'      => $kategori,
                'jumlah'        => $jumlah,
                'nama'          => $nama,
                'alamat'        => $alamat
            ];

            $where = array('id_reservasi' =>  $id);
            $this->model_app->update('tb_reservasi', $data, $where);

            $this->db->insert('tb_jadwal', $jadwal);
            $code = "https://ronisky.com/";
            $subject = "Reservasi Kunjungan Diterima";
            $message = "
                                <h2>Selamat pengajuan reservasi kunjungan anda telah disetujui.</h2><br>
                                <p><b>Dimohon untuk datang tepat waktu, terima kasih</b></p>
                                <p>Detail Data Reservasi:</p>
    
                                <p>Nama: " . $nama . "</p>
                                <p>email: " . $email . "</p>
                                <p>Tanggal kunjungan: " . $tanggal . ", Jam " . $waktustart . "</p><br>
                                <p>Status reservasi :<b> Diterima</b></p><br>
                                <p>Kode Reservasi : <b> $id</b></p><br>
                                <br>
                                <p>Tunjukan kode reservasi kepada petugas ketika melakukan pendaftaran ulang!</p><br>
                                <p>Salam Hangat. <a href=' $code '>Museum Dihatiku</a></p>
                            ";

            kirim_email($email, $subject, $message);

            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Data berhasil ditambahakan pada jadwal kalender</center>
          		</div>');
            redirect('resepsionis/reservasi_diterima', 'refresh');
        } else {
            $data['title'] = 'Reservasi Kunjungan - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['rows'] = $this->model_app->edit('tb_reservasi', array('id_reservasi' => $id))->row_array();
            $this->template->load('template/template', 'resepsionis/reservasi/view_terima_reservasi_ditolak', $data);
        }
    }

    // Notifikasi 
    public function notifikasi()
    {
        $query = $this->db->query("SELECT * FROM tb_reservasi WHERE status_notif='1' ORDER BY id_reservasi ASC")->result();

        $output = '';
        foreach ($query as $q) {
            $output .= '
            <div class="dropdown-divider"></div>
                <a href="' . base_url('resepsionis/hapus_notif/') . $q->id_reservasi . '" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> ' . $q->nama . '
                    <span class="float-right text-muted text-sm">' . $q->jumlah . '</span>
                </a>
            ';
        }
        echo $output;
    }

    public function jumlah_notifikasi()
    {
        $query = $this->db->query("SELECT * FROM tb_reservasi WHERE status_notif='1' ORDER BY id_reservasi ASC")->num_rows();

        $output =  $query;

        echo $output;
    }

    public function hapus_notif($id)
    {
        $this->model_app->hapus_reservasi_notif($id);
        redirect('resepsionis/reservasi');
    }

    // Jadwal Calenda 
    public function jadwal()
    {
        $data_calendar = $this->model_app->get_list('tb_jadwal');

        $calendar = array();
        foreach ($data_calendar as $key => $val) {
            $calendar[] = array(
                'calender_id' => $val->id,
                'id'     => $val->id_reservasi,
                'title' => $val->nama,
                'start' => date_format(date_create($val->start_time), "Y-m-d H:i:s"),
                'end'     => date_format(date_create($val->end_time), "Y-m-d H:i:s"),
                'kategori' => $val->kategori,
                'jumlah' => $val->jumlah,
                'alamat' => $val->alamat,
            );
        }

        $data = array();
        $data['get_data']  = json_encode($calendar);
        $this->template->load('template/template', 'resepsionis/jadwal/view_jadwal', $data);
    }

    function kategori_pengunjung()
    {

        $data['title'] = 'Kategori Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_app->view_ordering('tb_kategori_pengunjung', 'id_kategori_pengunjung', 'DESC');
        $this->template->load('template/template', 'resepsionis/kategori_pengunjung/view_kategori_pengunjung', $data);
    }

    function tambah_kategori_pengunjung()
    {

        if (isset($_POST['submit'])) {
            $data = array('nama_kategori' => htmlspecialchars($this->input->post('a')));
            $this->model_app->insert('tb_kategori_pengunjung', $data);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Kategori berhasil ditambahkan</center>
          		</div>');
            redirect('resepsionis/kategori_pengunjung');
        } else {
            $data['title'] = 'Tambah Kategori Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $this->template->load('template/template', 'resepsionis/kategori_pengunjung/view_kategori_pengunjung_tambah', $data);
        }
    }

    function edit_kategori_pengunjung()
    {
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
            $data = array('nama_kategori' => htmlspecialchars($this->input->post('a')));
            $where = array('id_kategori_pengunjung' => $this->input->post('id'));
            $this->model_app->update('tb_kategori_pengunjung', $data, $where);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Kategori berhasil diperbaharui</center>
          		</div>');
            redirect('resepsionis/kategori_pengunjung');
        } else {
            $edit = $this->model_app->edit('tb_kategori_pengunjung', array('id_kategori_pengunjung' => $id))->row_array();
            $data = array('rows' => $edit);
            $data['title'] = 'Ubah pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $this->template->load('template/template', 'resepsionis/kategori_pengunjung/view_kategori_pengunjung_edit', $data);
        }
    }

    function delete_kategori_pengunjung($id)
    {
        $where = array('id_kategori_pengunjung' => $id);
        $this->model_app->delete('tb_kategori_pengunjung', $where);
        echo json_encode(array("status" => TRUE));
    }

    // Laporan 
    function laporanPengunjung()
    {
        $data['title'] = 'Laporan Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanPengunjung();
        $data['jumlah'] = $this->model_laporan->jumlahPengunjungUmum360();
        $this->template->load('template/template', 'resepsionis/laporan/view_lap_pengunjung', $data);
    }

    function laporanPengunjung_hari()
    {
        $data['title'] = 'Laporan Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanPengunjung1();
        $this->template->load('template/template', 'resepsionis/laporan/view_lap_pengunjung', $data);
    }

    function laporanPengunjung_minggu()
    {
        $data['title'] = 'Laporan Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanPengunjung7();
        $this->template->load('template/template', 'resepsionis/laporan/view_lap_pengunjung', $data);
    }

    function laporanPengunjung_bulan()
    {
        $data['title'] = 'Laporan Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanPengunjung30();
        $this->template->load('template/template', 'resepsionis/laporan/view_lap_pengunjung', $data);
    }

    function laporanPengunjung_tahun()
    {
        $data['title'] = 'Laporan Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanPengunjung360();
        $this->template->load('template/template', 'resepsionis/laporan/view_lap_pengunjung', $data);
    }


    // Laporan reservasi
    function laporanReservasi()
    {
        $data['title'] = 'Laporan Reservasi Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanReservasi();
        $this->template->load('template/template', 'resepsionis/laporan/view_lap_reservasi', $data);
    }

    function laporanReservasi_hari()
    {
        $data['title'] = 'Laporan Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanReservasi1();
        $this->template->load('template/template', 'resepsionis/laporan/view_lap_pengunjung', $data);
    }

    function laporanReservasi_minggu()
    {
        $data['title'] = 'Laporan Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanReservasi7();
        $this->template->load('template/template', 'resepsionis/laporan/view_lap_pengunjung', $data);
    }

    function laporanReservasi_bulan()
    {
        $data['title'] = 'Laporan Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanReservasi30();
        $this->template->load('template/template', 'resepsionis/laporan/view_lap_pengunjung', $data);
    }

    function laporanReservasi_tahun()
    {
        $data['title'] = 'Laporan Pengunjung - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanReservasi360();
        $this->template->load('template/template', 'resepsionis/laporan/view_lap_pengunjung', $data);
    }


    // Laporan Rekapitulasi
    function laporanRekapitulasi()
    {
        $data = array(
            'title' => 'Laporan Rekapitulasi - Museum Monumen Perjuangan Rakyat Jawa Barat',
            'jmlPengunjung' => $this->model_laporan->jumlahPengunjung(),
            'jmlPengunjungTK' => $this->model_laporan->jumlahPengunjungTK(),
            'jmlPengunjungSD' => $this->model_laporan->jumlahPengunjungSD(),
            'jmlPengunjungSMP' => $this->model_laporan->jumlahPengunjungSMP(),
            'jmlPengunjungSMA' => $this->model_laporan->jumlahPengunjungSMA(),
            'jmlPengunjungUniv' => $this->model_laporan->jumlahPengunjungUniv(),
            'jmlPengunjungUmum' => $this->model_laporan->jumlahPengunjungUmum(),
            'jmlPengunjungNusan' => $this->model_laporan->jumlahPengunjungNusan(),
            'jmlPengunjungManca' => $this->model_laporan->jumlahPengunjungManca()
        );

        $this->template->load('template/template', 'resepsionis/laporan/view_lap_rekapitulasi', $data);
    }

    function laporanRekapitulasi1()
    {
        $data = array(
            'title' => 'Laporan Rekapitulasi - Museum Monumen Perjuangan Rakyat Jawa Barat',

            'jmlPengunjung1' => $this->model_laporan->jumlahPengunjung1(),
            'jmlPengunjungTK1' => $this->model_laporan->jumlahPengunjungTK1(),
            'jmlPengunjungSD1' => $this->model_laporan->jumlahPengunjungSD1(),
            'jmlPengunjungSMP1' => $this->model_laporan->jumlahPengunjungSMP1(),
            'jmlPengunjungSMA1' => $this->model_laporan->jumlahPengunjungSMA1(),
            'jmlPengunjungUniv1' => $this->model_laporan->jumlahPengunjungUniv1(),
            'jmlPengunjungUmum1' => $this->model_laporan->jumlahPengunjungUmum1(),
            'jmlPengunjungNusan1' => $this->model_laporan->jumlahPengunjungNusan1(),
            'jmlPengunjungManca1' => $this->model_laporan->jumlahPengunjungManca1(),
        );

        $this->template->load('template/template', 'resepsionis/laporan/view_lap_rekapitulasi1', $data);
    }

    function laporanRekapitulasi7()
    {
        $data = array(
            'title' => 'Laporan Rekapitulasi - Museum Monumen Perjuangan Rakyat Jawa Barat',
            'jmlPengunjung7' => $this->model_laporan->jumlahPengunjung7(),
            'jmlPengunjungTK7' => $this->model_laporan->jumlahPengunjungTK7(),
            'jmlPengunjungSD7' => $this->model_laporan->jumlahPengunjungSD7(),
            'jmlPengunjungSMP7' => $this->model_laporan->jumlahPengunjungSMP7(),
            'jmlPengunjungSMA7' => $this->model_laporan->jumlahPengunjungSMA7(),
            'jmlPengunjungUniv7' => $this->model_laporan->jumlahPengunjungUniv7(),
            'jmlPengunjungUmum7' => $this->model_laporan->jumlahPengunjungUmum7(),
            'jmlPengunjungNusan7' => $this->model_laporan->jumlahPengunjungNusan7(),
            'jmlPengunjungManca7' => $this->model_laporan->jumlahPengunjungManca7(),
        );

        $this->template->load('template/template', 'resepsionis/laporan/view_lap_rekapitulasi7', $data);
    }
    function laporanRekapitulasi30()
    {
        $data = array(
            'title' => 'Laporan Rekapitulasi - Museum Monumen Perjuangan Rakyat Jawa Barat',
            'jmlPengunjung30' => $this->model_laporan->jumlahPengunjung30(),
            'jmlPengunjungTK30' => $this->model_laporan->jumlahPengunjungTK30(),
            'jmlPengunjungSD30' => $this->model_laporan->jumlahPengunjungSD30(),
            'jmlPengunjungSMP30' => $this->model_laporan->jumlahPengunjungSMP30(),
            'jmlPengunjungSMA30' => $this->model_laporan->jumlahPengunjungSMA30(),
            'jmlPengunjungUniv30' => $this->model_laporan->jumlahPengunjungUniv30(),
            'jmlPengunjungUmum30' => $this->model_laporan->jumlahPengunjungUmum30(),
            'jmlPengunjungNusan30' => $this->model_laporan->jumlahPengunjungNusan30(),
            'jmlPengunjungManca30' => $this->model_laporan->jumlahPengunjungManca30(),
        );

        $this->template->load('template/template', 'resepsionis/laporan/view_lap_rekapitulasi30', $data);
    }
    function laporanRekapitulasi360()
    {
        $data = array(
            'title' => 'Laporan Rekapitulasi - Museum Monumen Perjuangan Rakyat Jawa Barat',
            'jmlPengunjung360' => $this->model_laporan->jumlahPengunjung360(),
            'jmlPengunjungUmum360' => $this->model_laporan->jumlahPengunjungUmum360(),
            'jmlPengunjungTK360' => $this->model_laporan->jumlahPengunjungTK360(),
            'jmlPengunjungSD360' => $this->model_laporan->jumlahPengunjungSD360(),
            'jmlPengunjungSMP360' => $this->model_laporan->jumlahPengunjungSMP360(),
            'jmlPengunjungSMA360' => $this->model_laporan->jumlahPengunjungSMA360(),
            'jmlPengunjungUniv360' => $this->model_laporan->jumlahPengunjungUniv360(),
            'jmlPengunjungNusan360' => $this->model_laporan->jumlahPengunjungNusan360(),
            'jmlPengunjungManca360' => $this->model_laporan->jumlahPengunjungManca360(),
        );

        $this->template->load('template/template', 'resepsionis/laporan/view_lap_rekapitulasi360', $data);
    }

    // Cetak Laporan 
    function cetak_rekap()
    {
        $tk = $this->input->post('tk');
        $sd = $this->input->post('sd');
        $smp = $this->input->post('smp');
        $sma = $this->input->post('sma');
        $univ = $this->input->post('univ');
        $umum = $this->input->post('umum');
        $nusan = $this->input->post('nusan');
        $manca = $this->input->post('manca');
        $total = $this->input->post('total');
        $nama               = "Laporan Rekapitulasi Pengunjung Museum";
        $bulan              = date('m');
        $tahun              = date('Y');
        $cetak              = date('d/m/Y');
        $day                = date('d');
        $nama_bulan         = date("F", strtotime('00-' . $bulan . '-01'));
        $nama_pdf           = "Loporan-Rekapitulasi-Pengunjung-Museum";
        $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetWatermarkImage('assets/images/logo/logomini.png', 0.2, array(120, 150), '');
        $mpdf->showWatermarkImage = true;
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->SetHTMLHeader('
        <div  style="display: table;clear: both; ">
            <div  style="float: left;width: 10%; margin-right: 10%; padding-right: 10px;">
                <img src="assets/images/logo/logomini.png" alt="LOGO" width="70px" height="100px">
            </div>
            <div  style="float: left;width: 80%;">
                <div class="col-col-sm-12">
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">REKAPITULASI JUMLAH PENGUNJUNG</p>
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">MUSEUM MONUMEN PERJUANGAN RAKYAT JAWA BARAT</p>
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">JAWA BARAT</p>
                </div>
                    <p style="line-height: 10px;font-size: 13px;">Dicetak : ' . $day . '/' . $bulan . '/' . $tahun . '</p>
                    <p style="line-height: 10px;font-size: 12px;">Laporan Rekap Pengunjung</p>
            </div>
        </div>
        <hr size="5px">
        ');
        $html               = '<!DOCTYPE html>
        <html lang="en">

        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $nama . '</title>
        <style>
        table.tabel2 {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            text-align :left;
        }
        
        table.table1 {
            border-collapse: collapse;
            width: 100%;
        }
        
        table.tabel2 td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 5px;
            text-align: left;
        }
        
        table.tabel3 {
            font-family: arial, sans-serif;
            border: 0px solid #dddddd;
            margin-left: 30px;
            margin-right: auto;
            margin-top: 10%;
        }
        table.tabel3 td,
        th{
            text-align: left;
            padding: 5px;
            text-align: center;
        }

    </style>
    </head>
    <body>    
        <table class="tabel2">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Klasifikasi</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>-</td>
                    <td>Pengunjung TK / PAUD</td>
                    <td>' . $tk . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Pengunjung SD</td>
                    <td>' . $sd . '</td>
                </tr>
                <tr> 
                <td>-</td>
                    <td>Pengunjung SMP</td>
                    <td>' . $smp . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung SMA</td>
                    <td>' . $sma . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung Universitas / PT</td>
                    <td>' . $univ . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung Umum</td>
                    <td>' . $umum . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Wisatawan Nusantara</td>
                    <td>' . $nusan . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Wisatawan Mancanegara</td>
                    <td>' . $manca . '</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <th class="text-bold">Total Pengunjung Museum</th>
                    <th>' . $total . '</th>
                </tr>
            </tbody>
               
        </table>

        
        <table class="tabel3">
            <thead>
                <tr>
                    <th scope="col">Tanda Tanggan </th>
                    <td width="300px"></td>
                    <td> Note </td>
                    <td>.............................................................</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col" height="100px"></th>
                </tr>
                <tr>
                    <td scope="col" height="40px">.....................................</td>
                </tr>
            </tbody>
        </table>       
        </body>
        </html>';
        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output($nama_pdf, \Mpdf\Output\Destination::INLINE);
    }
    function cetak_rekap1()
    {
        $tk = $this->input->post('tk');
        $sd = $this->input->post('sd');
        $smp = $this->input->post('smp');
        $sma = $this->input->post('sma');
        $univ = $this->input->post('univ');
        $umum = $this->input->post('umum');
        $nusan = $this->input->post('nusan');
        $manca = $this->input->post('manca');
        $total = $this->input->post('total');
        $nama               = "Laporan Rekapitulasi Pengunjung Museum";
        $bulan              = date('m');
        $tahun              = date('Y');
        $day                = date('d');
        $cetak              = date('d/m/Y');
        $nama_bulan         = date("F", strtotime('00-' . $bulan . '-01'));
        $nama_pdf           = "Laporan-Rekapitulasi-Pengunjung-Museum-" . $day;
        $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetWatermarkImage('assets/images/logo/logomini.png', 0.2, array(120, 150), '');
        $mpdf->showWatermarkImage = true;
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->SetHTMLHeader('
        <div  style="display: table;clear: both; ">
            <div  style="float: left;width: 10%; margin-right: 10%; padding-right: 10px;">
                <img src="assets/images/logo/logomini.png" alt="LOGO" width="70px" height="100px">
            </div>
            <div  style="float: left;width: 80%;">
                <div class="col-col-sm-12">
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">REKAPITULASI JUMLAH PENGUNJUNG</p>
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">MUSEUM MONUMEN PERJUANGAN RAKYAT JAWA BARAT</p>
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">JAWA BARAT</p>
                </div>
                    <p style="line-height: 10px;font-size: 13px;">Dicetak : ' . $cetak . '</p>
                    <p style="line-height: 10px;font-size: 12px;">Laporan Harian : ' . $day . '/' . $nama_bulan . '/' . $tahun . '</p>
            </div>
        </div>
        <hr size="5px">
        ');
        $html               = '<!DOCTYPE html>
        <html lang="en">

        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $nama . '</title>
        <style>
        table.tabel2 {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            text-align :left;
        }
        
        table.table1 {
            border-collapse: collapse;
            width: 100%;
        }
        
        table.tabel2 td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 5px;
            text-align: left;
        }
        
        table.tabel3 {
            font-family: arial, sans-serif;
            border: 0px solid #dddddd;
            margin-left: 30px;
            margin-right: auto;
            margin-top: 10%;
        }
        table.tabel3 td,
        th{
            text-align: left;
            padding: 5px;
            text-align: center;
        }

    </style>
    </head>
    <body>    
        <table class="tabel2">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Klasifikasi</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>-</td>
                    <td>Pengunjung TK / PAUD</td>
                    <td>' . $tk . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Pengunjung SD</td>
                    <td>' . $sd . '</td>
                </tr>
                <tr> 
                <td>-</td>
                    <td>Pengunjung SMP</td>
                    <td>' . $smp . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung SMA</td>
                    <td>' . $sma . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung Universitas / PT</td>
                    <td>' . $univ . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung Umum</td>
                    <td>' . $umum . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Wisatawan Nusantara</td>
                    <td>' . $nusan . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Wisatawan Mancanegara</td>
                    <td>' . $manca . '</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <th class="text-bold">Total Pengunjung Museum</th>
                    <th>' . $total . '</th>
                </tr>
            </tbody>
               
        </table>

        
        <table class="tabel3">
            <thead>
                <tr>
                    <th scope="col">Tanda Tanggan </th>
                    <td width="300px"></td>
                    <td> Note </td>
                    <td>.............................................................</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col" height="100px"></th>
                </tr>
                <tr>
                    <td scope="col" height="40px">.....................................</td>
                </tr>
            </tbody>
        </table>       
        </body>
        </html>';
        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output($nama_pdf, \Mpdf\Output\Destination::INLINE);
    }


    function cetak_rekap30()
    {
        $tk = $this->input->post('tk');
        $sd = $this->input->post('sd');
        $smp = $this->input->post('smp');
        $sma = $this->input->post('sma');
        $univ = $this->input->post('univ');
        $umum = $this->input->post('umum');
        $nusan = $this->input->post('nusan');
        $manca = $this->input->post('manca');
        $total = $this->input->post('total');
        $nama               = "Laporan Rekapitulasi Pengunjung Museum";
        $bulan              = date('m');
        $tahun              = date('Y');
        $cetak              = date('d/m/Y');
        $nama_bulan         = date("F", strtotime('00-' . $bulan . '-01'));
        $nama_pdf           = "Laporan-Rekapitulasi-Pengunjung-Museum-" . $nama_bulan;
        $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetWatermarkImage('assets/images/logo/logomini.png', 0.2, array(120, 150), '');
        $mpdf->showWatermarkImage = true;
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->SetHTMLHeader('
        <div  style="display: table;clear: both; ">
            <div  style="float: left;width: 10%; margin-right: 10%; padding-right: 10px;">
                <img src="assets/images/logo/logomini.png" alt="LOGO" width="70px" height="100px">
            </div>
            <div  style="float: left;width: 80%;">
                <div class="col-col-sm-12">
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">REKAPITULASI JUMLAH PENGUNJUNG</p>
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">MUSEUM MONUMEN PERJUANGAN RAKYAT JAWA BARAT</p>
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">JAWA BARAT</p>
                </div>
                    <p style="line-height: 10px;font-size: 13px;">Dicetak : ' . $cetak . '</p>
                    <p style="line-height: 10px;font-size: 12px;">Laporan Bulan : ' . $nama_bulan . '' . $tahun . '</p>
            </div>
        </div>
        <hr size="5px">
        ');
        $html               = '<!DOCTYPE html>
        <html lang="en">

        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $nama . '</title>
        <style>
        table.tabel2 {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            text-align :left;
        }
        
        table.table1 {
            border-collapse: collapse;
            width: 100%;
        }
        
        table.tabel2 td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 5px;
            text-align: left;
        }
        
        table.tabel3 {
            font-family: arial, sans-serif;
            border: 0px solid #dddddd;
            margin-left: 30px;
            margin-right: auto;
            margin-top: 10%;
        }
        table.tabel3 td,
        th{
            text-align: left;
            padding: 5px;
            text-align: center;
        }

    </style>
    </head>
    <body>    
        <table class="tabel2">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Klasifikasi</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>-</td>
                    <td>Pengunjung TK / PAUD</td>
                    <td>' . $tk . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Pengunjung SD</td>
                    <td>' . $sd . '</td>
                </tr>
                <tr> 
                <td>-</td>
                    <td>Pengunjung SMP</td>
                    <td>' . $smp . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung SMA</td>
                    <td>' . $sma . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung Universitas / PT</td>
                    <td>' . $univ . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung Umum</td>
                    <td>' . $umum . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Wisatawan Nusantara</td>
                    <td>' . $nusan . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Wisatawan Mancanegara</td>
                    <td>' . $manca . '</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <th class="text-bold">Total Pengunjung Museum</th>
                    <th>' . $total . '</th>
                </tr>
            </tbody>
               
        </table>

        
        <table class="tabel3">
            <thead>
                <tr>
                    <th scope="col">Tanda Tanggan </th>
                    <td width="300px"></td>
                    <td> Note </td>
                    <td>.............................................................</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col" height="100px"></th>
                </tr>
                <tr>
                    <td scope="col" height="40px">.....................................</td>
                </tr>
            </tbody>
        </table>       
        </body>
        </html>';
        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output($nama_pdf, \Mpdf\Output\Destination::INLINE);
    }

    function cetak_rekap360()
    {
        $tk = $this->input->post('tk');
        $sd = $this->input->post('sd');
        $smp = $this->input->post('smp');
        $sma = $this->input->post('sma');
        $univ = $this->input->post('univ');
        $umum = $this->input->post('umum');
        $nusan = $this->input->post('nusan');
        $manca = $this->input->post('manca');
        $total = $this->input->post('total');
        $nama               = "Laporan Rekapitulasi Pengunjung Museum";
        $bulan              = date('m');
        $tahun              = date('Y');
        $cetak              = date('d/m/Y');
        $nama_bulan         = date("F", strtotime('00-' . $bulan . '-01'));
        $nama_pdf           = "Laporan-Rekapitulasi-Pengunjung-Museum-" . $tahun;
        $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetWatermarkImage('assets/images/logo/logomini.png', 0.2, array(120, 150), '');
        $mpdf->showWatermarkImage = true;
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->SetHTMLHeader('
        <div  style="display: table;clear: both; ">
            <div  style="float: left;width: 10%; margin-right: 10%; padding-right: 10px;">
                <img src="assets/images/logo/logomini.png" alt="LOGO" width="70px" height="100px">
            </div>
            <div  style="float: left;width: 80%;">
                <div class="col-col-sm-12">
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">REKAPITULASI JUMLAH PENGUNJUNG</p>
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">MUSEUM MONUMEN PERJUANGAN RAKYAT JAWA BARAT</p>
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">JAWA BARAT</p>
                </div>
                    <p style="line-height: 10px;font-size: 13px;">Dicetak : ' . $cetak . '</p>
                    <p style="line-height: 10px;font-size: 12px;">Laporan Tahunan : ' . $tahun . '</p>
            </div>
        </div>
        <hr size="5px">
        ');
        $html               = '<!DOCTYPE html>
        <html lang="en">

        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $nama . '</title>
        <style>
        table.tabel2 {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            text-align :left;
        }
        
        table.table1 {
            border-collapse: collapse;
            width: 100%;
        }
        
        table.tabel2 td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 5px;
            text-align: left;
        }
        
        table.tabel3 {
            font-family: arial, sans-serif;
            border: 0px solid #dddddd;
            margin-left: 30px;
            margin-right: auto;
            margin-top: 10%;
        }
        table.tabel3 td,
        th{
            text-align: left;
            padding: 5px;
            text-align: center;
        }

    </style>
    </head>
    <body>    
        <table class="tabel2">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Klasifikasi</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>-</td>
                    <td>Pengunjung TK / PAUD</td>
                    <td>' . $tk . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Pengunjung SD</td>
                    <td>' . $sd . '</td>
                </tr>
                <tr> 
                <td>-</td>
                    <td>Pengunjung SMP</td>
                    <td>' . $smp . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung SMA</td>
                    <td>' . $sma . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung Universitas / PT</td>
                    <td>' . $univ . '</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Pengunjung Umum</td>
                    <td>' . $umum . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Wisatawan Nusantara</td>
                    <td>' . $nusan . '</td>
                </tr>
                <tr>
                <td>-</td>
                    <td>Wisatawan Mancanegara</td>
                    <td>' . $manca . '</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <th class="text-bold">Total Pengunjung Museum</th>
                    <th>' . $total . '</th>
                </tr>
            </tbody>
               
        </table>

        
        <table class="tabel3">
            <thead>
                <tr>
                    <th scope="col">Tanda Tanggan </th>
                    <td width="300px"></td>
                    <td> Note </td>
                    <td>.............................................................</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col" height="100px"></th>
                </tr>
                <tr>
                    <td scope="col" height="40px">.....................................</td>
                </tr>
            </tbody>
        </table>       
        </body>
        </html>';
        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output($nama_pdf, \Mpdf\Output\Destination::INLINE);
    }
}
