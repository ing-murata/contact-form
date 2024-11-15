<!-- resources/views/contact/form.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>お問い合わせ</h2>
    <form action="#" method="POST" onsubmit="return validateForm()">
        @csrf <!-- この行はフロントエンドのみの場合、削除も可能です -->
        <div class="form-group mb-3">
            <label for="name">氏名 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" >
            <div class="invalid-feedback">氏名を入力してください。</div>
        </div>
        <div class="form-group mb-3">
            <label for="company">会社名</label>
            <input type="text" class="form-control" id="company" name="company">
        </div>
        <div class="form-group mb-3">
            <label for="email">メールアドレス <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" >
            <div class="invalid-feedback">有効なメールアドレスを入力してください。</div>
        </div>
        <div class="form-group mb-3">
            <label for="message">問い合わせ内容 <span class="text-danger">*</span></label>
            <textarea class="form-control" id="message" name="message" rows="4"></textarea>
            <div class="invalid-feedback">問い合わせ内容を入力してください。</div>
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
    </form>
</div>
@endsection

<!-- resources/views/contact/form.blade.phpの最後に追加 -->
<script>
    function validateForm() {
        let isValid = true;

        // 氏名のバリデーション
        const nameField = document.getElementById('name');
        if (nameField.value.trim() === "") {
            nameField.classList.add('is-invalid');
            isValid = false;
        } else {
            nameField.classList.remove('is-invalid');
        }

        // メールアドレスのバリデーション
        const emailField = document.getElementById('email');
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(emailField.value)) {
            emailField.classList.add('is-invalid');
            isValid = false;
        } else {
            emailField.classList.remove('is-invalid');
        }

        // 問い合わせ内容のバリデーション
        const messageField = document.getElementById('message');
        if (messageField.value.trim() === "") {
            messageField.classList.add('is-invalid');
            isValid = false;
        } else {
            messageField.classList.remove('is-invalid');
        }

        return isValid;
    }
</script>