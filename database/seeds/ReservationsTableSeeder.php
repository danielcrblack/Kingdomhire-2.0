<?php

use Illuminate\Database\Seeder;
use App\Vehicle;
use App\Reservation;
use App\DBQuery;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->delete();
        $start_date = strtotime("2018-01-01");
        $end_date = strtotime("2018-12-31");
        $vehicles = Vehicle::all();
        foreach ($vehicles as $vehicle) {
            $numOfReservations = rand(1, 10);
            for($i = 0; $i < $numOfReservations; $i++) {
                $reservationLength = rand(3, 10);
                $start = date('Y-m-d', rand($start_date, $end_date));
                $end = date('Y-m-d', strtotime($start . '+ '.$reservationLength.' days'));
                if(count($vehicle->reservations) > 0) {
                    foreach ($vehicle->reservations as $reservation) {
                        if(!DBQuery::datesConflict($reservation, $start, $end)) {
                            Reservation::create([
                                'start_date' => $start,
                                'end_date' => $end,
                                'vehicle_id' => $vehicle->id
                            ]);
                        }
                    }
                }
                else {
                    Reservation::create([
                        'start_date' => $start,
                        'end_date' => $end,
                        'vehicle_id' => $vehicle->id
                    ]);
                }
            }
        }
    }
}
