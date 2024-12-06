<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ通知</title>
</head>
<body>
    <h1>新しいお問い合わせがありました</h1>
    <p><strong>氏名:</strong> {{ $inquiry['name'] }}</p>
    <p><strong>メールアドレス:</strong> {{ $inquiry['email'] }}</p>
    <p><strong>会社名:</strong> {{ $inquiry['company'] }}</p>
    <p><strong>問い合わせ内容:</strong> {{ $inquiry['message'] }}</p>
    <p><strong>送信日時:</strong> {{ now()->format('Y-m-d H:i:s') }}</p>
</body>
</html>
