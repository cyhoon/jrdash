<?php

class User extends CI_Controller
{

    public function __Construct()
    {
        parent::__construct();
        $this->load->model('user_model');

    }

    public function login()
    {
        // this는 컨트롤러 객체임. 컨트롤러 객체 안에 있으니까.
        $login = $this->input->post('login',1);
        $password = $this->input->post('password',1);

        $result = $this->user_model->get([
            'login' => $login,
            'password' =>  hash('sha256',$password.SALT)
        ]);

        $this->output->set_content_type('application_json');

        if($result){
            $this->session->set_userdata(['user_id' => $result[0]['user_id']]);
            $this->output->set_output(json_encode(['result'=>1]));
            return false;
        }

        $this->output->set_output(json_encode(['result'=>0]));

    }

    public function register()
    {

        $this->output->set_content_type('application_json');

        $this->form_validation->set_rules('login','Login','required|min_length[4]|max_length[16]|is_unique[user.login]');
        $this->form_validation->set_rules('email', 'Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[16]|matches[confirm_password]');

        if($this->form_validation->run() == false){
//            echo validation_errors();
            $this->output->set_output(json_encode(['result'=>0, 'data'=>validation_errors()]));
            return false;
        }

        // this는 컨트롤러 객체임. 컨트롤러 객체 안에 있으니까.
        $login = $this->input->post('login',1);
        $email = $this->input->post('email',1);
        $password = $this->input->post('password',1);
        $confirm_password = $this->input->post('confirm_password',1);

        $user_id = $this->user_model->insert([
            'login' => $login,
            'password' => hash('sha256',$password.SALT),
            'email' => $email
        ]);

        echo $user_id;

        die('No yet ready');

        $this->output->set_content_type('application_json');

        if($result){
            $this->session->set_userdata(['user_id' => $result[0]['user_id']]);
            $this->output->set_output(json_encode(['result'=>1]));
            return false;
        }

        $this->output->set_output(json_encode(['result'=>0]));

    }

    public function test_get()
    {
        $data =$this->user_model->get(3);
        print_r($data);

        $this->output->enable_profiler(true);
    }

    /*
     * @param array $data
     * @usage $result = $this->user_model->insert(['login'=>'Jethro']);
     */
    public function  test_insert()
    {
        $result = $this->user_model->insert(['login' => 'Jethro']);
        print_r($result);
    }
    public function test_update()
    {
        $result = $this->user_model->update(['login' => 'Peggy'],3);
        print_r($result);
    }

    public function test_delete()
    {
        $result = $this->user_model->delete(7);
        print_r($result);
    }
}

?>