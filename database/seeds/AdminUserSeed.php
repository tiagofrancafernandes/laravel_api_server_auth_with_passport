<?php

use App\User;
use Illuminate\Database\Seeder;

/**
 * RUN: php artisan db:seed --class=AdminUserSeed
 */
class AdminUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name       = 'Admin';
        $email      = 'admin@admin.com';
        $password   = 'pass123';

        $user = User::where('email', $email)->first();

        if($user)
        {
            $user->update([
                'name'      => $name,
                'email'     => $email,
                'password'  => bcrypt($password),
            ]);
        }else{
            $data                     = new User;
            $data->name               = $name;
            $data->email              = $email;
            $data->email_verified_at  = date('Y-m-d H:i:s');
            $data->token              = '';
            $data->password           = bcrypt($password);
            $data->active             = true;
            $data->remember_token     = null;
            $data->created_at         = date('Y-m-d H:i:s');
            $data->updated_at         = date('Y-m-d H:i:s');
            $data->save();
        }

    }
}
