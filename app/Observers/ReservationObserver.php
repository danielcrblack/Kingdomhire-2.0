<?php

namespace App\Observers;

use App\Reservation;
use App\Hire;

class ReservationObserver
{
    /**
     * Handle the reservation "saving" event.
     *
     * @param  \App\Reservation  $reservation
     * @return boolean
     */
    public function saving(Reservation $reservation)
    {
        // Check if the reservation conflicts with any other reservation/hire for its vehicle.
        $vehicle = $reservation->vehicle;
        $reservationsAndHires = $vehicle->getReservationsAndHires(
            (($reservation->exists) ? [$reservation->id] : [])
        );
        foreach ($reservationsAndHires as $other) {
            if ($reservation->conflictsWith($other)) {
                return false;
            }
        }
        // Create unique id for reservation if it doesn't have one.
        if ($reservation->name == null) {
            $reservation->name = Reservation::createUniqueId($vehicle);
        }
        // Determine if created/updated reservation should be a hire.
        // If the reservation is indeed a hire (start_date is a date less than or equal to today),
        // we save the hire here then return false, which signals to not save the initial 
        // reservation, as it has been converted into a hire.
        if ($reservation->canConvertToHire()) {
            // Delete reservation if it already exists in the database.
            if ($reservation->exists) {
                $reservation->delete();
            }
            // Create and save hire with attributes from the original reservation.
            Hire::create($reservation->getAttributes());
            return false;
        }
        return true;
    }
}
