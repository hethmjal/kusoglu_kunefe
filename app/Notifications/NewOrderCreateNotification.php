<?php

namespace App\Notifications;

use App\Models\Order;
use GuzzleHttp\Psr7\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderCreateNotification extends Notification
{
    use Queueable;
    protected $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }


    public function toDatabase($notifiable)
    {
        return[
            'title'=>'لديك طلب جديد',
            'body'=>  " تم طلب ".$this->order->product->name ." من الطاولة رقم  ". $this->order->table,
            'action'=>'/dashboard/order',
            'oroder_id'=>$this->order->id,
        ];
    }
    

    public function toBroadcast($notifiable)
    {
        $message = new BroadcastMessage([
            'title'=>'لديك طلب جديد',
            //'body'=>$this->order->table.  "تم طلب "." من الطاولة رقم ". $this->order->product->name ,
            'body'=>  " تم طلب ".$this->order->product->name ." من الطاولة رقم  ". $this->order->table,
            'action'=>'/dashboard/order',
            'created_at'=> $this->order->created_at->diffForHumans(),
            'oroder_id'=>$this->order->id,
        ]);
        return $message;
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
  /*   public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    } */

    
    
    
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}