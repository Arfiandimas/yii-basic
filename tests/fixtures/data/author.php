<?php


for ($i=0; $i < 100; $i++) { 
    return [
        'user1' => [
            'name' => 'barjono-'.$i,
            'email' => 'barjono_'.$i.'@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => date("Y-m-d H:i:s", strtotime($request->tanggal_pelaksanaan)),
            'updated_at' => date("Y-m-d H:i:s", strtotime($request->tanggal_pelaksanaan))
        ]
    ];
}
