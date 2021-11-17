<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Home extends CI_Controller

{



	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */



	function __construct()

	{

		parent::__construct();

		$this->load->helper(array('form', 'url'));

		$this->load->model('toko_online_model');

		$this->load->library('session');
	}



	public function index()

	{

		$data['title'] = "Situs Toko Online Terlengkap | blonjosam.com";

		$data['content'] = 'user/index1';

		$data['kategori'] = $this->toko_online_model->get_slug_kategori2();

		$data['produk_terbaru'] = $this->toko_online_model->get_table_limit('produk', 'id_produk', 'DESC', '8');

		$data['produk_termurah'] = $this->toko_online_model->get_table_limit('produk', 'harga', 'ASC', '8');

		$data['produk_terlaris'] = $this->toko_online_model->get_table_limit('produk', 'jumlah_terjual', 'DESC', '8');

		$data['nav'] = 1;

		// $this->load->view('user/dashboard1', $data);

		echo "Jancuk";
	}



	function cek_pesan()

	{



		$idk_psn =  $this->session->userdata('id_kpesan');

		//echo 'idk'.$idk_psn;

		//  $this->toko_online_model->get_cek_pesan($idk_psn);

		//  print_r($this->db->last_query());

		echo json_encode($this->toko_online_model->get_cek_pesan($idk_psn));
	}



	// 	function cek_session(){

	// 		$idk_psn = $this->session->userdata('id_kpesan');

	// 		//echo 'idk'.$idk_psn;

	// 	   if ($idk_psn == null){

	// 		   //$id_kpesan = $this->id_oto('IKP','td_keranjang_belanja','fc_kdkeranjang_belanja');

	// 		    $id_kpesan = $this->id_oto('IKP','keranjang_belanja','id_keranjang_belanja');



	// 			$this->session->set_userdata('id_kpesan',$id_kpesan);

	// 	   }

	//    }



	public function id_oto($kode, $tabel, $id)

	{

		$fix = 0;

		$kode = $kode;

		$fix = $this->toko_online_model->get_id($tabel, $id)->row_array();

		//print_r($this->db->last_query());

		if (empty($fix)) {

			$fix = 0;
		}

		if (substr(@$fix[$id], 4, 6) == date('ymd')) {

			$angka = substr($fix[$id], 11) + 1;

			$angka_p = str_pad($angka, 3, "0", STR_PAD_LEFT);

			$tgl_angk = substr($fix[$id], 4, 7) . $angka_p;
		} else {

			$tgl_angk = date('ymd') . '_001';
		}

		return $kode_jadi = $kode . '_' . $tgl_angk;
	}



	public function cek_sedia()

	{

		$idk_psn = $this->session->userdata('id_kpesan');

		if (!empty($idk_psn)) {

			$id_kpesan = $this->session->userdata('id_kpesan');
		} else {

			if ($this->session->kode_member == "") {

				$id_kpesan = $this->id_oto('IKP', 'tk_pesan', 'id_kpesan');
			} else {

				$id_kpesan = $this->session->kode_member;
			}



			$cek_kode = $this->toko_online_model->get_cek_kode($id_kpesan)->row_array();

			if (empty($cek_kode)) {

				$data_kpesan['id_kpesan'] = $id_kpesan;

				$this->toko_online_model->add('tk_pesan', $data_kpesan);
			} else {

				$data = array(

					'id_kpesan' => $id_kpesan,

				);



				$update = $this->toko_online_model->update_table('tk_pesan', $data, array('id_kpesan' => $id_kpesan));
			}



			$this->session->set_userdata('id_kpesan', $id_kpesan);
		}
	}



	public function detail($slug_kategori = null, $slug_produk = null, $id = NULL)

	{

		$get_slug_produk = $this->toko_online_model->get_slug_produk($slug_produk);

		$data['title'] = "Situs Jual " . $get_slug_produk->nama_produk . " Terlengkap | blonjosam.com";

		$data['detail_produk'] = $this->toko_online_model->get_table_where_produk('produk', array('id_produk' => $get_slug_produk->id_produk));

		$data['voucher'] = $this->toko_online_model->get_voucher('t_voucher', array('id_produk' => $get_slug_produk->id_produk));

		$data['rating'] = $this->toko_online_model->get_rating('review_produk', array('id_produk' => $get_slug_produk->id_produk));

		//$data['komentar'] = $this->toko_online_model->get_komentar('review_produk', array('id_produk' => $get_slug_produk->id_produk));

		$jml = $this->toko_online_model->komentar();

		$config['base_url'] = base_url('produk') . '/' . $slug_kategori . '/' . $slug_produk;

		$config['total_rows'] = $jml->num_rows();

		$config['per_page'] = '2';

		$config['next_page'] = '&laquo;';

		$config['full_tag_open'] = '<div class="page__pagination">';

		$config['full_tag_close'] = '</div>';

		$config['first_link']    = 'First';

		$config['last_link']    = 'Last';

		$config['next_link']	= 'Next';

		$config['prev_link']	= 'Prev';

		$config['cur_tag_open']  = '<span class="current"></a>';

		$config['cur_tag_close']  = '</a></span>';

		$config['prev_page'] = '&raquo;';



		//inisialisasi config

		$this->pagination->initialize($config);



		//buat pagination

		$data['halaman'] = $this->pagination->create_links();



		$data['query'] = $this->toko_online_model->ambil_komentar($config['per_page'], $id, $get_slug_produk->id_produk);



		$data['content'] = 'user/produk_detail1';

		$data['nav'] = 2;

		$this->load->view('user/dashboard1', $data);

		// echo $slug_produk;

	}



	public function detail2($slug_kategori = null, $slug_produk = null, $id = NULL)

	{

		//$this->cek_session();

		// $id_session = $this->session->userdata('id_kpesan');

		// if ($id_session == null) {

		// 	$acak = rand(10000, 100000);

		// 	$this->session->set_userdata('id_kpesan', $acak);

		// }



		$get_slug_produk = $this->toko_online_model->get_slug_produk($slug_produk);

		//print_r($this->db->last_query());

		$data['title'] = "Situs Jual " . $get_slug_produk->nama_produk . " Terlengkap | blonjosam.com";

		$data['nav'] = 2;



		$data['detail_produk'] = $this->toko_online_model->get_table_where('produk', array('id_produk' => $get_slug_produk->id_produk));

		$data['voucher'] = $this->toko_online_model->get_voucher('t_voucher', array('id_produk' => $get_slug_produk->id_produk));

		///print_r($this->db->last_query());

		$data['rating'] = $this->toko_online_model->get_rating('review_produk', array('id_produk' => $get_slug_produk->id_produk));

		//$data['komentar'] = $this->toko_online_model->get_komentar('review_produk', array('id_produk' => $get_slug_produk->id_produk));

		$jml = $this->toko_online_model->komentar();



		$config['base_url'] = base_url('produk') . '/' . $slug_kategori . '/' . $slug_produk;

		$config['total_rows'] = $jml->num_rows();

		$config['per_page'] = '2';

		$config['next_page'] = '&laquo;';

		$config['full_tag_open'] = '<div class="page__pagination">';

		$config['full_tag_close'] = '</div>';

		$config['first_link']    = 'First';

		$config['last_link']    = 'Last';

		$config['next_link']	= 'Next';

		$config['prev_link']	= 'Prev';

		$config['cur_tag_open']  = '<span class="current"></a>';

		$config['cur_tag_close']  = '</a></span>';

		$config['prev_page'] = '&raquo;';



		//inisialisasi config

		$this->pagination->initialize($config);



		//buat pagination

		$data['halaman'] = $this->pagination->create_links();



		$data['query'] = $this->toko_online_model->ambil_komentar($config['per_page'], $id, $get_slug_produk->id_produk);



		$data['content'] = 'user/produk_detail1';

		$this->load->view('user/dashboard1', $data);
	}



	public function produk($id_kategori_produk, $offset = 0)

	{

		$this->load->library('pagination');

		$data['content'] = 'user/produk1';

		$get_slug_kategori = $this->toko_online_model->get_slug_kategori($id_kategori_produk);

		$data['title'] = "Situs Jual " . $get_slug_kategori->nama_kategori_produk . " Terlengkap | blonjosam.com";

		$data['produk'] = $this->toko_online_model->get_table_where_produk('produk', array('kategori_produk' => $get_slug_kategori->id_kategori_produk));

		$data['kategori'] = $this->toko_online_model->get_table('kategori_produk');

		$data['nav'] = 2;

		$data['ktg'] = $this->toko_online_model->get_slug_kategori($id_kategori_produk);

		$this->load->view('user/dashboard1', $data);
	}


	public function semua_produk($offset = 0)

	{

		$this->load->library('pagination');



		$data['content'] = 'user/produk_all';







		$config['per_page'] = 6; /*Jumlah data yang dipanggil perhalaman*/







		$data['produk'] = $this->toko_online_model->get_where_limmi_semua($config['per_page'], $offset);

		$data['kategori'] = $this->toko_online_model->get_table('kategori_produk');



		$this->load->view('user/dashboard1', $data);
	}

	public function promo($offset = 0)

	{

		$this->load->library('pagination');

		$data['content'] = 'user/promo';

		$data['title'] = "Situs Jual Produk Promo Terlengkap | blonjosam.com";

		$data['produk'] = $this->toko_online_model->get_table_promo();

		// echo json_encode($data['produk']);
		// die;

		$data['kategori'] = $this->toko_online_model->get_table('kategori_produk');

		$data['nav'] = 6;

		$this->load->view('user/dashboard1', $data);
	}



	public function cari_produk($offset = 0)

	{

		$produk = $this->input->post('nama_produk');

		$this->load->library('pagination');

		$data['title'] = "Situs Jual " . $produk . " Terlengkap | blonjosam.com";

		$data['content'] = 'user/cari_produk1';
		$data['nav'] = 2;


		$config['per_page'] = 6; /*Jumlah data yang dipanggil perhalaman*/


		$data['produk'] = $this->toko_online_model->get_table_search_produk('produk', $produk, $offset);

		//print_r($this->db->last_query());
		$data['cari'] = $produk;

		$data['kategori'] = $this->toko_online_model->get_table('kategori_produk');



		$this->load->view('user/dashboard1', $data);
	}



	public function produk_detail($id_produk)

	{

		// $data['menu'] =$this->toko_online_model->get_table_where('menu', array('aktif_menu' => 1));

		// $data['detail_produk'] = $this->toko_online_model->get_table_where('produk', array('id_produk' => $id_produk));
		$data['detail_produk'] = $this->toko_online_model->get_detail_produk($id_produk);

		$data['content'] = 'user/produk_detail1';

		$this->load->view('user/dashboard1', $data);
	}



	public function account()

	{

		$data['content'] = 'user/account';

		$data['nav'] = 0;

		$this->load->view('user/dashboard', $data);
	}



	public function keranjang_belanja()

	{



		//	$this->cek_session(); 

		$this->cek_sedia();

		$ip = $this->session->userdata('id_kpesan');

		$id_produk = $this->input->post('id_produk');

		$harga = $this->input->post('harga');

		$berat_bersih = $this->input->post('berat_bersih');

		$berat_kotor = $this->input->post('berat_kotor');

		$quantity = $this->input->post('jumlah_beli');

		if ($this->input->post('potongan') == "") {

			$potongan = 0;
		} else {

			$potongan = $this->input->post('potongan');
		}



		$subtotal = $this->input->post('harga_jumlah');

		$berat_total = $berat_kotor * $quantity;



		$ambil_data = $this->toko_online_model->get_table_where('keranjang_belanja', array('id_keranjang_belanja' => $ip, 'id_produk' => $id_produk));



		if ($ambil_data != null) {

			$quantity_new = $ambil_data[0]['jumlah_produk'] + $quantity;

			$subtotal_new = $ambil_data[0]['subtotal_belanja'] + $subtotal;

			$berat_total_new = $ambil_data[0]['berat_total'] + $berat_total;



			$data = array(

				'jumlah_produk' => $quantity_new,

				'subtotal_belanja' => $subtotal_new,

				'berat_total' => $berat_total_new

			);



			$update = $this->toko_online_model->update_table('keranjang_belanja', $data, array('id_keranjang_belanja' => $ip, 'id_produk' => $id_produk));
		} else {

			$data = array(

				'id_keranjang_belanja' 	=> $ip,

				'id'					=> rand(),

				'id_produk'				=> $id_produk,

				'harga_produk'			=> $harga,

				'berat_bersih'			=> $berat_bersih,

				'berat_kotor'			=> $berat_kotor,

				'jumlah_produk'			=> $quantity,

				'subtotal_belanja'		=> $subtotal,

				'berat_total'			=> $berat_total,

				'potongan'				=> $potongan

			);

			$insert = $this->toko_online_model->insert_table('keranjang_belanja', $data);
		}



		redirect(base_url('/user/home/cart/'));

		// echo json_encode(array('status' => TRUE));

	}



	public function update_keranjang_belanja()

	{

		$id_produk = $this->input->post('id_produk');

		$id_keranjang_belanja = $this->input->post('id_keranjang_belanja');

		$quantity = $this->input->post('quantity');



		$keranjang = $this->toko_online_model->get_table_where('keranjang_belanja', array('id_keranjang_belanja' => $id_keranjang_belanja, 'id_produk' => $id_produk));



		$data = array(

			'jumlah_produk' => $quantity,

			'subtotal_belanja' => $keranjang[0]['harga_produk'] * $quantity

		);



		$update = $this->toko_online_model->update_table('keranjang_belanja', $data, array('id_keranjang_belanja' => $id_keranjang_belanja, 'id_produk' => $id_produk));



		if ($update) {

			redirect("/user/home/cart");

			$this->session->set_flashdata('message', 'Keranjang berhasil di update');
		} else {

			redirect("/user/home/cart");

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Keranjang gagal di update</div>');
		}
	}



	public function remove_keranjang_belanja($id)

	{

		$where = array(

			'id' 	=> $id

		);

		$this->toko_online_model->delete_table('keranjang_belanja', $where);

		echo "<script>

				window.history.go(-1);

				location.reload();

		</script>";
	}



	public function empty_keranjang_belanja()
	{

		$this->toko_online_model->empty_table('keranjang_belanja');

		echo "<script>

				window.history.go(-1);

				location.reload();

		</script>";
	}



	public function cart()

	{

		$data['title'] = "Keranjang Belanja | blonjosam.com";

		$data['total'] = $this->toko_online_model->get_total('keranjang_belanja', array('id_keranjang_belanja' => $this->session->userdata('id_kpesan')), 'jumlah_produk', 'subtotal_belanja');

		//print_r($this->db->last_query());

		$data['jumlah'] = $this->toko_online_model->get_jumlah('keranjang_belanja', array('id_keranjang_belanja' => $this->session->userdata('id_kpesan')), 'jumlah_produk', 'berat_total');

		$data['cart'] = $this->toko_online_model->get_cart(array('keranjang_belanja.id_keranjang_belanja' => $this->session->userdata('id_kpesan')));

		$data['content'] = 'user/cart1';

		$data['nav'] = 0;

		$this->load->view('user/dashboard1', $data);
	}







	function kontak()

	{

		$data['title'] = "Kontak Kami | blonjosam.com";

		$data_konten = $this->toko_online_model->get_table_where('konten', array('id_konten', 1));

		$data['data'] = $data_konten[0]['tentang'];

		$data['content'] = 'user/contact';

		$data['label'] = "Tentang";

		$data['nav'] = 5;

		$this->load->view('user/dashboard1', $data);
	}



	function aturan()

	{

		$data_konten = $this->toko_online_model->get_table_where('konten', array('id_konten', 1));

		$data['data'] = $data_konten[0]['aturan'];

		$data['content'] = 'user/about1';

		$data['label'] = "Aturan Umum";

		$data['nav'] = 0;

		$this->load->view('user/dashboard1', $data);
	}



	function panduan()

	{

		$data['title'] = "Cara Belanja | blonjosam.com";

		$data_konten = $this->toko_online_model->get_table_where('konten', array('id_konten', 1));

		$data['data'] = $data_konten[0]['panduan'];

		$data['content'] = 'user/about1';

		$data['label'] = "Panduan";

		$data['nav'] = 3;

		$this->load->view('user/dashboard1', $data);
	}



	public function checkout()

	{

		$data['title'] = "Checkout | blonjosam.com";

		$data['konten'] = $this->toko_online_model->get_table('konten');

		$data['jumlah'] = $this->toko_online_model->get_jumlah('keranjang_belanja', array('id_keranjang_belanja' => $this->session->userdata('id_kpesan')), 'jumlah_produk', 'berat_total');

		$data['lokasi'] = $this->toko_online_model->get_table('konten');

		$data['total'] = $this->toko_online_model->get_total_tot('keranjang_belanja', array('id_keranjang_belanja' => $this->session->userdata('id_kpesan')), 'jumlah_produk', 'subtotal_belanja', 'berat_total');

		$data['cart'] = $this->toko_online_model->get_keranjang_belanja(array('keranjang_belanja.id_keranjang_belanja' => $this->session->userdata('id_kpesan')));

		if ($data['cart'] == null) {

			$this->session->set_flashdata(

				'cart',

				'<div class="alert alert-danger" role="alert">

					Keranjang Belanja Kosong

					</div>'

			);

			$data['content'] = 'user/cart1';

			$this->load->view('user/dashboard1', $data);
		} else {

			$penjual = $this->toko_online_model->get_penjual_cart(array('keranjang_belanja.id_keranjang_belanja' => $this->session->userdata('id_kpesan')));

			$angka = 0;

			foreach ($penjual as $p) {

				$data_penjual[$angka] = $this->toko_online_model->get_table_where('user', array('id_user' => $p['id_user']));

				$angka++;
			}



			// $data_penjual = array();

			// $angka = 0;

			// foreach ($data['cart'] as $cart) {

			// 	$data_penjual[$angka] = $this->toko_online_model->get_penjual(array('produk.id_produk' => $cart['id_produk']));

			// 	// print_r($data_penjual[$angka]);

			// 	// echo "<br>";

			// 	$angka++;

			// }

			// foreach ($data_penjual as $penjual) {

			// 	if

			// }



			$data['penjual'] = $data_penjual;

			if ($this->session->userdata('nama_member') != "") {

				$data['content'] = 'user/checkout_member';
				$id_member = $this->session->userdata('id_member');

				$data['member'] = $this->toko_online_model->ajax_get_alamat_profil($id_member);
			} else {

				$data['content'] = 'user/checkout1';
			}



			$data['nav'] = 2;

			$this->load->view('user/dashboard1', $data);
		}
	}



	function _api_ongkir_post($origin, $des, $qty, $cour)

	{

		$curl = curl_init();

		curl_setopt_array($curl, array(

			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_ENCODING => "",

			CURLOPT_MAXREDIRS => 10,

			CURLOPT_TIMEOUT => 30,

			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

			CURLOPT_CUSTOMREQUEST => "POST",

			CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $des . "&weight=" . $qty . "&courier=" . $cour,

			CURLOPT_HTTPHEADER => array(

				"content-type: application/x-www-form-urlencoded",

				/* masukan api key disini*/

				"key: 8b273fb86a0e6550ac4b20b1104cfa48"

			),

		));



		$response = curl_exec($curl);

		$err = curl_error($curl);



		curl_close($curl);



		if ($err) {

			return $err;
		} else {

			return $response;
		}
	}











	function _api_ongkir($data)

	{

		$curl = curl_init();



		curl_setopt_array($curl, array(

			//CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",

			//CURLOPT_URL => "http://api.rajaongkir.com/starter/province",

			CURLOPT_URL => "http://api.rajaongkir.com/starter/" . $data,

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_ENCODING => "",

			CURLOPT_MAXREDIRS => 10,

			CURLOPT_TIMEOUT => 30,

			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

			CURLOPT_CUSTOMREQUEST => "GET",

			CURLOPT_HTTPHEADER => array(

				/* masukan api key disini*/

				"key: 8b273fb86a0e6550ac4b20b1104cfa48"

			),

		));



		$response = curl_exec($curl);

		$err = curl_error($curl);



		curl_close($curl);



		if ($err) {

			return  $err;
		} else {

			return $response;
		}
	}





	public function provinsi()

	{



		$provinsi = $this->_api_ongkir('province');

		$data = json_decode($provinsi, true);

		echo json_encode($data['rajaongkir']['results']);
	}



	public function kota($provinsi = "")

	{

		if (!empty($provinsi)) {

			if (is_numeric($provinsi)) {

				$kota = $this->_api_ongkir('city?province=' . $provinsi);

				$data = json_decode($kota, true);

				echo json_encode($data['rajaongkir']['results']);
			} else {

				show_404();
			}
		} else {

			show_404();
		}
	}



	public function showprovince()



	{



		$province = $this->toko_online_model->showProvince();



		echo $province;
	}



	public function showcity2($province)

	{



		$idprovince = $this->input->get('province');



		$kode_pos = $this->toko_online_model->showCity2($idprovince);



		echo $kode_pos;
	}



	public function tarif($origin, $des, $qty, $cour)

	{

		$berat = $qty;

		$tarif = $this->_api_ongkir_post($origin, $des, $berat, $cour);

		$data = json_decode($tarif, true);

		echo json_encode($data['rajaongkir']['results']);
	}



	function load_stok($id)

	{ //load data cart

		echo $this->show_stok($id);
	}



	function show_stok($id)

	{

		$stok_produk = $this->toko_online_model->get_stok($id);

		$tengah = '';

		for ($i = 1; $i <= $stok_produk[0]['jumlah_stok']; $i++) {

			if ($i == 1) {



				$tengah = $tengah . '<option selected value="' . $i . '">' . $i . '</option>';
			} else {



				$tengah = $tengah . '<option value="' . $i . '">' . $i . '</option>';
			}
		}



		$output = '';



		$output .=

			$tengah;



		return $output;
	}



	function ajax_get_id($id_produk)

	{

		$data = $this->toko_online_model->ajax_get_id($id_produk);

		echo json_encode($data);
	}



	function ajax_get_voucher($id_voucher)

	{

		$data = $this->toko_online_model->ajax_get_voucher($id_voucher);

		echo json_encode($data);
	}



	public function login()

	{

		$this->load->view('user/login');
	}

	public function logout()

	{
		$this->session->sess_destroy();
		redirect("");
	}



	public function insert_register()

	{

		$kode_member = $this->id_oto('MBR', 'member', 'kode_member');

		$data = array(

			'kode_member' => $kode_member,

			'nama_member' => $this->input->post('nama_member', TRUE),

			'email' => $this->input->post('email', TRUE),

			'password' => md5($this->input->post('password', TRUE))

		);



		$data2 = $this->toko_online_model->insert_table('member', $data);



		$cek_login = $this->toko_online_model->where($data);

		//print_r($this->db->last_query());

		if ($cek_login->num_rows() > 0) {

			$sql = $cek_login->result_array();



			$items = array();

			foreach ($sql as $key) {

				$items = $key;
			}

			// print_r($items);

			$this->session->set_userdata($items);



			//$this->session->set_flashdata('data', '<div class="alert alert-success">Berhasil Masuk</div>');

			redirect('');
		} else {

			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}



	function check_login()

	{

		$data = array(

			'email' => $this->input->post('email', TRUE),

			'password' => md5($this->input->post('password', TRUE))

		);



		//$this->load->model('model_user'); // load model_user

		$cek_login = $this->toko_online_model->where($data);

		//	print_r($this->db->last_query());



		if ($cek_login->num_rows() > 0) {

			$sql = $cek_login->result_array();



			$items = array();

			foreach ($sql as $key) {

				$items = $key;
			}

			// print_r($items);

			$this->session->set_userdata($items);



			redirect('');
		} else {

			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}



	public function akun()

	{

		$data['title'] = "Profil | blonjosam.com";

		$data['content'] = 'user/akun_profile';

		$data['nav'] = 0;

		$this->load->view('user/dashboard1', $data);
	}



	public function ajax_edit_profil()

	{

		$id = $this->session->userdata('id_member');

		$data = $this->toko_online_model->get_by_id_profil($id);

		echo json_encode($data);
	}



	public function ajax_get_alamat_profil()

	{

		$id = $this->session->userdata('id_member');

		$data = $this->toko_online_model->ajax_get_alamat_profil($id);

		echo json_encode($data);
	}



	public function ajax_get_alamat_profil_id($id_alamat)

	{

		$id = $this->session->userdata('id_member');

		$data = $this->toko_online_model->ajax_get_alamat_profil_id($id, $id_alamat);

		echo json_encode($data);
	}



	public function update_profile()

	{

		$data['username'] = $this->input->post('username');

		$data['nama_member'] = $this->input->post('nama_member');

		$data['email'] = $this->input->post('email');

		$data['no_telp'] = $this->input->post('no_telp');

		$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');

		$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');



		$config['upload_path'] = realpath('assets/img/profile');

		$config['allowed_types']        = 'jpg|png|jpeg';

		$config['max_size'] = '2000000';

		$config['max_width'] = '2024';

		$config['max_height'] = '1468';



		$reptext = preg_replace('/[^A-Za-z0-9\  ]/', '', $this->input->post('nama_member'));

		$new_name = str_replace(" ", "-", str_replace(".", "", $reptext)) . "-1" . time();

		$config['file_name'] = $new_name;

		$this->load->library('upload', $config);

		$this->upload->initialize($config);



		if ($this->upload->do_upload('foto_profil')) {

			$get_name = $this->upload->data();

			$nama_foto = $get_name['file_name'];

			$data['foto_profil'] = $nama_foto;
		}



		$where = array('id_member' => $this->session->userdata('id_member'));

		$this->toko_online_model->update_data($where, $data, 'member');



		echo json_encode(array('status' => TRUE));
	}



	public function load_alamat()

	{

		$id_member = $this->session->userdata('id_member');

		echo json_encode($this->toko_online_model->get_load_alamat($id_member));
	}



	public function load_alamat_member()

	{

		$id_member = $this->session->userdata('id_member');

		echo json_encode($this->toko_online_model->get_load_alamat($id_member));
	}



	public function simpan_alamat()

	{

		$data = array(

			'id_member' => $this->session->userdata('id_member'),

			'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),

			'no_telp' => $this->input->post('no_telp', TRUE),

			'alamat' => $this->input->post('alamat', TRUE),

			'email' => $this->input->post('email', TRUE),

			'city_id' => $this->input->post('kota_order', TRUE),

			'kota' => $this->input->post('nama_kota', TRUE),

			'province_id' => $this->input->post('provinsi', TRUE),

			'provinsi' => $this->input->post('nama_provinsi', TRUE),

			'kode_pos' => $this->input->post('kode_pos', TRUE),

			'sts' => "R"

		);



		$data2 = $this->toko_online_model->insert_table('detail_alamat', $data);



		echo json_encode(array('status' => TRUE));
	}



	public function ajax_edit_alamat($id)

	{

		$data = $this->toko_online_model->get_by_id_alamat($id);

		echo json_encode($data);
	}



	public function update_alamat()

	{

		$data = array(

			'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),

			'no_telp' => $this->input->post('no_telp', TRUE),
			'email' => $this->input->post('email', TRUE),

			'alamat' => $this->input->post('alamat', TRUE),

			'city_id' => $this->input->post('kota_order', TRUE),

			'kota' => $this->input->post('nama_kota', TRUE),

			'province_id' => $this->input->post('provinsi', TRUE),

			'provinsi' => $this->input->post('nama_provinsi', TRUE),

			'kode_pos' => $this->input->post('kode_pos', TRUE),

		);



		$where = array('id_detail_alamat' => $this->input->post('id_detail_alamat'));

		$this->toko_online_model->update_data($where, $data, 'detail_alamat');



		echo json_encode(array('status' => TRUE));
	}



	public function ajax_delete_alamat($id)

	{



		$this->toko_online_model->delete_by_id($id);

		echo json_encode(array("status" => TRUE));
	}



	public function cekpassword($kode)

	{

		$res = $this->toko_online_model->cekpassword($kode)->row();

		//	echo $this->db->last_query();

		// print_r($res);



		if (count((array) $res) > 0) {

			echo json_encode('true');
		} else {

			echo json_encode('false');
		}
	}



	public function update_password()

	{

		$data = array(

			'view_password' => $this->input->post('konfirmasi_password', TRUE),

			'password' => md5($this->input->post('konfirmasi_password', TRUE)),

		);



		$where = array('id_member' => $this->session->userdata('id_member'));

		$this->toko_online_model->update_data($where, $data, 'member');



		redirect('user/home/akun');
	}



	public function load_status_menunggu_pembayaran($kode)

	{

		//echo "kode2".$kode;

		if ($kode == '0') {

			$kodene = "";
		} else {

			$kodene = $kode;
		}

		//echo "kode".$kodene;

		$kode_member = $this->session->userdata('kode_member');

		// $this->toko_online_model->get_load_status_menunggu_pembayaran($kode_member, $kodene);

		// print_r($this->db->last_query());

		echo json_encode($this->toko_online_model->get_load_status_menunggu_pembayaran($kode_member, $kodene));
	}



	public function load_status_sedang_dikemas($kode)

	{

		//echo "kode2".$kode;

		if ($kode == '0') {

			$kodene = "";
		} else {

			$kodene = $kode;
		}

		//echo "kode".$kodene;

		$kode_member = $this->session->userdata('kode_member');

		// $this->toko_online_model->get_load_status_menunggu_pembayaran($kode_member, $kodene);

		// print_r($this->db->last_query());

		echo json_encode($this->toko_online_model->get_load_status_sedang_dikemas($kode_member, $kodene));
	}



	public function load_status_dalam_pengiriman($kode)

	{

		//echo "kode2".$kode;

		if ($kode == '0') {

			$kodene = "";
		} else {

			$kodene = $kode;
		}

		//echo "kode".$kodene;

		$kode_member = $this->session->userdata('kode_member');

		// $this->toko_online_model->get_load_status_menunggu_pembayaran($kode_member, $kodene);

		// print_r($this->db->last_query());

		echo json_encode($this->toko_online_model->get_load_status_dalam_pengiriman($kode_member, $kodene));
	}



	public function load_status_sudah_sampai($kode)

	{

		//echo "kode2".$kode;

		if ($kode == '0') {

			$kodene = "";
		} else {

			$kodene = $kode;
		}

		//echo "kode".$kodene;

		$kode_member = $this->session->userdata('kode_member');

		// $this->toko_online_model->get_load_status_menunggu_pembayaran($kode_member, $kodene);

		// print_r($this->db->last_query());

		echo json_encode($this->toko_online_model->get_load_status_sudah_sampai($kode_member, $kodene));
	}



	public function detail_order($id)

	{

		$data['title'] = "Blonjosam | blonjosam.com";

		$data['order'] = $this->toko_online_model->get_id_order($id);

		$data['detail_order'] = $this->toko_online_model->get_detail_id_order($id);

		$data['rating'] = $this->toko_online_model->get_rating_order('review_produk', array('id_order' => $id));

		$data['content'] = 'user/purchase_order';

		$data['nav'] = 4;

		$this->load->view('user/dashboard1', $data);
	}



	public function cost()

	{

		//$this->load->model('ongkir_model');

		$origin			= $this->input->get('origin');

		$destination	= $this->input->get('destination');

		$weight			= $this->input->get('weight');

		$courier		= $this->input->get('courier');

		$id_penjual		= $this->input->get('trigger');

		$angka			= 0;

		// 			var_dump($origin);

		// 			var_dump($destination);

		// 			var_dump($weight);

		// 			var_dump($courier);

		$cost 			= $this->toko_online_model->hitungOngkir($origin, $destination, $weight, $courier);

		//print_r($cost);

		//parse json

		$costarray = json_decode($cost);

		//print_r();

		if ($destination != "") {

			$results = $costarray->rajaongkir->results;

			//echo "testarray => ".$results[0]->costs[0]->service;

			if (empty($results[0]->costs[0])) {

				echo "<script>alert(\"Layanan " . strtoupper($courier) . " tidak tersedia di kota anda, silahkan pilih jasa pengiriman yang lain.\");</script>";
			}



			//echo $destination;



			# code...



			//var_dump($results);

			if (!empty($results)) :



				foreach ($results as $r) :

					$ti = 1;

					foreach ($r->costs as $rc) :

						if ($ti == 1) {

							echo "<tr><td>&nbsp</td><td>Jenis Layanan</td><td>Deskripsi</td><td>Estimasi Pengiriman</td><td>Biaya</td></tr>";
						}



						foreach ($rc->cost as $rcc) :

							echo "";



							$jn_ly = " - " . $rc->service;

?>

							<tr>



								<td><input type='radio' name='tarif' id='tarif' onClick='pilihOngkir("<?php echo $id_penjual ?>","<?php echo strtoupper($courier) . $jn_ly; ?>","<?php echo $rcc->etd  ?>")' value='<?php echo $rcc->value ?>'></td>

								<td><?php echo $rc->service ?></td>

								<td><?php echo $rc->description ?></td>

								<td><?php echo $rcc->etd  ?>hari </td>

								<td>Rp. <?php echo number_format($rcc->value, 0, "", ".") ?></td>

							</tr>

<?php

							$ti++;

						endforeach;

					endforeach;

				endforeach;

			endif;
		} else {

			echo "<script>alert(\"silahkan Lengakapi info kota anda\");</script>";
		}

		//end of parse json

	}



	//function tambahan 

	public function produk_terbaru($offset = 0)

	{

		$this->load->library('pagination');

		$data['title'] = "Situs Jual Produk Terbaru Terlengkap | blonjosam.com";

		$data['content'] = 'user/produk_terbaru';

		$data['nav'] = 2;

		$config['per_page'] = 6; /*Jumlah data yang dipanggil perhalaman*/

		// $data['produk'] = $this->toko_online_model->get_table_where('produk', array('kategori_produk' => $id_kategori_produk));

		$data['produk'] = $this->toko_online_model->get_table_produk_ter('produk', 'id_produk', 'DESC', '30');

		$data['kategori'] = $this->toko_online_model->get_table('kategori_produk');

		$this->load->view('user/dashboard1', $data);
	}



	public function produk_terlaris($offset = 0)

	{

		$this->load->library('pagination');

		$data['title'] = "Situs Jual Produk Teraris Terlengkap | blonjosam.com";

		$data['content'] = 'user/produk_terlaris';

		$data['nav'] = 2;

		$config['per_page'] = 6; /*Jumlah data yang dipanggil perhalaman*/

		// $data['produk'] = $this->toko_online_model->get_table_where('produk', array('kategori_produk' => $id_kategori_produk));

		$data['produk'] = $this->toko_online_model->get_table_produk_ter('produk', 'jumlah_terjual', 'DESC', '30');

		$data['kategori'] = $this->toko_online_model->get_table('kategori_produk');

		$this->load->view('user/dashboard1', $data);
	}



	public function produk_termurah($offset = 0)

	{

		$this->load->library('pagination');

		$data['content'] = 'user/produk_terlaris';

		$data['title'] = "Situs Jual Produk Termurah Terlengkap | blonjosam.com";

		$data['nav'] = 2;

		$config['per_page'] = 6; /*Jumlah data yang dipanggil perhalaman*/

		// $data['produk'] = $this->toko_online_model->get_table_where('produk', array('kategori_produk' => $id_kategori_produk));

		$data['produk'] = $this->toko_online_model->get_table_produk_ter('produk', 'harga', 'ASC', '30');
		// echo json_encode($data['produk']);
		// die;
		$data['kategori'] = $this->toko_online_model->get_table('kategori_produk');

		$this->load->view('user/dashboard1', $data);
	}
}
