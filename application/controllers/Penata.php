<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_app');
        $this->load->model('model_laporan');
        cek_session_penata();
    }

    function index()
    {

        if ($this->session->level == 4) {
            redirect('penata/koleksi');
        } else {
            redirect('error404');
        }
    }

    function kategori_koleksi()
    {

        $data['title'] = 'Kategori Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_app->view_ordering('tb_kategori_koleksi', 'id_kategori_koleksi', 'DESC');

        $this->template->load('template/template', 'penata/kategori_koleksi/view_kategori_koleksi', $data);
    }

    function tambah_kategori_koleksi()
    {

        if (isset($_POST['submit'])) {
            $data = array('nama_kategori' => htmlspecialchars($this->input->post('a')), 'kategori_seo' => seo_title(htmlspecialchars($this->input->post('a'))));
            $this->model_app->insert('tb_kategori_koleksi', $data);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Kategori berhasil ditambahkan</center>
          		</div>');
            redirect('penata/kategori_koleksi');
        } else {
            $data['title'] = 'Tambah Kategori Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $this->template->load('template/template', 'penata/kategori_koleksi/view_kategori_koleksi_tambah', $data);
        }
    }

    function edit_kategori_koleksi()
    {
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
            $data = array('nama_kategori' => htmlspecialchars($this->input->post('a')), 'kategori_seo' => seo_title(htmlspecialchars($this->input->post('a'))));
            $where = array('id_kategori_koleksi' => $this->input->post('id'));
            $this->model_app->update('tb_kategori_koleksi', $data, $where);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Kategori berhasil diperbaharui</center>
          		</div>');
            redirect('penata/kategori_koleksi');
        } else {
            $edit = $this->model_app->edit('tb_kategori_koleksi', array('id_kategori_koleksi' => $id))->row_array();
            $data = array('rows' => $edit);
            $data['title'] = 'Ubah Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $this->template->load('template/template', 'penata/kategori_koleksi/view_kategori_koleksi_edit', $data);
        }
    }

    function delete_kategori_koleksi($id)
    {
        $where = array('id_kategori_koleksi' => $id);
        $this->model_app->delete('tb_kategori_koleksi', $where);
        echo json_encode(array("status" => TRUE));
    }

    function koleksi()
    {
        $data['title'] = 'Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_app->view_ordering('tb_koleksi', 'id_koleksi', 'DESC');
        $this->template->load('template/template', 'penata/koleksi/view_koleksi', $data);
    }

    function tambah_koleksi()
    {
        if (isset($_POST['submit'])) {
            $config['upload_path'] = 'assets/images/koleksi/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000'; // kb
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $hasil = $this->upload->data();
            if ($hasil['file_name'] != '') {
                $ukuran = array(
                    'id_ukuran' => htmlspecialchars($this->input->post('id')),
                    'tinggi'    => htmlspecialchars($this->input->post('tg')),
                    'panjang'   => htmlspecialchars($this->input->post('pjg')),
                    'lebar'     => htmlspecialchars($this->input->post('lb')),
                    'diameter'  => htmlspecialchars($this->input->post('dia')),
                    'berat'     => htmlspecialchars($this->input->post('br'))
                );
                $this->model_app->insert('tb_ukuran_koleksi', $ukuran);
                $data = array(
                    'id_ukuran'             => htmlspecialchars($this->input->post('id')),
                    'id_kategori_koleksi'   => $this->input->post('kategori'),
                    'nama_pencatat'         => $this->session->username,
                    'no_registrasi'         => htmlspecialchars($this->input->post('no_regis')),
                    'tanggal_pencatatan'    => date('Y-m-d'),
                    'nama_koleksi'          => htmlspecialchars($this->input->post('nama_kol')),
                    'koleksi_seo'           => $this->db->escape_str(seo_title($this->input->post('nama_kol'))),
                    'asal_koleksi'          => htmlspecialchars($this->input->post('asal_kol')),
                    'pemilik_asal'          => htmlspecialchars($this->input->post('pemilik_asal')),
                    'cara_perolehan'        => htmlspecialchars($this->input->post('cara_peroleh')),
                    'sumber_pusaka'         => htmlspecialchars($this->input->post('sumber')),
                    'foto'                => $hasil['file_name'],
                    'deskripsi'             => htmlspecialchars($this->input->post('deskripsi'))
                );
            }

            $this->model_app->insert('tb_koleksi', $data);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Tambah data berhasil</center>
          		</div>');
            redirect('penata/koleksi');
        } else {
            $dariDB = $this->model_app->cekIdUkuran();
            $nourut = substr($dariDB, 3, 4);
            $kode1 =  $nourut + 1;
            $kodenya = sprintf("%04s", $kode1);
            $Id = 'UK' . $kodenya;

            $data['title']  = 'Tambah Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['id']     = $Id;
            $data['record'] = $this->model_app->view_ordering('tb_kategori_koleksi', 'id_kategori_koleksi', 'DESC');
            $this->template->load('template/template', 'penata/koleksi/view_koleksi_tambah', $data);
        }
    }

    function edit_koleksi()
    {

        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
            $config['upload_path'] = 'assets/images/koleksi/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000'; // kb
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $hasil = $this->upload->data();
            if ($hasil['file_name'] == '') {
                $ukuran = array(
                    'tinggi'    => htmlspecialchars($this->input->post('tinggi')),
                    'panjang'   => htmlspecialchars($this->input->post('panjang')),
                    'lebar'     => htmlspecialchars($this->input->post('lebar')),
                    'diameter'  => htmlspecialchars($this->input->post('diameter')),
                    'berat'     => htmlspecialchars($this->input->post('berat'))
                );

                $data = array(
                    'id_kategori_koleksi'   => $this->input->post('kategori'),
                    'nama_pencatat'         => $this->session->username,
                    'no_registrasi'         => htmlspecialchars($this->input->post('no_regis')),
                    'tanggal_pencatatan'    => date('Y-m-d'),
                    'nama_koleksi'          => htmlspecialchars($this->input->post('nama_kol')),
                    'koleksi_seo'           => $this->db->escape_str(seo_title($this->input->post('nama_kol'))),
                    'asal_koleksi'          => htmlspecialchars($this->input->post('asal_kol')),
                    'pemilik_asal'          => htmlspecialchars($this->input->post('pemilik_asal')),
                    'cara_perolehan'        => htmlspecialchars($this->input->post('cara_peroleh')),
                    'sumber_pusaka'         => htmlspecialchars($this->input->post('sumber')),
                    'deskripsi'             => htmlspecialchars($this->input->post('deskripsi'))
                );
            } else {
                $ukuran = array(
                    'tinggi'    => htmlspecialchars($this->input->post('tinggi')),
                    'panjang'   => htmlspecialchars($this->input->post('panjang')),
                    'lebar'     => htmlspecialchars($this->input->post('lebar')),
                    'diameter'  => htmlspecialchars($this->input->post('diameter')),
                    'berat'     => htmlspecialchars($this->input->post('berat'))
                );
                $data = array(
                    'id_kategori_koleksi'   => $this->input->post('kategori'),
                    'nama_pencatat'         => $this->session->username,
                    'no_registrasi'         => htmlspecialchars($this->input->post('no_regis')),
                    'tanggal_pencatatan'    => date('Y-m-d'),
                    'nama_koleksi'          => htmlspecialchars($this->input->post('nama_kol')),
                    'koleksi_seo'           => $this->db->escape_str(seo_title($this->input->post('nama_kol'))),
                    'asal_koleksi'          => htmlspecialchars($this->input->post('asal_kol')),
                    'pemilik_asal'          => htmlspecialchars($this->input->post('pemilik_asal')),
                    'cara_perolehan'        => htmlspecialchars($this->input->post('cara_peroleh')),
                    'sumber_pusaka'         => htmlspecialchars($this->input->post('sumber')),
                    'foto'                  => $hasil['file_name'],
                    'deskripsi'             => htmlspecialchars($this->input->post('deskripsi'))
                );

                $query = $this->db->get_where('tb_koleksi', array('id_koleksi' => $this->input->post('id')));
                $row = $query->row();
                $gambar = $row->foto;
                $path = "assets/images/koleksi/";
                unlink($path . $gambar);
            }


            $where = array('id_koleksi' => $this->input->post('id'));
            $this->model_app->update('tb_koleksi', $data, $where);
            $u = array('id_ukuran' => $this->input->post('idU'));
            $this->model_app->update('tb_ukuran_koleksi', $ukuran, $u);
            $this->session->set_flashdata('message', '
				<div class="alert alert-success col-sm-12" role="alert">
            	<center>Data berhasil diperbaharui</center>
          		</div>');
            redirect('penata/koleksi');
        } else {

            $data['title'] = 'Edit - Museum Monumen Perjuangan Rakyat Jawa Barat';
            $data['record'] = $this->model_app->view_ordering('tb_kategori_koleksi', 'id_kategori_koleksi', 'DESC');
            $data['uk'] = $this->model_app->view_ordering('tb_ukuran_koleksi', 'id_ukuran', 'DESC');
            $data['rows'] = $this->model_app->edit('tb_koleksi', array('id_koleksi' => $id))->row_array();
            $this->template->load('template/template', 'penata/koleksi/view_koleksi_edit', $data);
        }
    }

    function delete_koleksi($id)
    {
        $query = $this->db->get_where('tb_koleksi', array('id_koleksi' => $id));
        $row = $query->row();
        $gambar = $row->foto;
        $q = $row->id_ukuran;
        $path = "assets/images/koleksi/";
        unlink($path . $gambar);

        $sql = "DELETE tb_koleksi,tb_ukuran_koleksi
        FROM tb_koleksi,tb_ukuran_koleksi
        WHERE tb_koleksi.id_ukuran=tb_ukuran_koleksi.id_ukuran
        AND tb_koleksi.id_ukuran= $q";

        $this->db->query($sql, array($id));

        echo json_encode(array("status" => TRUE));
    }

    function laporanKoleksi()
    {
        $data['title'] = 'Laporan Koleksi - Museum Monumen Perjuangan Rakyat Jawa Barat';
        $data['record'] = $this->model_laporan->laporanKoleksi();
        $this->template->load('template/template', 'penata/laporan/view_lap_koleksi', $data);
    }

    function cetak_koleksi()
    {
        $no = $this->input->post('no');
        $tanggalKol = $this->input->post('tanggal');
        $namaKol = $this->input->post('nama');
        $tinggi = $this->input->post('tinggi');
        $panjang = $this->input->post('panjang');
        $lebar = $this->input->post('lebar');
        $diameter = $this->input->post('diameter');
        $berat = $this->input->post('berat');
        $asal = $this->input->post('asal');
        $pemilik = $this->input->post('pemilik');
        $cara = $this->input->post('cara');
        $sumber = $this->input->post('sumber');
        $no_regis = $this->input->post('no_regis');
        // $foto = $this->input->post('foto');
        // $imagepath = getenv("DOCUMENT_ROOT") . '/assets/images/koleksi/' . $foto;
        $nama               = "Laporan Data Koleksi Museum";
        $bulan              = date('m');
        $tahun              = date('Y');
        $cetak              = date('d/m/Y');
        $day                = date('d');
        $nama_bulan         = date("F", strtotime('00-' . $bulan . '-01'));
        $nama_pdf           = "Loporan-Koleksi-Museum";
        $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
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
                    <p style="line-height: 10px;font-size: 18px;font-weight: bold;">DATA KOLEKSI</p>
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
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Koleksi</th>
                    <th scope="col">Tinggi</th>
                    <th scope="col">Panjang</th>
                    <th scope="col">Lebar</th>
                    <th scope="col">Diameter</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Asal Koleksi</th>
                    <th scope="col">Pemilik Asal</th>
                    <th scope="col">Cara Perlehan</th>
                    <th scope="col">Sumber Pusaka</th>
                    <th scope="col">No Registrasi</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>' . $no . '</td>
                    <td>' . $tanggalKol . '</td>
                    <td>' . $namaKol . '</td>
                    <td>' . $tinggi . '</td>
                    <td>' . $panjang . '</td>
                    <td>' . $lebar . '</td>
                    <td>' . $diameter . '</td>
                    <td>' . $berat . '</td>
                    <td>' . $asal . '</td>
                    <td>' . $pemilik . '</td>
                    <td>' . $cara . '</td>
                    <td>' . $sumber . '</td>
                    <td>' . $no_regis . '</td>
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
