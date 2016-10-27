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

        $this->assertTrue($user->save());
    }

    public function testSaveWithNoData()
    {
      $user = new User();
      $user->data = [];
      $this->assertFalse($user->save());
    }
    public function testSaveIncompleteData()
    {
      $user = new User();
      $user->data=[
      'fname' => 'deepak',
      'lname' => 'tomar',
      'password'=>'password'
      ];
      $this->assertTrue($user->save());
    }
     public function testSaveduplicateEmail()
    {
      $user= new User();
      $user->data =[ 
      'fname' => 'kapil',
      'lname' => 'tomar',
      'email' => 'sdeepak2610@gmail.com',
      'password' => 'password'];
      $this->assertTrue($user->save());
    }
    public function testSaveInvalidPassword() 
    {
      $user = new User();
      $user->data = [
      'fname'=>'arun',
      'lname'=>'kumar',
      'email'=>'arun.kumar@gmail.com',
      'password'=>'1'
      ];
      $this->assertTrue($user->save());
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
   public function testLoginEmptyData()
   {
    try {
      $result = User::login();    
    }catch(Exception ee)
    {
      echo "Error message : ".$e->getMessage();
    }
   }
   public function testLoginInvalidData()
   {
    $email = '1';
    $password = '1';
    $result = User::login($email, $password);
    $this->assertTrue($result);
   }
   
   public function testlogout()
   {
    $result = User::logout();
   }
}