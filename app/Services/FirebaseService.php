<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;

class FirebaseService
{
    protected $database;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(storage_path('firebase_credentials.json'))
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL')); // ✅ Use the new database URL

        $this->database = $factory->createDatabase();
    }

    public function getDatabase()
    {
        return $this->database;
    }
}
