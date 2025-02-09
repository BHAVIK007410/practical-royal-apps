<?php

namespace App\Console\Commands;

use App\Services\AppServices;
use App\Services\AuthorServices;
use Illuminate\Console\Command;

/**
 * Classs CreateAuthor
 * 
 * @package App\Console\Commands
 */
class CreateAuthor extends Command
{
    public AuthorServices $author;
    public AppServices $app;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:author';
    protected $description = 'Create a new author from command';

    /**
     * Method __construct
     *
     * @param AuthorServices $author
     * @param AppServices $app
     *
     * @return void
     */
    public function __construct(AuthorServices $author, AppServices $app)
    {
        $this->app = $app;
        $this->author = $author;
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Creating a new author...');

        // Ask for user details
        $token = $this->app->getToken();
        if ($token == '') {
            $this->warn('Please try after some time.');
            return;
        }

        $firstname = $this->ask('Enter First Name:');
        $lastname = $this->ask('Enter last Name:');
        $birthday = $this->ask('Enter Birthday (Y-m-d):');
        $biography = $this->ask('Enter Biography:');
        $gender = $this->ask('Enter Gender:');
        $birthplace = $this->ask('Enter Birthplace:');

        if (!$this->confirm("Confirm creating user with:\nFirst Name: $firstname\nLast Name: $lastname\nContinue?")) {
            $this->warn('User creation cancelled.');
            return;
        }

        $authorData = [
            'first_name' => $firstname,
            'last_name' => $lastname,
            'birthday' => $birthday . 'T00:00:00.000Z',
            'biography' => $biography,
            'gender' => $gender,
            'place_of_birth' => $birthplace,
            'token' => $token,
        ];

        $author = $this->author->createuser($authorData);
        if (!$author) {
            $this->warn('Author not created.');
            return;
        }

        $this->warn('Author created successfully.');
    }
}
