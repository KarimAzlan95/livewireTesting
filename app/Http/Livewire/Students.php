<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;

class Students extends Component
{
    public $ids;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;

    public $updateMode = false;

public function resetInputFields(){
    $this->firstname = '';
    $this->lastname = '';
    $this->email = '';
    $this->phone = '';
}

public function store(){
    $validateData = $this->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'phone' => 'required',
    ]);

    Student::create($validateData);
    session()->flash('message', 'Student created Successfully!');
    $this->resetInputFields();
    $this->emit('studentAdded');
}

public function edit($id){
    $this->updateMode = true;
    $student = Student::where('id',$id)->first();
    $this->ids = $student->id;
    $this->firstname = $student->firstname;
    $this->lastname = $student->lastname;
    $this->email = $student->email;
    $this->phone = $student->phone;
}

public function update(){
    $this->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'phone' => 'required',
    ]);

    if($this->ids){
        $student = Student::find($this->ids);
        $student->update([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);
        $this->updateMode = false;
        session()->flash('message', 'Student updated Successfully!');
        $this->resetInputFields();
        $this->emit('studentUpdated');
    }
}

public function cancel(){
    $this->updateMode = false;
    $this->resetInputFields();
}

public function delete($id){
    if($id){
        Student::where('id', $id)->delete();
        session()->flash('message','Student Data Deleted Successfully!');
    }
}

    public function render()
    {
        $gah = Student::all();
        return view('livewire.students',['gah'=>$gah]);
    }
}
