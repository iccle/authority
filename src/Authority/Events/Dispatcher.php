<?php
namespace Authority\Events;

use Illuminate\Events\Dispatcher as IlluminateDispatcher;
use DateTime;

class Dispatcher extends IlluminateDispatcher
{
    /**
     * Fire an event and call the listeners.
     *
     * @param  string  $eventName
     * @param  mixed   $payload
     * @return Authority\Event
     */
    public function fire($eventName, $payload = array())
    {
        if ( ! $payload instanceof SymfonyEvent)
        {
            $payload['timestamp'] = new DateTime;
            $payload = new Event($payload);
        }

        return parent::dispatch($eventName, $payload);
    }

}
