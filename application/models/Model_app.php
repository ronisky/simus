<?php
class Model_app extends CI_model
{

    public function view($table)
    {
        return $this->db->get($table);
    }
    public function get_list($table, $where = FALSE)
    {
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get($table)->result();
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    public function delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    public function view_where($table, $data)
    {
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table, $order, $ordering, $baris, $dari)
    {
        $this->db->select('*');
        $this->db->order_by($order, $ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }

    public function view_where_ordering_limit($table, $data, $order, $ordering, $baris, $dari)
    {
        $this->db->select('*');
        $this->db->where($data);
        $this->db->order_by($order, $ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }

    public function view_ordering($table, $order, $ordering)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order, $ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->order_by($order, $ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_join_one($table1, $table2, $field, $order, $ordering)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field . '=' . $table2 . '.' . $field);
        $this->db->order_by($order, $ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1, $table2, $field, $where, $order, $ordering)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field . '=' . $table2 . '.' . $field);
        $this->db->where($where);
        $this->db->order_by($order, $ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_rows($table1, $table2, $field, $where, $order, $ordering)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field . '=' . $table2 . '.' . $field);
        $this->db->where($where);
        $this->db->order_by($order, $ordering);
        return $this->db->get();
    }

    public function view_join_where_one($table1, $table2, $field, $where)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field . '=' . $table2 . '.' . $field);
        $this->db->where($where);
        return $this->db->get();
    }

    public function view_join_where_two($table1, $table2, $table3, $field1, $field2, $field3, $field4, $where)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field1 . '=' . $table2 . '.' . $field2);
        $this->db->join($table3, $table2 . '.' . $field3 . '=' . $table3 . '.' . $field4);
        $this->db->where($where);
        return $this->db->get();
    }

    function cari_koleksi($kata)
    {
        $pisah_kata = explode(" ", $kata);
        $jml_katakan = (int) count($pisah_kata);
        $jml_kata = $jml_katakan - 1;
        $cari = "SELECT * FROM tb_koleksi WHERE ";
        for ($i = 0; $i <= $jml_kata; $i++) {
            $cari .= " nama LIKE '%" . $pisah_kata[$i] . "%'";
            if ($i < $jml_kata) {
                $cari .= " OR ";
            }
        }
        $cari .= " ORDER BY id_koleksi ASC";
        return $this->db->query($cari);
    }

    public function cek_login($username, $password, $table)
    {
        return $this->db->query("SELECT * FROM $table where username='" . $this->db->escape_str($username) . "' AND password='" . $this->db->escape_str($password) . "'");
    }

    function grafik_kunjungan()
    {
        return $this->db->query("SELECT count(*) as jumlah, tanggal FROM tb_statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    function profile_konsumen($id)
    {
        $this->db->join('tb_alamat', 'tb_alamat.id_alamat = tb_pengguna.id_alamat');
        $this->db->join('tb_kota', 'tb_alamat.id_kota = tb_kota.kota_id');
        return $this->db->get_where('tb_pengguna', "tb_pengguna.id_pengguna='$id'");
    }

    function alamat_user($id)
    {
        $this->db->join('tb_kota', 'tb_kota.kota_id = tb_alamat.id_kota');
        return $this->db->get_where('tb_alamat', "id_alamat='$id'");
    }


    public function emailsend()
    {

        $query = $this->db->query("SELECT email from tb_subs WHERE aktif='1'");
        $sendTo = array();
        foreach ($query->result() as $row) {
            $sendTo[] = $row->email;
        }

        return $sendTo;
    }

    function alamat_update($id, $data)
    {
        $this->db->where('id_alamat', $id);
        $this->db->update('tb_alamat', $data);
    }

    function cekIdUkuran()
    {
        $query = $this->db->query("SELECT MAX(id_ukuran) as idukuran from tb_ukuran_koleksi");
        $hasil = $query->row();
        return $hasil->idukuran;
    }
    function cekIdReservasi()
    {
        $query = $this->db->query("SELECT MAX(id_reservasi) as kdreservasi from tb_reservasi");
        $hasil = $query->row();
        return $hasil->kdreservasi;
    }


    // Api Server Model
    public function get_koleksi($id = null)
    {
        if ($id === null) {
            $this->db->order_by("id_koleksi", "desc");
            $query = $this->db->get('tb_koleksi');
            return $query->result_array();
        } else {
            $this->db->order_by("id_koleksi", "desc");
            $query = $this->db->get_where('tb_koleksi', ['id_koleksi' => $id]);
            return $query->result_array();
        }
    }

    public function get_koleksiUkuran($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_ukuran_koleksi')->result_array();
        } else {
            return $this->db->get_where('tb_ukuran_koleksi', ['id_ukuran' => $id])->result_array();
        }
    }

    public function get_koleksiKategori($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_kategori_koleksi')->result_array();
        } else {
            return $this->db->get_where('tb_kategori_koleksi', ['id_kategori_koleksi' => $id])->result_array();
        }
    }

    public function get_postingan($id = null)
    {
        if ($id === null) {
            $this->db->order_by("id_artikel", "desc");
            $query = $this->db->get('tb_blog_artikel');
            return $query->result_array();
        } else {
            $this->db->order_by("id_artikel", "desc");
            $query = $this->db->get_where('tb_blog_artikel', ['id_artikel' => $id]);
            return $query->result_array();
        }
    }

    public function get_postinganKategori($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_blog_kategori')->result_array();
        } else {
            return $this->db->get_where('tb_blog_kategori', ['id_kategori' => $id])->result_array();
        }
    }

    public function get_faq($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_faq')->result_array();
        } else {
            return $this->db->get_where('tb_faq', ['id_faq' => $id])->result_array();
        }
    }

    public function get_slide($id = null)
    {
        if ($id === null) {
            $this->db->order_by("id_slide", "desc");
            $query = $this->db->get('tb_web_slide');
            return $query->result_array();
        } else {
            $this->db->order_by("id_slide", "desc");
            $query = $this->db->get_where('tb_web_slide', ['id_slide' => $id]);
            return $query->result_array();
        }
    }

    public function get_fasilitas($id = null)
    {
        if ($id === null) {
            $this->db->order_by("id_fasilitas", "desc");
            $query = $this->db->get('tb_fasilitas');
            return $query->result_array();
        } else {
            $this->db->order_by("id_fasilitas", "desc");
            $query = $this->db->get_where('tb_fasilitas', ['id_fasilitas' => $id]);
            return $query->result_array();
        }
    }

    public function get_kategori($id = null)
    {
        if ($id === null) {
            $this->db->order_by("id_kategori_pengunjung");
            $query = $this->db->get('tb_kategori_pengunjung');
            return $query->result_array();
        } else {
            $this->db->order_by("id_kategori_pengunjung");
            $query = $this->db->get_where('tb_kategori_pengunjung', ['id_kategori_pengunjung' => $id]);
            return $query->result_array();
        }
    }

    public function get_negara($id = null)
    {
        if ($id === null) {
            $this->db->order_by("id_negara");
            $query = $this->db->get('tb_negara');
            return $query->result_array();
        } else {
            $this->db->order_by("id_negara");
            $query = $this->db->get_where('tb_negara', ['id_negara' => $id]);
            return $query->result_array();
        }
    }
}
