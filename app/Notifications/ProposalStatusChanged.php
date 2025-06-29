<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class ProposalStatusChanged extends Notification
{
    use Queueable;

    public $proposal;
    public $nextRole; // string, misal 'Admin' atau 'Pembina'

    public function __construct($proposal, $nextRole)
    {
        $this->proposal = $proposal;
        $this->nextRole = $nextRole;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'proposal_id'  => $this->proposal->id,
            'judul'        => $this->proposal->judul,
            'next_role'    => $this->nextRole,
            'message'      => "Proposal “{$this->proposal->judul}” siap diproses oleh {$this->nextRole}.",
            'link'         => route('ormawa.proposal', [
                                    'role' => strtolower($this->nextRole),
                                    'id'   => $this->proposal->id
                                ]),
        ];
    }
}
