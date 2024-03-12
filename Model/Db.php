<?php 
class db{
    private $hn = 'localhost';
    private $u = 'root';
    private $p= '';
    private $dat = 'techville';

    protected  function c(){
        $c = new mysqli($this->hn,$this->u,$this->p,$this->dat);
        if ($c->connect_errno){
            return "<script>alert('Connection Failed')</script>";
        }
        else{
            return $c;
        }
    }
    public function getConnection(){
        return $this->c();
    }
    public function closeConnection(){
        $this->c()->close();
    }
}
?>