<?php
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testSave()
    {
        $user = new User();
        $user->data = [
            'fname' => 'Deepak',
            'lname' => 'Tomar',
            'email' => 'sdeepak2610@gmail.com',
            'password' => 'password'
        ];

        $this->assertTrue($user->save() != false);
          $user2 = new User();
        $user2->data = [
        'fname' => 'Kapil',
        'lname' => 'tomar',
        'email' => 'Sdeepak2610@gmail.com',
        'password' =>'password'
         ];
        $this->assertTrue($user2->save() != false);   
    }

    public function testFindById()
    {
    
    $result = User::findById('1');
    $this->assertTrue($result != null);
    } 
    public function testDelete()
    {
        $result = User::delete('1');
        $this->assertTrue($result);
    }
    public function testFindAll()
    {
     $result = User::findAll();
    foreach ($result as $data) {
          foreach ($data as $key => $value) {
              echo $key." : ".$value."  ";
          }
    }
    } 
   public function testLogin()
   {
    $email = 'Sdeepak2610@gmail.com';
    $password = 'password';
    $result = User::login($email, $password);
    $this->assertTrue($result);
   }
   public function testlogout()
   {
    $result = User::logout();
   }
}