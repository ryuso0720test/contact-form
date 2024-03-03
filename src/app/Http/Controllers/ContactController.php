<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    // フォーム入力ページ表示
    public function index()
    {
        return view('index');
    }


    /**
    * 入力確認ページ表示
    *  
    * @param array $request リクエスト情報
    * @return 確認ページ,入力情報
    */
    public function confirm(ContactRequest  $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        return view('confirm', compact('contact'));
    }

    /**
    * 入力データ登録処理
    *  
    * @param array $request リクエスト情報
    * @return お問い合わせ完了ページ
    */
    public function store(ContactRequest  $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        Contact::create($contact);
        return view('thanks');
    }

}
