<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class InsertAuthUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        $user = new User;
        $user->name = 'Sagra Touch Station';
        $user->username = 'sagra_touch_station';
        $user->email = 'info@gestionecasse.it';
        $user->password = Hash::make('hiewai:f0ieChi6eph?oh~z2chii5p');
        $user->save();

        $token = $user->createToken('ordini', [
            "orders:list",
            "orders:detail",
            "orders:complete",
        ]);

        echo "Il nuovo token per l'utente [$user->name] è [$token->plainTextToken] (parentesi quadre escluse)";

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        $user = User::where("username", "sagra_touch_station")->first();

        if($user) {
            $user->tokens()->delete();
            $user->delete();
        }
        
    }
}
