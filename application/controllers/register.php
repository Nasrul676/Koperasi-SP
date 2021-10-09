<?php
defined('BASEPATH') or exit('No direct script access allowed');

class register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }







    public function index()
    {
        if ($this->session->userdata('email')){
            redirect ('Koperasi');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('koperasi/login');
            $this->load->view('templates/auth_footer');
        } else {

            $this->_login();
        }
    }







    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if($user){
            if ($user['is_active'] == 0){
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('koperasi');
                }else{
                    $this->session->set_flashdata('message','Periksa Email Dan Password Anda !');
                    redirect('register');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('register');
            }
        }else{
            $this->session->set_flashdata('message','Email Tidak Terdaftar !');
                    redirect('register');
        }
    }







    public function registration()
    {

        if ($this->session->userdata('email')){
            redirect ('Koperasi');
        }
        $data['title'] = 'registration';
        $this->form_validation->set_rules('fname', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('koperasi/register');
            $this->load->view('templates/auth_footer1');
        } else {

            $data = [
                'fname' => htmlspecialchars($this->input->post('fname', true)),
                'kelamin' => htmlspecialchars($this->input->post('kelamin', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'date_created' => time()
            ];
            $this->db->insert('user', $data);



            $this->session->set_flashdata('message', 'Congratulation! your account has been created. Please Login');
            redirect('register/registration');
        }
    }








    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password1');
        $this->session->set_flashdata('message', 'You have been logged out!');
        redirect('register/registration');
    }







    public function forgot()
    {
       $data['judul'] = 'forgot password';
       $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

       $this->form_validation->set_rules('curretpassword', 'Curret Password', 'required|trim');
       $this->form_validation->set_rules('newpassword1', 'New Password', 'required|trim|min_length[3]|matches[newpassword2]', [
        'matches' => 'Password not match!',
        'min_length' => 'Password too short!'
    ]);
       $this->form_validation->set_rules('newpassword2', 'Repeat Password', 'required|trim|matches[newpassword1]');

       if($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('koperasi/ganti-password', $data);
        $this->load->view('templates/footer');
    }else{
        $curretpassword = $this->input->post('curretpassword');
        $newpassword = $this->input->post('newpassword1');


        if (password_verify($curretpassword, $data['user'], ['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Curret Password</div>');
            redirect('register/forgot');
        }  else{
            if ($curretpassword == $newpassword) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as Curret Password</div>');
                redirect('register/forgot');
            }else{
                $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed</div>');
                redirect('koperasi');
            }
        }
    }
}
}
