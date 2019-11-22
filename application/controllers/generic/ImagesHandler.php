<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ImagesHandler
{

    public function savePictures($mi_archivo, $path_image="")
    {
        $path_image = trim($path_image);
        if(!empty($path_image)){
            $config['upload_path'] = $path_image;
        }else{
            $config['upload_path'] = "uploads/";
        }
        $config['file_name'] = "recurso_" . time();
        $config['allowed_types'] = '*';
        // $config['allowed_types'] = 'bmp|gif|jpeg|jpg|jpe|png|tiff|tif';
        $config['max_size'] = "5120";
        $config['max_width'] = "8120";
        $config['max_height'] = "8120";

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $error = array(
                'error' => $this->upload->display_errors(),
                'state' => false
            );
            return $error;
        } else {
            //*** Datos de la imagen */
            $data = array(
                'upload_data' =>  $this->upload->data(),
                'state' => true
            );
            return $data;
        }
    }

    public function deleteImage($data)
    {
        $message = array();
        for ($i = 0; $i < sizeof($data); $i++) {
            if (isset($data[$i])) {
                $path = "./uploads/" . $data[$i];
                try {
                    if (file_exists($path) == true) {
                        if (!is_dir($path)) {
                            if (unlink($path)) {
                                $message = array('message' => 'deleted successfully');
                            }
                        }
                    }
                } catch (Exception $e) {
                    $message = array('error' => 'deleted successfully');
                }
            }
        }
        return $message;
    }
}
