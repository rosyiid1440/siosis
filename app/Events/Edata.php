<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Voting;
use App\Models\Kandidat;
use App\Models\User;

class Edata implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $periode;
    public $userVoting;
    public $kandidat;
    public $hasil;
    public $user;
    public $suara;
    public $persen;
    public $belumVoting;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($periode)
    {
        $this->userVoting = Voting::join('kandidat','kandidat.id','voting.kandidat_id')->where('periode_id',$periode)->count();
        $this->kandidat = Kandidat::where('periode_id',$periode)->orderBy('urut')->get();
        $this->user = User::where('periode_id',$periode)->count();
        $this->hasil = [];
        $this->belumVoting = $this->user - $this->userVoting;
        foreach($this->kandidat as $item)
        {
            $this->suara = Voting::where('kandidat_id', $item->id)->count();
            if($this->suara == 0){
                $this->persen = 0;
            }else{
                $this->persen = ($this->suara / $this->user) * 100;
            }
            $this->hasil[] = [
                'id' => $item->id,
                'suara' => $this->suara,
                'persen' => $this->persen
            ];
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('e-dashboard');
    }

    public function broadcastWith()
    {
        return [
            'data' => [
                'belumVoting' => $this->belumVoting,
                'userVoting' => $this->userVoting,
                'hasil' => $this->hasil
            ],
        ];
    }
}