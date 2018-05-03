<!-- <div class="container">
  <form action="https://mobirise.com/" method="post" data-form-title="CONTACT FORM">
    <input type="hidden" value="" data-form-email="true">
    <div class="form-group">
      <input type="text" class="form-control" name="name" required="" placeholder="Name*" data-form-field="Name">
    </div>
    <div class="form-group">
      <input type="email" class="form-control" name="email" required="" placeholder="Email*" data-form-field="Email">
    </div>
    <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-warning">CONTACT US</button></div>
  </form>
</div> -->

<?php
class Person
{
    private $firstname = 'Christopher';
    private $middlename = 'Platino';
    private $lastname = 'Vistal';

    public function setFirstname(string $firstname) : string
    {
        return $this->firstname = $firstname;
    }

    public function setMiddlename(string $middlename) : string
    {
        return $this->middlename = $middlename;
    }

    public function setLastname(string $lastname) : string
    {
        return $this->lastname = $lastname;
    }

    public function dump()
    {
        var_dump($this->firstname , $this->middlename , $this->lastname);
    }
}

$person = new Person();
$person->setFirstname('Cedric');
$person->setMiddlename('Ariel');
$person->setLastname('John');
