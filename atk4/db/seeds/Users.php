<?php


use Phinx\Seed\AbstractSeed;

class Users extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
	    $data = [
		    [
			    'name'    => 'foo',
			    'email'   => 'foo@test.com',
		    ],[
			    'name'    => 'bar',
			    'email' => 'bar@test.com',
		    ],[
			    'name'    => 'foo bar',
			    'email' => 'foo_bar@test.com',
		    ],[
			    'name'    => 'john doe',
			    'email' => 'john_doe@test.com',
		    ],[
			    'name'    => 'jane doe',
			    'email' => 'jane_doe@test.com',
		    ],[
			    'name'    => 'johny',
			    'email' => 'johny@test.com',
		    ],[
			    'name'    => 'jack',
			    'email' => 'jack@test.com',
		    ],[
			    'name'    => 'jameson',
			    'email' => 'jameson@test.com',
		    ]
	    ];

	    $posts = $this->table('user');
	    $posts->insert($data)
	          ->saveData();
    }
}
