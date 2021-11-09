<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Test_model');
        $this->Test_model->get_table('tema');
    }

    public function index()
    {
        if ($this->session->userdata("admin_username") != "") {
            $data['user'] = $this->Cilinaya_model->get_table('admin');
            $data['content'] = "user/view";
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
        // echo "WESSSS";
    }

    public function edit_user($id)
    {
        $id_admin = array('id_admin' => $id);
        $data['user'] = $this->Cilinaya_model->getWhere('admin', $id_admin);
        $data['content'] = "user/edit";
        $tema = $this->Cilinaya_model->get_table('tema');
        $data['tema'] = $tema;
        $this->load->view('dashboard', $data);
    }

    public function edit_user_data()
    {
        $id_admin = $this->input->post('id');
        $username = $this->input->post('nama');
        $pass = $this->input->post('pass');

        $data = array(
            'admin_username' => $username,
            'admin_password' => md5($pass),
            'admin_view_password' => $pass
        );
        $this->Cilinaya_model->update('admin', array('id_admin' => $id_admin), $data);

        redirect('user');
    }
}
