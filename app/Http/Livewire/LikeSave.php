<?php

namespace App\Http\Livewire;

use App\Models\Save;
use App\Models\Voters;
use Livewire\Component;
use App\Models\Tutorials;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LikeSave extends Component
{

    public $users_id;
    public $tutorials_id;
    public $vote;
    public $datas;
    public $save;

    protected $listeners = [
        'voteStored' => 'handleStored',
        'voteRemoved' => 'handleRemoved',
        'saveStored' => 'handleSaveStored',
        'removeSave' => 'handleRemoveSave',
    ];

    public function render()
    {
        // $votes = DB::table('tutorials')->select('user_id', $this->user_id)->get();
        return view('livewire.like-save');
    }

    public function storevote()
    {
        $this->alert('success', 'Liked!', [
            'position' =>  'center',
            'timer' =>  '2000',
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);

        $stored = Voters::create([
            'user_id' => $this->users_id,
            'tutorials_id' => $this->tutorials_id,
            'vote' => $this->vote,
        ]);

        $this->emit('voteStored', $stored);

        return back();
    }

    public function removevote()
    {
        $removedvote = Voters::where('user_id', $this->users_id)->where('tutorials_id', $this->tutorials_id)->delete();

        $this->emit('voteRemoved', $removedvote);
    }

    public function storesave()
    {
        $this->alert('success', 'Saved!', [
            'position' =>  'center',
            'timer' =>  '2000',
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);

        $saved = Save::create([
            'user_id' => $this->users_id,
            'tutorials_id' => $this->tutorials_id,
            'save' => 1
        ]);

        $this->emit('saveStored', $saved);
    }


    public function removesave()
    {
        $removeSave = Save::where('user_id', $this->users_id)->where('tutorials_id', $this->tutorials_id)->delete();

        $this->emit('removeSave', $removeSave);
    }

    public function handleStored()
    {
    }
    public function handleRemoved()
    {
    }
    public function handleSaveStored()
    {
    }
    public function handleRemoveSave()
    {
    }
}
