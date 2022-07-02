<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\Group;
use App\Models\Player;
use App\Models\PlayerStats;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'administrator'
        ]);

        Role::create([
            'name' => 'responsible'
        ]);

        Role::create([
            'name' => 'delegate'
        ]);

        Category::create([
            'name' => '+35'
        ]);

        Category::create([
            'name' => '+45'
        ]);

        Category::create([
            'name' => '+55'
        ]);

        Category::create([
            'name' => 'Femenino'
        ]);

        User::create([
            'name' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'document_id' => '123abc',
            'role_id' => 1
        ]);

        User::create([
            'name' => 'responsable',
            'lastname' => 'resp',
            'email' => 'resp@resp.com',
            'password' => Hash::make('123'),
            'document_id' => '123',
            'role_id' => 2
        ]);

        User::create([
            'name' => 'delegado',
            'lastname' => 'del',
            'email' => 'del@del.com',
            'password' => Hash::make('123'),
            'document_id' => '123',
            'role_id' => 3
        ]);

        Tournament::create([
            'category_id' => 2,
            'name' => 'Torneo de prueba',
            'country' => 'Bolivia',
            'startDate' => '2022-06-17',
            'endDate' => '2022-06-30'
        ]);

        Team::create([
            'category_id' => 2,
            'delegate_id' => 3,
            'name' => 'Spurs',
            'country' => 'Bolivia',
            'enabled' => 0
        ]);

        Group::create([
            'name' => 'Grupo A',
            'registration_id' => null
        ]);

        Group::create([
            'name' => 'Grupo B',
            'registration_id' => null
        ]);

        Player::create([
            'team_id' => 1,
            'name' => 'Boris',
            'lastname' => 'Fernandez',
            'document_id' => 1234,
            'position' => 'Pivote',
            'height' => 1.86,
            'weight' => 82.2,
            'country' => 'Bolivia',
            'picture' => 'https://res.cloudinary.com/djwn8itzv/image/upload/v1655431413/PlayerPictures/ypirt36fusvogmmpnd9d.png'
        ]);

        Player::create([
            'team_id' => 1,
            'name' => 'Tonny',
            'lastname' => 'Fernandez',
            'document_id' => 1234,
            'position' => 'Alero',
            'height' => 1.96,
            'weight' => 82.2,
            'country' => 'Bolivia',
            'picture' => 'https://res.cloudinary.com/djwn8itzv/image/upload/v1655431413/PlayerPictures/ypirt36fusvogmmpnd9d.png'
        ]);

        Player::create([
            'team_id' => 1,
            'name' => 'Gabriel',
            'lastname' => 'Gamez',
            'document_id' => 1234,
            'position' => 'Guardia Central',
            'height' => 1.70,
            'weight' => 68.9,
            'country' => 'Bolivia',
            'picture' => 'https://res.cloudinary.com/djwn8itzv/image/upload/v1655431413/PlayerPictures/ypirt36fusvogmmpnd9d.png'
        ]);

        Player::create([
            'team_id' => 1,
            'name' => 'Marco',
            'lastname' => 'Fernandez',
            'document_id' => 1234,
            'position' => 'Pivote',
            'height' => 1.86,
            'weight' => 82.2,
            'country' => 'Bolivia',
            'picture' => 'https://res.cloudinary.com/djwn8itzv/image/upload/v1655431413/PlayerPictures/ypirt36fusvogmmpnd9d.png'
        ]);

        Player::create([
            'team_id' => 1,
            'name' => 'Rodrigo',
            'lastname' => 'Fernandez',
            'document_id' => 1234,
            'position' => 'Alero',
            'height' => 1.69,
            'weight' => 72.1,
            'country' => 'Bolivia',
            'picture' => 'https://res.cloudinary.com/djwn8itzv/image/upload/v1655431413/PlayerPictures/ypirt36fusvogmmpnd9d.png'
        ]);

        PlayerStats::create([
            'player_id' => 1,
            'playedMatches' => 10,
            'points' => 25,
            'rebounds' => 10,
            'assists' => 8,
            'steals' => 3,
            'fouls' => 2,
        ]);

        PlayerStats::create([
            'player_id' => 2,
            'playedMatches' => 10,
            'points' => 25,
            'rebounds' => 10,
            'assists' => 8,
            'steals' => 3,
            'fouls' => 2,
        ]);

        PlayerStats::create([
            'player_id' => 3,
            'playedMatches' => 10,
            'points' => 25,
            'rebounds' => 10,
            'assists' => 8,
            'steals' => 3,
            'fouls' => 2,
        ]);

        PlayerStats::create([
            'player_id' => 4,
            'playedMatches' => 10,
            'points' => 25,
            'rebounds' => 10,
            'assists' => 8,
            'steals' => 3,
            'fouls' => 2,
        ]);

        PlayerStats::create([
            'player_id' => 5,
            'playedMatches' => 10,
            'points' => 25,
            'rebounds' => 10,
            'assists' => 8,
            'steals' => 3,
            'fouls' => 2,
        ]);
    }
}

