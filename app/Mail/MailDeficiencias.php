<?php

namespace App\Mail;

use App\Models\CampaignElemento;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailDeficiencias extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $deficiencias;
    public $campaigntienda;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$deficiencias)
    {
        $this->details=$details;
        $this->deficiencias=$deficiencias;
        // $this->deficiencias= CampaignElemento::join('campaign_tiendas','campaign_tiendas.id','tienda_id')
        // ->where('campaign_id',$details['campaignId'])
        // ->where('campaign_elementos.store_id',$details['storeId'])
        // ->where('campaign_elementos.estadorecepcion','<>','1')
        // ->with('estadorecep')
        // ->get();
        $this->campaigntienda=$this->deficiencias->first()->tienda_id;

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->details['de'], 'Grafitexapp'),
            subject: $this->details['asunto'],
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content(){
            return new Content(markdown: 'mail.deficiencias',);
}

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
