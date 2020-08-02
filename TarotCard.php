<?php
class TarotCard
{
    public $name;                   // カード名
    public $upright;                // 正位置での意味
    public $reversed;               // 逆位置での意味
    public $position = 'upright';   // 位置（正位置・逆位置）
 
    function __construct($name, $upright, $reversed=""){
        $this->name     = $name;
        $this->upright  = $upright;
        $this->reversed = $reversed;
    }
     
    // 位置に応じた意味を取得
    function get_meaning($ignorePosition=false){
        if($ignorePosition){
            return $this->upright;
        } else {
            return ($this->position == 'upright') ? $this->upright : $this->reversed;
        }
    }
}