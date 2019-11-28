<?php

namespace LibraFireProject\Http\Controllers;

use LibraFireProject\User;
use LibraFireProject\Item;
use Illuminate\Http\Request;
use LibraFireProject\Http\Requests\ProfileRequest;
use LibraFireProject\Http\Requests\PasswordRequest;
use LibraFireProject\Http\Requests\ItemRequest;

class UserController extends Controller
{
    public function profile()
    {
    	return view('profile.profile');
    }

    public function profileData(ProfileRequest $request)
    {
    	$firstName = $request->input('first-name-profile');
    	$lastName = $request->input('last-name-profile');
    	$email = $request->input('email-profile');

    	$userDetails = session('user');

    	$id = $userDetails->id;

    	$user = new User();

    	$userUpdated = $user->update($firstName, $lastName, $email, $id);

    	session(['user' => $userUpdated]);

    	$request->session()->flash('updated', 'You have successfully updated profile data.');

    	return redirect()->route('profile');
    }

    public function password()
    {
    	return view('profile.password');
    }

    public function passwordData(PasswordRequest $request)
    {
        $currentPassword = $request->input('current-password');
        $newPassword = $request->input('new-password');
        $newPasswordRepeat = $request->input('new-password-repeat');

        if( $newPassword != $newPasswordRepeat ){
            return redirect()->back()->with('dontMatch', 'New and Repeat Password do not match.');
        }

        $userDetails = session('user');

        $userPassword = $userDetails->password;

        if( !password_verify($currentPassword, $userPassword) ){
            return redirect()->back()->with('wrongPassword', 'Wrong Password.');
        }

        $id = $userDetails->id;

        $userEmail = $userDetails->email;

        $user = new User();

        $userData = $user->updatePassword($newPassword, $id, $userEmail);

        session(['user' => $userData]);

        $request->session()->flash('passwordUpdated', 'You have successfully updated password.');

        return redirect()->route('password');
    }

    public function item()
    {
        return view('profile.item');
    }

    public function itemData(ItemRequest $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $payment = $request->input('payment');
        $delivery = $request->input('delivery');
        $userID = $request->input('userID');
        $image = $request->file('image');

        if( isset($image) && !empty($image) ){
            
            if( $image->isValid() ){
                $imageName = $image->getClientOriginalName();
                $imageExtension = $image->extension();
                $imagePath = $image->path();
                $storeItemImage = $image->store('items');
                $image = $imageName;
            }

        } else {
            $image = '';
        }

        $item = new Item();
        
        $result = $item->create($userID, $name, $description, $price, $payment, $delivery, $image);

        $request->session()->flash('itemCreated', $result);

        return redirect()->route('item');
    }

    public function itemList()
    {
        $userID = session('user')->id;

        $item = new Item();

        $items = $item->itemList($userID);

        return view('profile.list', ['items' => $items]);
    }
}
