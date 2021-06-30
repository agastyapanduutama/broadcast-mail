<?php

class Request extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->uploadTypes = array(
            'doc'       => ['allowed_types' => 'pdf|docx|doc'],
            'img'       => ['allowed_types' => 'jpg|jpeg|png'],
            'html'      => ['allowed_types' => 'html'],
            'custom'    => ['allowed_types' => 'pdf|doc|docx|xls|xlsx|jpg|jpeg|png|ppt|pptx']
        );
    }

    function id($id)
    {
        return array('md5(sha1(md5(sha1(sha1(md5(md5(sha1(md5(md5(id))))))))))' => $id);
    }

    function encKey($key){
        return "md5(sha1(md5(sha1(sha1(md5(md5(sha1(md5(md5($key))))))))))";
    }

    function acak($text)
    {
        return md5(sha1(md5(sha1(sha1(md5(md5(sha1(md5(md5($text))))))))));
    }



    function print($array)
    {
        ob_clean();
        echo "<pre>";
        echo print_r($array);
        echo "</pre>";
        exit(0);
    }

    function json($array)
    {
        echo "<pre>";
        echo json_encode($array);
        echo "</pre>";
    }

    function query()
    {
        echo $this->db->last_query();
    }

    function input($input)
    {
        return htmlspecialchars(ltrim(rtrim($_POST[$input])));
    }


    function all($guarded = null)
    {
        $request = $_POST;
        foreach ($request as $key => $value) {
            $result[$key] = $this->input($key);
        }
        if ($guarded != null) {
            foreach ($guarded as $guard_ => $value) {
                if ($value == false) {
                    unset($request[$guard_]);
                } else {
                    unset($request[$guard_]);
                    $request[$guard_] = $value;
                }
            }
        }
        return $request;
    }


    function upload_form_multi($data)
    {
        $fileName = [];
        // $this->print($data);
        $countfiles = count($_FILES[$data['file']]['name']);
        $maxSize = isset($data['max_size']) ? $data['max_size'] : 5000;
        $success = 0;

        if ($data['encrypt'] == true) {
            $config_ = array(
                'upload_path' => './uploads/' . $data['path'],
                'encrypt_name' => true,
                'max_size' => $maxSize
            );
        } else {
            $config_ = array(
                'upload_path' => './uploads/' . $data['path'],
                'encrypt_name' => false,
                'max_size' => $maxSize
            );
        }


        $config = array_merge($config_, $this->uploadTypes[$data['type']]);

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        for ($i = 0; $i < $countfiles; $i++) {
            if (!empty($_FILES[$data['file']]['name'][$i])) {
                // echo $_FILES[$data['file']]['name'][$i];
                $fileNameNa = str_replace(["'", "`", ";", "^"], "", $_FILES[$data['file']]['name'][$i]);

                $_FILES['file']['name'] = $fileNameNa;
                $_FILES['file']['type'] = $_FILES[$data['file']]['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES[$data['file']]['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES[$data['file']]['error'][$i];
                $_FILES['file']['size'] = $_FILES[$data['file']]['size'][$i];

                $config['file_name'] = time() . "-" . $fileNameNa;

                $this->upload->initialize($config);

                // File upload
                $uploading = $this->upload->do_upload('file') ? true : false;

                if ($uploading) {
                    // Get data about the file
                    $success++;
                    $uploadData = $this->upload->data();
                    $fileName[] = $uploadData['file_name'];
                    $oriFile[] = $fileNameNa;
                } else {
                    return $this->upload->display_errors();
                }
            }
        }

        $fileNaGan = "";
        foreach ($fileName as $key) {
            $fileNaGan .= "$key,";
        }

        $fileOriNaGan = "";
        foreach ($oriFile as $key) {
            $fileOriNaGan .= "$key,";
        }

        $fileNaGan = substr($fileNaGan, 0, strlen($fileNaGan) - 1);
        $fileOriNaGan = substr($fileOriNaGan, 0, strlen($fileOriNaGan) - 1);
        // print_r($fileName);
        $custom = isset($data['customInput']) ? $data['customInput'] : null;
        return [
            'total' => $countfiles,
            'success' => $success,
            'data' => $this->all($custom),
            'file' => [
                'lampiran' => $fileNaGan,
                'oriFile'  => $fileOriNaGan
            ]
        ];
    }
}
