<?php


namespace Booking;



use Booking\Actions\Hotel\CreateHotelAction;
use Booking\Actions\Hotel\DeleteHotelAction;
use Booking\Actions\Hotel\UpdateHotelAction;
use Booking\Actions\Receptionist\CreateReceptionistAction;
use Booking\Actions\Room\CreateRoomAction;
use Booking\Actions\Room\DeleteRoomAction;
use Booking\Actions\Room\UpdateRoomAction;
use Booking\Interfaces\Booking\CreateBooking;
use Booking\Interfaces\Hotel\CreateHotel;
use Booking\Interfaces\Hotel\DeleteHotel;
use Booking\Interfaces\Hotel\UpdateHotel;
use Booking\Interfaces\Receptionist\CreateReceptionist;
use Booking\Interfaces\Room\CreateRoom;
use Booking\Interfaces\Room\DeleteRoom;
use Booking\Interfaces\Room\UpdateRoom;
use Illuminate\Support\ServiceProvider;

class BookingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->bind(CreateHotel::class, CreateHotelAction::class);
        $this->app->bind(UpdateHotel::class, UpdateHotelAction::class);
        $this->app->bind(DeleteHotel::class, DeleteHotelAction::class);

        $this->app->bind(CreateReceptionist::class, CreateReceptionistAction::class);

        $this->app->bind(CreateRoom::class, CreateRoomAction::class);
        $this->app->bind(UpdateRoom::class, UpdateRoomAction::class);
        $this->app->bind(DeleteRoom::class, DeleteRoomAction::class);

    }
}
