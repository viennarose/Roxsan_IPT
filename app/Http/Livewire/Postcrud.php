<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Postcrud extends Component
{
    public $search='';
    public $showData = true;
    public $createData = false;
    public $updateData = false;

    public $status;
    public $user_id;
    public $description;
    public $privacy;
    public $image;

    public $edit_id;
    public $edit_status;
    public $edit_description;
    public $edit_privacy;
    public $old_image;
    public $new_image;

    public function resetField()
    {
        $this->status = "";
        $this->description = "";
        $this->privacy = "";
        $this->image = "";
        $this->edit_status = "";
        $this->edit_description = "";
        $this->edit_privacy = "";
        $this->new_image = "";
        $this->old_image = "";
        $this->edit_id = "";
    }

    public function showForm()
    {
        $this->showData = false;
        $this->createData = true;
    }


    use WithFileUploads;
    public function create()
    {
        $images = new Post();
        $this->validate([
            'status' => 'required',
            'description' => 'required',
            'privacy' => 'required',
            'image' => 'required'
        ]);

        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('Posts', 'public');
        } else {
            $filename = Null;
        }
        $images->user_id = auth()->id();
        $images->status = $this->status;
        $images->description = $this->description;
        $images->privacy = $this->privacy == true ? '1':'0';
        $images->image = $filename;
        $result = $images->save();
        if ($result) {
            session()->flash('success', 'Added Successfully');
            $this->resetField();
            $this->showData = true;
            $this->createData = false;
        } else {
            session()->flash('error', 'Create Unsuccessfully');
        }


    }

    public function edit($id)
    {
        $this->showData = false;
        $this->updateData = true;
        $images = Post::findOrFail($id);
        $this->edit_id = $images->id;
        $this->edit_status = $images->status;
        $this->edit_description = $images->description;
        $this->edit_privacy = $images->privacy == true ? '1':'0';
        $this->old_image = $images->image;
    }

    public function update($id)
    {
        $images =Post::findOrFail($id);
        $this->validate([
            'edit_status' => 'required',
            'edit_description' => 'required',
            'edit_privacy' => 'required',
        ]);

        $filename = "";
        $destination=public_path('storage\\'.$images->image);
        if ($this->new_image != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_image->store('Posts', 'public');
        } else {
            $filename = $this->old_image;
        }

        $images->status = $this->edit_status;
        $images->description = $this->edit_description;
        $images->privacy = $this->edit_privacy;
        $images->image = $filename;
        $result = $images->save();
        if ($result) {
            session()->flash('success', 'Updated Successfully');
            $this->resetField();
            $this->showData = true;
            $this->updateData = false;
        } else {
            session()->flash('error', 'Update UnSuccessfully');
        }
    }

    public function delete($id)
    {
        $images=Post::findOrFail($id);
        $destination=public_path('storage\\'.$images->image);
        if(File::exists($destination)){
            File::delete($destination);
        }

        $result=$images->delete();
        if ($result) {
            session()->flash('Success', 'Delete Successfully');
        } else {
            session()->flash('error', 'Not Delete Successfully');
        }
    }

    public function back(){
        $this->showData = true;
        $this->createData = false;
        $this->updateData = false;
    }

    public function render()
    {
        $images = Post::where('status', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(5);
        return view('livewire.postcrud', ['images' => $images])->layout('layouts.app');
    }
}
