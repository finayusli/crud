<?php
class Matakuliah extends CI_Controller
{
    
    public function index()
    {
        $data['matkul']=$this->m_matakuliah->tampilmatakuliah()->result();
        $this->load->view('view-form-matakuliah',$data);
    
    }
    
    public function cetak()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required|min_length[3]',
        array(
            'required'      => '%s Wajib diisi.',
            'min_length'     => '%s Kode terlalu pendek.'
        ));
           
        $this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required|min_length[3]',
        array(
            'required'      => '%s Wajib diisi.',
            'min_length'     => '%s terlalu pendek.'
        ));

        $this->form_validation->set_rules('sks', 'Sks', 'required',
        array(
            'required'      => '%s Wajib dipilih.'
        ));

        if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('view-form-matakuliah');
                }
                else
                {
                    $data = [
                        'kode' => $this->input->post('kode'),
                        'nama' => $this->input->post('nama'),
                        'sks' => $this->input->post('sks')
                    ];
                    $this->m_matakuliah->simpanmatakuliah($data);
                    redirect('matakuliah/index/');
                }
        }

        public function hapus(){
            $where=['kode'=>$this->uri->segment(3)];
            $this->m_matakuliah->hapusmatakuliah($where);
            redirect('matakuliah/index/');
        }

        public function edit(){
            $matkul=$this->m_matakuliah->matkulwhere(['kode'=>$this->uri->segment(3)])->result_array();
            $data=array(
                "kode"=>$matkul[0]['kode'],
                "nama"=>$matkul[0]['nama'],
                "sks"=>$matkul[0]['sks']
            );
            $this->load->view('view-edit-matakuliah',$data);
        }
        public function update(){
            $this->form_validation->set_rules('kode', 'Kode', 'required|min_length[3]',
        array(
            'required'      => '%s Wajib diisi.',
            'min_length'     => '%s Kode terlalu pendek.'
        ));
           
        $this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required|min_length[3]',
        array(
            'required'      => '%s Wajib diisi.',
            'min_length'     => '%s terlalu pendek.'
        ));

        $this->form_validation->set_rules('sks', 'Sks', 'required',
        array(
            'required'      => '%s Wajib dipilih.'
        ));

        if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('view-form-matakuliah');
                }
                else
                {
                    $data = [
                        'kode' => $this->input->post('kode'),
                        'nama' => $this->input->post('nama'),
                        'sks' => $this->input->post('sks')
                    ];
                    $this->m_matakuliah->updatematakuliah($data,['kode'=>$this->input->post('kode')]);
                    redirect('matakuliah');
                }
        }
    }