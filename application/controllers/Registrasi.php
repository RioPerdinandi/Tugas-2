<?php


class Registrasi extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('nama_lengkap','Nama_lengkap','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password','Password','required|trim|matches[repassword] |min_length[3]');
        $this->form_validation->set_rules('repassword','Repassword','required|trim|matches[password]');
        if($this->form_validation->run() == false)
        {

            $data['judul'] = 'Halaman Registrasi';
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/registrasi', $data);
            $this->load->view('admin/templates/admin_footer');
        }else{
            $data=[
                'nama_lengkap' => ($this->input->post('nama_lengkap', true)),
                'email' => ($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

            ];
            $this->db->insert('tbl_user', $data);
            $this->session->set_flashdata('flash','<div class="alert alert-success" role="alert">
            Selamat Anda Berhasil Registrasi !
            </div>');
                 redirect('admin/login');
        }
    }
}
?>