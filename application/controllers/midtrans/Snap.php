<?php

use CodeIgniter\Exceptions\AlertError;
use Illuminate\Support\Arr;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'Mid-server-fcKDROWA1ouoJ1xDV4W5P_BW', 'production' => true);
		$this->load->library('midtrans/midtrans');
		$this->midtrans->config($params);
		// $this->load->helper('url');
		$this->load->model('Toko_online_model');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('midtrans/checkout_snap');
	}

	public function token()
	{
		$id_order = $this->input->post('id');
		//echo '$id_order'.$id_order;
		$order = $this->Toko_online_model->get_table_where('order', array('id_order' => $id_order));
		//print_r($this->db->last_query());
		$total = $order[0]['total_order'];
		$ongkir = $order[0]['ongkir'];
		$produk = $total - $ongkir;
		// Required
		$transaction_details = array(
			'order_id' => $order[0]['id_order'],
			'gross_amount' => $order[0]['total_order'], // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $produk,
			'quantity' => 1,
			'name' => "Produk"
		);

		// Optional
		$item2_details = array(
			'id' => 'a2',
			'price' => $ongkir,
			'quantity' => 1,
			'name' => "Ongkir"
		);

		// Optional
		$item_details = array($item1_details, $item2_details);

		// Optional
		$billing_address = array(
			'first_name'    => $order[0]['nama_order'],
			// 'last_name'     => "Litani",
			'address'       => $order[0]['alamat_order'] . ", ",
			'city'          => $order[0]['kota'] . ", " . $order[0]['provinsi'],
			// 'postal_code'   => "16602",
			'phone'         => $order[0]['tlp_order'],
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => $order[0]['nama_order'],
			// 'last_name'     => "Litani",
			'address'       => $order[0]['alamat_order'] . ", ",
			'city'          => $order[0]['kota'] . ", " . $order[0]['provinsi'],
			// 'postal_code'   => "16601",
			'phone'         => $order[0]['tlp_order'],
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $order[0]['nama_order'],
			// 'last_name'     => "Litani",
			'email'         => $order[0]['email_order'],
			'phone'         => $order[0]['tlp_order'],
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 1
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);

		// echo json_encode($result);
		// die;

		if ($result['payment_type'] == "bank_transfer") {
			$data_transaksi = array(
				'id_order' 		=> $result['order_id'],
				'status_code'		=> $result['status_code'],
				'gross_amount'		=> $result['gross_amount'],
				'payment_type'		=> $result['payment_type'],
				'transaction_time'	=> $result['transaction_time'],
				'pdf_url'		=> $result['pdf_url']
			);
		} elseif ($result['payment_type'] == "gopay") {
			$data_transaksi = array(
				'id_order' 		=> $result['order_id'],
				'status_code'		=> $result['status_code'],
				'gross_amount'		=> $result['gross_amount'],
				'payment_type'		=> $result['payment_type'],
				'transaction_time'	=> $result['transaction_time']
			);
		}

		// $simpan = $this->db->insert('transaksi_midtrans', $data);
		$simpan = $this->Toko_online_model->insert_table('transaksi_midtrans', $data_transaksi);
		// $this->db->set($data);
		// $simpan = $this->db->insert($this->db->dbprefix . 'transaksi_midtrans');

		if ($simpan) {
			redirect(base_url('user/order/search_order/'));
		}
	}

	public function spp()
	{
		$data['midtrans'] = $this->db->get('transaksi_midtrans')->result();
		$this->load->view('pembayaranspp', $data);
	}

	public function tokenspp()
	{
		$nama = $this->input->post('nama');
		$kelas = $this->input->post('kelas');
		$jmlbayar = $this->input->post('jmlbayar');
		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $jmlbayar, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $jmlbayar,
			'quantity' => 1,
			'name' => "Pembayaran SPP" . $kelas
		);

		$item_details = array($item1_details);

		$customer_details = array(
			'first_name'    => $nama
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 2
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finishspp()
	{
		$result = json_decode($this->input->post('result_data'), true);
		echo 'RESULT <br><pre>';
		var_dump($result);
		echo '</pre>';
		$nama = $this->input->post('nama');
		$kelas = $this->input->post('kelas');
		$data = [
			'order_id' => $result['order_id'],
			'nama' => $nama,
			'kelas' => $kelas,
			'gross_amount' => $result['gross_amount'],
			'payment_type' => $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			'bank' => @$result['va_numbers'][0]['bank'],
			'va_number' => @$result['va_numbers'][0]['va_number'],
			'pdf_url' => @$result['pdf_url'],
			'status_code' => $result['status_code'],
		];

		$simpan = $this->db->insert('transaksi_midtrans', $data);
		if ($simpan) {
			echo "Sukses";
		} else {
			echo "Gagal";
		}
	}
}
