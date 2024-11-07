<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateApiUserWebsite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $user = new User();
        $user->name = 'Website';
        $user->username = 'website';
        $user->email = 'dev@atrio.it';
        $user->password = Hash::make('alisfghgphoituehgytohgohdighdo');
        $user->save();

        $token = $user->createToken('ordini', [
            "orders:list",
            "orders:request-refund",
            "orders:refund",
            "orders:mail",
            "orders:request-refund-mail",
            "orders:refund-mail"
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
        $user = User::where("username", "website")->first();

        if($user) {
            $user->tokens()->delete();
            $user->delete();
        }

        
    }
}
