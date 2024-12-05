<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function showContactForm()
    {
        // 問い合わせフォームを表示
        return view('contact.form');
    }

    public function showContactPerfect()
    {
        // 問い合わせ完了画面を表示
        return view('contact.perfect');
    }

    public function submit(ContactRequest $request)
    {
        // バリデーション済みデータを取得
        $validated = $request->validated();

        // データベースに保存
        Contact::create($validated);

        // 問い合わせ完了画面にリダイレクト
        return redirect()->route('contact.perfect')->with('status', 'お問い合わせが送信されました！');
    }

    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('email')) {
         $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->filled('company')) {
           $query->where('company', 'like', '%' . $request->company . '%');
        }
        if ($request->filled('message')) {
            $query->where('message', 'like', '%' . $request->message . '%');
         }
        if ($request->filled('from_date')) {
          $query->whereDate('created_at', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
          $query->whereDate('created_at', '<=', $request->to_date);
        }

        $contacts = $query->paginate(10)->appends($request->except('page'));

        return view('contact.index', compact('contacts'));
    }
}
