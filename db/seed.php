<?php
require_once __DIR__ . '/../includes/messages.php';
require_once __DIR__ . '/../actions/flights/flight.php';
require_once __DIR__ . '/../actions/users/user.php';

function seed_users()
{
    require_once __DIR__ . '/seed_data/users.php';

    foreach ($users as $user) {
        try {
            create_user(
                $user[0],
                $user[1],
                $user[2],
                $user[3],
                $user[4] ?? 'passenger'
            );
        } catch (Exception $e) {
            set_error("Error inserting user {$user[0]}: " . $e->getMessage());
        }
    }

    set_success("Users seeded successfully.");
}

function seed_flights()
{
    require_once __DIR__ . '/seed_data/flights.php';

    foreach ($flights as $flight) {
        try {
            create_flight(...$flight);
        } catch (Exception $e) {
            set_error("Error inserting flight {$flight[0]}: " . $e->getMessage());
        }
    }
    set_success("Flights seeded successfully.");
}
