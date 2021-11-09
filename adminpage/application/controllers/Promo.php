<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Cilinaya_model');
    }
    public function index()
    {
        if ($this->session->userdata("admin_username") != "") {
            $d['content'] = "promo/view";
            $d['promo']     = $this->Cilinaya_model->get_data_promo()->result_array();
            $tema = $this->Cilinaya_model->get_table('tema');
            $d['tema'] = $tema;
            $this->load->view('dashboard', $d);
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
        }
    }


    function get_promo()
    {
        if ($this->session->userdata("admin_username") != "") {
            $data = $this->Cilinaya_model->get_data_promo();
            echo json_encode($data->result_array());
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
        }
    }

    function get_produk()
    {
        if ($this->session->userdata("admin_username") != "") {
            $kategori = $this->input->post('id');

            $produk = $this->Cilinaya_model->get_table_where('produk', array('kategori_produk' => $kategori));

            $lists = "<option value='' disabled selected hidden>pilih produk</option>";

            foreach ($produk as $data) {
                $lists .= "<option value='" . $data['id_produk'] . "'>" . $data['nama_produk'] . "</option>"; // Tambahkan tag option ke variabel $lists
            }

            $callback = array('list_produk' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
        }
    }

    function get_harga()
    {
        if ($this->session->userdata("admin_username") != "") {
            $produk = $this->input->post('id');

            $produk = $this->Cilinaya_model->get_table_where('produk', array('id_produk' => $produk));

            $harga = $produk[0]['harga'];

            $callback = array('harga' => $harga);

            echo json_encode($callback);
            // echo "<script>alert('jancuk')</script>";
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
        }
    }


    function add()
    {
        if ($this->session->userdata("admin_username") != "") {
            $tema = $this->Cilinaya_model->get_table('tema');
            $data = array(
                'tema' => $tema
            );
            $data['kategori'] = $this->Cilinaya_model->get_table('kategori_produk');
            $data['content'] = "promo/promo_add";
            $this->load->view('dashboard', $data);
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
        }
    }
    function edit_promo($id)
    {
        if ($this->session->userdata("admin_username") != "") {
            $data['kategori'] = $this->Cilinaya_model->get_table('kategori_produk');
            $data['edit_promo'] = $this->Cilinaya_model->get_data_promo_where($id)->result_array();
            $data['content'] = "promo/promo_edit";
            $this->load->model('Cilinaya_model');
            $tema = $this->Cilinaya_model->get_table('tema');
            $data['tema'] = $tema;
            $this->load->view('dashboard', $data);
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
        }
    }

    public function save()
    {
        if ($this->session->userdata("admin_username") != "") {
            $id_produk          = $this->input->post('produk');
            $harga_promo        = $this->input->post('harga_promo');
            $tgl_mulai          = $this->input->post('tgl_mulai');
            $tgl_selesai        = $this->input->post('tgl_selesai');

            $data = array(
                'id_produk_promo'   => $id_produk,
                'harga_promo'       => $harga_promo,
                'tgl_mulai'         => $tgl_mulai,
                'tgl_selesai'       => $tgl_selesai
            );

            $simpan = $this->Cilinaya_model->insert_table('promo', $data);
            if ($simpan) {
                redirect("promo");
            }
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
        }
    }

    public function edit()
    {
        if ($this->session->userdata("admin_username") != "") {
            $id_promo       = $this->input->post('id_promo');
            $harga_promo    = $this->input->post('harga_promo');
            $tgl_mulai      = $this->input->post('tgl_mulai');
            $tgl_selesai    = $this->input->post('tgl_selesai');

            $data = array(
                'harga_promo'   => $harga_promo,
                'tgl_mulai'     => $tgl_mulai,
                'tgl_selesai'   => $tgl_selesai
            );
            $update = $this->db->update('promo', $data, array('id_promo' => $id_promo));
            if ($update) {
                redirect(base_url("promo"));
            }
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
        }
    }

    function hapus($id)
    {
        if ($this->session->userdata("admin_username") != "") {
            $d['hapus_produk'] = $this->db->query("DELETE FROM produk WHERE id_produk='$id'");
            redirect(base_url("produk"));
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
        }
    }

    function foto($id)
    {
        if ($this->session->userdata("admin_username") != "") {
            $data['detail_produk']     = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'");
            $data['foto_produk']     = $this->db->query("SELECT * FROM produk w, foto_produk fw WHERE fw.id_produk = w.id_produk AND w.id_produk='$id'");
            $data['id_produk']         = $id;
            $data['content']             = "produk/produk_foto";
            $this->load->model('Cilinaya_model');
            $tema = $this->Cilinaya_model->get_table('tema');
            $data = array(
                'tema' => $tema
            );
            $this->load->view('dashboard', $data);
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
        }
    }
    function foto_save()
    {
        if ($this->session->userdata("admin_username") != "") {
            $id            = $this->input->post("id");
            $namafile    = $id . "_" . time();
            $config['upload_path']     = '../img_foto/produk/';
            $config['allowed_types']    = 'jpg|jpeg|png|bmp';
            $config['max_size']        = '2000';
            $config['file_name']         = $namafile . ".jpg";
            $foto = $config['file_name'];

            $this->upload->initialize($config);

            if (!$this->upload->do_upload()) {
                echo $this->upload->display_errors();
                die;
            } else {
                $this->db->query("INSERT INTO foto_produk(id_produk, foto_produk) VALUES ('$id', '$foto') ");
                redirect(base_url("produk/foto/$id"));
            }
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
        }
    }

    function foto_hapus()
    {
        if ($this->session->userdata("admin_username") != "") {
            $id                 = $this->input->post("id");
            $id_produk     = $this->input->post("id_produk");
            $namafile         = $this->input->post("foto_produk");
            $d['hapus_produk'] = $this->db->query("DELETE FROM foto_produk WHERE id_foto_produk='$id'");

            $path = realpath(APPPATH . '../img_foto/produk');
            $hapus =  $path . "/" . $namafile;

            unlink($hapus);
            redirect(base_url("produk/foto/$id_produk"));
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
        }
    }

    function aa()
    {
        $d = $this->db->query("SELECT id_order, SUM(subtotal) as total FROM detail_order group by id_order")->result_array();
        foreach ($d as $key) {
            $this->db->query('UPDATE `order` SET total_order=' . $key['total'] . ' WHERE id_order=\'' . $key['id_order'] . '\'');
        }
    }

    function validasi($id)
    {
        if ($this->session->userdata("admin_username") != "") {
            $this->Cilinaya_model->update_table('produk', array('validasi' => 1), array('id_produk' => $id));
            redirect('produk');
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
        }
    }
}
