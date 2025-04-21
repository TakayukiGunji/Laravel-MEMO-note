<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member as MemberModel;
use Illuminate\Support\Collection;

class Member extends Component
{
    public string $name;
    public MemberModel $member;
    public Collection $members;

    public function render (  )    // render：必ず最初に実行されるメソッド
    {
        $this -> members = $this -> member -> get (  );
        return view ('livewire.member');
    }

    // メンバークラスを入れるためのオブジェクト変数 $Member
    // mount => __constractと同じようなもの
    // mountは１回、renderは毎回
    public function mount ( MemberModel $member )
    {
        $this -> member = $member;
    }

    public function save (  )
    {
        $this -> member -> create
        ( 
            [
                "name" => $this -> name
            ]
        );
    }
}
