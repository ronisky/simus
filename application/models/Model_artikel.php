<?php
class Model_artikel extends CI_model
{
    function info_terbaru($limit)
    {
        return $this->db->query("SELECT * FROM tb_blog_artikel left join tb_pengguna on tb_blog_artikel.username=tb_pengguna.username left join tb_blog_kategori on tb_blog_artikel.id_kategori=tb_blog_kategori.id_kategori ORDER BY id_artikel DESC LIMIT 0,$limit");
    }

    function tag_artikel()
    {
        return $this->db->query("SELECT * FROM tb_blog_tag ORDER BY id_tag DESC");
    }

    function tag_artikel_tambah()
    {
        $datadb = array(
            'nama_tag' => $this->db->escape_str($this->input->post('a')),
            'username' => $this->session->username,
            'tag_seo' => seo_title($this->input->post('a')),
            'count' => '0'
        );
        $this->db->insert('tb_blog_tag', $datadb);
    }

    function tag_artikel_edit($id)
    {
        return $this->db->query("SELECT * FROM tb_blog_tag where id_tag='$id'");
    }

    function tag_artikel_update()
    {
        $datadb = array(
            'nama_tag' => $this->db->escape_str($this->input->post('a')),
            'username' => $this->session->username,
            'tag_seo' => seo_title($this->input->post('a'))
        );
        $this->db->where('id_tag', $this->input->post('id'));
        $this->db->update('tb_blog_tag', $datadb);
    }

    function tag_artikel_delete($id)
    {
        return $this->db->query("DELETE FROM tb_blog_tag where id_tag='$id'");
    }


    function kategori_artikel()
    {
        return $this->db->query("SELECT * FROM tb_blog_kategori ORDER BY id_kategori DESC");
    }

    function kategori_artikel_tambah()
    {
        $datadb = array(
            'nama_kategori' => $this->db->escape_str($this->input->post('a')),
            'username' => $this->session->username,
            'kategori_seo' => seo_title($this->input->post('a')),
            'aktif' => $this->db->escape_str($this->input->post('b')),
            'sidebar' => $this->db->escape_str($this->input->post('c'))
        );
        $this->db->insert('tb_blog_kategori', $datadb);
    }

    function kategori_artikel_edit($id)
    {
        return $this->db->query("SELECT * FROM tb_blog_kategori where id_kategori='$id'");
    }

    function kategori_artikel_update()
    {
        $datadb = array(
            'nama_kategori' => $this->db->escape_str($this->input->post('a')),
            'username' => $this->session->username,
            'kategori_seo' => seo_title($this->input->post('a')),
            'aktif' => $this->db->escape_str($this->input->post('b')),
            'sidebar' => $this->db->escape_str($this->input->post('c'))
        );
        $this->db->where('id_kategori', $this->input->post('id'));
        $this->db->update('tb_blog_kategori', $datadb);
    }

    function kategori_artikel_delete($id)
    {
        return $this->db->query("DELETE FROM tb_blog_kategori where id_kategori='$id'");
    }

    function list_artikel()
    {
        return $this->db->query("SELECT * FROM tb_blog_artikel ORDER BY id_artikel DESC");
    }


    function list_artikel_tambah()
    {
        $config['upload_path'] = 'assets/images/artikel/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '5000'; // kb
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('gbr');
        $hasil = $this->upload->data();
        if ($this->session->level == 1) {
            $status = 'Y';
        } else {
            $status = 'N';
        }
        if ($this->input->post('tag') != '') {
            $tag_seo = $this->input->post('tag');
            $tag = implode(',', $tag_seo);
        } else {
            $tag = '';
        }
        if ($hasil['file_name'] == '') {
            $datadb = array(
                'username' => $this->session->username,
                'judul' => $this->db->escape_str($this->input->post('judul')),
                'sub_judul' => $this->db->escape_str($this->input->post('sub')),
                'id_kategori' => $this->db->escape_str($this->input->post('kat')),
                'judul_seo' => seo_title($this->input->post('judul')),
                'aktif' => "Y",
                'isi_artikel' => $this->db->escape_str($this->input->post('isi')),
                'keterangan_gambar' => $this->db->escape_str($this->input->post('ketgbr')),
                'hari' => hari_ini(date('w')),
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'dibaca' => '0',
                'tag' => $tag,
                'status' => $status
            );
        } else {
            $datadb = array(
                'username' => $this->session->username,
                'judul' => $this->db->escape_str($this->input->post('judul')),
                'sub_judul' => $this->db->escape_str($this->input->post('sub')),
                'id_kategori' => $this->db->escape_str($this->input->post('kat')),
                'judul_seo' => seo_title($this->input->post('judul')),
                'aktif' => "Y",
                'isi_artikel' => $this->db->escape_str($this->input->post('isi')),
                'keterangan_gambar' => $this->db->escape_str($this->input->post('ketgbr')),
                'hari' => hari_ini(date('w')),
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'dibaca' => '0',
                'tag' => $tag,
                'status' => $status,
                'gambar' => $hasil['file_name'],

            );
        }
        $this->db->insert('tb_blog_artikel', $datadb);
    }

