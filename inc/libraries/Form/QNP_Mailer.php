<?php
namespace phuquang\Validation;

class QNP_Mailer
{
    public $Language = 'ja';
    public $Form     = '';
    public $FormName = '';
    public $To       = '';
    public $ToName   = '';
    public $CharSet  = 'ISO-2022-JP';
    public $Encoding = '7bit';
    public $Subject  = '';
    public $Body     = '';
    public $Data     = array();
    public $File     = '';

    public function setFrom($email, $name = '')
    {
        if (empty($email)){
            return;
        }

        $this->Form = $email;

        $this->FormName = $this->transferMimeEncode($name);
    }

    public function setTo($email, $name = '')
    {
        if (empty($email)){
            return;
        }

        $this->To = $email;

        $this->ToName = $this->transferMimeEncode($name);
    }

    public function setSubject($subject = '')
    {
        $this->Subject = $this->transferMimeEncode($subject);
    }

    public function setBody($body = '')
    {
        $this->Body = $this->transferEncode($body);
    }

    public function transferMimeEncode($string = '')
    {
        if ($this->Language === 'ja'){
            return mb_encode_mimeheader($string);
        }else{
            return $string;
        }
    }

    public function transferEncode($string = '')
    {
        if ($this->Language === 'ja'){
            return mb_convert_encoding($string, $this->CharSet, "UTF-8");
        }else{
            return $string;
        }
    }

    public function transferFormToTemplate(array $args, $template)
    {
        foreach ($args as $key => $value) {
            if (strpos($template, '{$' . $key . '}') !== false) {
                $template = str_replace('{$' . $key . '}', $value, $template);
            }
        }
        return $template;
    }

    public function setMailData($data = array()){
        if (is_array($data) && !empty($data)){
            $this->Data = $data;
        }
    }
    public function setMailTemplate($file)
    {
        if (!file_exists($file)) {
            return false;
        }
        $this->File = $file;

        $template = file_get_contents($file);

        if (!empty($this->Data)){
            $this->Body = transferFormToTemplate($this->Data, $template);
        } else {
            $this->Body = $template;
        }
    }

    public function test($condition)
    {
        if ($condition === true){
            $this->To = 'test@cybridge.jp';
            $this->ToName = 'Test Cybridge';
        }
    }

    public function send()
    {
        $headers  = array(
            'MIME-Version: 1.0',
            "Content-transfer-encoding: {$this->Encoding}",
            "From: {$this->From} <{$this->FormName}>",
            "Content-Type: text/plain; charset={$this->CharSet}",
        );

        if ($this->Language === 'ja'){
            mb_language('uni');
            mb_internal_encoding('UTF-8');

            return mb_send_mail($this->To, $this->Subject, $this->Body, $headers);
        } else {
            return send_mail($this->To, $this->Subject, $this->Body, $headers);
        }
    }
}
