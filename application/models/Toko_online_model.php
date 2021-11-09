<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Toko_online_model extends CI_Model
{



    function page_query($table, $order_by, $limit, $offset)
    {

        $this->db->order_by($order_by, 'DESC');

        $this->db->limit($limit, $offset);

        $query = $this->db->get($table);

        if ($this->db->_error_message())

            header('Location: ../');

        return $query->result_array();
    }

    function add_jadwal($data)
    {
        $this->db->insert('jadwal', $data);
    }

    public function add($tabel, $data)
    {
        return $this->db->insert($tabel, $data);
    }

    function jadwal($id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->get('jadwal');
    }
    function get_table($table)
    {

        $query = $this->db->get($table);

        return $query->result_array();
    }



    function get_table_join_where($table1, $table2, $on, $where)
    {

        $this->db->select('*');

        $this->db->from($table1);

        $this->db->join($table2, $on);

        $this->db->where($where);



        $query = $this->db->get();



        return $query->result_array();
    }



    function get_table_join3_where($table1, $table2, $table3, $on, $on2, $where)
    {

        $this->db->select('*');

        $this->db->from($table1);

        $this->db->join($table2, $on);

        $this->db->join($table3, $on2);

        $this->db->where($where);



        $query = $this->db->get();



        return $query->result_array();
    }





    function get_table_joinnn_where($table1, $table2, $on, $where)
    {

        $this->db->select('*, SUM(detail_order.subtotal) AS jumlah');

        $this->db->from($table1);

        $this->db->join($table2, $on);

        $this->db->where($where);

        $this->db->group_by("order.id_order");

        $this->db->order_by("order.id_order", "DESC");



        $query = $this->db->get();



        return $query->result_array();
    }





    function get_table_joinn_where($table1, $table2, $on, $where)
    {

        $this->db->select('*, SUM(detail_order.subtotal) AS jumlah');

        $this->db->from($table1);

        $this->db->join($table2, $on);

        $this->db->where($where);

        $this->db->group_by("order.id_order");

        $this->db->order_by("order.id_order", "DESC");



        $query = $this->db->get();



        return $query->result_array();
    }



    function insert_table($table, $data)
    {

        $query = $this->db->insert($table, $data);

        return $query;
    }



    function get_table_where_produk($table, $where)
    {
        $this->db->select('*');
        $this->db->where($where);
        $this->db->from($table);
        $this->db->join('promo', 'produk.id_produk=promo.id_produk_promo', 'left outer');
        $this->db->join('kategori_produk', 'produk.kategori_produk=kategori_produk.id_kategori_produk', 'left outer');
        $query = $this->db->get();

        // if ($this->db->_error_message()) header('Location: ../');

        return $query->result_array();
    }

    function get_table_promo()
    {
        $this->db->select('*');
        $this->db->from('promo');
        $this->db->join('produk', 'promo.id_produk_promo=produk.id_produk', 'left outer');
        $this->db->join('kategori_produk', 'produk.kategori_produk=kategori_produk.id_kategori_produk', 'left outer');
        // $today = date('Y-m-d');
        // $this->db->where('promo.tgl_mulai <= ', $today);
        // $this->db->where('promo.tgl_selesai >= ', $today);
        $query = $this->db->get();

        // if ($this->db->_error_message()) header('Location: ../');

        return $query->result_array();
    }

    function get_table_search_produk($table, $produk)
    {
        $this->db->select('*');
        $this->db->like('produk.nama_produk', $produk);
        $this->db->order_by('id_produk', 'DESC');
        $this->db->join('promo', 'produk.id_produk=promo.id_produk_promo', 'left outer');
        $this->db->join('kategori_produk', 'produk.kategori_produk=kategori_produk.id_kategori_produk', 'left outer');
        $query = $this->db->get($table);

        return $query->result_array();
    }

    function get_table_where($table, $where)
    {

        $this->db->where($where);

        $query = $this->db->get($table);

        return $query->result_array();
    }

    function get_voucher($table, $where)
    {
        $date = date('Y-m-d');
        $this->db->where($where);
        $this->db->where('sts', 'Y');
        $this->db->where('tgl_terbit_voucher >=', $date);
        $this->db->where('tgl_exp_voucher !=', $date);
        $query = $this->db->get($table);

        return $query->result();
    }

    function get_table_where_limit($table, $where, $limit)
    {

        $this->db->limit($limit);

        $this->db->where($where);

        $query = $this->db->get($table);

        // if ($this->db->_error_message()) header('Location: ../');

        return $query->result_array();
    }



    function update_table($table, $data, $where)
    {

        $this->db->where($where);

        $query = $this->db->update($table, $data);
        return $query;
    }



    function get_table_join_limit_order_by($from, $join, $where, $limit, $order_by)
    {

        $this->db->select('*');

        $this->db->from($from);

        $this->db->join($join, $where);

        $this->db->limit($limit);

        $this->db->order_by($order_by, 'DESC');

        $query = $this->db->get();

        if ($this->db->_error_message())

            header('Location: ../');

        return $query->result_array();
    }



    function get_special_limit($table, $start, $limit)
    {

        $this->db->limit($limit, $start);

        $query = $this->db->get($table);

        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }



    function get_where_special_limit($table, $where, $start, $limit)
    {

        $this->db->select('*');

        $this->db->from($table);

        $this->db->where($where);

        $this->db->limit($limit, $start);

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }



    function get_table_rows($table)
    {

        $query = $this->db->get($table);

        return $query->num_rows();
    }



    function get_table_rows_where($row, $table, $where)
    {

        $this->db->select($row);

        $this->db->from($table);

        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }





    function get_produk($trigger)
    {

        if ($trigger == "terbaru") {

            $this->db->select('*');

            $this->db->from('produk');

            $this->db->where(array('validasi' => 1));

            $this->db->limit(8);

            $this->db->order_by('id_produk', 'DESC');

            $query = $this->db->get();
        } elseif ($trigger == "termurah") {

            $this->db->select('*');

            $this->db->from('produk');

            $this->db->where(array('validasi' => 1));

            $this->db->limit(8);

            $this->db->order_by('harga', 'ASC');

            $query = $this->db->get();
        }

        return $query->result_array();
    }



    function get_produk_form_id($id_kategori_produk)
    {

        $this->db->select('*');

        $this->db->from('produk');

        $this->db->where(array('kategori_produk' => $id_kategori_produk, 'validasi' => 1));

        $this->db->order_by('id_produk', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }



    function get_keranjang_belanja($where)
    {
        $this->db->select("keranjang_belanja.*");

        $this->db->select("produk.*");

        // $this->db->select("produk.harga as harga_produk");

        // $this->db->select("produk.foto_produk1 as foto_produk1");

        // $this->db->select("produk.jumlah_stok as jumlah_stok");

        $this->db->from("keranjang_belanja")->join("produk", "keranjang_belanja.id_produk=produk.id_produk");

        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_cart($where)
    {
        $this->db->select('*');
        $this->db->where($where);
        $this->db->from('keranjang_belanja');
        $this->db->join('produk', 'produk.id_produk=keranjang_belanja.id_produk', 'left outer');
        $this->db->join('promo', 'produk.id_produk=promo.id_produk_promo', 'left outer');
        // $this->db->join('kategori_produk', 'produk.kategori_produk=kategori_produk.id_kategori_produk', 'left outer');
        $query = $this->db->get();

        // if ($this->db->_error_message()) header('Location: ../');

        return $query->result_array();
    }

    public function get_total($from, $where, $sum1, $sum2)
    {
        $this->db->select("SUM(" . $sum1 . ") as total_jumlah, SUM(" . $sum2 . ") as total_harga");

        // $this->db->select("produk.harga as harga_produk");

        // $this->db->select("produk.foto_produk1 as foto_produk1");

        // $this->db->select("produk.jumlah_stok as jumlah_stok");

        $this->db->from($from);

        $this->db->where($where);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_tot($from, $where, $sum1, $sum2, $sum3)
    {
        $this->db->select("SUM(" . $sum1 . ") as total_jumlah, SUM(" . $sum2 . ") as total_harga, SUM(" . $sum3 . ") as total_berat");

        // $this->db->select("produk.harga as harga_produk");

        // $this->db->select("produk.foto_produk1 as foto_produk1");

        // $this->db->select("produk.jumlah_stok as jumlah_stok");

        $this->db->from($from);

        $this->db->where($where);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_jumlah($from, $where, $sum1, $sum2)
    {
        $this->db->select("SUM(" . $sum1 . ") as total_jumlah, SUM(" . $sum2 . ") as total_berat");


        $this->db->from($from);

        $this->db->where($where);

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_penjual_cart($where)
    {

        $this->db->select("produk.id_user");

        // $this->db->select("produk.harga as harga_produk");

        // $this->db->select("produk.foto_produk1 as foto_produk1");

        // $this->db->select("produk.jumlah_stok as jumlah_stok");

        $this->db->from("keranjang_belanja")->join("produk", "keranjang_belanja.id_produk=produk.id_produk");

        $this->db->where($where);

        $this->db->group_by("produk.id_user");

        $query = $this->db->get();

        return $query->result_array();
    }



    function get_order($where)
    {

        $this->db->select("detail_order.*");

        $this->db->select("produk.*");

        $this->db->from("detail_order");

        $this->db->join('produk', 'detail_order.id_produk = produk.id_produk');

        $this->db->where($where);

        $this->db->order_by("detail_order.id_penjual", "desc");

        $query = $this->db->get();

        return $query->result_array();
    }



    function get_penjual_order($where)
    {

        $this->db->select("id_penjual");

        $this->db->from("detail_order");

        $this->db->where($where);

        $this->db->order_by("id_penjual", "desc");

        $this->db->group_by("id_penjual");

        $query = $this->db->get();

        return $query->result_array();
    }



    function get_penjual($where)
    {

        $this->db->select("user.*");

        $this->db->from("produk")->join("user", "produk.id_user=user.id_user");

        $this->db->where($where);

        $this->db->order_by("produk.id_user", "desc");

        $this->db->group_by("produk.id_user");

        $query = $this->db->get();

        return $query->result_array();
    }



    function get_produk_penjual_cart($where)
    {

        $this->db->select("keranjang_belanja.*");

        $this->db->select("produk.*");

        $this->db->from("keranjang_belanja")->join("produk", "keranjang_belanja.id_produk=produk.id_produk");

        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }



    function get_data_keranjang($where)
    {

        $this->db->select("keranjang_belanja.*");

        $this->db->select("produk.*");

        $this->db->from("keranjang_belanja")->join("produk", "keranjang_belanja.id_produk=produk.id_produk");

        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }



    function delete_table($table, $where)
    {

        $this->db->where($where);

        $query = $this->db->delete($table);

        return $query;
    }

    function empty_table($table)
    {
        return $this->db->empty_table($table);
    }



    function select_table_order_limit($row, $namatabel, $order_trigger, $limit)
    {

        $this->db->select($row);

        $this->db->from($namatabel);

        $this->db->order_by($order_trigger, "desc");

        $this->db->limit($limit);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_count_result_where($id_kategori_produk, $table)
    {

        $this->db->where(array('kategori_produk' => $id_kategori_produk, 'validasi' => 1));

        $this->db->from($table);

        return  $this->db->count_all_results();
    }



    function get_where_limmi($id_kategori_produk, $limit, $offset)
    {

        $this->db->select('*');

        $this->db->from('produk');

        $this->db->where(array('kategori_produk' => $id_kategori_produk));

        $this->db->order_by('id_produk', 'DESC');

        $this->db->limit($limit, $offset);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_where_limmi_semua($limit, $offset)
    {

        $this->db->select('*');

        $this->db->from('produk');

        $this->db->order_by('id_produk', 'DESC');

        $this->db->limit($limit, $offset);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_where_limmi2($produk, $limit, $offset)
    {

        $this->db->select('*');

        $this->db->from('produk');

        $this->db->like('produk.nama_produk', $produk);

        $this->db->order_by('id_produk', 'DESC');

        $this->db->limit($limit, $offset);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_table_join_where_limit($table1, $table2, $on, $where, $order_by, $order)
    {

        $this->db->select('*');

        $this->db->from($table1);

        $this->db->join($table2, $on);

        $this->db->where($where);

        $this->db->limit(4);

        $this->db->order_by($order_by, $order);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_kelurahan($id)
    {
        $this->db->where(array('kecamatan' => $id));
        return $this->db->get('kelurahan')->result_array();
    }

    public function get_detail_order($table, $where)
    {
        $this->db->select('*')
            ->from($table)
            ->join('kelurahan', 'order.kelurahan = kelurahan.id_kelurahan')
            ->join('kecamatan', 'order.kecamatan = kecamatan.id_kecamatan')
            ->join('kota', 'order.kecamatan = kecamatan.id_kecamatan')
            ->where($where);
        return $this->db->get()->result_array();
    }

    public function get_slug_kategori($slug)
    {
        $this->db->where('url_slug_kategori', $slug);
        return $this->db->get('kategori_produk')->row();
    }

    public function get_slug_kategori2()
    {
        // $this->db->where('url_slug_kategori', $slug);
        return $this->db->get('kategori_produk')->result_array();
    }

    public function get_slug_produk($slug)
    {
        $this->db->where('url_slug_produk', $slug);
        return $this->db->get('produk')->row();
    }

    function get_cek_pesan($kode = "null")
    {
        $this->db->where('id_keranjang_belanja', $kode);
        //$this->db->where('fc_status','visitor');
        $query = $this->db->get('keranjang_belanja')->num_rows();
        return $query;
    }

    function get_stok($id)
    {
        $this->db->select('jumlah_stok');
        $this->db->from('produk');
        $this->db->where('id_produk', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_id($tabel, $id)
    {
        $this->db->select($id)
            ->order_by($id, 'DESC')
            ->limit(1);
        return $this->db->get($tabel);
    }

    public function get_cek_kode($id)
    {
        $this->db->select('id_kpesan')
            ->where('id_kpesan', $id)
            ->limit(1);
        return $this->db->get('tk_pesan');
    }

    public function ajax_get_id($id)
    {
        $this->db->from('produk');
        $this->db->join('promo', 'produk.id_produk=promo.id_produk_promo', 'left outer');

        $this->db->where('id_produk', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function ajax_get_voucher($id)
    {
        $this->db->from('t_voucher');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_rating($table, $where)
    {
        //  $date = date('Y-m-d');
        $this->db->where($where);
        $this->db->select('count(id_produk) as jml_ulasan, sum(rate_star) as total_ulasan');
        $query = $this->db->get($table);

        return $query->row();
    }

    public function get_rating_order($table, $where)
    {
        //  $date = date('Y-m-d');
        $this->db->where($where);
        $this->db->select('count(review_produk.id_produk) as jml_ulasan, sum(rate_star) as total_ulasan');
        $this->db->join('detail_order', 'review_produk.id_produk=detail_order.id_produk', 'left outer');
        $query = $this->db->get($table);

        return $query->row();
    }

    public function get_komentar($table, $where)
    {
        $this->db->where($where);
        $query = $this->db->get($table);

        return $query->result();
    }

    public function komentar($id = null, $status = null)
    {
        if ($id == null) {
            $this->db->limit(10);
        } else {
            if ($status == null) {
                $this->db->where('review_produk.id_review', $id);
            } else {
                $this->db->limit(10);
            }
        }
        $this->db->order_by("RAND()");
        $this->db->from('review_produk');
        return $this->db->get();
    }

    public function ambil_komentar($num = null, $offset = null, $id_produk = null)
    {
        $this->db->order_by('id_review', 'ASC');
        $this->db->where('id_produk', $id_produk);
        $data = $this->db->get('review_produk', $num, $offset);

        return $data->result();
    }

    function where($where)
    {
        //$this->db->join('tab_akses_menu','tab_akses_menu.id_posisi=karyawan.id_posisi');
        return $this->db->get_where('member', $where);
    }

    public function get_by_id_profil($id)
    {
        $this->db->from('member');
        $this->db->where('id_member', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function ajax_get_alamat_profil($id)
    {
        $this->db->from('detail_alamat');
        $this->db->where('id_member', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function ajax_get_alamat_profil_id($id, $id_alamat)
    {
        $this->db->from('detail_alamat');
        $this->db->where('id_member', $id);
        $this->db->where('id_detail_alamat', $id_alamat);
        $query = $this->db->get();
        return $query->row();
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function get_load_alamat($id_member)
    {
        $this->db->where('id_member', $id_member);
        return $this->db->get('detail_alamat')->result();
    }

    public function get_by_id_alamat($id)
    {
        $this->db->from('detail_alamat');
        $this->db->where('id_detail_alamat', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function showCity2($province)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 8b273fb86a0e6550ac4b20b1104cfa48"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $result = 'error';
            return 'error';
        } else {
            return $response;
        }
    }

    public function showProvince()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 8b273fb86a0e6550ac4b20b1104cfa48"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $result = 'error';
            return 'error';
        } else {
            return $response;
        }
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_detail_alamat', $id);
        $this->db->delete('detail_alamat');
    }

    public function cekpassword($where)
    {
        $subquery = $this->db->select('view_password')
            ->from('member')
            ->where('view_password is not null', NULL, FALSE)
            ->get_compiled_select();

        return $this->db->where('view_password in (' . $subquery . ')', NULL, FALSE)
            ->where('view_password', $where)
            ->get('member');
    }

    public function get_load_status_menunggu_pembayaran($kode_member, $kode = "")
    {

        if ($kode == "") {
            $this->db->where('kode_member', $kode_member);
            $this->db->where('status_order', '1');
            $this->db->join('order', 'detail_order.id_order=order.id_order', 'left outer');
            $this->db->join('produk', 'detail_order.id_produk=produk.id_produk', 'left outer');
            return $this->db->get('detail_order')->result();
        } else {
            $this->db->where('kode_member', $kode_member);
            $this->db->where('status_order', '1');
            $this->db->where('order.id_order', $kode);
            $this->db->join('order', 'detail_order.id_order=order.id_order', 'left outer');
            $this->db->join('produk', 'detail_order.id_produk=produk.id_produk', 'left outer');
            return $this->db->get('detail_order')->result();
        }
    }

    public function get_load_status_sedang_dikemas($kode_member, $kode = "")
    {

        if ($kode == "") {
            $this->db->where('kode_member', $kode_member);
            $this->db->where('status_order', '2');
            $this->db->join('order', 'detail_order.id_order=order.id_order', 'left outer');
            $this->db->join('produk', 'detail_order.id_produk=produk.id_produk', 'left outer');
            return $this->db->get('detail_order')->result();
        } else {
            $this->db->where('kode_member', $kode_member);
            $this->db->where('status_order', '2');
            $this->db->where('order.id_order', $kode);
            $this->db->join('order', 'detail_order.id_order=order.id_order', 'left outer');
            $this->db->join('produk', 'detail_order.id_produk=produk.id_produk', 'left outer');
            return $this->db->get('detail_order')->result();
        }
    }

    public function get_load_status_dalam_pengiriman($kode_member, $kode = "")
    {

        if ($kode == "") {
            $this->db->where('kode_member', $kode_member);
            $this->db->where('status_order', '3');
            $this->db->join('order', 'detail_order.id_order=order.id_order', 'left outer');
            $this->db->join('produk', 'detail_order.id_produk=produk.id_produk', 'left outer');
            return $this->db->get('detail_order')->result();
        } else {
            $this->db->where('kode_member', $kode_member);
            $this->db->where('status_order', '3');
            $this->db->where('order.id_order', $kode);
            $this->db->join('order', 'detail_order.id_order=order.id_order', 'left outer');
            $this->db->join('produk', 'detail_order.id_produk=produk.id_produk', 'left outer');
            return $this->db->get('detail_order')->result();
        }
    }

    public function get_load_status_sudah_sampai($kode_member, $kode = "")
    {

        if ($kode == "") {
            $this->db->where('kode_member', $kode_member);
            $this->db->where('status_order', '4');
            $this->db->join('order', 'detail_order.id_order=order.id_order', 'left outer');
            $this->db->join('produk', 'detail_order.id_produk=produk.id_produk', 'left outer');
            return $this->db->get('detail_order')->result();
        } else {
            $this->db->where('kode_member', $kode_member);
            $this->db->where('status_order', '4');
            $this->db->where('order.id_order', $kode);
            $this->db->join('order', 'detail_order.id_order=order.id_order', 'left outer');
            $this->db->join('produk', 'detail_order.id_produk=produk.id_produk', 'left outer');
            return $this->db->get('detail_order')->result();
        }
    }

    public function get_id_order($id)
    {
        $this->db->where('id_order', $id);
        return $this->db->get('order')->row();
    }

    public function get_detail_id_order($id)
    {
        $this->db->where('id_order', $id);
        $this->db->join('produk', 'detail_order.id_produk=produk.id_produk', 'left outer');
        return $this->db->get('detail_order')->result();
    }

    public function hitungOngkir($origin, $destination, $weight, $courier)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>
            "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "key: 8b273fb86a0e6550ac4b20b1104cfa48"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $result = 'error';
            return 'error';
        } else {
            return $response;
        }
    }

    function get_table_limit($table, $order_by, $order, $limit)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by, $order);
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_table_produk_ter($table, $order_by, $order, $limit)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('promo', 'produk.id_produk=promo.id_produk_promo', 'left outer');
        $this->db->join('kategori_produk', 'produk.kategori_produk=kategori_produk.id_kategori_produk', 'left outer');
        $this->db->order_by($order_by, $order);
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result_array();
    }
}