    function tambah_fasilitas()
    {
        $config['upload_path'] = 'assets/images/fasilitas/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '5000'; // kb
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar');
        $hasil = $this->upload->data();
        if ($hasil['file_name'] != '') {
            $data = array(
                'nama' => $this->db->escape_str($this->input->post('nama')),
                'rating' => $this->db->escape_str($this->input->post('rating')),
                'deskripsi' => $this->db->escape_str($this->input->post('deskripsi')),
                'gambar' => $hasil['file_name']
            );
        }
        $this->db->insert('tb_fasilitas', $data);
    }

    function fasilitas_edit($id)
    {
        return $this->db->query("SELECT * FROM tb_fasilitas where id_fasilitas='$id'");
    }

    function fasilitas_update()
    {
        $config['upload_path'] = 'assets/images/fasilitas/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '5000'; // kb
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar');
        $hasil = $this->upload->data();
        if ($hasil['file_name'] == '') {
            $data = array(
                'nama' => $this->db->escape_str($this->input->post('nama')),
                'rating' => $this->db->escape_str($this->input->post('rating')),
                'deskripsi' => $this->db->escape_str($this->input->post('deskripsi'))
            );
        } else {
            $data = array(
                'nama' => $this->db->escape_str($this->input->post('nama')),
                'rating' => $this->db->escape_str($this->input->post('rating')),
                'deskripsi' => $this->db->escape_str($this->input->post('deskripsi')),
                'gambar' => $hasil['file_name']
            );

            $query = $this->db->get_where('tb_fasilitas', array('id_fasilitas' => $this->input->post('id')));
            $row = $query->row();
            $foto = $row->gambar;
            $path = "assets/images/fasilitas/";
            unlink($path . $foto);
        }
        $this->db->where('id_fasilitas', $this->input->post('id'));
        $this->db->update('tb_fasilitas', $data);
    }

    function fasilitas_delete($id)
    {
        return $this->db->query("DELETE FROM tb_fasilitas where id_fasilitas='$id'");
    }

    function list_artikel_edit($id)
    {
        return $this->db->query("SELECT * FROM tb_blog_artikel where id_artikel='$id'");
    }

    function list_artikel_update()
    {
        $config['upload_path'] = 'assets/images/artikel/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '5000'; // kb
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('gbr');
        $hasil = $this->upload->data();
        if ($this->session->level == 1) {
            $status = 'Y';
        } else {
            $status = 'N';
        }
        if ($this->input->post('tag') != '') {
            $tag_seo = $this->input->post('tag');
            $tag = implode(',', $tag_seo);
        }
        if ($hasil['file_name'] == '') {
            $datadb = array(
                'username' => $this->session->username,
                'judul' => $this->db->escape_str($this->input->post('judul')),
                'sub_judul' => $this->db->escape_str($this->input->post('sub')),
                'id_kategori' => $this->db->escape_str($this->input->post('kat')),
                'judul_seo' => seo_title($this->input->post('judul')),
                'isi_artikel' => $this->input->post('isi'),
                'keterangan_gambar' => $this->db->escape_str($this->input->post('ketgbr')),
                'hari' => hari_ini(date('w')),
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'dibaca' => '0',
                'tag' => $tag,
                'status' => $status
            );
        } else {
            $datadb = array(
                'username' => $this->session->username,
                'judul' => $this->db->escape_str($this->input->post('judul')),
                'sub_judul' => $this->db->escape_str($this->input->post('sub')),
                'id_kategori' => $this->db->escape_str($this->input->post('kat')),
                'judul_seo' => seo_title($this->input->post('judul')),
                'isi_artikel' => $this->input->post('isi'),
                'keterangan_gambar' => $this->db->escape_str($this->input->post('ketgbr')),
                'hari' => hari_ini(date('w')),
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'gambar' => $hasil['file_name'],
                'dibaca' => '0',
                'tag' => $tag,
                'status' => $status,
            );

            $query = $this->db->get_where('tb_blog_artikel', array('id_artikel' => $this->input->post('id')));
            $row = $query->row();
            $foto = $row->gambar;
            $path = "assets/images/artikel/";
            unlink($path . $foto);
        }
        $this->db->where('id_artikel', $this->input->post('id'));
        $this->db->update('tb_blog_artikel', $datadb);
    }

    function list_artikel_delete($id)
    {
        return $this->db->query("DELETE FROM tb_blog_artikel where id_artikel='$id'");
    }

    function semua_artikel($start, $limit)
    {
        return $this->db->query("SELECT * FROM tb_blog_artikel ORDER BY id_artikel DESC LIMIT $start,$limit");
    }

    function artikel_detail($id)
    {
        return $this->db->query("SELECT * FROM tb_blog_artikel a LEFT JOIN tb_pengguna b ON a.username=b.username LEFT JOIN tb_blog_kategori c ON a.id_kategori=c.id_kategori where a.id_artikel='" . $this->db->escape_str($id) . "' OR a.judul_seo='" . $this->db->escape_str($id) . "'");
    }

    function artikel_dibaca_update($id)
    {
        return $this->db->query("UPDATE tb_blog_artikel SET dibaca=dibaca+1 where id_artikel='" . $this->db->escape_str($id) . "' OR judul_seo='" . $this->db->escape_str($id) . "'");
    }

    function detail_kategori($id, $limit)
    {
        return $this->db->query("SELECT * FROM tb_blog_artikel where id_kategori='" . $this->db->escape_str($id) . "' ORDER BY id_artikel DESC LIMIT $limit");
    }
}
